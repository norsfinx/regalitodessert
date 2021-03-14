<?php 

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}



include_once("core/db.php");
include_once("core/flash.php");
include_once("core/config.php");
include_once("core/tool.php");




