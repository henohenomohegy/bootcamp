<article class="row">
    <section class="col-lg-offset-3 col-lg-6 col-md-offset-2 col-md-8 col-xs-offset-1 col-xs-10">
        <p class="h3"><?php echo h($topic['Topic']['created']); ?></p>
        <h1 class="h2"><?php echo h($topic['Topic']['title']); ?></h1>
        <hr>
        <p class="sentence"><?php echo h($topic['Topic']['body']); ?></p>
        <span class="fa fa-tags"></span>
        <?php echo $this->Html->link($topic['Category']['name'], array('controller' => 'categories', 'action' => 'view', $topic['Category']['id'])); ?>
    </section>

    <section class="row">
        <div class="col-lg-offset-3 col-lg-6 col-md-offset-2 col-md-8 col-xs-offset-1 col-xs-10">
            <hr>
            <h2><?php echo __('COMMENT'); ?></h2>
            <?php echo $this->Form->create('Comment'); ?>
            <?php echo $this->Form->input(
                'comment_name',
                array('type' => 'text')
                ); ?>
            <?php echo $this->Form->input('title'); ?>
            <?php echo $this->Form->input('comment'); ?>
            <?php echo $this->Form->end('Submit'); ?>
        </div>
        <div class="col-lg-offset-3 col-lg-6 col-md-offset-2 col-md-8 col-xs-offset-1 col-xs-10">
            <?php foreach($topic_comments as $topic_comment): ?>
                <hr>
                <section>
                    <h4><?php echo $topic_comment['Comment']['comment_name']; ?></h4>
                    <h3><?php echo $topic_comment['Comment']['title']; ?></h3>
                    <p><?php echo $topic_comment['Comment']['comment']; ?></p>
                </section>
            <?php endforeach; ?>
        </div>
    </section>
</article>


