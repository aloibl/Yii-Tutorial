<?php
/*******************Beginn Einbinden von Bibliotheken*******************/
require_once './include/config.inc.php';
require_once './include/function.inc.php';
/*******************Ende Einbinden von Bilbiotheken*******************/

use Webmasters\Doctrine\ORM\Util\ArrayMapper;
/*	Beginn Einbinden von Entity-Klassen	*/
use Entities\Link;
use Entities\Address;
use Entities\User;
use Entities\Application;
use Entities\Activity;
use Entities\Permission;
use Entities\Album;
use Entities\Event;
use Entities\Medium;
use Entities\News;
use Zend\Mail\Message;
use Zend\Mime\Message as MimeMessage;
use Zend\Mime\Part as MimePart;
use Zend\Mail\Transport\Smtp as SmtpTransport;
use Zend\Mail\Transport\SmtpOptions;
require 'vendor/soundcloud/Soundcloud.php';

##test###
/*	Ende Einbinden von Entity-Klassen	*/
/* Beginn Einbinden von Boundary-Klassen */
/* Ende Einbinden von Boundary-Klassen */
/*******************Ende use-Blöcke*******************/

/*******************Beginn Session-Verwaltung*******************/
//Session starten beziehungsweise wiederaufnehmen
//session_start() muss im PHP-Code vor der ersten HTML-Ausgabe (einschließlich Leerzeilen) sein, sonst bleibt die Session aus der vorherigen Aktion nicht bestehen
session_start();
if (!empty($_SESSION['flashmessage'])) : echo $_SESSION['flashmessage']; endif;
unset($_SESSION['flashmessage']);
/*******************Ende Session-Verwaltung*******************/

/*******************Beginn Cookie-Verwaltung*******************/
//Cookie setzen
//Wenn Cookie noch nicht gesetzt
if (!isset($_COOKIE['first_name'])) {
	//wenn user eingeloggt
	if(isset($_SESSION['user'])) {
		setcookie('first_name', $_SESSION['user']->getFirstName(), time()+86400);
		setcookie('last_name', $_SESSION['user']->getLastName(), time()+86400);
		setcookie('last_login', date('d.m.Y H:i:s', time()), time()+86400);
	} else {
	//kein User vorhanden, für den ein Cookie gesetzt werden könnte
	}
} else {
	//Cookie zwangsläufig bereits gesetzt, Werte können daraus entnommen werden.
}
/*******************Ende Cookie-Verwaltung*******************/

//Egal welche Aktion: Erst Einlesen der Anwendungsoptionen. Werden das erste mal von der setup.php gesetzt
$application = $em
					->getRepository('Entities\Application')
					->find(1)
				;
//Wenn eine Aktion angegeben wurde, dann speichere diese, wenn nicht, speichere "Standardaktion"
$aktion = isset($_REQUEST['aktion']) ? $_REQUEST['aktion'] : null;
switch ($aktion) {
 case ('browse' || 'add_medium' || 'read_medium' || 'edit_medium' || 'delete_medium' || 'browse_event' || 'read_event' || 'edit_event' || 'add_event' || 'delete_event'):
 $in_panel = true;
 break;
 
 default:
 $in_panel = false;
 
}
//Die anzufordernde View entspricht der Aktion und wird in einer variablen gespeichert
$view = (isset($aktion)  && ($_REQUEST['aktion'] != '')) ? $aktion : 'index';

//APIS
//soundcloud
//schauen ob wir ein Soundcloud API angegeben haben
/*$id = $application->getSoundcloudClientId();
if (!empty($id)) {
	//Soundcloud-API-objekt erzeugen
	$soundcloud = new Services_Soundcloud($id, $application->getSoundcloudClientSecret(), $application->getSoundcloudRedirectURL());
	//Development Optionen ausschalten
	$soundcloud->setDevelopment(false);
	//Access Token holen authentifzieren
	try {
		if (empty($_SESSION['soundcloudaccesstoken'])) {
			$accessToken = $soundcloud->accessToken($_GET['code']);
			//access Token in Session speichern
			$_SESSION['soundcloudaccesstoken'] = $accessToken['access_token'];
		} else {
			//es ist b ereits ein AccessToken gespeichert, also ans soundcloud-Objekt übergeben.
			$soundcloud->setAccessToken($_SESSION['soundcloudaccesstoken']);
		}
	} catch (Services_Soundcloud_Invalid_Http_Response_Code_Exception $e) {
		exit($e->getMessage());
	}
}*/
/*Aktion-Switch-Case*/

