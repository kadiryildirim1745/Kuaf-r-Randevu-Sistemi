<?php
require_once "config.php";

echo "Çıkış yapıldı"."<br>";
echo "Giriş Ekranına Dönmek İçin <a href=login.php>Tıklayınız</a>";
// setcookie("admingirdi", "0", time()-60); 
$_SESSION["admingirdi"]="0";

$_SESSION["username"]="";
$_SESSION["password"]="";

session_destroy();

session_start();
session_regenerate_id();

?>