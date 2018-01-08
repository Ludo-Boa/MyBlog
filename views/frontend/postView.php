<?php $title = htmlspecialchars($post['title']); ?>

<?php ob_start(); ?>

  <div class="container">
    <div class="row">
      <div class="col-xs-3">
        <p><a href="index.php">Back to Home</a></p>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-12">
        <div class="news">
            <h3>
                <?= htmlspecialchars($post['title']) ?>
                <em>le <?= $post['create_date_fr'] ?></em>
            </h3>

            <p>
                <?= nl2br(htmlspecialchars($post['content'])) ?>
            </p>
        </div>
      </div>
    </div>
    <hr>
    <div class="row">
      <div class="col-xs-6">
        <h3>Commentaires</h3>
        <?php
        while ($comment = $comments->fetch())
        {
        ?>
        <p><strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= $comment['comment_date_fr'] ?></p>
        <p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
        <?php
        }
        ?>
      </div>
      <div class="col-xs-6 well">
        <h4>Add comment</h4>
        <hr>
        <form action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post">
          <div class="input-group">
              <label for="author">Author :</label><br />
              <input type="text" class="form-control" id="author" name="author" />
          </div>
          <div class="input-group">
              <label for="comment">Comment :</label><br />
              <textarea id="comment" class="form-control" rows="5" cols="80" name="comment"></textarea>
          </div>
          <hr>
          <div class="pull-right">
              <input type="submit" class="btn btn-success" value="Send"/>
          </div>
        </form>
      </div>
    </div>



  </div>



<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
