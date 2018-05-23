<?php $title = 'Modifier un commentaire'; ?>

<?php ob_start(); ?>
<h1>Mon super blog !</h1>
<p>Modifier mon commentaire :</p>

<form action="" method="get">
  <input type="hidden" name="action" value="post">
  <input type="hidden" name="id" value="<?=$id?>">
  <input type="hidden" name="c_id" value="<?=$c_id?>">
  <textarea name="new_comment" rows="4" cols="30"><?=$comment[0]['comment']?></textarea>
  <div>
    <input type="submit" name="make_update" value="modifier">
  </div>
</form>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
