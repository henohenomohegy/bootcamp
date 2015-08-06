<div class="row">
	<div class="col-lg-offset-3 col-lg-6 col-md-offset-2 col-md-8 col-xs-offset-1 col-xs-10">
		<h2>新規登録</h2>
		<?php echo $this->Form->create('User', array('class' => 'form')); ?>
		<div class="form-group">
			<?php echo $this->Form->input('username', array('class' => 'form-control')); ?>
		</div>
		<div class="form-group">
			<?php echo $this->Form->input('password', array('class' => 'form-control')); ?>
		</div>
		<div class="form-group">
			<?php echo $this->Form->submit('登録', array('class' => 'btn btn-success')); ?>
		</div>
		<?php echo $this->Form->end(); ?>
	</div>
</div>
