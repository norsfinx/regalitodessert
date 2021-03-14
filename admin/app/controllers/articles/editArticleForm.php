<?php
include("app/model/articleModel.php");

$article= getPostById($_GET["id"]);

include("app/model/categoryModel.php");

$categories = allCategories();


include("app/views/posts/editArticleViews.php");



