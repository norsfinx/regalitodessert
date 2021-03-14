<?php 

session_start();
require "inc/functions.php";

logged_only ();

if (!empty($_POST)) {

    if (empty($_POST["user_password"]) || $_POST["user_password"] != $_POST["user_password_confirm"]) { // si champs password vide ou que les 2 mdp ne correspondent pas
        $_SESSION["flash"]["danger"] = "Les mots de passe ne sont pas identique.";
    } else {
        $user_id= $_SESSION["auth"]->id;
        $password = hash("sha256",$_POST["user_password"]);
        require_once "inc/db.php";
        $req = $pdo->prepare("UPDATE users SET user_password = ? WHERE id = ? ");
        $req->execute([$password, $user_id]);
        $_SESSION["flash"]["success"] = "Votre mot de passe à bien été mis à jour.";
    }
}

?>

<?php require "inc/header.php"; ?>

    <h2 class="text-center">Bonjour <?= $_SESSION["auth"]->user_name; ?></h2>


    <h3 class="m-3">changez mon mot de passe</h3>

<form method="POST" action="">
    <div class="form-group form-contact">
    <input type="password" class="form-control" id="user_password" name="user_password" placeholder="changez de mot de passe" required>
    </div>
    <div class="form-group form-contact">
    <input type="password" class="form-control" id="user_password_confirm" name="user_password_confirm" placeholder="confirmez votre nouveau de mot de passe"required>
    </div>
    <div>
    <button class="btn btn-secondary form-contact mt-5 mb-3">changer mon mot de passe</button>
    </div>
</form>
 


   <?php include("inc/footer.php"); ?>