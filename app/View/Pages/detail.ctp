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
            <h4 class="h4">Comment</h4>
            <div class="form">
                <?php echo $this->Form->create('Comment'); ?>
                <div class="form-group">
                    <?php echo $this->Form->input('comment_name', array('class' => 'form-control')); ?>
                </div>
                <div class="form-group">
                    <?php echo $this->Form->input('title', array('class' => 'form-control')); ?>
                </div>
                <div class="form-group">
                    <?php echo $this->Form->input('comment', array('class' => 'form-control')); ?>
                </div>
                <div class="form-group">
                    <?php echo $this->Form->submit('コメント', array('class' => 'btn btn-primary')); ?>
                </div>
                <?php echo $this->Form->end(); ?>
            </div>
        </div>
        <div class="col-lg-offset-3 col-lg-6 col-md-offset-2 col-md-8 col-xs-offset-1 col-xs-10">
            <?php foreach($topic_comments as $topic_comment): ?>
                <hr>
                <section>
                    <h4 class="h4"><?php echo $topic_comment['Comment']['comment_name']; ?></h4>
                    <h3 class="h3"><?php echo $topic_comment['Comment']['title']; ?></h3>
                    <p><?php echo $topic_comment['Comment']['comment']; ?></p>
                </section>
            <?php endforeach; ?>
        </div>
    </section>
</article>


