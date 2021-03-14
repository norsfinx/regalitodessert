<?php

function userLogin($login, $password) {

    global $pdo;
    try {
         $query = "SELECT *
                   FROM users
                   WHERE user_name= :login 
                        AND user_password= :password
                        AND user_admin= 1";

        //echo $query; exit;
        $password=hash("sha256", $_POST["user_password"]);
        
        $req = $pdo->prepare($query);
        $req->bindValue(":login", $login, PDO:: PARAM_STR);
        $req->bindValue(":password", $password, PDO:: PARAM_STR);
        $req-> execute();
        $req->setFetchMode(PDO::FETCH_ASSOC);
        $user = $req->fetch();
        //var_dump($password);
        //die();
        $req->closeCursor();
        return $user;

        

    } catch (Exception $e) {
        die("Erreur MySQL : " . utf8_encode($e->getMessage()));
    }
}

function userDelete($id)
{
    global $pdo;
    try {
        $query="DELETE FROM users
                       WHERE ID = " .$id  ;
                        
        //die($query);
        $req =$pdo -> exec ($query);

        return true;
    }catch (Exception $e){
        return false;
    
    }
}

