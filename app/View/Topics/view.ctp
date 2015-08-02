<article>
    <div class="row">
        <div class="col-lg-offset-3 col-lg-6 col-md-offset-2 col-md-8 col-xs-offset-1 col-xs-10">
            <section>
                <h3><?php echo h($topic['Topic']['created']); ?></h3>
                <h2><?php echo h($topic['Topic']['title']); ?></h2>
                <hr>
                <p><?php echo h($topic['Topic']['body']); ?></p>
                <span class="fa fa-tags"></span>
                <?php echo $this->Html->link($topic['Category']['name'], array('controller' => 'categories', 'action' => 'view', $topic['Category']['id'])); ?>
            </section>
        </div>
    </div>
    <section>
        <div class="row">
            <div class="col-lg-offset-3 col-lg-6 col-md-offset-2 col-md-8 col-xs-offset-1 col-xs-10">
                <h2><?php echo __('COMMENT'); ?></h2>
                <hr>
                <?php echo $this->Form->create('Comment'); ?>
                <?php echo $this->Form->input(
                    'comment_name',
                    array('type' => 'text')
                    ); ?>
                <?php echo $this->Form->input('title'); ?>
                <?php echo $this->Form->input('comment'); ?>
                <?php echo $this->Form->end('Submit'); ?>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-offset-3 col-lg-6 col-md-offset-2 col-md-8 col-xs-offset-1 col-xs-10">
                <section>
                    <?php foreach($topic_comments as $topic_comment): ?>
                        <h4><?php echo $topic_comment['Comment']['comment_name']; ?></h4>
                        <h3><?php echo $topic_comment['Comment']['title']; ?></h3>
                        <p><?php echo $topic_comment['Comment']['comment']; ?></p>
                        <hr>
                    <?php endforeach; ?>
                </section>
            </div>
        </div>

    </section>
</article>




