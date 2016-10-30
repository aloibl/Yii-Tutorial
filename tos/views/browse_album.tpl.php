<?php require_once 'admin_panel.tpl.php' ?>
<ul>
	<?php foreach($all_albums as $album): ?>
		<li>
			<a href="index.php?aktion=edit_album&id=<?php echo $album->getId(); ?>">
				<?php echo $album->getTitle(); ?>
			</a>
		</li>
	<?php endforeach; ?>
</ul>