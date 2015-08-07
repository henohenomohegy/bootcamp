<div class="row">
	<div class="col-sm-offset-1 col-sm-7 col-xs-offset-1 col-xs-10">
		<?php if ($this->Session->check('Message.flash')) : ?>
			<article class="row">
				<div class="alert alert-success">
					<?php echo $this->Session->flash(); ?>
				</div>
			</article>
		<?php endif; ?>
		<?php foreach($topics as $topic): ?>
			<article class="row">
				<div class="col-sm-3">
					<h3><?php echo h($topic['Topic']['created']); ?></h3>
				</div>
				<div class="col-sm-9">
						<h2><?php echo h($topic['Topic']['title']); ?></h2>
						<?php if(!empty($user) && $topic['Topic']['user_id'] == $user['id']): ?>
							<button type="button" class="btn btn-default">
								<?php echo $this->Html->link(
									'Edit', 
									array('controller' => 'topics', 'action' => 'edit', $topic['Topic']['id'])
								); ?>
							</button>
							<button type="button" class="btn btn-default">
								<?php echo $this->Form->postLink(
									'Delete', 
									array('controller' => 'topics', 'action' => 'delete', $topic['Topic']['id']),
									array(),
									'本当に削除してもよろしいですか？'
								); ?>
							</button>
						<?php endif; ?>
						<p><?php echo $this->Text->truncate($topic['Topic']['body'],200); ?></p>
						<p><a href="/detail/<?php echo $topic['Topic']['id']?>">Continue reading</a></p>
					<span class="fa fa-tags"></span>
					<a href=""><span class="label label-danger"><?php echo $this->Html->link($topic['Category']['name'], array('controller' => 'categories', 'action' => 'view', $topic['Category']['id']));  ?></span></a>
				</div>
			</article>
		<?php endforeach; ?>
	</div>
	<?php echo $this->element('aside'); ?>
</div>