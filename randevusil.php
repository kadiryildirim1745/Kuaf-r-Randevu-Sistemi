<?php
require_once "config.php";

if(isset($_POST["id"])){

    $form_id = $_POST["id"];
    $form_username=$_SESSION["username"];

    $randevu=mysqli_query($db,"SELECT* FROM randevu WHERE id='$form_id' AND musteri='$form_username' ");

    $num1= mysqli_num_rows($randevu);

    if($num1==0){
        echo "Randevu Bulunamadı"."<br>";
        echo "Ana Sayfaya Geri Dönmek İçin <a href='home.html'>Tıklayınız </a>";
    }
    else if($num1==1){
        mysqli_query($db,"DELETE FROM randevu WHERE id='$form_id' AND musteri='$form_username' ");
        echo "Başarılı"."<br>";
        echo "Randevu Silinmiştir...";
        echo "Ana Sayfaya Dönmek İçin <a href='home.html'>TIKLAYINIZ</a>"; 
        exit;
    }
    
    exit;
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
        .h4 {
            width: 100%;
            font-size: 23px;
            color:black;
            text-align: center;
            margin-top: 10px;
            padding: 10px;
        }

        .giris {
            width: 300px;
            padding: 20px;
            background-color: #f1f1f1;
            border-radius: 5px;
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
    <form action="randevusil.php" method="POST">
        <h2>Randevuyu Silmek İçin Bilgilerinizi Giriniz</h2>
        <hr> <br>
        <label for="id"> <a href="randevugor.php">Randevu</a> ID'si : <input type="text" name="id"><br>
        
        <button type="submit">Giriş Yap</button>
    </form>
</div>
<div class="h4">
        <h4>Ana Sayfaya Dönmek İçin <a href="home.html">TIKLAYNIZ</a></h4>
</div>