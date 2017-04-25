<?php
require 'header.php';
 ?>
<?php

if (isset($_GET['billet'])) {
  $id_billet = $_GET['billet'];
}
$req = $bdd->prepare('SELECT id, titre, contenu, DAY(date_creation) AS jour, MONTH(date_creation) AS mois, YEAR(date_creation) AS année, MINUTE(date_creation) AS minute, HOUR(date_creation) AS heure, SECOND(date_creation) AS seconde FROM billets WHERE id = ?');
$req->execute(array($id_billet));
?>
  <?php
  $billets = $req->fetch();
  ?>
  <div class="col-lg-offset-2 col-lg-8 article">
    <h3> <?php echo $billets['titre'] ?> </h3><p class="date_post"><?php echo "Post : le ". $billets['jour']. " - 0". $billets['mois']. " - ". $billets['année'] ?><p>
      <p class="img"><img src="img/<?php echo $billets['id'] ?>.jpg" alt=""></p>
    <p><?php echo $billets['contenu'] ?> <a href="commentaires.php?billet=<?php echo $billets['id'] ?>&page=1">Commentaires</a></p>

  <?php
  $req->closeCursor();
  if (isset($_GET['page'])) {
    $limite = $_GET['page']*5-5;
    $page = $_GET['page'];
  }
  else {
    $limite = 0;
  }
  $req = $bdd->prepare('SELECT * FROM commentaires WHERE id_billet = :id_billet ORDER BY date_commentaire DESC LIMIT :limite, 5');
  $req->bindValue(
    'limite', $limite, PDO::PARAM_INT
  );
  $req->bindValue(
    'id_billet', $id_billet, PDO::PARAM_INT
  );
  // $req->bindValue(
  //   'debut', $debut, PDO::PARAM_INT
  // );
  $req->execute();

  $reqCount = $bdd->prepare('SELECT COUNT(id) AS total FROM commentaires WHERE id_billet = :id_billet');
  $reqCount->bindValue(
    'id_billet', $id_billet, PDO::PARAM_INT
  );
  $reqCount->execute();
  $nbreCommentaires = $reqCount->fetch();
  $total = $nbreCommentaires['total'];
  ?>
  <h1>Commentaires</h1>
  <div class="com">
    <?php
    while($commentaires = $req->fetch()) {
      ?>
      <p><?php echo $commentaires['auteur']. " le ". $commentaires['date_commentaire'] ?></p>
      <p><?php echo $commentaires['commentaire'] ?></p>
      <?php } ?>
      <?php
      $nombreDePages = ceil(($total )/ 5);
      if ($page > 1):
        ?>
        <a href="commentaires.php?billet=<?php echo $billets['id'] ?>&page=<?php echo $page - 1; ?>">Page précédente</a>
        <?php
      endif;
      for ($i = 1; $i <= $nombreDePages; $i++):

        ?>
        <a href="commentaires.php?billet=<?php echo $billets['id'] ?>&page=<?php echo $i; ?>"><?php echo $i; ?></a>
        <?php
      endfor;
      if ($page < $nombreDePages):
        ?>

        <a href="commentaires.php?billet=<?php echo $billets['id'] ?>&page=<?php echo $page + 1; ?>">Page suivante</a>
        <?php
      endif;
      ?>
      <form method="post" action="commentaires_post.php?billet=<?php echo $billets['id'] ?>">
        <p>Ajouter votre commentaire</p>
        <label for="Auteur">Auteur</label><input type="text" id="auteur" name="auteur"/><br />
        <label for="commentaire">Commentaire</label><textarea name="commentaire" id="commentaire"></textarea>
        <input type="hidden" name="id_billet" value="<?php echo $id_billet ?>">
        <input type="submit" value="envoyer">
      </form>
    </div>
  </div>
  </body>
  </html>
