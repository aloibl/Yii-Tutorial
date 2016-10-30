<?php require_once 'admin_panel.tpl.php' ?>
<form id="add_news" name="add_news" action="index.php?aktion=add_news" method="post">
	<div>
		<label for="title">Titel:</label><br />
		<input type="text" id="title" name="title" /><br />
	</div>
	<div>
		<div id="wysiwyg_cp" name="wysiwyg_cp" style="padding:8px; width=700px;">
			<button onclick="iBold();return false;">B</button>
			<button onclick="iUnderline();return false;">U</button>
			<button onclick="iItalic();return false;">I</button>
			<select onchange="iFontSize();return false;" id="font" name="font">
				<option selected="selected">Schriftgröße</option>
				<option value="5">5px</option>
				<option value="8">8px</option>
				<option value="13">13px</option>
				<option value="21">21px</option>
				<option value="34">34px</option>
				<option value="55">55px</option>
			</select>
			<select onchange="iColor();return false;" id="color" name="color">
				<option selected="selected">Schriftfarbe</option>
				<option value="red">Rot</option>
				<option value="blue">Blau</option>
				<option value="green">Grün</option>
				<option value="yellow">Gelb</option>
				<option value="black">Schwarz</option>
				<option value="white">Weiß</option>
				<option value="teal">Türkis</option>
				<option value="limegreen">Hellgrün</option>
			</select>
			<button onclick="iUnorderedList();return false;">UL</button>
			<button onclick="iOrderedList();return false;">OL</button>
			<button onclick="iLink()";return false;>Link</button>
			<button onclick="iUnlink();return false;">UnLink</button>
			<button onclick="iMedia();return false;">Medium</button>			
		</div>
		<textarea id="body" name="body" cols="100" rows="14"></textarea>
		<iframe name="richTextField" id="richTextField" style="border:#000000 1px solid; width:700px; height:300px;"></iframe>
	</div>
	<br />
	<button name="wysiwyg_submit" id="wysiwyg_submit" onclick="javascript:submit_form();">Erstellen</button>
</form>