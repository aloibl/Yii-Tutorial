<?php require_once 'admin_panel.tpl.php' ?>
<form action="index.php?aktion=<?php echo $aktion; ?><?php if ($aktion == 'edit_album'): ?>&id=<?php echo $_REQUEST['id']; ?><?php endif; ?>" method="post" id="add_album_form" name="add_album_form">
	<div class="input-element">
		<label for="title">Albumname eingeben:</label><input type="text" id="title" name="title" value="<?php if ($aktion == 'edit_album'): echo $album->getTitle(); endif; ?>" />
	</div>
	<div class="input-element">
		<label for="description">Beschreibung eingeben:</label><input type="text" id="description" name="description" value="<?php if ($aktion == 'edit_album'): echo $album->getDescription(); endif; ?>" />
	</div>
	<button type="submit"><?php if ($aktion == 'add_album'): ?>Erstellen <?php else: ?> Speichern<?php endif; ?></button>
</form>
<?php if ($aktion == 'edit_album'): ?>
	<form action="index.php?aktion=edit_album&id=<?php echo $_REQUEST['id']; ?>" enctype="multipart/form-data" method="post" id="edit_album" name="edit_album">
		<h3>
			Datei hinzufügen
		</h3>
		<fieldset id="filefield">
			<legend>
				Datei auswählene
			</legend>
			<header>
				Wählen Sie das Medium, welches dem Album hinzugefügt werden soll
			</header>
			<input type="hidden" name="MAX_FILE_SIZE" value="100000000" />
			<div class="input-element">
				<label for="file">Datei suchen:</label> <input type="file" name="file" id="file" />
			</div>
			<div class="input-element">
				<label for="description">Description:</label><input type="text" name="description" id="description" />
			</div>
			<div class="input-element">
				<label for="alttext">Mouseover-Text:</label><input type="text" name="alttext" id="alttext" />
			</div>
		</fieldset>
		<fieldset id="image">
			<legend>
				Einstellungen für Bilder
			</legend>
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
				<label for="youtube">Youtube:</label><input type="text" name="youtube" id="youtube" />
			</div>
			<div class="input-element">
				<label for="alternalocallinkone">Alternativdatei:</label><input type="file" name="alternalocallinkone" id="alternalocallinkone" />
			</div>
			<div class="input-element">
				<label for="alternalocallinktwo">Alternativdatei:</label><input type="file" name="alternalocallinktwo" id="alternalocallinktwo" />
			</div>
		</fieldset>

		<fieldset id="audio">
			<legend>
				Einstellungen für Audio
			</legend>
			<div class="input-element">
				<label for="soundcloud">Soundcloud:</label><input type="text" name="soundcloud" id="soundcloud" />
			</div>
			<div class="input-element">
				<label for="mixcloud">Mixcloud:</label><input type="text" name="mixcloud" id="mixcloud" />
			</div>
		</fieldset>
		
		<fieldset id="documents">
			<legend>
				Einstellungen für Dokumente oder Archive
			</legend>
		</fieldset>
		<input type="hidden" id="locallink" name="locallink" value="" />
		<input type="hidden" id="alternalocallinkone" name="alternalocallinkone" value="" />
		<input type="hidden" id="alternalocallinktwo" name="alternalocallinktwo" value="" />
		<button type="submit">Hochladen</button>
	</form>
<?php endif; ?>
