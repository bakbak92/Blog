<?php
$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8','phpmyadmin', 'bak92i', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
$req = $bdd->prepare('INSERT INTO users(pseudo, email, password) VALUES(:pseudo, :email, :password)');
if (isset($_POST['pseudo']) && isset($_POST['email']) && isset($_POST['password'])) {
  $pseudo = htmlspecialchars($_POST['pseudo']);
  $email = htmlspecialchars($_POST['email']);
  $password = htmlspecialchars($_POST['password']);
  $req->execute(array(
    'pseudo' => $pseudo,
    'email' => $email,
    'password' => $password
  ));
}
echo "<h2>Inscription Validée</h2>";
echo "Ton pseudo est ". $pseudo. " et ton mot de passe est ". $password;
