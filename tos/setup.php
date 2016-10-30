<?php

//Wir wollen erste Anwendungsoptionen schreiben, dafür müssen wir die anwendungs-Entity laden
use Entities\Application;
use Entities\User;
use Entities\Activity;
use Entities\Permission;
use Webmasters\Doctrine\ORM\Util\ArrayMapper;
$aktion = 'setup';
$view = 'setup';
$_REQUEST['aktion'] = $aktion;
require_once 'include/function.inc.php';
$message = get_message();
if (isset($_POST['db_user']) && !empty($_POST['db_user'])) {
	//Daten aus dem Setupformular vorbereiten
	
	$password = (isset($_POST['db_pw'])) ? $_POST['db_pw'] : '';
	
	$text = "<?php";
	
	$text .= '	$connection_options = array(
		"default" => array(
			"driver" => "pdo_mysql",
			"dbname" => \'' . $_POST['db_name'] . "',
			'host' => '" . $_POST['db_host'] . "',
			'user' => '" . $_POST['db_user'] . "',
			'password' => '" .  $password . "',
			'connection_class' => '" . $_POST['mailserverlogin'] . "',
			'connection_config' => array(
				'ssl' => '" . $_POST['mailserverssl'] . "',
				'username' => '" . $_POST['mailserveruser'] . " ',
				'password' => '" .  $_POST['mailserverpw'] . " '
			)
		)
	);\n\n";
	$text .= 	'$mail_connection_options = array(
		"default" => array(
			"name" => \'' . $_POST['mailservername'] . "',
			'host' => '" .  $_POST['mailserverhost'] . "',
			'port' => '" . $_POST['mailserverport'] . "',
		)
	);";
	
	$text .= '//konfiguration der Applikation
			$application_options = array(
				"debug_mode" => true, // nachher auf false stellen
			);
			//Doctrine-Autoloader einbinden, um automatisch Entities sowie Doctrine inkl. Webmasters Extensions einzubinden
			require "vendor/autoload.php"; // wird definitiv geladen, der Pfad stimmt
			//Über dieses Objekt werden alle Datenbank-Operationen abgewickelt
			$em = Webmasters\Doctrine\Bootstrap::getInstance(
				$connection_options,
				$application_options
			)->getEm();
//erlaubte Dateiendungen
$allowedExts = array("gif", "jpeg", "jpg", "png", "mp4", "ogg", "mp3", "ogv", "webm", "flv", "zip", "rar", "pdf");
			?>';
				//Daten in eine Configdatei schreiben
	file_put_contents('include/config.inc.php', $text);
	//Jetzt können wir die erzeugte Configdatei laden, um selbst auf die Datenbankdaten zugreifen zu können
	require_once 'include/config.inc.php';
	//DAs SchemaTool ist fuer die Verwaltung des Datenbank-Schemas verantwortlich
	$schemaTool = new \Doctrine\ORM\Tools\SchemaTool($em);
	//Metadaten sind informationen über die Datenbank-Struktur, die z. B. als Annotationen hinterlegt sind
	$metadata = $em->getMetadataFactory()->getAllMetadata();

	try {
		//updateschema() passt die Struktur der Datenbank an das aktuelle schema an
		$schemaTool->updateSchema($metadata);
	} catch (PDOException $e) {
		echo 'ACHTUNG: Bei der Aktualisierung des Schemas gab es ein Problem: ';
		echo $e->getMessage() . "<br />";
		if (preg_match("/Unknown database '(.*)'/", $e->getMessage(), $matches)) {
			die(
				sprintf(
				'Erstellen Sie die Datenbank %s mit der Kollation utf8_general_ci!',
				$matches[1]
				)
			);
		}
		require_once 'views/layout.tpl.php';
	}

	//Das Schema ist aufgebaut, jetzt schreiben wir die ersten Anwendungsoptionen in die Datenbank
	//Jetzt das Application-Objekt mit den spezifizierten Daten erzeugen
	$application = new Application();
	ArrayMapper::setEntity($application)->setData($_POST);
	$hash = $application->twoWayEncryptPw($_POST['mailserverpw'], secret_two_way_key);
	$application->setMailServerPw($hash);
	//Jetzt das erzeugte Objekt als MySQL-Insert-Anweisung speichern.
	$em->persist($application);
	$em->flush();
	//Jetzt können wir auch ein Application-Objekt laden, weil wir jetzt ein $em-Objekt und einen Application-Datensatz haben.  Somit können wir auf Application-Methoden zugreifen
	$application = $em
					->getRepository('Entities\Application')
					->find(1)
	;
	//Jetzt schreiben wir den Administratoraccount in die datenbank
	if (isset($_POST['new_pw']) && empty($_POST['new_pw']) != true) {
		//neues User-Objekt erzeugen
		$user = new User();
		$password_options = return_password_option_array_add();
		$hash = password_hash($_POST['new_pw'], PASSWORD_DEFAULT, $password_options);
		$daten_user = array(
			'userLoginName' => $_POST['userloginname'],
			'firstName' => (empty($_POST['firstname'])) ? '' : $_POST['firstname'],
			'lastName' => (empty($_POST['lastname'])) ? '' : $_POST['lastname'],
			'email' => $_POST['email'],
			'lastLogin' => new DateTime('1970-01-01'),
			'status' => 1,
			//PaswortHash und Salt verarbietne und dem Array hinzufügen
			'passwordHash' => $_POST['new_pw']
			//passowrd im klartext brauchenw ir für den Validator, wird später ins Hash geändert
		);
		if (isset($_POST['gb_day'])) {
			$daten_user['birthDay'] = new DateTime($_POST['gb_year'] . '-' . $_POST['gb_month'] . '-' . $_POST['gb_day']);
		} else {
			$daten_user['birthDay'] = new DateTime('1970-01-01');
		}
	
	} else {
		echo 'kein Passwort';
	}
	//Jetzt das User-objekt mit den spezifizierten Daten erzeugen
	ArrayMapper::setEntity($user)->setData($daten_user);
	// Die Adresse
	//validierung durchlaufen lassen
	$validator = $em->getValidator($user);
	if ($validator->isValid()) {
		//Validierung erolfgreich durchlaufen
		$user->setPasswordHash($hash);
		//so, jetzt brauchen wir noch die ersten activities und permissions für den User
		$application->setNewActivityNewPermissionToUser($user, 'admin_panel', '3');
		$application->setNewActivityNewPermissionToUser($user, 'news', '31');
		$application->setNewActivityNewPermissionToUser($user, 'medium', '31');
		$application->setNewActivityNewPermissionToUser($user, 'tags', '31');
		$application->setNewActivityNewPermissionToUser($user, 'user', '31');
		$application->setNewActivityNewPermissionToUser($user, 'config_application', '3');
		$application->setNewActivityNewPermissionToUser($user, 'category', '31');
		$application->setNewActivityNewPermissionToUser($user, 'event', '31');
		//Jetzt das erzeugte Objekt als MySQL-insert-anweisung speichern.
		//$em->persist($user);
		//die gesammelten SQL-Anwieusngen ausführen
		//$em->flush();
		//Wenn alles geklappt hat:
		echo 'Das Schema-Tool wurde erfolgreich durchlaufen';
	} else {
		$errors = $validator->getErrors();
		echo 'nicht richtig durchlaufen';
	}
} else {
	require_once 'views/layout.tpl.php';
}


?>