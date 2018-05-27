<?php $title = 'Modifier un commentaire'; ?>

<?php ob_start(); ?>
<h1>Mon super blog !</h1>
<p>Modifier mon commentaire :</p>

<form action="" method="get">
  <input type="hidden" name="id" value="<?=$postId?>">
  <input type="hidden" name="commentId" value="<?=$commentId?>">
  <textarea name="newComment" rows="4" cols="30"><?=$comment[0]['comment']?></textarea>
  <div>
    <input type="submit" name="action" value="makeUpdate">
  </div>
</form>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
