<form id="config_application" name="config_application" action="index.php?aktion=config_application" method="post">
	<fieldset>
		<legend>
			Anwendungseinstellungen
		</legend>
		<header>
			Geben Sie hier Einstellungen für die Webanwendung ein.
		</header>
		<div class="input-element">
			<label for="siteurl">Seiten-URL:</label><input type="text" name="siteurl" id="siteurl" value="<?php if (!empty($application)): echo $application->getSiteURL(); endif; ?>" />
		</div>
		<div class="input-element">
			<label for="optiondefaultresultsperpage">Resultate pro Seite:</label><input type="number" name="optiondefaultresultsperpage" id="optiondefaultresultsperpage" value="<?php if (!empty($application)): echo $application->getOptionDefaultResultsPerPage(); endif; ?>" />
		</div>
		<div class="input-element">
			<label for="title">Seitentitel:</label><input type="text" name="title" id="title" value="<?php if (!empty($application)): echo $application->getTitle(); endif; ?>" />
		</div>
	</fieldset>
	<fieldset>
		<legend>
			E-Mail SMTP Informationen
		</legend>
		<header>
			Geben Sie hier die Informationen zum Versand von E-Mails ein (optional)
		</header>
		<div class="input-element">
			<label for="mailservername">Servername:</label><input type="text" id="mailservername" name="mailservername" value="<?php if (!empty($application)): echo $application->getMailServerName(); endif; ?>" />
		</div>
		<div class="input-element">
			<label for="mailserverhost">Serverhost:</label><input type="text" id="mailserverhost" name="mailserverhost" value="<?php if (!empty($application)): echo $application->getMailServerHost(); endif; ?>" />
		</div>
		<div class="input-element">
			<label for="mailserverport">Serverport:</label><input type="number" id="mailserverport" name="mailserverport" max="1024" min="1" value="<?php if (!empty($application)): echo $application->getMailServerPort(); endif; ?>" />
		</div>
		<div class="input-element">
			<label for="mailserverlogin">Loginform:</label>
			<select id="mailserverlogin" name="mailserverlogin">
				<option value="login"<?php if ($application->getMailServerLogin() == 'login'): echo ' selected="selected"'; endif; ?>>Login</option>
				<option value="plain"<?php if ($application->getMailServerLogin() == 'plain'): echo ' selected="selected"'; endif; ?>>Plain</option>
			</select>
		</div>
		<div class="input-element">
			<label for="mailserverssl">Verschlüsselung:</label>
			<select id="mailserverssl" name="mailserverssl">
				<option value="ssl"<?php if ($application->getMailServerSSL() == 'ssl'):  echo ' selected="selected"'; endif; ?>>SSL</option>
				<option value="tls"<?php if ($application->getMailServerSSL() == 'tls'): echo ' selected="selected"'; endif; ?>>TLS</option>
				<option value="no"<?php if ($application->getMailServerSSL() == 'no'): echo ' selected="selected"'; endif; ?>>Nein</option>
			</select>
		</div>
		<div class="input-element">
			<label for="mailserveruser">SMTP User:</label><input type="text" id="mailserveruser" name="mailserveruser" value="<?php if (!empty($application)): echo $application->getMailServerUser(); endif; ?>" />
		</div>
		<div class="input-element">
			<label for="mailserverpw">Passwort:</label><input type="password" id="mail_pw" name="mailserverpw" />
		</div>
	</fieldset>
	<fieldset>
		<legend>
			API Einstellungen
		</legend>
		<header>
			Wenn das CMS externe APIs nutzt, können hierzu Einstellungen festgelegt werden
		</header>
		<fieldset>
		<legend>
			Google Maps API
		</legend>
		<div class="input-element">
			<label for="googlemapsapikey">Google Maps API Key:</label><input type="text" name="googlemapsapikey" id="googlemapsapikey" value="<?php if (!empty($application)): echo $application->getGoogleMapsAPIKey(); endif; ?>" />
		</div>
		<div class="input-element">
			<label for="googlemapsapiclient">Google Maps API Client ID:</label><input type="text" name="googlemapsapiclient" id="googlemapsapiclient" value="<?php if (!empty($application)): echo $application->getGoogleMapsAPIClient(); endif; ?>" />
		</div>
		<div class="input-element">
			<label for="googlemapsapisecret">Google maps API Secret:</label><input type="text" name="googlemapsapisecret" id="googlemapsapisecret" value="<?php if (!empty($application)): echo $application->getGoogleMapsAPISecret(); endif; ?>" />
		</div>
		</fieldset>
		<fieldset>
			<legend>
				Soundcloud API
			</legend>
			<div class="input-element">
				<label for="soundcloudclientid">Soundcloud Client ID:</label><input type="text" name="soundcloudclientid" id="soundcloudclientid" value="<?php if (!empty($application)): echo $application->getSoundcloudClientId(); endif; ?>" />
			</div>
			<div class="input-element">
				<label for="soundcloudclientsecret">Soundcloud Client Secret:</label><input type="text" name="soundcloudclientsecret" id="soundcloudclientsecret" value="<?php if (!empty($application)): echo $application->getSoundcloudClientSecret(); endif; ?>" />
			</div>
			<div class="input-element">
				<label for="soundcloudredirecturl">Soundcloud Redirect URL:</label><input type="text" name="soundcloudredirecturl" id="soundcloudredirecturl" value="<?php if(!empty($application)): echo $application->getSoundcloudRedirectURL(); endif; ?>" />
			</div>
		</fieldset>
	</fieldset>
	<button type="submit">Speichern</button>
</form>