<?php require_once 'admin_panel.tpl.php' ?>
<!--<a href="<?php //echo $soundcloud->getAuthorizeUrl(); ?>" title="Verbinde dich mit unserer Soundcloud-App">Mit Soundcloud verbinden</a>-->
<form id="add_medium" enctype="multipart/form-data" action="index.php?aktion=<?php echo $aktion; ?><?php if (!empty($_REQUEST['id'])): echo '&id=' . $_REQUEST['id']; endif; ?>" method="post" />
<input type="hidden" name="MAX_FILE_SIZE" value="3000000" />
<div class="input-element">
	<label for="file">Datei suchen:</label> <input type="file" name="file" id="file" />
</div>
<div class="input-element">
	<label for="alttext">Mouseover-Text:</label> <input type="text" name="alttext" id="alttext" value="<?php if (!empty($medium)): echo $medium->getAltText(); endif; ?>" />
</div>
<div class="input-element">
	<label for="description">Description:</label><input type="text" name="description" id="description" value="<?php if (!empty($medium)): echo $medium->getDescription(); endif; ?>" />
</div>
<div class="input-element">
	<select id="album[]" name="album[]" multiple="multiple">
			<?php foreach($all_albums as $album): ?>
				<option value="<?php echo $album->getId(); ?>"<?php if (!empty($medium)): if ($medium->hasAlbum($album)): echo ' selected="selected"'; endif; endif;  ?>><?php echo $album->getTitle(); ?></option>
			<?php endforeach; ?>
	</select>
</div>
		<fieldset id="image">
			<legend>
				Einstellungen für Bilder
			</legend>
			<div class="input-element">
				<label for="alt-text-pic">Mausover-Text:</label><input type="text" name="alt-text-pic" id="alt-text-pic" />
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
		</fieldset>

		<fieldset id="video">
			<legend>
				Einstellungen für Videos
			</legend>
			<div class="input-element">
				<label for="alt-text-vid">Mausover-Text:</label><input type="text" name="alt-text-vid" id="alt-text-vid" />
			</div>
			<div class="input-element">
				<label for="youtube">Youtube:</label><input type="text" name="youtube" id="youtube" value="<?php if (!empty($medium)): echo $medium->getYoutube(); endif; ?>" />
			</div>
		</fieldset>

		<fieldset id="audio">
			<legend>
				Einstellungen für Audio
			</legend>
			<div class="input-element">
				<label for="alt-text-aud">Mausover-Text:</label><input type="text" name="alt-text-aud" id="alt-text-aud" />
			</div>
			<div class="input-element">
				<label for="soundcloud">Soundcloud:</label><input type="text" name="soundcloud" id="soundcloud" value="<?php if (!empty($medium)): echo $medium->getSoundcloud(); endif; ?>" />
			</div>
			<div class="input-element">
				<label for="mixcloud">Mixcloud:</label><input type="text" name="mixcloud" id="mixcloud" />
			</div>
		</fieldset>
		
		<fieldset id="documents">
			<legend>
				Einstellungen für Dokumente oder Archive
			</legend>
			<div class="input-element">
				<label for="alt-text-doc">Mausover-Text:</label><input type="text" name="alt-text-doc" id="alt-text-doc" />
			</div>
		</fieldset>
		<input type="hidden" id="locallink" name="locallink" value="<?php if (!empty($medium)): echo $medium->getLocalLink(); endif; ?>" />
		<input type="hidden" id="alternalocallinkone" name="alternalocallinkone" value="<?php if (!empty($medium)): echo $medium->getAlternaLocalLinkOne(); endif; ?>" />
		<input type="hidden" id="alternalocallinktwo" name="alternalocallinktwo" value="<?php if (!empty($medium)): echo $medium->getAlternaLocalLinkTwo(); endif; ?>" />
<button type="submit">Hochladen</button>
</form>