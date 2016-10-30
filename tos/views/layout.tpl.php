<!DOCTYPE html>
<html lang="de">
	<head>
		<title>
			Tears of Serenade
		</title>
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
		<meta charset="utf-8" />
		<meta name="description" content="
		Tears of Serenade - Metalcore Band aus dem Bayerwald
		"
		/>
		<meta name="keywords" content="Metalcore Bayern, Tears of Serenade" />
		<meta name="viewport" content="
		width=device-width, initial-scale=1.0, maximum-scale=1"
		/>
		<link href="shared/css/styles.css" rel="stylesheet" type="text/css" />
		<script type="text/javascript" src="shared/js/functions.js"></script>
		<script type="text/javascript" src="videos/player/jwplayer.js"></script>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<script>
			//JQuery Funktionen
			$(document).ready(
				function() {
					$('a[href*=#]:not([href=#])').click(function() {
						if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
							var target = $(this.hash);
							target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
							if (target.length) {
								$('html,body').animate({
								  scrollTop: target.offset().top
								}, 1000);
								return false;
							}
						}
					});
				}
			)
		</script>
		<script type="text/javascript" src="shared/js/jquery.js"></script>
		<?php if ($aktion == 'add_news'): ?>
			<script type="text/javascript" src="shared/js/wysiwyg.js"></script>
		<?php endif; ?>
		<?php if (!empty($application)): ?>
			<?php $apikey = $application->getGoogleMapsAPIKey(); ?>
			<?php if (!empty($apikey)): ?>
				<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=<?php if (!empty($application)): echo $application->getGoogleMapsAPIKey(); endif; ?>&sensor=false"></script>
			<?php endif; ?>
		<?php endif; ?>
	</head>
	<body onload="javascript:<?php if (!$in_panel): ?>window_onload();<?php endif; ?>setInitialStyles();<?php if ($aktion == 'add_news'): ?>iFrameOn();<?php endif; ?><?php if(isset($_POST['pwchoose']) && $_POST['pwchoose'] == 'false'):?>showRegisterForm(true);changeFormAction();<?php endif; ?><?php if (isset($_POST['business']) && $_POST['business'] == 'true'): ?>activateAdressForm(true);<?php endif; ?>">
		<!--<div id="background_begin" onmouseover="fade(this);">
			<a href="#!">
				<img src="images/content/bandpics/tos_gruppenfoto.jpg" alt="Tears of Serenade Gruppenfoto" />
			</a>
		</div>-->
		
<!--
Zweck dieser View ist die Einbindung von HTML-Code, der in ALLEN verwendeten Unterviews identisch ist.
Dies verhindert unnötige Redundanz an HTML-Code.
 -->
	
	<!-- 
	##### Es folgt die Einbindung der für das Layout notwendigen Zusatz-Templates #####
	-->
	<!-- Einbinden der Navigation -->
	<?php if (
	$aktion != 'setup'
	&& $aktion != 'admin_panel'
	&& $aktion != 'browse_medium'
	&& $aktion != 'read_medium'
	&& $aktion != 'edit_medium'
	&& $aktion != 'delete_medium'
	&& $aktion != 'browse_album'
	&& $aktion != 'read_album'
	&& $aktion != 'edit_album'
	&& $aktion != 'add_album'
	&& $aktion != 'delete_album'
	&& $aktion != 'browse_event'
	&& $aktion != 'read_event'
	&& $aktion != 'edit_event'
	&& $aktion != 'add_event'
	&& $aktion != 'delete_event'
	&& $aktion != 'config_application'
	): ?>
		<?php require_once '_navi.tpl.php'; //Wir befinden uns bereits im Ordner-Views, daher richtige Pfadangabe ?>
	<?php endif; ?>
	<!-- Einbinden der Flash-Notice-Verwaltung -->
	<?php require_once '_flash_message.tpl.php'; ?>
	<!-- Einbinden der Fehlernachrichtenverwaltung -->
	<?php require_once '_errors.tpl.php'; ?>
	<!-- Einbinden des Aktions-Views für die Controller-Aktion -->
	<?php require_once $view . '.tpl.php'; //Die Variable view wird in der index.php definiert ?>
	
	<!--
	##### Das wars mit der Einbindung der für das Layout notwendigen Zusatz-Templates #####
	-->
	</body>
</html>