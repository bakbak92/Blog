<?php
$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8','phpmyadmin', 'bak92i', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
$req = $bdd->query('SELECT pseudo, password FROM users');
$resultat = $req->fetch();
$pseudo = $resultat['pseudo'];
$password = $resultat['password'];
if (isset($_POST['pseudo']) && isset($_POST['password'])) {
  $login = htmlspecialchars($_POST['pseudo']);
  $password = htmlspecialchars($_POST['password']);
};
