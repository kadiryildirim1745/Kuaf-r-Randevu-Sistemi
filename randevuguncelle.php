<?php
require_once "config.php";

if(isset($_POST["id"])&& isset($_POST["date"]) && isset($_POST["time"])){

    $form_id = $_POST["id"];
    $form_username = $_SESSION["username"];
    $form_date=date('Y-m-d', strtotime($_POST["date"]));
    $form_time=$_POST["time"];

    

    mysqli_query($db,"UPDATE randevu SET date='". $form_date."' , time='". $form_time."' WHERE musteri='$form_username' AND id='$form_id' ");
    
    $randevu=mysqli_query($db,"SELECT* FROM randevu WHERE musteri='$form_username' AND date='$form_date' ");
    $num= mysqli_num_rows($randevu);
    if($num==0){
        echo "Randevu Bulunamadı";
    }
    else if($num==1){
        $info= mysqli_fetch_assoc($randevu);
        echo "Hoş Geldiniz, Sn. ".$info["musteri"]."<br>";
        echo "Randevunuz Güncellendi"."<br>";
        echo "Yeni Randevu Bilgileriniz"."<br>";
        echo "Kuaförünüz Sn. ".$info["kuafor"]."<br>";
        echo "Randevu ID'si ".$info["id"]."<br>";
        echo "Randevu Tarihi: ".$info["date"]."<br>";
        echo "Randevu Saati: ".$info["time"]."<br>";
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
    <form action="randevuguncelle.php" method="POST">
        <h2>Randevuyu Görmek İçin Bilgilerinizi Giriniz</h2>
        <hr> <br>
        <label for="id"> <a href="randevugor.php">Randevu</a> ID'si : <input type="text" name="id"><br>
        <label for="Date">Yeni Tarih : <input type="date" name="date"><br>
        <label for="Time">Yeni Saat : <input type="time" name="time"><br>
        <button type="submit">Giriş Yap</button>
    </form>
</div>
<div class="h4">
        <h4>Ana Sayfaya Dönmek İçin <a href="home.html">TIKLAYNIZ</a></h4>
</div>