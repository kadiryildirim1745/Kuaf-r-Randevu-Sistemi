<?php
session_start();

$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "kuafor";


$db= mysqli_connect($db_host,$db_user,$db_pass,$db_name);

if(mysqli_connect_errno()){
    echo "Bağlantı kurulamadı";
    exit();
}

$admins = [
    "kadir" => "1745"

]

?>