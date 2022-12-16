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

$Eng = mysqli_escape_string($connection,$_POST['Eng']);
$Srp = mysqli_escape_string($connection,$_POST['Srp']);

if(empty($Eng)){
    header("location: admin.php?p=Eng rec je prazna");
    exit();
}
if(empty($Srp)){
    header("location: admin.php?p=Srp rec je prazna");
    exit();
}

$sql = "select Eng from words where Eng = '".$Eng."' or Srpski = '".$Srp."'";
if(!$res = mysqli_query($connection,$sql)){
    header("location: admin.php?p=Error");
    exit();
}

if(mysqli_num_rows($res) > 0){
    header("location: admin.php?p=Rec postoji");
    exit();
}


$sql = "insert into words (Eng,Srpski,Eng_len,Srpski_len) VALUES ('".$Eng."','".$Srp."','".strlen($Eng)."','".strlen($Srp)."')";


if(mysqli_query($connection,$sql)){
    header("location: admin.php?p=Uspeh");
    exit();
}else{
    header("location: admin.php?p=Error");
    exit();
}