<?php
require 'header.php';
?>
<?php
if (isset($_GET['page'])) {
  $limite = $_GET['page']*4-4;
  $page = intval($_GET['page']);
}
else {
  $limite = 0;
}
$req = $bdd->prepare('SELECT id, titre, contenu, DAY(date_creation) AS jour, MONTH(date_creation) AS mois, YEAR(date_creation) AS année, MINUTE(date_creation) AS minute, HOUR(date_creation) AS heure, SECOND(date_creation) AS seconde FROM billets ORDER BY date_creation DESC LIMIT :limite, 4');

$req->bindValue('limite', $limite, PDO::PARAM_INT);
$req->execute();

?>
<div class="container header">

</div>
<div class="container">
  <div class="row">
    <?php
    while ($billets = $req->fetch()) {
      ?>
      <div class="col-lg-6 col-md-6 article">
          <h3> <?php echo $billets['titre'] ?> </h3><p class="date_post"><?php echo "Post : le ". $billets['jour']. " - 0". $billets['mois']. " - ". $billets['année'] ?><p>
            <p class="img"><img src="img/<?php echo $billets['id'] ?>.jpg" alt=""></p>
          <p><a href="commentaires.php?billet=<?php echo $billets['id'] ?>&page=1">Voir Article</a></p>

      </div>
      <?php
    }
    ?>
  </div>


  <?php
  $req->closeCursor();
  $req = $bdd->query('SELECT COUNT(id) AS total FROM billets');
  $nbreBillets = $req->fetch();
  $total = $nbreBillets['total'];
  $nbrePage = ceil(($total)/4);
  $i = 1;
  ?>
  <nav aria-label="...">
    <ul class="pagination">

      <?php
      if (!empty($page)) {
        if ($page > 1) {
          ?>
          <li>
            <a href="index.php?page=<?php echo $page - 1?>" aria-label="Previous">
              <<
            </a>
          </li>
          <?php
        }
      }
      ?>
      <?php
      for ($i; $i <= $nbrePage ; $i++){

        ?>
        <li>
          <a href="index.php?page=<?php echo $i ?>">
            <?php echo $i ?>
          </a>
        </li>
        <?php
      }
      ?>
      <?php
      if (!empty($page)){
        if ($page < $nbrePage) {
          ?>
          <li>
            <a href="index.php?page=<?php echo $page + 1 ?>" aria-label="Previous">
              >>
            </a>
          </li>
          <?php
        }
      }
      else if ($nbrePage > 1){
        ?>
        <li class="disabled">
          <a href="index.php?page=2" aria-label="Previous">
            <span aria-hidden="true"> >> </span>
          </a>
        </li>
        <?php
      }
      ?>
    </ul>
  </nav>

</div>
<?php
require 'footer.php';
 ?>
