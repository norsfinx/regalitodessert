<?php 

function allCounts()
{
    global $pdo;
    try {
      $query=  "SELECT count(*) AS postsCount,
                        (SELECT count(*) FROM articles) AS articlesCount,
                        /*(SELECT count(*) FROM blog_categories) AS categoriesCount,    */
                        (SELECT count(*) FROM users) AS usersCount
                FROM articles";
                        
        $req = $pdo->query($query);
        $req->setFetchMode(PDO::FETCH_ASSOC);
        $data = $req->fetch();
        $req->closeCursor();
        return $data;

    } catch (Exception $e) {
        die("Erreur MySQL : " . utf8_encode($e->getMessage()));
    }
}