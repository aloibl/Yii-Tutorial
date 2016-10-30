<?php require_once 'admin_panel.tpl.php' ?>
<form id="add_event" name="add_event" method="post" action="index.php?aktion=<?php echo $aktion ?><?php if ($aktion == 'edit_event'): echo '&id=' . $_REQUEST['id']; endif; ?>">
	<div class="input-element">
		<label for="place">Ort: <a href="#!">[?]</a></label><input type="text" name="place" id="place" value="<?php if(!empty($event)): echo $event->getPlace(); endif; ?>" />
	</div>
	<div class="input-element">
		<label for="event">Veranstaltungsbezeichnung:</label><input type="text" name="event" id="event" value="<?php if(!empty($event)): echo $event->getEvent(); endif; ?>" />
	</div>
	<div class="input-element">
		<label for="startsAt">Zeit:</label><input type="datetime" name="startsAt" id="startsAt" value="<?php if(!empty($event)): echo $event->getStartsAt()->format('d.m.Y H:i'); endif; ?>" />
	</div>
	<div class="input-element">
		<label for="info">Infotext:</label><input type="text" name="info" id="info" value="<?php if(!empty($event)): echo $event->getInfo(); endif; ?>" />
	</div>
	<div class="input-element">
		<label for="type">Art des Events:</label>
		<select name="type" id="type" size="1">
			<option value="gig"<?php if (!empty($event) && $event->getType() == 'gig'): echo ' selected="selected"'; endif; ?>>Gig</option>
		</select>
	</div>
	<div class="input-element">
		<label for="facebook">Facebook-Link:</label>
		<input type="text" id="facebook" name="facebook" value="<?php if(!empty($event)): echo $event->getFacebook(); endif; ?>" />
	</div>
	<fieldset id="adress_form" class="subfieldset">
				<legend>
					Adresse des Events
				</legend>
				<header>
					Wird gespeichert, damit die Besucher hin navigieren können
				</header>
				<div class="input-element">
					<label for="companyname">Firmenname:</label><input type="text" id="companyname" name="companyname" value="<?php if(!empty($event)): echo $event->getAddress()->getCompanyName(); endif; ?>" />
				</div>
				<div class="input-element">
					<label for="street">Straße und Hausnummer:</label><input type="text" name="street" id="street" value="<?php if(!empty($event)): echo $event->getAddress()->getStreet(); endif; ?>" />
				</div>
				<div class="input-element">
					<label for="city">Ort:</label><input type="text" name="city" id="city" value="<?php if(!empty($event)): echo $event->getAddress()->getCity(); endif; ?>" />
				</div>
				<div class="input-element">
					<label for="plz">Postleitzahl:</label><input type="text" name="plz" id="plz" value="<?php if(!empty($event)): echo $event->getAddress()->getPlz(); endif; ?>" />
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
					<label for="region">Bundesland/Kanton (optional):</label><input type="text" name="region" id="region" value="<?php if(!empty($event)): echo $event->getAddress()->getRegion(); endif; ?>" /><br />
				</div>
				<input type="hidden" name="mobile" id="mobile" value="" />
				<input type="hidden" name="fax" id="fax" value="" />
				<input type="hidden" name="phone" id="phone" value="" />
	</fieldset>
	<button type="submit">Eintragen</button>
</form>