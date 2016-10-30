<div id="admin-sidebar">
	<div class="admin-sidebar-container">
		<?php if ($application->checkIfUserPermissionsAreSufficient('browse_medium', false)): ?>
		<div class="admin-sidebar-element admin-sidebar-icon">
			<a href="#!">
				<img src="images/site/icons/menu/media.svg" />
			</a>
		</div>
		<div class="admin-sidebar-element admin-sidebar-text">
			<a href="index.php?aktion=browse_medium">
				Medienbibliothek
			</a>
		</div>
		<div class="admin-sidebar-sub-menu pos1">
			<a class="admin-sidebar-sub-text" href="index.php?aktion=browse_medium">
				Medienübersicht
			</a>
			<?php if ($application->checkIfUserPermissionsAreSufficient('add_medium', false)): ?>
			<a class="admin-sidebar-sub-text" href="index.php?aktion=add_medium">
				Datei hinzufügen
			</a>
			<a class="admin-sidebar-sub-text" href="index.php?aktion=add_album">
				Album hinzufügen
			</a>
			<a class="admin-sidebar-sub-text" href="index.php?aktion=browse_album">
				Albenübersicht
			</a>
			<?php endif; ?>
		</div>
	</div>
	<?php endif; ?>
	<?php if ($application->checkIfUserPermissionsAreSufficient('browse_news', false)): ?>
	<div class="admin-sidebar-container">
		<div class="admin-sidebar-element admin-sidebar-icon">
			<a href="#!">
				<img src="images/site/icons/menu/news.svg" />
			</a>
		</div>
		<div class="admin-sidebar-element admin-sidebar-text">
			<a href="index.php?aktion=browse_news">
				News
			</a>
		</div>
		<div class="admin-sidebar-sub-menu pos2">
			<a class="admin-sidebar-sub-text" href="index.php?aktion=browse_news">
				Alle News
			</a>
			<?php if ($application->checkIfUserPermissionsAreSufficient('add_news', false)): ?>
			<a class="admin-sidebar-sub-text" href="index.php?aktion=add_news">
				Erstellen
			</a>
			<?php endif; ?>
		</div>
	</div>
	<?php endif; ?>
	<?php if($application->checkIfUserPermissionsAreSufficient('browse_tags', false)): ?>
	<div class="admin-sidebar-container">
		<div class="admin-sidebar-element admin-sidebar-icon">
			<a href="#!">
				<img src="images/site/icons/menu/tags.svg" />
			</a>
		</div>
		<div class="admin-sidebar-element admin-sidebar-text">
			<a href="index.php?aktion=browse_tags">
				Tags
			</a>
		</div>
		<div class="admin-sidebar-sub-menu pos3">
			<a class="admin-sidebar-sub-text" href="index.php?aktion=browse_tags">
				Alle Schlagworte
			</a>
			<?php if($application->checkIfUserPermissionsAreSufficient('add_tags', false)): ?>
			<a class="admin-sidebar-sub-text" href="index.php?aktion=add_tags">
				Schlagwort hinzufügen
			</a>
			<?php endif; ?>
		</div>
	</div>
	<?php endif; ?>
	<?php if($application->checkIfUserPermissionsAreSufficient('browse_user', false)): ?>
	<div class="admin-sidebar-container">
		<div class="admin-sidebar-element admin-sidebar-icon">
			<a href="#!">
				<img src="images/site/icons/menu/user82.svg" />
			</a>
		</div>
		<div class="admin-sidebar-element admin-sidebar-text">
			<a href="index.php?aktion=browse_users">
				User
			</a>
		</div>
		<div class="admin-sidebar-sub-menu pos4">
			<a class="admin-sidebar-sub-text" href="index.php?aktion=browse_users">
				Alle User
			</a>
			<?php if($application->checkIfUserPermissionsAreSufficient('add_user', false)): ?>
			<a class="admin-sidebar-sub-text" href="index.php?aktion=add_user">
				User hinzufügen
			</a>
			<?php endif; ?>
		</div>
	</div>
	<?php endif; ?>
	<?php if($application->checkIfUserPermissionsAreSufficient('browse_category', false)): ?>
	<div class="admin-sidebar-container">
		<div class="admin-sidebar-element admin-sidebar-icon">
			<a href="#!">
				<img src="images/site/icons/menu/category.svg" />
			</a>
		</div>
		<div class="admin-sidebar-element admin-sidebar-text">
			<a href="index.php?aktion=browse_category">
				Kategorien
			</a>
		</div>
		<div class="admin-sidebar-sub-menu pos5">
			<a class="admin-sidebar-sub-text" href="index.php?aktion=browse_category">
				Alle Kategorien
			</a>
			<?php if($application->checkIfUserPermissionsAreSufficient('add_category', false)): ?>
			<a class="admin-sidebar-sub-text" href="index.php?aktion=add_category">
				Kategorie hinzufügen
			</a>
			<?php endif; ?>
		</div>
	</div>
	<?php endif; ?>
	<?php if($application->checkIfUserPermissionsAreSufficient('browse_event', false)): ?>
	<div class="admin-sidebar-container">
		<div class="admin-sidebar-element admin-sidebar-icon">
			<a href="#!">
				<img src="images/site/icons/menu/event.svg" />
			</a>
		</div>
		<div class="admin-sidebar-element admin-sidebar-text">
			<a href="index.php?aktion=browse_category">
				Events
			</a>
		</div>
		<div class="admin-sidebar-sub-menu pos6">
			<a class="admin-sidebar-sub-text" href="index.php?aktion=browse_event">
				Alle Events
			</a>
			<?php if($application->checkIfUserPermissionsAreSufficient('add_category', false)): ?>
			<a class="admin-sidebar-sub-text" href="index.php?aktion=add_event">
				Event hinzufügen
			</a>
			<?php endif; ?>
		</div>
	</div>
	<?php endif; ?>
	<?php if($application->checkIfUserPermissionsAreSufficient('config_application', false)): ?>
	<div class="admin-sidebar-container">
		<div class="admin-sidebar-element admin-sidebar-icon">
			<a href="#!">
				<img src="images/site/icons/menu/tools3.svg" />
			</a>
		</div>
		<div class="admin-sidebar-element admin-sidebar-text">
			<a href="index.php?aktion=config_application">
				Einstellungen
			</a>
		</div>
	</div>
	<?php endif; ?>
</div>
