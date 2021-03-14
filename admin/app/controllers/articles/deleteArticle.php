<?php 

if (isset($_GET["id"])) {
    include("app/app.php");
    include("app/model/articleModel.php");
 

    if (articleDelete($_GET["id"])) {
        flash_create("Le produit a été supprimé !", "success");
        header("Location:?module=articles&action=articles");
    } else {
        flash_create("Le produit n'a pas été supprimé !", "danger");
        header("Location:?module=articles&action=articles");
    }
   
    }else {

    die("Bien tenté !");
}


