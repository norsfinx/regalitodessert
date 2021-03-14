<?php
//si les données ont été posté et que le champs mail n'est pas vide
    if (!empty($_POST) && !empty($_POST["user_mail"]) ) { 
        //var_dump($_POST);

        require_once "inc/db.php";//si oui connexion à la base de donnée
        require_once "inc/functions.php";
//selectionne tout depuis users où le user_name est égal au parametre user_name ou si l'email à été posté
        $req = $pdo->prepare("SELECT * FROM users WHERE user_mail = ? AND confirmed_at IS NOT NULL ");
        
        $req->execute([$_POST["user_mail"]]);
        
        $user= $req->fetch(); //on recupere le user

        if ($user) { // si un user correspond
            session_start();
            $reset_token = str_random(60);
            $pdo->prepare("UPDATE users SET reset_token = ?, reset_at = NOW() WHERE id= ? ")->execute([$reset_token, $user->id]);
            $_SESSION["flash"]["success"] = "les instructions pour récuperer un nouveau mot vous ont été envoyés par mail"; 
            mail($_POST["user_mail"],'réinitialisation de votre mot de passe', "afin de réinitialiser votre mot de passe merci de cliquer sur ce lien\n\nhttp://localhost:8888/infinityregalito/reset.php?id={$user->id}&token=$reset_token");
            header("location:login.php");
            
            exit();
            } else {
            $_SESSION["flash"]["danger"] = "Aucun compte ne correspond à cette adresse email";
        }
        
    }
?>

<?php require "inc/header.php"; ?>

<?php  
        if(!empty($errors)) {
        require "inc/alertformregister.php"; 
        }
?>
<h3>oublie du mot de passe</h3>
<form method="POST" action="">
    <div class="form-group form-contact">
        <label for="user_mail">email</label>
        <input type="text" class="form-control" id="user_mail" name="user_mail" required>
    </div>
   
    <button type="submit" name="login" class="btn btn-secondary form-contact mt-5 mb-3">validez</button>
</form>

   <?php include("inc/footer.php"); ?>