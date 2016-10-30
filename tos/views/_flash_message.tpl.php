<!--
Zweck dieser View ist die Anzeige von Flash-Notices, welche unsere Anwendung als Bestätigung/Feedback/Rückmeldung an den Nutzer liefert.

	####VIEW-BEZIEHUNGEN##############################################################################
	####wird geladen von##############################################################################
	####layout.tpl.php################################################################################
	####KLASSEN#######################################################################################
	####FUNKTIONEN####################################################################################
	####VARIABLEN#####################################################################################
	####Variable########e######wird definiert von###################wird gebraucht von################
	####$message###############function.inc.php::set_Message()######function.inc.php::getMessage()####
	###########################index.php::$_SESSION#################index.php::get_Message()##########
	##################################################################################################
-->
	<div class="flash-notices<?php echo ' ' . $message['message_status']; ?>">
		<?php echo $message['message']; ?>
	</div>