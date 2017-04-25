<?php
require 'header.php';
?>
<div class="container">
  <form action="inscription_post.php" method="post">
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
