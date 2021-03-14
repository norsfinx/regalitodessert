<?php

session_start();

include("inc/flash.php");

unset($_SESSION["panier"]);

flash_create("votre commande est validé","success");

header("location:panier.php");