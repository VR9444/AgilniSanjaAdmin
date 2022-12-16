<?php
require_once "config.php";
require_once "db_conn.php";


$connection = databaseConnect();

$sql = "SELECT * from ranking order by score DESC limit 20";

$res = mysqli_query($connection,$sql);

if(mysqli_num_rows($res) > 0){
    $res = $res->fetch_all(MYSQLI_ASSOC);
    echo json_encode($res);
}else{
    echo "fail";
}