
<h3>category:<?php echo($category['Category']['name']); ?></h3>
<hr>

<div class="related">
	<?php if (!empty($category['Topic'])): ?>
	<?php foreach ($category['Topic'] as $topic): ?>
	<h2><?php echo h($topic['title']); ?></h2>
	<h3>
		<?php echo $this->Text->truncate(
			$topic['body'],
			200); ?></h3><br>
	created:<?php echo h($topic['created']); ?><br>
	modified:<?php echo h($topic['modified']); ?><br>
	<h4>author:<?php echo h($topic['user_id']); ?></h4><br>

	<?php echo $this->Html->link(__('続きを読む'), array('controller' => 'topics', 'action' => 'view', $topic['id'])); ?>
	<hr>
	<?php endforeach; ?>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Topic'), array('controller' => 'topics', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
