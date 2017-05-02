<?php
$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8','phpmyadmin', 'bak92i', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>blog</title>
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <!-- JQuery NE PAS SUPPRIMER -->

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <!-- Optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
</head>
<body>
  <header>
    <nav class="navbar-fixed-top nav-menu">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed btn-menu" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar bar-icon"></span>
            <span class="icon-bar bar-icon"></span>
            <span class="icon-bar bar-icon"></span>
          </button>
          <a class="navbar-brand" href="#">Blog</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li><a href="index.php">Accueil <span class="sr-only">(current)</span></a></li>
            <li><a href="#">Contact</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="inscription.php">Inscription</a></li>
            <?php
            if (isset($_SESSION['id']) && isset ($_SESSION['pseudo'])) {
              ?>
              <li><a href="connexion.php"><?php echo $_SESSION['pseudo'] ?></a></li>
              <?php
            }
            else {
              ?>
              <li><a href="connexion.php">Connexion</a></li>
              <?php
            }
            ?>
            <li><a href="bo.php"><i class="fa fa-cog" aria-hidden="true"></i></a></li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>
    <h1>Welcome in My blog</h1>
  </header>
