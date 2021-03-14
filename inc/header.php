<?php 

if (session_status() == PHP_SESSION_NONE) { // si la session n'est pas démarré, la démarrer ici
      session_start(); 
}
?>

<!DOCTYPE html>
<html>
  <head>
  <title>Regalito-Dessert</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="HTML5 skeleton index.html">
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta name="keywords" content="html5,skeleton,index,homepage,jquery,bootstrap">
  <meta name="author" content="Nordine Heraiz">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css" />
  <!-- CSS only -->
  <link href="static/styles.css" rel="stylesheet">  
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
  
  </head>

<body>

<header>
   <div class="topnav" id="myTopnav">
      <a href="index.php"><img src="/infinityregalito/static/image/regalitologo3d.jpg" height="150px" class="active" alt=""></a>
      <a href="about.php" class="color-link hover m-5 link-js" >À propos de nous</a>
      <a href="nosdesserts.php" class="color-link hover m-5 link-js" id="link">Nos desserts</a>

      <?php if(isset($_SESSION["auth"])): ?>
      <a href="logout.php" class="color-link hover m-5 link-js">Se deconnecter</a>
      <a href="market.php" class="color-link hover m-5 link-js">Market</a>
      <?php else: ?>
      <a href="registerGrafikart.php" class="color-link hover m-5 link-js">S'inscrire</a>
      <a href="login.php" class="color-link hover m-5 link-js">Se connecter</a>
      <?php endif; ?>
      <a href="contact.php" class="color-link hover m-5 link-js">Contact</a>
      <a href="javascript:void(0);" class="icon" onclick="myFunction()">
        <i class="fa fa-bars"></i>
      </a>
    </div>
</header>   

<?php if (isset($_SESSION["flash"])): ?> <!-- y'a t'il quelque chose dans la clé flash ? si oui -->
    <?php foreach($_SESSION["flash"] as $type =>$message): ?> <!-- on recupere le type danger ou success et en valeur le message -->
      <div class="alert alert-<?= $type; ?>">
        <?= $message; ?>
      </div>
   <?php endforeach; ?>
      <?php unset($_SESSION["flash"]); ?> <!--suppression des messages d'erreurs -->
<?php endif; ?>


