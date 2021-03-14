<?php 


include("app/app.php");


if ($_SESSION["auth"]->user_admin == 0) { // condition permettant l'acces au backoffice au statut admin uniquement
    header("location:/infinityregalito/index.php");
}

include("app/views/posts/loginView.php");




