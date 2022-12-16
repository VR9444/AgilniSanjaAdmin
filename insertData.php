<?php
require_once "config.php";
require_once "db_conn.php";

$score = $_GET['score'];
$nickname = $_GET['nickname'];
$time = $_GET['time'];
$wordCount = $_GET['wordCount'];

$sql = "insert into ranking (score,nickame,time,wordCount) VALUES (".$score.",'".$nickname."','".$time."','".$wordCount."')";


$connection = databaseConnect();
if(mysqli_query($connection,$sql)){
    $data = [
        "response"=>"success"
    ];
    echo json_encode($data);
}else{
    $data = [
        "response"=>"fail"
    ];
    return json_encode($data);
}