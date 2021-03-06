<?php
use \OpenClassrooms\Blog\Model\PostManager;
use \OpenClassrooms\Blog\Model\CommentManager;


// Chargement des classes
require_once('model/PostManager.php');
require_once('model/CommentManager.php');

// Affiche tous les posts
function listPosts()
{
    $postManager = new PostManager();
    $posts = $postManager->getPosts();

    require('view/frontend/listPostsView.php');
}


// Affiche un post et ses commentaires
function post()
{
    $postManager = new PostManager();
    $commentManager = new CommentManager();

    $post = $postManager->getPost($_GET['id']);
    $comments = $commentManager->getComments($_GET['id']);

    require('view/frontend/postView.php');
}


// Ajoute un commentaire
function addComment($postId, $author, $comment)
{
    $commentManager = new CommentManager();

    $affectedLines = $commentManager->postComment($postId, $author, $comment);

    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }
    else {
        header('Location: index.php?action=post&id=' . $postId);
    }
}

// Affiche la page de modification d'un commentaire
function Update()
{
  $postId = (int)$_GET['id'];
  $commentId = (int)$_GET['c_id'];

  $commentManager = new CommentManager();
  $comment = $commentManager->getCommentById($commentId);

  require('view/frontend/updateComment.php');
}

// Fait la modification du commentaire
function updateComment(int $commentId, string $newComment)
{
  $commentManager = new CommentManager();
  $commentManager->makeCommentUpdate($commentId, $newComment);
}
