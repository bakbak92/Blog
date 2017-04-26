<?php
require 'header.php';
?>
<?php
$dispo = 0;
if (isset($_POST['pseudo']) && isset($_POST['email']) && isset($_POST['password'])) {
  $pseudo = htmlspecialchars($_POST['pseudo']);
  $email = htmlspecialchars($_POST['email']);
  $password = htmlspecialchars($_POST['password']);
  $req = $bdd->prepare('SELECT id FROM users WHERE pseudo = :pseudo AND email = :email');
  $req->execute(array(
    'pseudo' => $pseudo,
    'email' => $email
  ));
  $donnees = $req->fetch();

  if ($donnees) {
    echo "ce pseudo ou email est déja pris";
  }
  else {
    $dispo +=1;
  }
  $req->closeCursor();
}
if ($dispo==1) {
  $req = $bdd->prepare('INSERT INTO users(pseudo, email, password) VALUES(:pseudo, :email, :password)');
  $req->execute(array(
    'pseudo' => $pseudo,
    'email' => $email,
    'password' => $password
  ));
  echo "Tu es bien inscris";
}
 ?>
<div class="container">
  <form action="inscription.php" method="post">
    <div class="form-group">
      <label for="">Pseudo </label>
      <input type="text" name="pseudo" placeholder="Pseudo"value="">
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Email address</label>
      <input type="email" class="form-control" id="exampleInputEmail1" name="email" placeholder="Email">
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Password</label>
      <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password">
    </div>
    <input type="submit" name="" value="s'inscrire">
  </form>
</div>
