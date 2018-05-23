<?php

use \OpenClassrooms\Blog\Model\CommentManager;


require('controller/frontend.php');

try {
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'listPosts') {
            listPosts();
        }
        elseif ($_GET['action'] == 'post') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                post();
            }
            else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
        elseif ($_GET['action'] == 'addComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                    addComment($_GET['id'], $_POST['author'], $_POST['comment']);
                }
                else {
                    throw new Exception('Tous les champs ne sont pas remplis !');
                }
            }
        }
        elseif ($_GET['action'] == 'update') {
            if (isset($_GET['c_id']) && $_GET['c_id'] > 0){

              Update($_GET['id']);

              if (isset($_GET['make_update']))
              {
                updateComment((int)$_GET['c_id'], $_GET['new_comment']);
              }   
            } else {
                throw new Exception('Vous n\'avez pas choisi de commentaire à modifier !');
            }
          }
    }
    else {
        listPosts();
    }
}
catch(Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}
