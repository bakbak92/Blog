<?php
require 'header.php';
if (isset($_POST['pseudo']) && isset($_POST['password'])) {
  $pseudo = htmlspecialchars($_POST['pseudo']);
  $password = htmlspecialchars($_POST['password']);
  $req = $bdd->prepare('SELECT id FROM users WHERE pseudo = :pseudo AND password = :password');
  $req->execute(array(
    'pseudo' => $pseudo,
    'password' => $password
  ));
  $donnees = $req->fetch();
  if ($donnees) {
    echo "tu n'es pas connectée";
  }
  else {
    
  }
}
 ?>
 <form class="form-horizontal" method="post" action="connexion_post.php">
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Pseudo</label>
    <div class="col-sm-10">
      <input type="text"  placeholder="pseudo" name="pseudo">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
    <div class="col-sm-10">
      <input type="password" name="password"  id="inputPassword3" placeholder="Password">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <div class="checkbox">
        <label>
          <input type="checkbox"> Se souvenir de moi
        </label>
      </div>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Connexion</button>
    </div>
  </div>
</form>
