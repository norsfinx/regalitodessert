<?php

//chargement du core de l'architecture
include_once("app/app.php");



// appel du controleur de module demandé
if (!isset($_GET["module"]))  {
    $module = DEFAULT_MODULE;
} else {
    $module = $_GET["module"];
}

if (!isset($_GET["action"]))  {
    $action = DEFAULT_ACTION;
} else {
    $action = $_GET["action"];
}

//echo "Module = " . $module . "<br>";
//echo "Action = " . $action . "<br>";
/*
if ($module == "posts") {
    if ($action == "index") {
        include_once("../app/controller/posts/index.php");
    } else if ($action == "single") {
        include_once("../app/controller/posts/single.php");
    } else {
        include_once("../app/view/404.php");
    }

} 
*/

$file = "app/controllers/" . $module . "/" . $action . ".php";  

if (file_exists($file)) {
    include($file);
   
} else {
    include_once("app/404.php");
}















