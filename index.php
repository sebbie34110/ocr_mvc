<?php
require('controller/frontend.php');

try
{
  if (isset($_GET['action']))
  {
    switch ($_GET['action'])
    {
      case 'listPosts':
        listPosts();
        break;

      case 'post':
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            post();
        }
        else {
            throw new Exception('Aucun identifiant de billet envoyé');
        }
        break;

      case 'addComment':
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                addComment($_GET['id'], $_POST['author'], $_POST['comment']);
            }
            else {
                throw new Exception('Tous les champs ne sont pas remplis !');
            }
        }
        break;

      case 'update':
        if (isset($_GET['c_id']) && $_GET['c_id'] > 0){
          Update($_GET['id']);
        }
        break;

      case 'makeUpdate':
        if (!empty($_GET['newComment'])) {
          updateComment((int)$_GET['commentId'], $_GET['newComment']);
        } else {
          throw new Exception('Le commentaire est vide.');
        }
        post();
        break;
    }
  }
  else
  {
    listPosts();
  }
}
catch(Exception $e)
{
    echo 'Erreur : ' . $e->getMessage();
}
