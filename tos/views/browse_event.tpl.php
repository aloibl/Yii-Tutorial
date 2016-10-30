<?php foreach($all_events as $event): ?>
<ul>
	<li>
		<a href="index.php?aktion=edit_event&id=<?php echo $event->getId(); ?>">
			<?php echo $event->getEvent() . ' in ' . $event->getPlace() . ' am ' . $event->getStartsAt()->format('d.m.Y') . ' um ' . $event->getStartsAt()->format('H:i'); ?>	
		</a>
	</li>
</ul>
<?php endforeach; ?>