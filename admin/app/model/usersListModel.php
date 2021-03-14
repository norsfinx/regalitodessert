<?php

function allUsers()
{
    global $pdo;
    try {
      $query=  "SELECT * 
                FROM `users` 
                ORDER BY `id` ASC";

        $req = $pdo->query($query);
        $req->setFetchMode(PDO::FETCH_ASSOC);
        $data = $req->fetchAll();
        $req->closeCursor();
        return $data;

    } catch (Exception $e) {
        die("Erreur MySQL : " . utf8_encode($e->getMessage()));
    }
}