switch ($aktion) {
	//User-Login-Fälle
	case 'logout':
		//session zerstören
		unset($_SESSION['user']); // Wir zerstören das user-Objekt gezielt mit unset. Würden wir mit session_destroy() arbeiten, könnten wir keine Meldungen mehr mit set_message oder andere Werte in $_SESSION speichern, bis wir eine neue Session starten.
		//Evtl. Cookie zerstören
		//unset($_COOKIE['last_name']) funktioniert nicht, daher wert auf leeren string und time auf vergangenheit
		if(isset($_COOKIES['first_name'])) {
			setcookie('first_name', '', time()-3600);
			setcookie('last_name', '', time()-3600);
			setcookie('last_login', '', time()-3600);
		}
		set_message('Erfolgreich ausgeloggt', 'green');
		redirect('index.php');
	break;

	case 'login':
		if (!isset($_SESSION['user']) || empty($_SESSION['user'])) {
			if (isset($_POST['userloginname']) && !(empty($_POST['userloginname'])) ) {
				$user = $em
					->getRepository('Entities\User')
					->findOneBy(array('userLoginName' => $_POST['userloginname']))
				;
				if (!isset($user)) {
					set_message('Dieser Username wurde leider nicht gefunden! Vielleicht müssen Sie sich erst registrieren, indem Sie bestätigen, dass Sie noch kein Passwort haben?', 'red');
					redirect('index.php?aktion=login');
				}
				
				if ($user->getStatus() == 0) {
					set_message('Dieser Benutzer wurde noch nicht aktiviert. Klicken Sie erst auf den Link in der Aktivierungsmail, die wir Ihnen geschickt haben. Sollten Sie diese nicht bekommen oder gelöscht haben, können Sie <a href="#!">hier</a> eine neue anfordern.');
					redirect('index.php');
				}
				$options = return_password_option_array_add();
				$hash = $user->getPasswordHash();
				$password = $_POST['pw'];
				if (password_verify($password, $hash)) {
					set_message('Erfolgreich eingeloggt.', 'green');
					if (password_needs_rehash($hash, PASSWORD_DEFAULT, $options)) {
						$hash = password_hash($password, PASSWORD_DEFAULT, $options);
						$user->setPasswordHash($hash);
						$em->persist($user);
						$em->flush();
					}
					$_SESSION['user'] = $user;
					redirect('index.php');
				} else {
					set_message('Das Passwort war nicht korrekt, überprüfen Sie Ihre Spracheinstellung für die Tastatur sowie die Caps-Lock-Taste und versuchen Sien es erneut. Wenn du dein Passwort vergessen hast, nutze <a href="#!">Diesen Link</a>', 'red');
					redirect('index.php?aktion=login');
				}
			}
		} else {
			set_message('Warum neu einloggen? Du bist doch schon drin ;). Wenn du deinen Benutzernamen wechseln willst, <a href="#!">melde dich bitte erst ab</a>.', 'yellow');
			redirect('index.php');
		}
	break;
	
	//add-Fälle
	
	case 'add_news':
		$user = $_SESSION['user'];
		$user = $em
			->getReference('Entities\User', $user->getId());
		if (!empty($_POST['body'])) {
			$news = new News($_POST);
			$news->setUserCreated($user);
			$em->persist($news);
			$em->flush();
			set_message('News erfolgreich eingetragen', 'green');
			redirect('index.php?aktion=add_news');
		} else {
			flash_message('lel');
		}
		
	break;

	case 'add_user':
			$view = 'login';
			if (isset($_POST['new_pw']) && empty($_POST['new_pw']) != true) {
				//neues uiser-Objke terzeugne
				$user = new User();
				$password_options = return_password_option_array_add();
				$hash = password_hash($_POST['new_pw'], PASSWORD_DEFAULT, $password_options);
				$daten_user = array(
					'userLoginName' => $_POST['userloginname'],
					'firstName' => (empty($_POST['firstname'])) ? '' : $_POST['firstname'],
					'lastName' => (empty($_POST['lastname'])) ? '' : $_POST['lastname'],
					'email' => $_POST['email'],
					'lastLogin' => new DateTime('1970-01-01'),
					'status' => 0,
					//PaswortHash und Salt verarbietne und dem Array hinzufügen
					'passwordHash' => $_POST['new_pw']
					//passowrd im klartext brauchenw ir für den Validator, wird später ins Hash geändert
				);
				if (isset($_POST['gb_day'])) {
					$daten_user['birthDay'] = new DateTime($_POST['gb_year'] . '-' . $_POST['gb_month'] . '-' . $_POST['gb_day']);
				} else {
					$daten_user['birthDay'] = new DateTime('1970-01-01');
				}
				//Jetzt das User-objekt mit den spezifizierten Daten erzeugen
				ArrayMapper::setEntity($user)->setData($daten_user);
				// Die Adresse
				//validierung durchlaufen lassen
				$validator = $em->getValidator($user);
				if ($validator->isValid()) {
					//Validierung erolfgreich durchlaufen
					$daten_user['passwordHash'] = $hash;
					ArrayMapper::setEntity($user)->setData($daten_user);
					//Wurde eine Adresse eingegeben?
					if ($_POST['business'] == 'true') {
						//Adress-Objke terzeugen
						$address = new Address();
						//befüllen
						ArrayMapper::setEntity($address)->setData($_POST);
						//Beziehungen erstellen - diesmal bevor der User in die DB geschrieben wurde, aml schauen obs geht
						$user->addAddress($address); // eigentümerseite (n-Seite)
						$address->setUser($user); // gegenseitige (1-Seite)
						//Validierung der Adresse
						$validator = $em->getValidator($address);
						if ($validator->isValid()) {
							$em->persist($address);
							$em->persist($user);
							$em->flush();
						//aktiiverungskey generieren
						$key = sha1(secret_key . $user->getUserLoginName());
						//E-Mail senden
						$mail = new \Zend\Mail\Message();
						$mail->setEncoding('UTF-8');
						$textContent =
							'Sie bekommen diese E-Mail, weil Sie sich auf www.tears-of-serenade.com, der Website unserer Band, angemeldet haben.
							Um sich einloggen und die Mitgliedsfunktionen unserer Seite nutzen zu können, müssen Sie Ihre Anmeldung durch Klick auf diesen Link bestätigen:
							http://localhost/index.php?aktion=activate_user&key=' . $key . '&username=' . $user->getUserLoginName()
						;
						$htmlMarkUp =
							'<html>
							<header><meta charset="utf-8" /><meta http-equiv="Content-Type" content="text/html;charset=utf-8" /></header>
							<body>
							<p>Sie bekommen diese E-Mail, weil Sie sich auf www.tears-of-serenade.com, der Website unserer Band, angemeldet haben.<br /><br />
							Um sich einloggen und die Mitgliedsfunktionen unserer Seite nutzen zu können, müssen Sie Ihre Anmeldung durch Klick auf diesen Link bestätigen:<br /><br />
							<a href="http://localhost/index.php?aktion=activate_user&key=' . $key . '&username=' . $user->getUserLoginName() . '">Jetzt aktivieren</a></p>
							</body>
							</html>
						';
						$text = new MimePart($textContent);
						$text->type = 'text/plain';
						$html = new MimePart($htmlMarkUp);
						$html->type = 'text/html';
						$body = new MimeMessage();
						$body->setParts(array($text, $html));
						$mail->setBody($body);
						$mail->setFrom('register@tearsofserenade.com', 'Tears of Serenade');
						$mail->addTo($user->getEmail(), $user->getFirstName() . ' ' . $user->getLastName());
						$mail->setSubject('Tears of Serenade Aktivierungsmail');
						
						$transport = new SmtpTransport();
						$options = new \Zend\Mail\Transport\SmtpOptions(
							array (
								'name'	=>	'googlemail.com',
								'host' =>	'smtp.gmail.com',
								'port' => '465',
								'connection_class'	=>	'login',
								'connection_config' =>	array (
									'ssl' => 'ssl',
									'username' => 'abusemyskill@googlemail.com',
									'password' => 'TheAllSeeing3y3'
								),
							)
						);
						$transport->setOptions($options);
						$transport->send($mail);
						set_message('User erfolgreich eingetragen! Eine Aktivierungsmail wurde an' . $user->getEmail() . ' gesendet. Klicken Sie auf den dort bereitgestellten Link, um Ihren Benutzer zu aktivieren.', 'green');
						redirect('index.php');
						} else {
							$errors = $validator->getErrors();
						}
					} else {
						//Jetzt das erzeugte Objekt als MySQL-insert-anweisung speichern.
						$em->persist($user);
						//die gesammelten SQL-Anwieusngen ausführen
						$em->flush();
						
						//aktiiverungskey generieren
						$key = sha1(secret_key . $user->getUserLoginName());
						//E-Mail senden
						$mail = new \Zend\Mail\Message();
						$mail->setEncoding('UTF-8');
						$textContent =
							'Sie bekommen diese E-Mail, weil Sie sich auf www.tears-of-serenade.com, der Website unserer Band, angemeldet haben.
							Um sich einloggen und die Mitgliedsfunktionen unserer Seite nutzen zu können, müssen Sie Ihre Anmeldung durch Klick auf diesen Link bestätigen:
							http://localhost/index.php?aktion=activate_user&key=' . $key . '&username=' . $user->getUserLoginName()
						;
						$htmlMarkUp =
							'<html>
							<header><meta charset="utf-8" /><meta http-equiv="Content-Type" content="text/html;charset=utf-8" /></header>
							<body>
							<p>Sie bekommen diese E-Mail, weil Sie sich auf www.tears-of-serenade.com, der Website unserer Band, angemeldet haben.<br /><br />
							Um sich einloggen und die Mitgliedsfunktionen unserer Seite nutzen zu können, müssen Sie Ihre Anmeldung durch Klick auf diesen Link bestätigen:<br /><br />
							<a href="http://localhost/index.php?aktion=activate_user&key=' . $key . '&username=' . $user->getUserLoginName() . '">Jetzt aktivieren</a></p>
							</body>
							</html>
						';
						$text = new MimePart($textContent);
						$text->type = 'text/plain';
						$html = new MimePart($htmlMarkUp);
						$html->type = 'text/html';
						$body = new MimeMessage();
						$body->setParts(array($text, $html));
						$mail->setBody($body);
						$mail->setFrom('register@tearsofserenade.com', 'Tears of Serenade');
						$mail->addTo($user->getEmail(), $user->getFirstName() . ' ' . $user->getLastName());
						$mail->setSubject('Tears of Serenade Aktivierungsmail');
						
						$transport = new SmtpTransport();
						$options = new \Zend\Mail\Transport\SmtpOptions(
							array (
								'name'	=>	'googlemail.com',
								'host' =>	'smtp.gmail.com',
								'port' => '465',
								'connection_class'	=>	'login',
								'connection_config' =>	array (
									'ssl' => 'ssl',
									'username' => 'abusemyskill@googlemail.com',
									'password' => 'TheAllSeeing3y3'
								),
							)
						);
						$transport->setOptions($options);
						$transport->send($mail);
						set_message('User erfolgreich eingetragen! Eine Aktivierungsmail wurde an' . $user->getEmail() . ' gesendet. Klicken Sie auf den dort bereitgestellten Aktivierungslink, um Ihr Benutzerkonto zu aktivieren.', 'green');
						redirect('index.php');
					}
				}
			} else {
				set_message('Rufen Sie das Formular bitte über das Menü auf, anstatt die Daten automatisiert zu posten.', 'yellow');
				redirect('index.php?aktion=login');
				echo isset($_POST['new_pw']);
				echo empty($_POST['new_pw']);
			}
			//Falls VAlidierung doch nicht erfolgriech: fehlermeldungen abholen
			$errors = $validator->getErrors();
	break;
	
	case 'activate_user':
		$view = 'index';
		if (isset($_REQUEST['key'])) {
			$user = $em
					->getRepository('Entities\User')
					->findOneBy(array('userLoginName' => $_REQUEST['username']))
			;
			$key = $_REQUEST['key'];
			if (isset($user)) {
				if ($user->getStatus() == 0) {
					if (sha1(secret_key . $user->getUserLoginName()) == $key) {
						$user->setStatus(1);
						$em->persist($user);
						$em->flush();
						set_message('User erfolgreich aktiviert.', 'green');
						redirect('index.php');
					} else {
						set_message('Aktivierungscode ist falsch. Überprüfen Sie Ihre E-Mail noch einmal. Wenn Sie sie gelöscht haben oder sicher sind, dass der Schlüssel korrekt ist, wenden Sie sich an den <a href="#!">Support</a>', 'red');
						redirect('index.php');
					}
				} else {
					set_message('Dieser User wurde bereits schon einmal aktiviert', 'yellow');
					redirect('index.php');
				}
			} else {
				set_message('der zu aktivierende User existiert nicht.', 'red');
				redirect('index.php');
			}
		} else {
			redirect('index.php');
		}
	break;
	
	case 'admin_panel':
	$application->checkIfUserPermissionsAreSufficient('admin_panel', true);
	break;
	
	
	case 'add_album':
		if ($_SESSION['user'] && $application->checkIfUserPermissionsAreSufficient('add_medium', true)) {
			if (isset($_POST['title'])) {
				$user = $_SESSION['user'];
				$user = $em
					->getReference('Entities\User', $user->getId());
				$album = new Album();
				ArrayMapper::setEntity($album)->setData($_POST);
				//$user->addAlbumCreated($album);
				$album->setUserCreated($user);
				$validator = $em->getValidator($album);
				if ($validator->isValid()) {
					$em->persist($album);
					$em->flush();
					set_message('Album erfolgreich eingetragen', 'green');
					redirect('index.php?aktion=admin_panel');
				}
			} else {
				//einfach nur den View laden
			}
		} else {
			set_message('Sie sind nicht eingeloggt oder haben keine Berechtigung zum Hinzufügen von Alben', 'red');
			redirect('/index.php?aktion=admin_panel');
		}
	break;
	
	case 'browse_album':
		$all_albums = $em
			->getRepository('Entities\Album')
			->findAll()
		;
	break;
	
	case 'browse_event':
		$all_events = $em
			->getRepository('Entities\Event')
			->findAll()
		;
	break;
	
	case 'browse_medium':
		$in_panel = true;
		$all_media = $em
			->getRepository('Entities\Medium')
			->findAll()
		;
	break;
	
	case 'delete_medium':
		if (!empty($_POST['media'])) {
			$view = 'browse_medium';
			$i = 0;
			$selected_media_ids = $_POST['media'];
			foreach ($selected_media_ids as $medium_id) {
				$medium = $em
					->getRepository('Entities\Medium')
					->find($medium_id);
				$em->remove($medium);
				$i = $i+1;
			}
			$em->flush();
			set_message('Es wurden ' . $i . ' Medien erfolgreich entfernt', 'green');
			redirect('index.php?aktion=browse_medium');
		} else {
			set_message('Nichts zu tun', 'red');
			redirect('index.php?aktion=browse_medium');
		}
	break;
	
	case 'edit_event':
		$user = $_SESSION['user'];
		$user = $em
			->getReference('Entities\User', $user->getId());
		$view = 'add_event';
		$event = $em
			->getRepository('Entities\Event')
			->find($_REQUEST['id'])
		;
		$address = $event->getAddress();
		if (!empty($_POST['place'])) {
			ArrayMapper::setEntity($event)->setData($_POST);
			ArrayMapper::setEntity($address)->setData($_POST);
			$event->setUserUpdated($user);
			$event->setAddress($address);
			$em->flush();
			set_message('Event erfolgreich aktualisiert', 'green');
			redirect('index.php?aktion=edit_event&id=' . $event->getId());
		}
	break;
	
	case 'edit_medium':
		$view = 'add_medium';
		$user = $_SESSION['user'];
		$user = $em
			->getReference('Entities\User', $user->getId());
		$view = 'add_medium';
		$all_albums = $em
			->getRepository('Entities\Album')
			->findAll()
		;
		$medium = $em
			->getRepository('Entities\Medium')
			->find($_REQUEST['id'])
		;
		$albums_of_medium = $medium->getAlbums();
		if (!empty($_POST['youtube']) || !empty($_POST['soundcloud']) || !empty($_POST['locallink']) || !empty($_POST['alttext'])) {
				if (!empty($_POST['album']))
			{
				$album = $_POST['album'];
			} else {
				$album = false;
			}
			
			if(isset($_FILES["file"]["name"])) {
				$application->putFile($user, $album, 'edit_medium');
			}	
		}
	break;
		
	
	case 'edit_album':
		$user = $_SESSION['user'];
		$user = $em
			->getReference('Entities\User', $user->getId());
		$view = 'add_album';
		$album = $em
			->getRepository('Entities\Album')
			->find($_REQUEST['id'])
		;
		//es sollen nur die Daten vom Album aktualisiert werdene
		if (isset($_POST['title'])) {
			ArrayMapper::setEntity($album)->setData($_POST);
			$user->addAlbumUpdated($album);
			$album->setUserUpdated($user);
			$validator = $em->getValidator($album);
			if ($validator->isValid()) {
				$em->flush();
				set_message('Album erfolgreich aktualisiert', 'green');
				redirect('index.php?aktion=admin_panel');
			}			
		}
		//es soll ein File hinzugefügt werden
		if(isset($_FILES["file"]["name"])) {
			$application->putFile($user, $album, $aktion);
		}
	break;
	
	case 'add_event':
		if (isset($_POST['place'])) {
			if (isset($_SESSION['user'])) {
				$event = new Event();
				$user = $_SESSION['user'];
				$user = $em
					->getReference('Entities\User', $user->getId());
				ArrayMapper::setEntity($event)->setData($_POST);
				$startsAt = str_replace('.', '-', $_POST['startsAt']);
				$event->setStartsAt($startsAt);
				$address = new Address();
				ArrayMapper::setEntity($address)->setData($_POST);
				$validator = $em->getValidator($event);
				if ($validator->isValid()) {
				$address->addEvent($event);
				$event->setAddress($address);
				$user->addEventCreated($event);
				$event->setUserCreated($user);
				$em->persist($event);
				$em->persist($address);
				$em->flush();
				set_message('Event erfolgreich eingetragen', 'green');
				redirect('index.php?aktion=admin_panel');
				}
				$errors = $validator->getErrors();
			} else {
				set_message('Sie sind nicht eingeloggt', 'red');
				redirect('index.php');
			}
		}
	break;
	
	case 'add_medium':
		$user = $_SESSION['user'];
		$user = $em
			->getReference('Entities\User', $user->getId())
		;

			
		$all_albums = $em
			->getRepository('Entities\Album')
			->findAll()
		;
		if (!empty($_POST['album']))
		{
			$album = $_POST['album'];
		} else {
			$album = false;
		}
		
		if(isset($_FILES["file"]["name"])) {
			$application->putFile($user, $album);
		}
	break;
	
	case 'config_application':
		if (!empty($_POST['optiondefaultresultsperpage'])) {
			$oldpw = $application->getMailServerPw(secret_two_way_key);
			ArrayMapper::setEntity($application)->setData($_POST);
			if (!empty($_POST['mailserverpw'])) {
				$_SESSION['flashmessage'] = 'passwort: ' . $_POST['mailserverpw'];
				$hash = $application->twoWayEncryptPw($_POST['mailserverpw'], secret_two_way_key);
				$_SESSION['flashmessage'] = $_SESSION['flashmessage'] . ' hash: ' . $hash;
				$application->setMailServerPw($hash);
			} else {
				$application->setMailServerPw($oldpw);
			}
			$em->flush();
			set_message('Einstellungen gespeichert', 'green');
			redirect('index.php?aktion=config_application');
		}
		
	break;
	
	case 'contact':
		$view = 'index';
		if(!empty($_POST['message'])) {
			switch ($_POST['anliegen']) {
				case 'gig':
					$anliegen = 'Anfrage zum Auftritt';
				break;
				
				case 'anfrage':
					$anliegen = 'Allgemeine Anfrage & Beratung';
				break;
				
				case 'fanpost':
					$anliegen = 'Fanpost';
				break;
				
				case 'bug':
					$anliegen = 'Fehler auf der Seite';
				break;
				
				default:
					$anliegen = 'Sonstiges';
			}			
			$textContent = 'Servus Bandmitglied,' . eol . 
							'Jemand hat das Kontaktformular auf TearsOfSerenade.com ausgefüllt' . eol . 
							'Hier die Daten:' . eol .
							'Firma: ' . $_POST['firma'] . eol .
							'Name: ' . $_POST['name'] . eol .
							'E-Mail-Adresse: ' . $_POST['email'] . eol .
							'Betreff: ' . $_POST['topic'] . eol .
							'Anliegen: ' . $anliegen . eol .
							'Nachricht: ' . eol .
							$_POST['message']
			;
			$htmlMarkup = 'Servus Bandmitglied,' . "<br />" . 
							'Jemand hat das Kontaktformular auf TearsOfSerenade.com ausgefüllt' . "<br />" . 
							'Hier die Daten:' . "<br />" .
							'Firma: ' . $_POST['firma'] . "<br />" .
							'Name: ' . $_POST['name'] . "<br />" .
							'E-Mail-Adresse: ' . $_POST['email'] . "<br />" .
							'Betreff: ' . $_POST['topic'] . "<br />" .
							'Anliegen: ' . $anliegen . "<br />" .
							'Nachricht: ' . "<br />" .
							$_POST['message']
			;
			$application->sendMail($textContent, $htmlMarkup, 'info@tearsofserenade.com', 'Tears of Serenade', 'info@tearsofserenade.com', 'Tears of Serenade', 'Kontaktformular-Anfrage auf der Website - ' . $_POST['topic'], secret_two_way_key);
			set_message('Eine E-Mail wurde versandt. Wir werden so bald wie möglich antwortene', 'green');
			redirect('index.php');
		}
	break;
		
	default:
		$now = new DateTime('now');
		$all_gigs = $em
			->getRepository('Entities\Event')
			->findAll();
		$all_news = $em
			->getRepository('Entities\News')
			->findAll();
		if (!empty($_REQUEST['album'])) {
			$album = $em
				->getRepository('Entities\Album')
				->find($_REQUEST['album']);
			$all_media = $album->getMedia();
		} else {
			$all_albums = $em
				->getRepository('Entities\Album')
				->findAll();			
		}
}

/*Ende Aktion Switch-Case*/

/*******************Beginn View Management*******************/ 
//Die übergebene Flash-Notice aus der Session holen
$message = get_message();
//Den Layout-View holen
require_once 'views/layout.tpl.php';
//Das Einbinden des Aktions-Views für die Controller-Aktion erfolgt innerhalb der layout.tpl.php
/*******************Ende View Management*******************/ 

?>