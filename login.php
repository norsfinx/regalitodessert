<?php
    require "inc/functions.php";
    reconnect_from_cookie();
    if (isset($_SESSION["auth"])) {
        header("Location:market.php");
        exit();

    }
//est-ce que des données ont été posté et est-que l'user_name à été posté et est-que le password à été posté
    if (!empty($_POST) && !empty($_POST["user_name"]) && !empty($_POST["user_password"])) { 
        

        require_once "inc/db.php";//si oui connexion à la base de donnée
        $errors=[];
        if (!preg_match('/^[a-zA-Z0-9_]+$/', $_POST["user_name"])) { // preg_match pour autoriser certains caractère seulement dans les champs.  
            $errors["user_name"]= "votre login n'est pas valide.";
        } else {
//selectionne tout depuis users où le user_name est égal au parametre user_name ou si l'email à été posté
        $req = $pdo->prepare("SELECT * FROM users WHERE (user_name = :user_name OR user_mail = :user_name) AND confirmed_at IS NOT NULL ");
        
        $req->execute(["user_name" => $_POST["user_name"]]);
        
        $user= $req->fetch(); //on recupere le user
        }
        if (!empty($user) && hash("sha256", $_POST["user_password"]) == $user->user_password) { //vérification si user existe et du password envoyé avec le password haché (hashé via la fonction hash("sha256" Le sha256 semble de plus en plus courant en remplacement du md5, notamment car il propose un bon équilibre entre espace de stockage en ligne et sécurité. ))
         
            session_start();
            $_SESSION["auth"] = $user; // si identique connexion autorisé
            $_SESSION["flash"]["success"] = "vous êtes maintenant connecté"; 

            if ($_POST["remember"]){

                $remember_token= str_random(250); 
                $pdo->prepare("UPDATE users SET remember_token = ? WHERE id = ? ")->execute([$remember_token, $user->id]);
                // creation d'un cookie pour une durée de 7 jours
                setcookie("remember", $user->id . "==" . $remember_token . sha1($user->id . "azerty"), time() + 60 * 60 * 24 * 7 );

            }
            header("Location:market.php");
            exit();
        } else {
            $_SESSION["flash"]["danger"] = "identifiant ou password incorrecte";
        }
        
    }
?>

<?php require "inc/header.php"; ?>

<?php  
        if(!empty($errors)) {
        require "inc/alertformregister.php"; 
        }
?>

<form method="POST" action="">
    <div class="form-group form-contact">
        <label for="user_name">login ou email</label>
        <input type="text" class="form-control" id="user_name" name="user_name" required>
    </div>
    <div class="form-group form-contact">
        <label for="user_password">mot de passe <a class="decoration-none" href="forget.php"> (j'ai oublié mon mot de passe) </a></label>
        <input type="password" class="form-control" id="user_password" name="user_password" required>
    </div>
    <div class="form-group form-contact ">
        <label >
        <input type="checkbox"  name="remember" value="1"> Se souvenir de moi
        </label>
 
    </div>
    <button type="submit" name="login" class="btn btn-secondary form-contact mt-5 mb-3">se connecter</button>
</form>

   <?php include("inc/footer.php"); ?>