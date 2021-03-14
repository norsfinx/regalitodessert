<?php 

include("app/app.php");

include("app/model/usersModel.php");

$user = userLogin($_POST["user_name"], $_POST["user_password"]);

if ($user) {

        $_SESSION["userBO"]= $user;
        
        flash_create("Vous êtes connecté", "success");
        header("location:?module=dashboard&action=index");

    }else {
        flash_create("Login/Password incorrectes", "danger");
        header("Location:?module=users&action=login");


    }






