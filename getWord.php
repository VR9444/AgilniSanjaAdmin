<?php

require_once "config.php";
require_once "db_conn.php";


$connection = databaseConnect();


$min = mysqli_real_escape_string($connection,$_GET["min"]);
$max = mysqli_real_escape_string($connection,$_GET["max"]);


$sql = "SELECT * from words where Eng_len >= ".$min." and Eng_len <=".$max.";";

$res = mysqli_query($connection, $sql);

if (mysqli_num_rows($res) > 0) {
    $res = $res->fetch_all(MYSQLI_ASSOC);
    $rand = mt_rand(0,count($res)-1);
    $array = [];
    $array['data'] = $res[$rand];
    $array['success'] = true;
    echo json_encode($array);
} else {
    $array['success'] = false;
    echo json_encode($array);
}