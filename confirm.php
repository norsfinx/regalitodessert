<?php
    
    $user_id = $_GET["id"]; // on récupere l'id de l'utilisateur passé dans l'url
    $token = $_GET["token"]; // on récupere le token passé dans l'url

    require "inc/db.php";

    //requete préparé stocké dans $req

    $req = $pdo->prepare("SELECT * FROM users WHERE id = ?"); //séléction de l'user qui correspond à l'id demandé

    $req->execute([$user_id]); //execution de la requete

    $user = $req->fetch(); //recuperation du résultat

    session_start(); //démarrage de la session si le user clique sur le lien de confirmation
   
    
    if ($user && $user->confirmation_token == $token) {
        
        // on change le 'confirmation_token' qui devient NULL, le 'confirmed_at' prend la date du jour et seulement la où l'id correspond à celui de l'utilisateur
        $req = $pdo->prepare("UPDATE users SET confirmation_token = NULL, confirmed_at = NOW() WHERE id = ?")->execute([$user_id]);
        $_SESSION["flash"]["success"] = "votre compte à bien été validé";
        $_SESSION["auth"]= $user;
        header("Location:index.php");
        } else {
        $_SESSION["flash"]["danger"]="ce token n'est plus valide";
        header("Location:login.php");
    }




