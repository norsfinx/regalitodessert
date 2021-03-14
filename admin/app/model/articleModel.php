<?php 
include("core/db.php"); 


function allPosts($catId = null)
{
    global $pdo;
    try {
        $query ="SELECT * FROM articles , categorie WHERE category_id = cat_id";
        
        $req = $pdo->query($query);
        $req->setFetchMode(PDO::FETCH_ASSOC);
        $posts = $req->fetchAll();
        $req->closeCursor();
        return $posts;

    } catch (Exception $e) {
        die("Erreur MySQL : " . utf8_encode($e->getMessage()));
    }
}

function getPostById($id) {
    global $pdo;
    try {
        $query="SELECT * FROM articles
                       WHERE id = " .$id  ;
                        
        //die($query);
        $req=$pdo->query($query);
        $req->setFetchMode(PDO::FETCH_ASSOC);
        $post = $req->fetch();
        $req->closeCursor();
        return $post;

       
    }catch (Exception $e){
        return false;
    
    }
}

function articleInsert($articleData)
{
    global $pdo;
    try {
        $query = "INSERT INTO articles
                            (category_id, title, descr, img)
                    VALUES ( " .$articleData["category_id"]. ",'" . $articleData["title"] . "', '".$articleData["descr"]."', '".$articleData["img"]."')";
        //die($query);
        $req = $pdo->exec($query);

        return true;
    } catch (Exception $e) {
        return false;

    }
}

function articleDelete($id) {

    global $pdo;
    try {
        $query="DELETE FROM articles
                       WHERE id = " .$id  ;
                        
        //die($query);
        $req =$pdo->exec($query);

        return true;
    }catch (Exception $e){
        return false;
    
    }
}

function editArticle($data) {

    global $pdo;
    try {
        $query="UPDATE articles
                SET title= '".$data['title']."', descr='".$data['descr']."', category_id=".$data['category_id'].", img='".$data['img']."', price='".$data['price']."'
                WHERE articles.id= ".$data['id'];

            $req =$pdo->exec($query);

            return true;
            }catch (Exception $e){
            return false;
            
        }
    
}