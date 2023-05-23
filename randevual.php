<?php
require_once "config.php";

if(isset($_POST["id"])&& isset($_POST["date"])&&isset($_POST["time"])){

    $form_username = $_SESSION["username"];
    $form_id = $_POST["id"];
    $form_date=date('Y-m-d', strtotime($_POST["date"]));
    $form_time=$_POST["time"];


    $kuafor=mysqli_query($db,"SELECT* FROM kuafor WHERE id='$form_id' ");

    $musteri=mysqli_query($db,"SELECT* FROM musteri WHERE username='$form_username' ");

    $num1= mysqli_num_rows($kuafor);
    $num2= mysqli_num_rows($musteri);
    if($num1==0||$num2==0){
        echo "Kuafor veya Müşteri Bulunamadı"."<br>";
        echo "Ana Sayfaya Geri Dönmek İçin <a href='home.html'>Tıklayınız </a>";
    }
    else if($num1==1){
        echo "Başarılı"."<br>";
        $kuaforbilgi= mysqli_fetch_assoc($kuafor);
        $musteribilgi= mysqli_fetch_assoc($musteri);
        mysqli_query($db, "INSERT INTO `randevu` (`musteri`, `kuafor`, `date`,`time`) VALUES ('".$musteribilgi['username']."', '".$kuaforbilgi['ad-soyad']."', '". $form_date."', '".$form_time."')");
        echo "Randevunuz Oluşturuldu"."<br>";
        echo "Ana Sayfaya Geri Dönmek İçin <a href='home.html'>Tıklayınız </a>";
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

        .giris h2 {
            text-align: center;
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
    <form action="randevual.php" method="POST">
        <h2>Giriş Yapmak İçin Bilgilerinizi Giriniz</h2>
        <hr> <br>
        <label for="Id">Randevu Almak İstediğiniz <a href="calisanlar.php">Kuaförün</a> ID'si : <input type="text" name="id"><br>
        <label for="Date">Tarih : <input type="date" name="date"><br>
        <label for="Time">Saat : <input type="time" name="time"><br>
        <button type="submit">Randevu Al</button>
    </form>
</div>
<div class="h4">
        <h4>Ana Sayfaya Dönmek İçin <a href="home.html">TIKLAYNIZ</a></h4>
</div>