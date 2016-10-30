<?php
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
}

//Wenn alles geklappt hat:
echo 'Das Schema-Tool wurde durchlaufen.';
?>