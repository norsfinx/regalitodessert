<?php

if (isset($_GET["id"])) {
    include("app/app.php");
    include("app/model/usersModel.php");
    
    if (userDelete($_GET["id"])) {
        flash_create("L'utilisateur a été supprimé !", "success");
        header("Location:" . $_SERVER["HTTP_REFERER"] );
    } else {
        flash_create("L'utilisateur n'a pas été supprimé !", "danger");
        header("Location:" . $_SERVER["HTTP_REFERER"] );
       
    }
}else {
    die("Bien tenté !");
}