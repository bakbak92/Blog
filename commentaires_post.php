<?php
$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8','phpmyadmin', 'bak92i', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
$req = $bdd->prepare('INSERT INTO commentaires(auteur, commentaire, id_billet)
VALUES(:auteur, :commentaire, :id_billet)');
if(isset($_POST['auteur']) && isset($_POST['commentaire']) && isset($_POST['id_billet'])) {

  $auteur = htmlspecialchars($_POST['auteur']);
  $commentaire = htmlspecialchars($_POST['commentaire']);
  $id_billet = $_POST['id_billet'];

  $req->execute(array(
    'auteur' => $auteur,
    'commentaire' => $commentaire,
    'id_billet' => $id_billet

  ));
}
header('Location: commentaires.php?billet='.$id_billet.'&page=1');
 ?>
