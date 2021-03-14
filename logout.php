<?php 

session_start();
//destruction du cookie lors du logout
setcookie('remember', NULL, -1);

unset($_SESSION["auth"]);

$_SESSION["flash"]["success"]= "Vous êtes maintenant déconnecté.";

header("location:index.php");
