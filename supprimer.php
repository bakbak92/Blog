<?php
$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8','phpmyadmin', 'bak92i', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
$req = $bdd->prepare('DELETE FROM billets WHERE id = :id');
if (isset($_GET['delete'])) {
  $id = $_GET['delete'];
  $req->execute(array(
    'id' => $id
  ));
}
header('Location: bo.php');
 ?>
