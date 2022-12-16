<?php
session_start();
require_once "config.php";
require_once "db_conn.php";
$connection = databaseConnect();
if(!isset($_SESSION['id'])){
    header("location: index.php");
    exit();
}

$connection = databaseConnect();

$id = mysqli_escape_string($connection,$_POST['Id']);

if(empty($id)){
    header("location: admin.php?p=Id je prazan");
    exit();
}

$sql = "select * from words where id = ".$id.";";
$res = mysqli_query($connection,$sql) or die(mysqli_error($connection));

if(mysqli_num_rows($res) < 1){
    header("location: admin.php?p=Nema reci pod tim id-om");
    exit();
}


$sql = "delete from words where id = ".$id.";";


if(mysqli_query($connection,$sql)){
    header("location: admin.php?p=Uspeh");
    exit();
}else{
    header("location: admin.php?p=Error");
    exit();
}