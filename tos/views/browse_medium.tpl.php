<?php require_once 'admin_panel.tpl.php' ?>
<form action="index.php?aktion=browse_medium" method="post" id="browse_medium">
	<select id="todo" name="todo" title="select" onchange="ifOptionSelectedDoFunction(this)">
		<option selected="selected" value="standardaction_medium">Aktion auswählen</option>
		<option value="deletemedium">Löschen</option>
	</select>
	<button type="submit">Übernehmen</button>
	<table>
		<thead>
			<tr>
				<th class="very-short">
					<input type="checkbox" name="all" value="all" class="checkbox" onclick="javascript:ifOptionSelectedDoFunction(this);" />
				</th>
				<th class="short">
					Vorschau
				</th>
				<th>
					Datei
				</th>
				<th>
					Autor
				</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($all_media as $medium): ?>
				<tr>
					<td class="very-short">
						<input type="checkbox" name="media[]" class="checkbox" value="<?php echo $medium->getId(); ?>" />
					</td>
					<td class="short">
						<?php switch ($medium->getType()):
							case 'images': ?>
								<a href="index.php?aktion=edit_medium&id=<?php echo $medium->getId(); ?>">
									<img src="<?php echo $medium->getLocalLink(); ?>" alt="<?php echo $medium->getAltText(); ?>" />
								</a>
							<?php break; ?>
							<?php case 'video': ?>
								<?php $youtube_set = $medium->getYoutube(); ?>
								<?php if (!empty($youtube_set)): ?>
									<a href="index.php?aktion=edit_medium&id=<?php echo $medium->getId(); ?>">
										<img src="images/site/icons/social/youtube.png" alt="Youtube Video <?php echo $medium->getFileTitle(); ?>" />
									</a>
								<?php else: ?>
									<a href="index.php?aktion=edit_medium&id=<?php echo $medium->getId(); ?>">
										<img src="images/site/icons/file_types/<?php echo $medium->getFileExtension(); ?>.svg" alt="<?php echo $medium->getFileTitle(); ?>" />
									</a>
								<?php endif; ?>
							<?php break; ?>
							<?php case 'audio': ?>
								<?php $soundcloud_set = $medium->getSoundcloud(); ?>
								<?php $mixcloud_set = $medium->getMixcloud(); ?>
								<?php if (!empty($soundcloud_set)): ?>
									<a href="index.php?aktion=edit_medium&id=<?php echo $medium->getId(); ?>">
										<img src="images/site/icons/social/soundcloud.png" alt="Soundcloud Clip <?php echo $medium->getFileTitle($application); ?>" />
									</a>
								<?php elseif (!empty($mixcloud_set)): ?>
									<a href="index.php?aktion=edit_medium&id=<?php echo $medium->getId(); ?>">
										<img src="images/site/icons/social/mixcloud.png" alt="Mixcloud Clip <?php echo $medium->getFileTitle(); ?>" />								
									</a>
								<?php else: ?>
									<a href="index.php?aktion=edit_medium&id=<?php echo $medium->getId(); ?>">
										<img src="images/site/icons/file_types/<?php echo $medium->getFileExtension(); ?>.svg" alt="<?php echo $medium->getFileTitle(); ?>" />
									</a>
								<?php endif; ?>							
							<?php break; ?>
						<?php endswitch; ?>
						
					</td>
					<td>
						<a href="index.php?aktion=edit_medium&id=<?php echo $medium->getId(); ?>"><?php echo $medium->getFileTitle($application); ?></a><br />
						<?php echo strtoupper($medium->getFileExtension()); ?>
					</td>
					<td>
						<?php echo $medium->getUserCreated()->getUserLoginName(); ?>
					</td>
				</tr>
			<?php endforeach; ?>
		</tbody>
		<tfoot>
			<tr>
				<th class="very-short">
					<input type="checkbox" name="all" value="all" class="checkbox" onclick="javascript:ifOptionSelectedDoFunction(this);" />
				</th>
				<th class="short">
					Vorschau
				</th>
				<th>
					Datei
				</th>
				<th>
					Autor
				</th>
			</tr>		
		</tfoot>
	</table>
	<select id="todo" name="todo" title="select" onchange="ifOptionSelectedDoFunction(this)">
		<option selected="selected" value="standardaction_medium">Aktion auswählen</option>
		<option value="deletemedium">Löschen</option>
	</select>
	<button type="submit">Übernehmen</button>
</form>