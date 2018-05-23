<?php

namespace OpenClassrooms\Blog\Model;

use PDO, Exception, PDOException;

require_once("model/Manager.php");

class CommentManager extends Manager
{
    public function getComments($postId)
    {
        $db = $this->dbConnect();
        $sql = 'SELECT id, author, comment, DATE_FORMAT(comment_date, "%d/%m/%Y à %Hh%imin%ss") AS comment_date_fr FROM comments WHERE post_id = ? ORDER BY comment_date DESC';
        $comments = $db->prepare($sql);
        $comments->execute(array($postId));

        return $comments;
    }

    public function getCommentById($commentId)
    {
        $db = $this->dbConnect();

        $sql = 'SELECT comment FROM comments WHERE id = :id';

        $req = $db->prepare($sql);
        $req->execute(array('id' => $commentId));

        $comment = $req->fetchAll(PDO::FETCH_ASSOC);

        $req->closeCursor();

        return $comment;
    }

    public function postComment($postId, $author, $comment)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('INSERT INTO comments(post_id, author, comment, comment_date) VALUES(?, ?, ?, NOW())');
        $affectedLines = $comments->execute(array($postId, $author, $comment));

        return $affectedLines;
    }

    public function makeCommentUpdate($commentId, $Comment)
    {
      $db = $this->dbConnect();
      $sql = 'UPDATE comments SET comment = ? WHERE comments.id = ?';
      $req = $db->prepare($sql);
      $req->bindValue(1, $comment);
      $req->bindValue(2, $commentId);
      $req->execute();
    }
}
