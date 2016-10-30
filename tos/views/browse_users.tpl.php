<table>
	<caption>
	Alle User aus dem Linkverzeichnis
	</caption>
	<thead>
		<tr>
			<th>
				Name
			</th>
		</tr>
	</thead>
	<!-- Wenn der Case browse_users den View lädt, sollen alle Kategorien aufgelistet werdne und wir brauchen einen Tabellenfooter -->
	<?php if ($aktion == 'browse_users'): ?>
		<tfoot>
			<tr>
				<td>
					Anzahl Treffer:
				</td>
				<td>
					<?php echo intval($number_of_users[1]); ?>
				</td>
				<td>
					Anzahl Seiten: <?php echo $number_of_pages; ?>
				</td>
				<td>
					<?php if(!isset($page_number) || $page_number === 1): ?> 
						&lt;&lt;
					<?php else: ?>
						<a href="index.php?aktion=browse_users&page=1">&lt;&lt;</a>
					<?php endif; ?>
				</td>
				<td>
					<?php if(!isset($page_number) || $page_number === 1): ?>
					&lt;
					<?php else: ?>
					<a href="index.php?aktion=browse_users&page=
						<?php echo ($page_number-1); ?>
					">&lt;</a>
					<?php endif; ?>
				</td>
				<td>
					<form action="index.php?aktion=browse_users" method="post">
						<input type="text" id="page" name="page" size="2" value="<?php echo trim($page_number); ?>" />
						<button type="submit" value="Absenden"></button>
					</form>
				</td>
				<td>
					<?php if ($page_number < $number_of_pages): ?>
						<a href="index.php?aktion=browse_users&page=
							<?php echo ($page_number+1); ?>
						">&gt;</a>
					<?php else: ?>
						&gt;
					<?php endif; ?>
				</td>
				<td>
					<?php if(isset($page_number) && $page_number == $number_of_pages): ?>
						&gt;&gt;
					<?php else: ?>
						<a href="index.php?aktion=browse_users&page=
							<?php echo $number_of_pages; ?>
						">&gt;&gt;</a>
					<?php endif; ?>
				</td>		
			</tr>
		</tfoot>
	<?php endif; ?>
	<tbody>
		<?php foreach($users as $user): ?>
			<tr>
				<td>
					<?php echo $user->getUserLoginName(); ?>
				</td>
				<td>
					<!-- Wenn der case browse_users und somit alle Kategorien durchsucht werdne sollen, brauchen wir jetzt einen Link auf read_category, ansonsten ist bereits read_category eingetreten und wir brauchen nur einen Link auf edit_category -->
					<?php if ($aktion == 'browse_users'): ?>
						<a href="index.php?aktion=read_user&id=
							<?php echo $user->getId(); ?>
						">
							Details
						</a> 
					<!-- Einen Link auf edit_user brauchen wir in jedem Fall, egal welche Aktion den View lädt -->
					<?php endif; ?>
					<a href="index.php?aktion=edit_user&id=
						<?php echo $user->getId(); ?>
					">
					Editieren
					</a>
					<a href="index.php?aktion=delete_user&id=
						<?php echo $user->getId(); ?>
					">
					Löschen
					</a>
				</td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>