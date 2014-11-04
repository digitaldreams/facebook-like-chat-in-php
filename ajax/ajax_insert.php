<?php
session_start();
require_once '../class/dbconnect.php';
require_once '../class/database.php';
$database=new database($db);
$twit=$_POST['twit'];
$database->insertMessage($_SESSION['user'],$twit)

?>