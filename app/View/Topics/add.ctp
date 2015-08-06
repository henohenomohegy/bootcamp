<div class="row">
	<div class="col-lg-offset-3 col-lg-6 col-md-offset-2 col-md-8 col-xs-offset-1 col-xs-10">
		<h2>記事追加</h2>
		<?php echo $this->Form->create('Topic', array('class' => 'form')); ?>
		<div class="form-group">
			<?php echo $this->Form->input('title', array('class' => 'form-control')); ?>
		</div>
		<div class="form-group">
			<?php echo $this->Form->input('body', array('class' => 'form-control')); ?>
		</div>
		<div class="form-group">
			<?php echo $this->Form->input('category_id', array('class' => 'form-control')); ?>
		</div>
		<div class="form-group">
			<?php echo $this->Form->submit('追加', array('class' => 'btn btn-success')); ?>
		</div>
		<?php echo $this->Form->end(); ?>
	</div>
</div>
