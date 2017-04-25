<?php
$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8','phpmyadmin', 'bak92i', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
$req = $bdd->prepare('UPDATE billets SET titre = :titre, contenu = :contenu, date_creation = :date_creation WHERE id = :id');
if (isset($_POST['titre']) && isset($_POST['contenu']) && isset($_POST['id']) && isset($_POST['date_creation'])) {
   $titre = $_POST['titre'];
   $contenu = $_POST['contenu'];
   $id = $_POST['id'];
   $date_creation = $_POST['date_creation'];
   $req->execute(array(
      'titre' => $titre,
      'contenu' => $contenu,
      'id' => $id,
      'date_creation' => $date_creation
   ));
}
header('Location: bo.php');

 ?>
