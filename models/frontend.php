<?php
function getPosts(){
  $db = dbConnect();

	$req = $db->query('SELECT id, author, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS create_date_fr FROM posts ORDER BY creation_date DESC LIMIT 0, 5');

	return $req;
}

function getPost($postId){
  $db = dbConnect();

  $req = $db->prepare('SELECT id, author, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS create_date_fr FROM posts WHERE id = ?');
  $req->execute(array($postId));
  $post = $req->fetch();

  return $post;
}

function getComments($postId){
  $db = dbConnect();

  $comments = $db->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE post_id = ? ORDER BY comment_date DESC');
  $comments->execute(array($postId));

  return $comments;
}

function dbConnect(){
  try {
    $db = new PDO('mysql:host=127.0.0.1;dbname=MyBlog;charset=utf8', 'root', 'XXXXXXX', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    return $db;
  }
  catch(Exception $e){
          die('Erreur : '.$e->getMessage());
  }
}

function postComment($postId, $author, $comment){
    $db = dbConnect();
    $comments = $db->prepare('INSERT INTO comments(post_id, author, comment, comment_date) VALUES(?, ?, ?, NOW())');
    $affectedLines = $comments->execute(array($postId, $author, $comment));

    return $affectedLines;
}
