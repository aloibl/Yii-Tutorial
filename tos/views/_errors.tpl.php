<!--
Dieses View dient zur Ausgabe von Fehlermeldungen aus try-catch-Fehlerbehandlung oder Benutzereingabe-Validierungsfunktionen

	####VIEW-BEZIEHUNGEN##############################################################################
	####wird geladen von##############################################################################
	####layout.tpl.php################################################################################
	####KLASSEN#######################################################################################
	####FUNKTIONEN####################################################################################
	####VARIABLEN#####################################################################################
	####Variable########e######wird definiert von###################wird gebraucht von################
	####$error########################################################################################
	##################################################################################################
-->
<?php if (isset($errors) && is_array($errors)): //Wenn es ein Array mit Fehlermeldungen gibt ?>
	<ul class="errors">
		<?php foreach ($errors as $error): // dann gib sie nacheinander aus ?>
			<li>
				<?php echo $error; ?>
			</li>
		<?php endforeach; ?>
	</ul>
<?php endif; ?>