<?php echo $this->Html->image('top-logo@2x.png', array('alt' => 'CakePHP')); ?>
<br>
<h1>ログインせずに見れる一覧ページです</h1>
<?php if(!empty($user)): ?>
<h4>welcome：<?php print(h($user['username'])); ?>さん</h4>
<?php print($this->Html->link('ログアウト', array('controller' => 'Users', 'action' => 'logout'))); ?>
<br>
<?php echo $this->Html->link(__('Add Category'), array('controller' => 'categories', 'action' => 'add')); ?> 
<br>
<?php echo $this->Html->link(__('New Topic'), array('controller' => 'topics', 'action' => 'add')); ?> 
<br>
<br>
<?php else: ?>
<?php echo $this->Html->link(__('Login'), array('controller' => 'Users', 'action' => 'login')); ?> 
<?php echo $this->Html->link(__('Register'), array('controller' => 'Users', 'action' => 'register')); ?> 
<br>
<?php endif; ?>
<br>
<h1>新着記事</h1>
<hr>

<?php foreach($topics as $topic): ?>
	<h2><?php echo h($topic['Topic']['title']); ?></h2>
	<h4>category:<?php echo $this->Html->link($topic['Category']['name'], array('controller' => 'categories', 'action' => 'view', $topic['Category']['id']));  ?></h4>
	<h3>
		<?php echo $this->Text->truncate(
			$topic['Topic']['body'],
			200); ?><br>
			<?php echo $this->Html->link(__('続きを読む'), array('controller' => 'topics', 'action' => 'view', $topic['Topic']['id'])); ?>
	</h3><br>
	created:<?php echo h($topic['Topic']['created']); ?>/
	modified:<?php echo h($topic['Topic']['modified']); ?><br>
	<h4>author:<?php echo h($topic['Topic']['user_id']); ?></h4><br>
	
	<hr>

	
<?php endforeach; ?>