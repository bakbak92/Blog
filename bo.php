<?php
require 'header.php';
 ?>

  <div class="" style="text-align:center">
    <h1>Bienvenue sur ton back office</h1>
    <h3>Tu pourras ajouter des billets ou bien les modifier ou les supprimer</h3>
    <form class="" action="ajouter.php" method="post">
      <p>Ajouter un billet</p>
      <p>Titre billet <input type="text" name="titre" value=""></p>
      <p><textarea name="contenu" rows="8" cols="80"></textarea></p>
      <p><input type="submit" name="" value="Ajouter"></p>
    </form>
  </div>

  <?php
  $req = $bdd->query('SELECT * FROM billets ORDER BY date_creation DESC LIMIT 0, 5');
  while ($billets = $req->fetch()) {
    ?>
    <div class="col-lg-4 col-md-6 col-xs-12 article">

        <h3><?php echo $billets['titre'] ?>  <a href="supprimer.php?delete=<?php echo $billets['id'] ?>">Supprimer</a></h3>
        <input type="hidden" name="delete" value="<?php echo $billets['id'] ?>">
      <p><?php echo $billets['contenu'] ?> </p>
      <form class="" action="modifier.php" method="post">
        <p>Modifier un billet</p>
        <p>Titre billet <input type="text"  name="titre" value="<?php echo $billets['titre'] ?>"></p>
        <p><textarea name="contenu" rows="8" cols="80"><?php echo $billets['contenu'] ?></textarea></p>
        <input type="hidden" name="id" value="<?php echo $billets['id'] ?>">
        <input type="hidden" name="date_creation" value="<?php echo $billets['date_creation'] ?>">
        <p><input type="submit" name="" value="envoyer"></p>
      </form>
    </div>

    <?php
  }
  ?>
