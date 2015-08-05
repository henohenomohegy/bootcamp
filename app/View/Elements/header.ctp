<header>
	<div class="col-sm-offset-1 col-xs-offset-1">
		<nav class="navbar">
			<div class="navbar-header">
				<a class="navbar-brand" href="/">BLOG TITLE</a>
			</div>
			<div class="navbar-right">
				<ul class="nav navbar-nav">

				<?php if(!empty($user)): ?>
					<li><a href="/cake/topics/"><?php print(h($user['username'])); ?>さん</a></li>
					<li><?php print($this->Html->link('LOGOUT', array('controller' => 'Users', 'action' => 'logout'))); ?></li>
					<li><?php echo $this->Html->link(__('Add Category'), array('controller' => 'categories', 'action' => 'add')); ?></li>
					<li><?php echo $this->Html->link(__('New Topic'), array('controller' => 'topics', 'action' => 'add')); ?></li>
				<?php else: ?>
					<li><?php echo $this->Html->link(__('LOGIN'), array('controller' => 'Users', 'action' => 'login')); ?></li>
					<li><?php echo $this->Html->link(__('SIGN UP'), array('controller' => 'Users', 'action' => 'register')); ?></li>
					<br>
				<?php endif; ?>

				</ul>
			</div>
		</nav>
		<h1>BLOG TITLE</h1>
	</div>
</header>