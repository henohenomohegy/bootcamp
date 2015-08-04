<div class="topics form">
<?php echo $this->Form->create('Topic'); ?>
	<fieldset>
		<legend><?php echo __('Edit Topic'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('title');
		echo $this->Form->input('body');
		echo $this->Form->input('category_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
