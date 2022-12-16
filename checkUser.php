<?php
session_start();
require_once "config.php";
require_once "db_conn.php";

$connection = databaseConnect();

$username = mysqli_escape_string($connection,$_POST['username']);
$password = mysqli_escape_string($connection,$_POST['password']);

$sql = "select id,password from admins where username = '".$username."';";

$res = mysqli_query($connection,$sql);

if(mysqli_num_rows($res) > 0){
    $res = $res->fetch_assoc();
    if(password_verify($password,$res['password'])){
        $_SESSION['id'] = $res['id'];
        header("Location: admin.php");
        exit();
    }else{
        header("location: index.php?p=Password not valid");
        exit();
    }
}else{
    header("location: index.php?p=Username not valid");
    exit();
}