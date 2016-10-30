<div id="loginpage">
	<img src="images/content/logo/logo_white.png" />
	<form action="index.php?aktion=login" id="login_form" method="post">
		<fieldset id="main_field">
			<legend>
				Anmelden
			</legend>
			<header>
				Nenne uns einen Benutzernamen
			</header>
			<div class="input-element">
				<label for="userloginname">Meine Name:</label><input type="text" name="userloginname" id="userloginname" required="required" value="<?php if (isset($_POST['userloginname'])): echo $_POST['userloginname']; endif; ?>" />
			</div>
			<header>
				Hast du schon ein Passwort für unsere Seite?
			</header>
			<div class="radio-element">
				<input type="radio" name="pwchoose" id="no_pw" value="false" <?php if (isset($_POST['pwchoose']) && $_POST['pwchoose'] == 'false'): echo 'checked="checked"'; endif; ?> onclick="deactivatePw(); showRegisterForm(true); changeFormAction(index.php?aktion=add_user, false, 'login_form');" /><label for="no_pw">Nein, ich habe noch kein Passwort und würde mich gerne registrieren</label><br />
			</div>
			<div class="radio-element">
				<input type="radio" name="pwchoose" id="yes_pw" value="true" <?php if (isset($_POST['pwchoose']) && $_POST['pwchoose'] == 'false'): null; else: echo 'checked="checked"'; endif; ?> onclick="activatePw(); showRegisterForm(false); changeFormACtion('index.php?aktion=add_user', false, 'login_form');" /><label for="pw">Ja, ich habe ein Passwort:</label><input type="password" name="pw" id="pw" checked="checked" class="next-to-radio" /><br />
			</div>
			<a href="#!" id="forgotpw">Hast du dein Passwort vergessen?</a><br />
		</fieldset>
		<fieldset id="new_password" class="hidden">
			<legend>Dein neues Passwort</legend>
			<header>
				Wähle ein Passwort für deinen neuen Benutzeraccount
			</header>
			<footer>
				Sicherheitstipp: Wähle kein Passwort, dass du bereits für etwas anderes benutzt!
				Erstelle ein Passwort mit Klein- und Großbuchstaben, Sonderzeichen und Zahlen
				Nimm etwas, das du dir leicht merken kannst, und ersetze Buchstaben mit Zahlen und Sonderzeichen
			</footer>
			<div class="input-element">
				<label for="new_pw">Passwort:</label><input type="password" id="new_pw" name="new_pw" />
			</div>
			<div class="input-element">
				<label for="new_pw_repeat">Passwort wiederholen:</label><input type="password" id="new_pw_repeat" name="new_pw_repeat" />
			</div>
		</fieldset>
		
		<fieldset id="personal_form" class="hidden">
			<legend>
				Persönliche Daten
			</legend>
			<header>
				Name und Geburtsdatum
			</header>
			<footer>
				Angabe komplett freiwillig
			</footer>
			<div class="input-element">
				<label for="firstname">Vorname</label><input type="text" id="firstname" name="firstname" value="<?php if (isset($_POST['firstname'])): echo $_POST['firstname']; endif; ?>" />
			</div>
			<div class="input-element">
				<label for="lastname">Nachname</label><input type="text" id="lastname" name="lastname" value="<?php if (isset($_POST['lastname'])): echo $_POST['lastname']; endif; ?>" />
			</div>
			<div class="input-element">
				<label for="gb_day">Geburtstag</label>
				<select id="gb_day" name="gb_day" class="three-select">
					<option value="1">--</option>
					<?php for ($i=1; $i<=31; ++$i): ?>
						<option value="<?php echo $i; ?>" class="day-<?php echo $i; ?>"<?php if (isset($_POST['gb_day']) && $_POST['gb_day'] == $i): echo ' selected="selected"'; endif; ?>><?php echo $i; ?></option>
					<?php endfor; ?>
				</select>
				<select id="gb_month" name="gb_month" class="three-select">
					<option value="jan">--</option>
					<option value="jan" <?php if (isset($_POST['gb_month']) && $_POST['gb_month'] == 'jan'): echo ' selected="selected"'; endif; ?>>Januar</option>
					<option value="feb" <?php if (isset($_POST['gb_month']) && $_POST['gb_month'] == 'feb'): echo ' selected="selected"'; endif; ?>>Februar</option>
					<option value="mar" <?php if (isset($_POST['gb_month']) && $_POST['gb_month'] == 'mar'): echo ' selected="selected"'; endif; ?>>März</option>
					<option value="apr" <?php if (isset($_POST['gb_month']) && $_POST['gb_month'] == 'apr'): echo ' selected="selected"'; endif; ?>>April</option>
					<option value="may" <?php if (isset($_POST['gb_month']) && $_POST['gb_month'] == 'may'): echo ' selected="selected"'; endif; ?>>Mai</option>
					<option value="jun" <?php if (isset($_POST['gb_month']) && $_POST['gb_month'] == 'jun'): echo ' selected="selected"'; endif; ?>>Juni</option>
					<option value="jul" <?php if (isset($_POST['gb_month']) && $_POST['gb_month'] == 'jul'): echo ' selected="selected"'; endif; ?>>Juli</option>
					<option value="aug" <?php if (isset($_POST['gb_month']) && $_POST['gb_month'] == 'aug'): echo ' selected="selected"'; endif; ?>>August</option>
					<option value="sep" <?php if (isset($_POST['gb_month']) && $_POST['gb_month'] == 'sep'): echo ' selected="selected"'; endif; ?>>September</option>
					<option value="oct" <?php if (isset($_POST['gb_month']) && $_POST['gb_month'] == 'oct'): echo ' selected="selected"'; endif; ?>>Oktober</option>
					<option value="nov" <?php if (isset($_POST['gb_month']) && $_POST['gb_month'] == 'nov'): echo ' selected="selected"'; endif; ?>>November</option>
					<option value="dec" <?php if (isset($_POST['gb_month']) && $_POST['gb_month'] == 'dec'): echo ' selected="selected"'; endif; ?>>Dezember</option>
				</select>
				<select id="gb_year" name="gb_year" class="three-select">
					<option value="1900">--</option>
					<?php for ($i=1914; $i<date('Y'); ++$i): ?>
						<option value="<?php echo $i ?>"<?php if (isset($_POST['gb_year']) && $_POST['gb_year'] == $i): echo ' selected="selected"'; endif; ?>><?php echo $i ?></option>
					<?php endfor; ?>
				</select>
			</div>
		</fieldset>
		
		<fieldset id="register_form" class="hidden">
			<legend>
				Kontaktdaten
			</legend>
			<header>
				Wie lautet deine E-Mail Adresse?
			</header>
			<div class="input-element">
				<label for="email">E-Mail:</label><input type="mail" name="email" id="email" disabled="disabled" value="<?php if (isset($_POST['email'])): echo $_POST['email']; endif; ?>" /><br />
			</div>
			<div class="input-element">
				<label for="email_repeat">E-Mail wiederholen:</label><input type="mail" name="email_repeat" id="email_repeat" disabled="disabled" value="<?php if (isset($_POST['email_repeat'])): echo $_POST['email_repeat']; endif; ?>" /><br />
			</div>
			<header>
				Sind Sie ein Veranstalter, Label oder Sponsor?
			</header>
			<div class="radio-element">
				<input type="radio" name="business" id="no_business" value="false" onclick="activateAdressForm(false)" checked="<?php if (isset($_POST['business']) && $_POST['business'] == 'false'): null; else: echo 'checked'; endif; ?>" disabled="disabled" /><label for="no_business">Nein, ich bin ein Fan und will daher keine Anschrift eingeben</label><br />
			</div>
			<div class="radio-element">
				<input type="radio" name="business" id="yes_business" value="true" onclick="activateAdressForm(true)" checked="<?php if (isset($_POST['business']) && $_POST['business'] == 'true'): echo 'checked'; endif; ?>" disabled="disabled" /><label for="yes_business" class="little-font-label">Ja, ich bin ein Unternehmer und würde deshalb gerne meine Anschrift eingeben</label><br />
			</div>
			<fieldset id="adress_form" class="hidden subfieldset">
				<legend>
					Adresse
				</legend>
				<header>
					Geben Sie nun, falls gewünscht, Ihre Adresse ein
				</header>
				<div class="input-element">
					<label for="companyname">Firmenname:</label><input type="text" id="companyname" name="companyname" value="<?php if (isset($_POST['companyname'])): echo $_POST['companyname']; endif; ?>" />
				</div>
				<div class="input-element">
					<label for="street">Straße und Hausnummer:</label><input type="text" name="street" id="street" value="<?php if (isset($_POST['street'])): echo $_POST['street']; endif; ?>" />
				</div>
				<div class="input-element">
					<label for="city">Ort:</label><input type="text" name="city" id="city" value="<?php if (isset($_POST['city'])): echo $_POST['city']; endif; ?>" />
				</div>
				<div class="input-element">
					<label for="plz">Postleitzahl:</label><input type="text" name="plz" id="plz" value="<?php if (isset($_POST['plz'])): echo $_POST['plz']; endif; ?>" />
				</div>
				<div class="input-element">
					<label for="country">Land:</label>
					<select id="country" name="country" size="1">
						<option value="de" selected="selected">Deutschland</option>
						<option value="at">Österreich</option>
						<option value="ch">Schweiz</option>
						-----------------------------------
						<option value="EG">Ägypten</option>
						<option value="AL">Albanien</option>
						<option value="DZ">Algerien</option>
						<option value="AS">Amerikanisch-Samoa</option>
						<option value="AD">Andorra</option>
						<option value="AO">Angola</option>
						<option value="AI">Anguilla</option>
						<option value="AQ">Antarktis</option>
						<option value="AG">Antigua und Barbuda</option>
						<option value="GQ">Äquatorialguinea</option>
						<option value="AR">Argentinien</option>
						<option value="AM">Armenien</option>
						<option value="AW">Aruba</option>
						<option value="AZ">Aserbaidschan</option>
						<option value="ET">Äthiopien</option>
						<option value="AU">Australien</option>
						<option value="BS">Bahamas</option>
						<option value="BH">Bahrain</option>
						<option value="BD">Bangladesch</option>
						<option value="BB">Barbados</option>
						<option value="BE">Belgien</option>
						<option value="BZ">Belize</option>
						<option value="BJ">Benin</option>
						<option value="BM">Bermuda</option>
						<option value="BT">Bhutan</option>
						<option value="BO">Bolivien</option>
						<option value="BQ">Bonaire, Saint Eustatius und Saba</option>
						<option value="BA">Bosnien und Herzegowina</option>
						<option value="BW">Botswana</option>
						<option value="BV">Bouvetinsel</option>
						<option value="BR">Brasilien</option>
						<option value="IO">Britisches Territorium im Indischen Ozean</option>
						<option value="BN">Brunei Darussalam</option>
						<option value="BG">Bulgarien</option>
						<option value="BF">Burkina Faso</option>
						<option value="BI">Burundi</option>
						<option value="CL">Chile</option>
						<option value="CN">China</option>
						<option value="CK">Cook-Inseln</option>
						<option value="CR">Costa Rica</option>
						<option value="CW">Curaçao</option>
						<option value="DK">Dänemark</option>
						<option value="DE">Deutschland</option>
						<option value="DM">Dominica</option>
						<option value="DO">Dominikanische Republik</option>
						<option value="DJ">Dschibuti</option>
						<option value="EC">Ecuador</option>
						<option value="SV">El Salvador</option>
						<option value="CI">Elfenbeinküste</option>
						<option value="ER">Eritrea</option>
						<option value="EE">Estland</option>
						<option value="FK">Falkland-Inseln (Malwinen)</option>
						<option value="FO">Färöer-Inseln</option>
						<option value="FJ">Fidschi</option>
						<option value="FI">Finnland</option>
						<option value="FR">Frankreich</option>
						<option value="GF">Französisch-Guayana</option>
						<option value="PF">Französisch-Polynesien</option>
						<option value="TF">Französische Südgebiete</option>
						<option value="GA">Gabun</option>
						<option value="GM">Gambia</option>
						<option value="GE">Georgien</option>
						<option value="GH">Ghana</option>
						<option value="GI">Gibraltar</option>
						<option value="GD">Grenada</option>
						<option value="GR">Griechenland</option>
						<option value="GL">Grönland</option>
						<option value="GP">Guadeloupe</option>
						<option value="GU">Guam</option>
						<option value="GT">Guatemala</option>
						<option value="GN">Guinea</option>
						<option value="GW">Guinea-Bissau</option>
						<option value="GY">Guyana</option>
						<option value="HT">Haiti</option>
						<option value="HM">Heard- und McDonald-Inseln</option>
						<option value="HN">Honduras</option>
						<option value="HK">Hongkong</option>
						<option value="IN">Indien</option>
						<option value="ID">Indonesien</option>
						<option value="IE">Irland</option>
						<option value="IS">Island</option>
						<option value="IL">Israel</option>
						<option value="IT">Italien</option>
						<option value="JM">Jamaika</option>
						<option value="JP">Japan</option>
						<option value="YE">Jemen</option>
						<option value="JO">Jordanien</option>
						<option value="VG">Jungferninseln, Britisch</option>
						<option value="VI">Jungferninseln, USA</option>
						<option value="KY">Kaiman-Inseln</option>
						<option value="KH">Kambodia</option>
						<option value="CM">Kamerun</option>
						<option value="CA">Kanada</option>
						<option value="CV">Kap Verde</option>
						<option value="KZ">Kasachstan</option>
						<option value="KE">Kenia</option>
						<option value="KG">Kirgisien</option>
						<option value="KI">Kiribati</option>
						<option value="UM">Kleinere Inselterritorien der USA</option>
						<option value="CC">Kokosinseln (Keeling-Inseln)</option>
						<option value="CO">Kolumbien</option>
						<option value="KM">Komoren</option>
						<option value="CG">Kongo</option>
						<option value="CD">Kongo, Demokratische Republik</option>
						<option value="KR">Korea, Republik</option>
						<option value="HR">Kroatien</option>
						<option value="KW">Kuwait</option>
						<option value="LA">Lao, Demokratische Volksrepublik</option>
						<option value="LS">Lesotho</option>
						<option value="LV">Lettland</option>
						<option value="LB">Libanon</option>
						<option value="LR">Liberia</option>
						<option value="LY">Libyen</option>
						<option value="LI">Liechtenstein</option>
						<option value="LT">Litauen</option>
						<option value="LU">Luxemburg</option>
						<option value="MO">Macao</option>
						<option value="MG">Madagaskar</option>
						<option value="MW">Malawi</option>
						<option value="MY">Malaysia</option>
						<option value="MV">Malediven</option>
						<option value="ML">Mali</option>
						<option value="MT">Malta</option>
						<option value="MA">Marokko</option>
						<option value="MH">Marshallinseln</option>
						<option value="PM">Marshallinseln</option>
						<option value="MQ">Martinique</option>
						<option value="MR">Mauritanien</option>
						<option value="MU">Mauritius</option>
						<option value="YT">Mayotte</option>
						<option value="MK">Mazedonien, ehemalige jugoslawische Republik</option>
						<option value="MX">Mexiko</option>
						<option value="FM">Mikronesien, Föderierte Staaten von</option>
						<option value="MD">Moldawien, Republik</option>
						<option value="MC">Monaco</option>
						<option value="MN">Mongolei</option>
						<option value="ME">Montenegro</option>
						<option value="MS">Montserrat</option>
						<option value="MZ">Mosambik</option>
						<option value="MM">Myanmar</option>
						<option value="NA">Namibia</option>
						<option value="NR">Nauru</option>
						<option value="NP">Nepal</option>
						<option value="NC">Neukaledonien</option>
						<option value="NZ">Neuseeland</option>
						<option value="NI">Nicaragua</option>
						<option value="NL">Niederlande</option>
						<option value="AN">Niederländische Antillen</option>
						<option value="NE">Niger</option>
						<option value="NG">Nigeria</option>
						<option value="NU">Niue</option>
						<option value="MP">Nördliche Marianen</option>
						<option value="NF">Norfolkinseln</option>
						<option value="NO">Norwegen</option>
						<option value="OM">Oman</option>
						<option value="AT">Österreich</option>
						<option value="TL">Osttimor</option>
						<option value="PK">Pakistan</option>
						<option value="PW">Palau</option>
						<option value="PA">Panama</option>
						<option value="PG">Papua-Neuguinea</option>
						<option value="PY">Paraguay</option>
						<option value="PE">Peru</option>
						<option value="PH">Philippinen</option>
						<option value="PN">Pitcairn</option>
						<option value="PL">Polen</option>
						<option value="PT">Portugal</option>
						<option value="PR">Puerto Rico</option>
						<option value="QA">Qatar</option>
						<option value="RE">Reunion</option>
						<option value="RW">Ruanda</option>
						<option value="RO">Rumänien</option>
						<option value="RU">Russische Föderation</option>
						<option value="SH">Saint Helena, Ascension und Tristan da Cunha</option>
						<option value="KN">Saint Kitts und Nevis</option>
						<option value="LC">Saint Lucia</option>
						<option value="VC">Saint Vincent und Grenadinen</option>
						<option value="ZM">Sambia</option>
						<option value="WS">Samoa</option>
						<option value="SM">San Marino</option>
						<option value="ST">Sao Tome und Principe</option>
						<option value="SA">Saudi Arabien</option>
						<option value="SE">Schweden</option>
						<option value="CH">Schweiz</option>
						<option value="SN">Senegal</option>
						<option value="RS">Serbien</option>
						<option value="SC">Seychellen</option>
						<option value="SL">Sierra Leone</option>
						<option value="ZW">Simbabwe</option>
						<option value="SG">Singapur</option>
						<option value="SX">Sint Maarten</option>
						<option value="SK">Slowakei</option>
						<option value="SI">Slowenien</option>
						<option value="SB">Solomon-Inseln</option>
						<option value="SO">Somalia</option>
						<option value="ES">Spanien</option>
						<option value="LK">Sri Lanka</option>
						<option value="ZA">Südafrika</option>
						<option value="GS">Südgeorgien und die südlichen Sandwich-Inseln</option>
						<option value="SR">Suriname</option>
						<option value="SJ">Svalbard- und Jan Mayen-Inseln</option>
						<option value="SZ">Swasiland</option>
						<option value="TJ">Tadschikistan</option>
						<option value="TW">Taiwan</option>
						<option value="TZ">Tansania, Vereinte Republik</option>
						<option value="TH">Thailand</option>
						<option value="TG">Togo</option>
						<option value="TK">Tokelau</option>
						<option value="TO">Tonga</option>
						<option value="TT">Trinidad und Tobago</option>
						<option value="TD">Tschad</option>
						<option value="CZ">Tschechische Republik</option>
						<option value="TN">Tunesien</option>
						<option value="TR">Türkei</option>
						<option value="TM">Turkmenistan</option>
						<option value="TC">Turks- und Caicos-Inseln</option>
						<option value="TV">Tuvalu</option>
						<option value="UG">Uganda</option>
						<option value="UA">Ukraine</option>
						<option value="HU">Ungarn</option>
						<option value="UY">Uruguay</option>
						<option value="UZ">Usbekistan</option>
						<option value="VU">Vanuatu</option>
						<option value="VA">Vatikanstadt</option>
						<option value="VE">Venezuela</option>
						<option value="US">Vereinigte Staaten von Amerika</option>
						<option value="GB">Vereinigtes Königreich</option>
						<option value="AE">Vereinte Arabische Emirate</option>
						<option value="VN">Vietnam</option>
						<option value="WF">Wallis und Futuna</option>
						<option value="CX">Weihnachtsinsel</option>
						<option value="BY">Weißrussland</option>
						<option value="EH">Westsahara</option>
						<option value="CF">Zentralafrikanische Republik</option>
						<option value="CY">Zypern</option>
					</select>
				</div>
				<div class="input-element">
					<label for="region">Bundesland/Kanton (optional):</label><input type="text" name="region" id="region" value="<?php if (isset($_POST['region'])): echo $_POST['region']; endif; ?>" /><br />
				</div>
			</fieldset>
			<fieldset id="phone_form" class="hidden subfieldset">
				<legend>
					Telefonische Erreichbarkeit
				</legend>
				<header>
					Nennen Sie uns hier Ihre telefonische Erreichbarkeit für Rückfragen
				</header>
				<div class="input-element">
					<label for="mobile">Mobil:</label><input type="text" name="mobile" id="mobile" value="<?php if (isset($_POST['mobile'])): echo $_POST['mobile']; endif; ?>" />
				</div>
				<div class="input-element">
					<label for="phone">Festnetz:</label><input type="text" name="phone" id="phone" value="<?php if (isset($_POST['phone'])): echo $_POST['phone']; endif; ?>" />
				</div>
				<div class="input-element">
					<label for="fax">Fax:</label><input type="text" name="fax" id="fax" value="<?php if (isset($_POST['fax'])): echo $_POST['fax']; endif; ?>" />	
				</div>
			</fieldset>
		</fieldset>
		<button type="submit">Weiter</button>
	</form>
</div>