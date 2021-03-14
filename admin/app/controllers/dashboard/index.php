<?php 

include("app/app.php");
include("app/model/articleModel.php");

$articles = allPosts();


include ("app/model/countModel.php");
$counts = allCounts();

include("app/views/posts/indexView.php");
