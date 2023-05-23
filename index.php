<?php

require_once "config.php";

if (isset($_POST["username"]))
{
    $form_username = $_POST["username"];
    $form_password = $_POST["password"];
    $form_telno = $_POST["tel-no"];
    $form_adsoyad=$_POST["ad-soyad"];


    $form_password_hash = hash("sha256", $form_password);


    $kayit = mysqli_query($db, "INSERT INTO `musteri` (`username`, `sifre`, `tel-no`,`ad-soyad`) VALUES ('".$form_username."', '".$form_password_hash."', '".$form_telno."', '".$form_adsoyad."')");

    if(mysqli_errno($db) != 0)
    {
        echo "Bir hata meydana geldi!";
        exit;
    }

    echo "Kullanıcı kaydınız başarılı!<br>";
    echo "Giriş yapmak için <a href='login.php'>tıklayınız</a>";


}
else
{
?>
<style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f5f5f5;
        }

        .giris {
            width: 300px;
            padding: 20px;
            background-color: #f1f1f1;
            border-radius: 5px;
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

        .giris p {
            margin-top: 15px;
            text-align: center;
            font-size: 20px;
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
        .giris a:hover{
            background-color: #4CAF50;
            color:#f1f1f1;
        }

        .giris button:hover {
            background-color: #45a049;
        }
    </style>
<head>
    <meta charset="UTF-8">
    <title>Kuaför</title>
</head>
<div class="giris">
    <form action="index.php" method="POST">
        <h2>Üye Olmak İçin Bilgilerinizi Giriniz</h2>
        <hr> <br>
        <label for="ad-soyad">Kullanıcı Ad-Soyad:</label> <input type="text" name="ad-soyad"><br>
        <label for="username">Username:</label> <input type="text" name="username"><br>
        <label for="password">Şifre:</label> <input type="password" name="password"><br>        
        <label for="tel-no">Telefon-No:</label> <input type="text" name="tel-no"><br>
        <p>Eğer Üyeliğiniz varsa Giriş Yapmak İçin <a href="login.php">Tıklayınız</a></p>
        <button type="submit">Kayıt Ol!</button>
    <form>
</div>
<?php
}
?>