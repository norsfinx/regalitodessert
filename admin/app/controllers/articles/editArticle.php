<?php
include("app/app.php");
include("app/model/articleModel.php");

//var_dump($_FILES);

if (!empty($_FILES["new_img"]["name"])) {

    $filename = substr(md5(uniqid(rand())), 0, 16);

    $ext = array ('jpg', 'jpeg');

    $ext_upload = strtolower(substr(strrchr($_FILES["new_img"]["name"], '.'), 1));

    $url = "static/image/" . $filename . "." . $ext_upload;

    $sizes = getimagesize($_FILES["new_img"]["tmp_name"]);
    //var_dump($sizes);

    if (in_array($ext_upload, $ext)) {
        if (move_uploaded_file($_FILES["new_img"]["tmp_name"], $url)) {

            $image = ImageCreateFromJPEG($url);
            $width = imagesx($image);
            $height = imagesy($image);
            $ratio = $width / $height;
            
            if ($width > $height) {
            $new_width = 500;
            $new_height = ceil($new_width / $ratio);
            
            } else {
            $new_height = 375;
            $new_width = ceil($new_height * $ratio);
            }
            //echo "w=" . $width . " - h=". $height . " - ratio=" . $ratio . " - newW=" . $new_width . " - newH=" . $new_height; exit;
            $thumb = imagecreatetruecolor($new_width, $new_height);
            //var_dump($thumb);exit;
            imagecopyresized($thumb, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
            ImageJPEG($thumb, $url);
            imagedestroy($image);

            
            $_POST["img"] = $filename . "." . $ext_upload;

        }  
        
    }
    
}
//var_dump($_POST);
//var_dump(editArticle($_POST));
editArticle($_POST);
header("location:?module=articles&action=articles");

if (isset($_POST["id"])) {
   
    if (editArticle($_POST["id"])) {
        flash_create("Le produit a été modifié !", "success");
        header("Location:?module=articles&action=articles");
    } else {
        flash_create("Le produit n'a pas été modifié !", "danger");
        header("Location:?module=articles&action=articles");
    }
   
    }else {

    die("Bien tenté !");
}

