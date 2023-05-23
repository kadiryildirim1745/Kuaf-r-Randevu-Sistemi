<?php
require_once "config.php";

if($_SESSION["admingirdi"]== "1"){
    $giris=mysqli_query($db,"SELECT* FROM randevu ");

    if(!$giris ){
        echo '<br>Hata:' .
        mysqli_error($db);
        }
    echo "Tüm Randevular"."<br>"."<br>"."<br>";

    while($gelen=mysqli_fetch_array($giris)){
        echo "Sn. ".$gelen["musteri"]."<br>";
        echo "Kuaförünüz Sn. ".$gelen["kuafor"]."<br>";
        echo "Randevu ID'si ".$gelen["id"]."<br>";
        echo "Randevu Tarihi: ".$gelen["date"]."<br>";
        echo "Randevu Saati: ".$gelen["time"]."<br>"."<br>";
    }
    echo "Ana Sayfaya Gitmek İçin <a href='home.html'>Tıklayınız</a>";
}
else{
    echo "Admin Değilsiniz"."<br>";
    echo "Randevu Ekranına Dönmek İçin <a href='randevugor.php'>Tıklayınız</a>"."<br>";
    echo "Ana Sayfaya Gitmek İçin <a href='home.html'>Tıklayınız</a>";
}




?>