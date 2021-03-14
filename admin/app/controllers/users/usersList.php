<?php 


include ("app/app.php");
include ("app/model/usersListModel.php");
$users = allUsers();

include ("app/model/countModel.php");
$counts = allCounts();
//var_dump($counts);exit;

include("app/views/posts/usersListView.php");
