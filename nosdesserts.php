<?php require "inc/db.php"; ?>

<?php

$req= $pdo->query("SELECT * FROM articles WHERE category_id= 3");
$req->setFetchMode(PDO::FETCH_ASSOC);
$articles = $req->fetchAll();

?>

<?php include("inc/header.php"); ?>

            <h2 class="title">Desserts frais</h2>

                <div class="flex-container"> 
                    <?php foreach ($articles as $article) { ?>
                        <div class="flip-card card-param">
                            <div class="flip-card-inner">
                                <div class="flip-card-front ">
                                    <img class="" src="../infinityregalito/admin/static/image/<?= $article["img"] ?>" width="200px" height="200px" alt="">
                                </div>
                                <div class="flip-card-back">
                                    <h2><?= $article["title"] ?></h2> 
                                    <p><?= $article["descr"] ?></p> 
                                    <p></p>
                                </div>
                            </div> 
                        </div>
                    <?php } ?>
                </div>
                
            <?php

$req= $pdo->query("SELECT * FROM articles WHERE category_id= 4");
$req->setFetchMode(PDO::FETCH_ASSOC);
$articles = $req->fetchAll();

?>

            <h2 class="title">Desserts surgelé</h2>

                        <div class="flex-container"> 
                            <?php foreach ($articles as $article) { ?>
                                <div class="flip-card card-param">
                                    <div class="flip-card-inner">
                                        <div class="flip-card-front ">
                                            <img class="" src="../infinityregalito/admin/static/image/<?= $article["img"] ?>" width="200px" height="200px" alt="">
                                        </div>
                                        <div class="flip-card-back">
                                            <h2><?= $article["title"] ?></h2> 
                                            <p><?= $article["descr"] ?></p> 
                                        </div>
                                     </div> 
                                </div>
                            <?php } ?>
                        </div>


<?php include("inc/footer.php"); ?>
