<?php 
include("core/db.php"); 

function allCategories()
{
    global $pdo;
    try {
        $query = "SELECT *  
                  FROM categorie
                ORDER BY name ASC";

        $req = $pdo->query($query);
        $req->setFetchMode(PDO::FETCH_ASSOC);
        $data = $req->fetchAll();
        $req->closeCursor();
        return $data;

    } catch (Exception $e) {
        die("Erreur MySQL : " . utf8_encode($e->getMessage()));
    }
}

function getCategoryNameById($id) {

 global $pdo;
    try {
        $query = "SELECT 'name'
                  FROM categorie
                  WHERE id=$id";
               

        $req = $pdo->query($query);
        $req->setFetchMode(PDO::FETCH_ASSOC);
        $data = $req->fetch();
        $req->closeCursor();
        return $data;

    } catch (Exception $e) {
        die("Erreur MySQL : " . utf8_encode($e->getMessage()));
    }
}