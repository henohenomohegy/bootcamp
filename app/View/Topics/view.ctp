<h2><?php echo h($topic['Topic']['title']); ?></h2>
<?php echo h($topic['Topic']['created']); ?>
<h4>category:<?php echo $this->Html->link($topic['Category']['name'], array('controller' => 'categories', 'action' => 'view', $topic['Category']['id'])); ?></h4>
<h3><?php echo h($topic['Topic']['body']); ?></h3>
<h4>author:<?php echo h($user['username']); ?></h4>
<hr>
<br><br><br>
<h2><?php echo __('コメント'); ?></h2>
<?php foreach($topic_comments as $topic_comment): ?>
	name:<?php echo $topic_comment['Comment']['comment_name']; ?><br>
	title:<?php echo $topic_comment['Comment']['title']; ?><br>
	comment:<?php echo $topic_comment['Comment']['comment']; ?><br>
	<hr>
<?php endforeach; ?>

<br><br>
<h3><?php echo __('投稿'); ?></h3>
<?php echo $this->Form->create('Comment'); ?>
<?php echo $this->Form->input(
	'comment_name',
	array('type' => 'text')
	); ?>
<?php echo $this->Form->input('title'); ?>
<?php echo $this->Form->input('comment'); ?>
<?php echo $this->Form->end('Submit'); ?>