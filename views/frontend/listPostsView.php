<?php $title = 'My Blog ! Powered by Ludo | Home' ?>

<?php ob_start(); ?>
  <div class="hero-image">
    <div class="hero-text">
      <h1>My Blog !</h1>
      <p>Powered by <strong>Ludo</strong></p>
    </div>
  </div>


  <div id="aboutSection" class="container">
    <div class="row">
      <div class="col-xs-12">
        <h2 class="page-header">Hi !!</h2>
        <p>Welcome to my first blog ! My name is Ludovic. <br>
          Curious and passionate about the web, it's been almost two years since I started learning about development.<br>
          Today, I present you my first blog develloped with PHP &amp; MySQL.
        </p>
        <img src="public/assets/images/ludo.png" class="ludo img-circle" alt="ludo">
      </div>
    </div>
  </div>

  <div id="ticketSection" class="container">
    <div class="row">
      <div class="col-xs-12">
        <div class="page-header">
          <h3>My recently posts</h3>
        </div>
      </div>
    </div>
    <?php
    while ($data = $posts->fetch())
      {
    ?>
    <div class="news">
      <div class="row">
        <div class="col-xs-12">
          <ul class="list-group">
            <li class="list-group-item">
              <h3><?= htmlspecialchars($data['title']) ?></h3>
              <p><em>By <strong><?= htmlspecialchars($data['author']) ?></strong> le <?= $data['create_date_fr'] ?></em></p>
              <p><?= nl2br(htmlspecialchars($data['content'])) ?>
              <br />
              <em><a href="index.php?action=post&amp;id=<?= $data['id'] ?>">Commentaires</a></em>
              </p>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <?php
      }
    $posts->closeCursor();
    ?>
  </div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
