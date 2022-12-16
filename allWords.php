<?php
session_start();
require_once "config.php";
require_once "db_conn.php";
$connection = databaseConnect();
if(!isset($_SESSION['id'])){
    header("location: index.php");
}

$sql = "select * from words";
$res1 = mysqli_query($connection,$sql);
$res = $res1->fetch_all();
$array = [];
    $array["draw"] = 1;
    $array["recordsTotal"] = mysqli_num_rows($res1);
    $array["recordsFiltered"] = mysqli_num_rows($res1);
    $array['data'] = $res;
echo json_encode($array);