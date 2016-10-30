<h1>Willkommen beim Setup</h1>
<form id="setup" name="setup" action="setup.php" method="post">
	<fieldset id="database">
		<legend>
			Datenbankinformationen
		</legend>
		<header>
			Geben Sie hier Datenbankinformationen ein.
		</header>
		<div class="input-element">
		<label for="db_name">Datenbankname:</label><input type="text" id="db_name" name="db_name" />
		</div>
		<div class="input-element">
			<label for="db_host">Hostname:</label><input type="text" id="db_host" name="db_host" value="localhost" />
		</div>
		<div class="input-element">
			<label for="db_user">User:</label><input type="text" id="db_user" name="db_user" value="root" />
		</div>
		<div class="input-element">
			<label for="db_pw">Passwort:</label><input type="password" id="db_pw" name="db_pw" />
		</div>
	</fieldset>
	<fieldset>
		<legend>
			Anwendungseinstellungen
		</legend>
		<header>
			Geben Sie hier Einstellungen für die Webanwendung ein.
		</header>
		<div class="input-element">
			<label for="siteurl">Seiten-URL:</label><input type="text" name="siteurl" id="siteurl" />
		</div>
		<div class="input-element">
			<label for="optiondefaultresultsperpage">Resultate pro Seite:</label><input type="number" name="optiondefaultresultsperpage" id="optiondefaultresultsperpage" />
		</div>
		<div class="input-element">
			<label for="title">Seitentitel:</label><input type="text" name="title" id="title" />
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
			<label for="mailservername">Servername:</label><input type="text" id="mailservername" name="mailservername" />
		</div>
		<div class="input-element">
			<label for="mailserverhost">Serverhost:</label><input type="text" id="mailserverhost" name="mailserverhost" />
		</div>
		<div class="input-element">
			<label for="mailserverport">Serverport:</label><input type="number" id="mailserverport" name="mailserverport" value="587" max="1024" min="1" />
		</div>
		<div class="input-element">
			<label for="mailserverlogin">Loginform:</label>
			<select id="mailserverlogin" name="mailserverlogin">
				<option value="login">Login</option>
				<option value="plain">Plain</option>
			</select>
		</div>
		<div class="input-element">
			<label for="mailserverssl">Verschlüsselung:</label>
			<select id="mailserverssl" name="mailserverssl">
				<option value="ssl">SSL</option>
				<option value="tls">TLS</option>
				<option value="no">Nein</option>
			</select>
		</div>
		<div class="input-element">
			<label for="mailserveruser">SMTP User:</label><input type="text" id="mailserveruser" name="mailserveruser" />
		</div>
		<div class="input-element">
			<label for="mailserverpw">Passwort:</label><input type="password" id="mailserverpw" name="mailserverpw" />
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
	<fieldset>
		<legend>
			Ersten User anlegen
		</legend>
		<header>
			Legen Sie einen ersten administrativen User an.
		</header>
		<div class="input-element">
			<label for="userloginname">Username</label><input type="text" id="userloginname" name="userloginname" />
		</div>
		<div class="input-element">
			<label for="new_pw">Passwort</label><input type="password" id="new_pw" name="new_pw" />
		</div>
		<div class="input-element">
			<label for="new_pw_repeat">Passwort wiederholen</label><input type="password" id="new_pw_repeat" name="new_pw_repeat" />
		</div>
		<div class="input-element">
			<label for="email">E-Mail-Adresse</label><input type="email" id="email" name="email" />
		</div>
		<div class="input-element">
			<label for="email_repeat">E-Mail Adresse wiederholen</label><input type="email" id="email_repeat" name="email_repeat" />
		</div>
	</fieldset>
	<button type="submit">Absenden</button>
</form>