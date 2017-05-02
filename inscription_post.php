<?php
$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8','phpmyadmin', 'bak92i', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
?>
<?php
$dispo = 0;
if (isset($_POST['pseudo'])) {
  $pseudo = htmlspecialchars($_POST['pseudo']);
  $req = $bdd->prepare('SELECT id FROM users WHERE pseudo = :pseudo');
  $req->execute(array(
    'pseudo' => $pseudo
  ));
  $donnees = $req->fetch();

  if ($donnees) {
    echo "ce pseudo est déja pris";
  }
  else {
    $dispo +=1;
  }
  $req->closeCursor();
}

if (isset($_POST['email'])) {
  $email = htmlspecialchars($_POST['email']);
  $req = $bdd->prepare('SELECT id FROM users WHERE email = :email');
  $req->execute(array(
    'email' => $email
  ));
  $donnees = $req->fetch();
  if ($donnees) {
    echo "Cette email est déja pris";
  }
  else {
    $dispo +=1;
  }
$req->closeCursor();
}

if (isset($_POST['password'])) {
  $password = htmlspecialchars($_POST['password']);
}
if ($dispo==2) {
  $req = $bdd->prepare('INSERT INTO users(pseudo, email, password) VALUES(:pseudo, :email, :password)');
  $req->execute(array(
    'pseudo' => $pseudo,
    'email' => $email,
    'password' => $password
  ));
  echo "Tu es bien inscris";
}
 ?>
