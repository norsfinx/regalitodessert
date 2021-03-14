<?php if(array_key_exists("errors", $_SESSION)): ?> <!-- si présence d'erreur dans tableau $_SESSION -->
            <div class="alert alert-danger">
            <?= implode("<br>", $_SESSION["errors"]); ?> <!-- affichage des erreurs La fonction implode () renvoie une chaîne à partir des éléments d'un tableau.-->
            </div>
        <?php endif; ?> <!-- permet d'afficher l'erreur qu'une seule fois -->
        <?php if(array_key_exists("success", $_SESSION)): ?> <!-- si présence d'erreur dans tableau $_SESSION -->
            <div class="alert alert-success">
                "Votre mail à bien été envoyé." <!-- affichage du message -->
            </div>
        <?php endif; ?> <!-- permet d'afficher l'erreur qu'une seule fois -->
