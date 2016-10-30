<fieldset id="image">
	<legend>
		Einstellungen für Bilder
	</legend>
	<div class="input-element">
		<label for="alt-text">Mausover-Text:</label><input type="text" name="alt-text" id="alt-text" />
	</div>
	<div class="input-element">
		<label for="flickr">FlickR:</label><input type="text" name="flickr" id="flickr" />
	</div>
	<div class="input-element">
		<label for="instagram">Instagram:</label><input type="text" name="instagram" id="instagram" />
	</div>
	<div class="input-element">
		<label for="photobucket">Photobucket:</label><input type="text" name="photobucket" id="photobucket" />
	</div>
	<div class="input-element">
		<label for="fivehundred">500px:</label><input type="text" name="fivehundred" id="fivehundred" />
	</div>
	<div class="input-element">
		<label for="album">Alben auswählen:</label>
		<select id="album" name="album" size="4" multiple="multiple">
			<?php foreach($all_album_titles as $title): ?>
				<option value="<?php echo $title; ?>">
					<?php echo $title; ?>
				</option>
			<?php endforeach; ?>
		</select>
	</div>
</fieldset>

<fieldset id="video">
	<legend>
		Einstellungen für Videos
	</legend>
	<div class="input-element">
		<label for="alt-text">Mausover-Text:</label><input type="text" name="alt-text" id="alt-text" />
	</div>
	<div class="input-element">
		<label for="youtube">:</label><input type="text" name="youtube" id="youtube" />
	</div>
</fieldset>

<fieldset id="audio">
	<legend>
		Einstellungen für Audio
	</legend>
	<div class="input-element">
		<label for="alt-text">Mausover-Text:</label><input type="text" name="alt-text" id="alt-text" />
	</div>
	<div class="input-element">
		<label for="soundcloud">Soundcloud:</label><input type="text" name="soundcloud" id="soundcloud" />
	</div>
	<div class="input-element">
		<label for="mixcloud">Mixcloud:</label><input type="text" name="mixcloud" id="mixcloud" />
	</div>
</fieldset>