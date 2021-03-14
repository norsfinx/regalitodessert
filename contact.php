<?php session_start(); ?>
<?php include("inc/header.php"); ?>

    <div class="row form-contact">

       <?php include("inc/alertformcontact.php") ?> <!-- affichage de la div erreur/success -->

        <div class="col-lg-8 offset-lg-2">
             <form class="form-wrapper" method="POST" action="postContact.php">
                <label for="inputname">Votre nom</label>
                <input type="text" class="form-control" name="name" id="inputname" value="<?= isset($_SESSION["inputs"]["name"]) ? $_SESSION["inputs"]["name"] : ""; ?>"> <!-- permet de garder en mémoire les champs remplis en cas d'erreur-->
                <label for="inputmail">Votre email</label>
                <input type="text" class="form-control" name="mail" id="inputmail" value="<?= isset($_SESSION["inputs"]["mail"]) ? $_SESSION["inputs"]["mail"] : ""; ?>"> <!-- permet de garder en mémoire les champs remplis en cas d'erreur-->
                <label for="inputmessage">Votre message</label>
                <textarea class="form-control" name="message" id="inputmessage"><?= isset($_SESSION["inputs"]["message"]) ? $_SESSION["inputs"]["message"] : ""; ?></textarea> <!-- permet de garder en mémoire les champs remplis en cas d'erreur-->
                <button type="submit" class="btn btn-primary mt-3 mb-5">Envoyez</i></button>
            </form>
        </div>
    </div>         

<?php unset($_SESSION["errors"]); ?> <!-- permet de supprimer le message d'erreur-->
<?php unset($_SESSION["success"]); ?>
<?php unset($_SESSION["inputs"]); ?> <!-- permet de supprimer le champs remplis-->


<p class="text-center"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2614.6095932503276!2d2.033384815646198!3d49.05604629472311!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e6f58daa6e087b%3A0xd44804872b1972d4!2sREGALITO%20DESSERT!5e0!3m2!1sfr!2sfr!4v1614554282227!5m2!1sfr!2sfr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe></p>

<?php include("inc/footer.php"); ?>











