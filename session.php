<?php
session_start();

include("inc/flash.php");
// quand ca n'existe pas on cree le tableau
if (!isset($_SESSION["panier"])) {
    $_SESSION["panier"] = array();

}
//creer une case vide dans laquelle on met quelque chose 
$_SESSION["panier"][]= $_POST;


flash_create("Votre produit a bien été ajouté au panier !", 'success');



header("Location:panier.php");