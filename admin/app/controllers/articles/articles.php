<?php 

include("app/app.php");

include("app/model/articleModel.php");

$articles = allPosts();

include("app/model/categoryModel.php");

$categories = allCategories();


include("app/views/posts/articlesView.php");


