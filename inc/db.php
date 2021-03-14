<?php

$pdo = new PDO('mysql:host=localhost;dbname=regalito_dessert',"root","root"); // connexion à la base de données

                  //   classe constante (je veux recuperer la constante qui se trouve dans la classe)// 
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // permet de recuperer les erreurs

$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ); // permet de recuperer les informations sous forme d'objet

