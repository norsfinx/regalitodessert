<?php require "inc/functions.php"; ?>
<?php session_start(); ?>


<?php if(!empty($_POST)) { //si pas vide, données ont bien été postées
    include("inc/db.php");
    $errors=[]; // ce tableau permet vérifiez chaque champs et ajoutez les erreurs rencontrées. Si tableau vide pas d'erreurs


    if (!preg_match('/^[a-zA-Z0-9_]+$/', $_POST["user_name"])) { // preg_match pour autoriser certains caractère seulement dans les champs.  
        $errors["user_name"]= "votre login n'est pas valide.";
    } else {
        $req =$pdo->prepare("SELECT id FROM users WHERE user_name=?"); // on vérifie dans la db si le nom d'utilisateur est le meme que celui envoyé par l'utilisateur.
        $req->execute([$_POST["user_name"]]);
        $user = $req->fetch();
        if ($user) {
            $errors["user_name"]= "Cet identifiant est déja utilisé.";
        }
    }
    

    if (!filter_var($_POST["user_mail"], FILTER_VALIDATE_EMAIL)) {
        $errors["user_mail"] = "votre email n'est pas valide.";
    } else {
        $req =$pdo->prepare("SELECT id FROM users WHERE user_mail=?"); // on vérifie dans la db si l'email est le meme que celui envoyé par l'utilisateur.
        $req->execute([$_POST["user_mail"]]);
        $user = $req->fetch();
        if ($user) {
            $errors["user_mail"]= "Cet email est déja inscrit.";
        }
    }

    if ($_POST["user_password"] != $_POST["user_password_confirm"]) {
        $errors["user_mail"] = "vous devez entrer un mot de passe valide.";
    }
    //debug($errors); //fonction qui permet d'afficher les erreurs

    if (empty($errors)) {
        
        $req = $pdo->prepare("INSERT INTO users SET user_name = ?, user_mail = ?, user_password = ?, confirmation_token= ? ");//requete préparé qu'on stocke dans la variable $req(*requete*)
        $password = hash("sha256",$_POST["user_password"]); // cryptage du mdp donné par l'utilisateur dans $db
       
        $token = str_random(60); // creation du token
        $req->execute([$_POST["user_name"], $_POST["user_mail"], $password, $token]); // execution de la requete
        $user_id = $pdo->lastInsertId();
        $destinataire = $_POST["user_mail"];
        mail($destinataire,'confirmation de votre compte', "afin de validez votre compte merci de cliquer sur ce lien\n\nhttp://localhost:8888/infinityregalito/confirm.php?id=$user_id&token=$token");
        $_SESSION["flash"]["success"]= "un email de confirmation vous a été envoyé pour valider votre compte";
        header("location:login.php");
        exit();
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
        <label for="user_name"> login</label>
        <input type="text" class="form-control" id="user_name" name="user_name" value="<?= isset($_POST["user_name"]) ? $_POST["user_name"] : ""; ?>" required>
    </div>
    <div class="form-group form-contact">
        <label for="user_mail"> email</label>
        <input type="text" class="form-control" id="user_mail" name="user_mail" value="<?= isset($_POST["user_mail"]) ? $_POST["user_mail"] : ""; ?>" required>
    </div>
    <div class="form-group form-contact">
        <label for="user_password">mot de passe</label>
        <input type="password" class="form-control" id="user_password" name="user_password" required>
    </div>
    <div class="form-group form-contact">
        <label for="user_password_confirm">confirmez votre mot de passe</label>
        <input type="password" class="form-control" id="user_password_confirm" name="user_password_confirm" required>
    </div>
    <div>
    <button type="submit" name="" class="btn btn-secondary form-contact mt-5 mb-3">m'inscrire</button>
    </div>
</form>

  


<?php include("inc/footer.php"); ?>