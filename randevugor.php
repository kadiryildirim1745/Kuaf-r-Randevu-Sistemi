<?php
require_once "config.php";

if(isset($_SESSION["username"]) && isset($_POST["password"])){

    $form_mname = $_SESSION["username"];
    $form_password = $_POST["password"];

    $form_password_hash=hash("sha256",$form_password);

    $sifre=mysqli_query($db,"SELECT* FROM musteri WHERE sifre='$form_password_hash' and username='$form_mname' ");
    $num2= mysqli_num_rows($sifre);

    $randevu=mysqli_query($db,"SELECT* FROM randevu WHERE musteri='$form_mname'");
    $num= mysqli_num_rows($randevu);
    if($num==0||$num2==0){
        echo "Randevu Bulunamadı";
    }
    else if(($num==1 ||$num2 || $num3 )&&$num2==1){
        while($gelen=mysqli_fetch_array($randevu)){
            echo "Hoş Geldiniz Sn. ".$gelen["musteri"]."<br>";
            echo "Kuaförünüz Sn. ".$gelen["kuafor"]."<br>";
            echo "Randevu ID'si ".$gelen["id"]."<br>";
            echo "Randevu Tarihi: ".$gelen["date"]."<br>";
            echo "Randevu Saati: ".$gelen["time"]."<br>"."<br>";
        }
        echo "Ana Sayfaya Gitmek İçin <a href='home.html'>Tıklayınız</a>";
        exit;
    }

}
?>

<style>
    html, body {
            height: 100%;
            margin: 0;
            padding: 0;
    }

    body {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }

    .giris {
        width: 300px;
        padding: 20px;
        background-color: #f1f1f1;
        border-radius: 5px;
    }

    .h4 {
        width: 100%;
        font-size: 23px;
        color:black;
        text-align: center;
        margin-top: 10px;
        padding: 10px;
    }

    .giris label {
        display: block;
        margin-bottom: 5px;
    }

    .giris input {
        width: 100%;
        padding: 8px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    .giris button {
        width: 100%;
        padding: 10px;
        background-color: #4CAF50;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    .giris button:hover {
        background-color: #45a049;
    }
</style>


<div class="giris">
    <form action="randevugor.php" method="POST">
        <h2>Randevunuzu Görmek İçin Tıklayınız</h2>
        <label for="password">Şifreniz : <input type="password" name="password"><br>
        <hr> <br>
        <button type="submit">Giriş Yap</button>
    </form>
</div>
<div class="giris">
    <form action="admingiris.php" method="POST">
        <h2>Admin Girişi Yapmak İçin Tıklayınız</h2>
        <hr> <br>

        <button type="submit">Giriş Yap</button>
    </form>
</div>
<div class="h4">
        <h4>Ana Sayfaya Dönmek İçin <a href="home.html">TIKLAYNIZ</a></h4>
</div>