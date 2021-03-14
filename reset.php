<?php

    if(isset($_GET["id"]) && isset($_GET["token"])) { // si on possede dans l'url l'id et le token
        require "inc/db.php";
        require "inc/functions.php";
            //selection dns la base de donnée du user où l'id et le reset token correspond à l'url 
        $req = $pdo->prepare("SELECT * FROM users WHERE id = ? AND reset_token = ? AND reset_at > DATE_SUB(NOW(), INTERVAL 30 MINUTE) ");
        $req->execute([$_GET["id"], $_GET["token"]]);
        $user= $req->fetch();

        if ($user) {
            if (!empty($_POST)) {
                    // si champs password rempli et champ password identique au champ user_password_confirme
                if (!empty($_POST["user_password"]) && $_POST["user_password"] == $_POST["user_password_confirm"]) {
                    $password= hash("sha256",$_POST["user_password"]); // hashage du nouveau password
                    $pdo->prepare("UPDATE users SET user_password = ?, reset_at = NULL, reset_token = NULL WHERE id=? ")->execute([$password, $user->id]);// update du password
                    session_start();
                    $_SESSION["flash"]["success"]="votre mot de passe a bien été modifié";//envoi du message
                    $_SESSION["auth"] = $user; // connexion de l'utilisateur
                    header("Location:market.php");
                    exit();

                }
            }
           

        } else {
            session_start();
            $_SESSION["flash"]["danger"]= "ce token n'est pas valide";
            header("location:login.php");
            exit();
        } 
        
    }   else {

            header("location:login.php");
            exit();
        }

?>
   <?php include("inc/header.php"); ?>
   


   <h2>réinitialiser mon mot de passe</h2>

<form method="POST" action="">
<div class="form-group form-contact">
        <label for="user_password">nouveau mot de passe </label>
        <input type="password" class="form-control" id="user_password" name="user_password" required>
    </div>
    <div class="form-group form-contact">
        <label for="user_password">confirmation du nouveau mot de passe </label>
        <input type="password" class="form-control" id="user_password_confirm" name="user_password_confirm" required>
    </div>
    <button type="submit" name="login" class="btn btn-secondary form-contact mt-5 mb-3">réinitialiser mon mot de passe</button>
</form>

   <?php include("inc/footer.php"); ?>