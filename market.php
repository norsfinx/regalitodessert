<?php session_start();
require "inc/functions.php";
require "inc/db.php"; 

logged_only ();

?>

<?php

$req= $pdo->query("SELECT * FROM articles");
$req->setFetchMode(PDO::FETCH_ASSOC);
$articles = $req->fetchAll();

?>

<?php require "inc/header.php"; ?>

 <h2 class="m-3">Bonjour <?= $_SESSION["auth"]->user_name; ?> </h2>

  <?php if($_SESSION["auth"]->user_admin == 1 ) { ?><!--condition permettant d'affiché le lien Back Office à l'admin only -->
        <a href="/infinityregalito/admin/index.php" class="color-link hover m-5 link-js">B.O</a>
        <?php } ?>

 <a class="color-link hover m-3" href="account.php"> mon compte</a>
 

<h1 class="text-center"> Market </h1>

</div>
<div class="market">
<section class="jumbotron text-center">
    <div class="container">
        <h1 class="jumbotron-heading">Regalito-Dessert</h1>
     </div>
</section>

<div class="container">

    <div class="row">
        <div class="col-12">
            <div class="d-flex flex-row">
        <form action="session.php" method="POST">
             <div class="row">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col"> </th>
                            <th scope="col">Tiramisu</th>
                            <th scope="col">Disponibilité</th>
                            <th scope="col" class="text-center">Quantité</th>
                            <th scope="col" class="text-right">Prix</th>
                            <th> </th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($articles as $article) { ?>
                        
                        <tr>
                            <td> <img class="" src="../infinityregalito/admin/static/image/<?=$article["img"]?>" width="80px" height="80px" name="img" /> </td>
                            <td><?= $article["title"] ?></td>
                            <td>Disponible</td>
                            <td><input class="form-control text-dark" type="number" id="quantité" name="quantité"></td>
                            <td><?=$article["price"]?>€</td>
                            <td class="text-right"><a href="deleteLine.php"><button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> </button></a> </td>
                        </tr>
    
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        
        </div>
        <div class="col mb-2">
            <div class="row">
                <div class="col-sm-12  col-md-6">
                    <button class="btn btn-block btn-light">Continue Shopping</button>
                </div>
                <div class="col-sm-12 col-md-6 text-right">
                <button type="submit" value="acheter" class="btn btn-lg btn-block btn-success text-uppercase">Validez</button>
                </div>
            </div>
        </div>
        </form>
    </div>
</div>
</div>

<?php require "inc/footer.php"; ?>