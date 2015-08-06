<nav class="navbar navbar-default navbar-fixed-top navbar-invisible">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">BLOG TITLE</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
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
  </div>
</nav>
