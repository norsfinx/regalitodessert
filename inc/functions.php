<?php 

function debug($variable) {
    echo "<pre>" . print_r($variable, true) . "</pre>" ; // print_r Affiche des informations lisibles pour une variable, L'élément HTML <pre> représente du texte préformaté,
}


function str_random($length) {
    $alphabet="0123456789azertyuiopqsdfghjklmwxcvbnAZERTYUIOPQSDFGHJKLMWXCVBN";
  //3)récupère 60  2)mélange    1)(repete $alphabet 60 fois)
    return substr(str_shuffle(str_repeat($alphabet, $length)), 0 , $length);

}

function logged_only() {
  if (session_status() == PHP_SESSION_NONE) { // si la session n'est pas démarré, la démarrer ici
    session_start(); 
  }
  if (!isset($_SESSION["auth"])) {

    $_SESSION["flash"]["danger"]= "vous n'avez pas le droit d'acceder à cette page";
    header("location:login.php");
    exit();
  }
}

function reconnect_from_cookie() {

    if (session_status() == PHP_SESSION_NONE) { // si la session n'est pas démarré, la démarrer ici
    session_start(); 
    }

        if (isset($_COOKIE["remember"]) && !isset($_SESSION["auth"])) { // est-ce que j'ai un cookie et si connecté
        require_once "db.php";
        if (!isset($pdo)){
          global $pdo;
        }
        $remember_token = $_COOKIE["remember"];
        $parts = explode("==", $remember_token);
        $user_id = $parts["0"];
        $req = $pdo->prepare("SELECT * FROM users WHERE id = ? ");
        $req->execute([$user_id]);
        $user= $req->fetch();
   
              if ($user) {
                  $expected = $user_id . "==" . $user->remember_token . sha1($user->id . "azerty");
                if ($expected == $remember_token){
                    session_start();
                    $_SESSION["auth"] = $user; // si identique connexion autorisé  
                    setcookie("remember", $remember_token, time() + 60 * 60 * 24 * 7);
                } else {
                      setcookie("remember", NULL, -1);
                }
              }else {
                      setcookie("remember", NULL, -1);
              }
        }
          
}
                     


