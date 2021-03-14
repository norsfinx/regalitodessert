<?php
include("app/app.php");

unset($_SESSION["auth"]);
flash_create("vous êtes bien deconnecté !", "success");

header("Location:index.php");