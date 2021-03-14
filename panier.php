<?php session_start();
require "inc/functions.php";
require "inc/flash.php";
require "inc/db.php"; 
require "inc/header.php";
logged_only ();

?>

<?php

$req= $pdo->query("SELECT * FROM articles");
$req->setFetchMode(PDO::FETCH_ASSOC);
$articles = $req->fetchAll();
?>

<h1 class="titre text-center">Panier</h1>


<table class="table">
    <thead>
        <tr>
            <th scope="col" class="text-dark">Produit</th>
            <th scope="col" class="text-dark">Prix Unitaire</th>
            <th scope="col" class="text-dark">Quantité</th>
            <th scope="col" class="text-dark">Total</th>
        </tr>
  </thead>

  
 <tbody>


        <tr>
            <td></td>
            <td>€</td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <th scope="row"><a class="btn text-dark" href="market.php">Retour</a></th>
            <td></td>
            <td class="text-dark">Total Panier = </td>
        </tr>
        
  </tbody>
</table>














<?php require "inc/footer.php"; ?>