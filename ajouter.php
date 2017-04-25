<?php
$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8','phpmyadmin', 'bak92i', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
$req = $bdd->prepare('INSERT INTO billets(titre, contenu, date_creation) VALUES(:titre, :contenu, NOW())');
if (isset($_POST['titre']) && isset($_POST['contenu'])) {
   $titre = $_POST['titre'];
   $contenu = $_POST['contenu'];
   $req->execute(array(
      'titre' => $titre,
      'contenu' => $contenu
   ));
}
header('Location: bo.php');

 ?>
