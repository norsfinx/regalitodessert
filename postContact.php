<?php 

$errors=[];// ce tableau permet vérifiez chaque champs et ajoutez les erreurs rencontrées. Si tableau vide pas d'erreurs

/* si une erreur existe key tableau  ou   champs "name" vide */ 
if (!array_key_exists("name", $_POST) || $_POST["name"] == "") {
    $errors["name"] = "vous n'avez pas renseigné votre nom.";
}
                                                            /*si different de filter_var*/
if (!array_key_exists("mail", $_POST) || $_POST["mail"] == "" || !filter_var($_POST["mail"], FILTER_VALIDATE_EMAIL)) {
    $errors["mail"] = "vous n'avez pas renseigné un mail valide.";
}

if (!array_key_exists("message", $_POST) || $_POST["message"] == "") {
    $errors["message"] = "vous n'avez pas tapé votre message.";
}

session_start();


/* si different de vide c'est à dire présence d'erreur*/ 
if (!empty($errors)) {
    $_SESSION["errors"]= $errors;
    $_SESSION["inputs"]= $_POST;
    header("location:contact.php");
}
else {
    $_SESSION["success"] = 1;
    $message= $_POST["message"];
    $headers= "FROM: regalito_dessert@local.dev";
    mail("norsfinx@gmail.com", "contact Regalito_Dessert", $message, $headers);
    header("location:contact.php");
}



/* select et poo à poursuivre tuto graphikart https://youtu.be/Dw9R0NEXuYo  Nordine Heraiz*/


