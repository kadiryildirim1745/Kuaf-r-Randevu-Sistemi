<?php
require_once "config.php";

if(isset($_POST["username"])){

    $form_usernname = $_POST["username"];
    $form_password = $_POST["password"];

    $form_password_hash=hash("sha256",$form_password);

    $giris=mysqli_query($db,"SELECT* FROM musteri WHERE username='$form_usernname' AND sifre='$form_password_hash' ");
    $num= mysqli_num_rows($giris);
    $kullanici= mysqli_fetch_assoc($giris);
    $kontrol = false;

    foreach ($admins as $adm_name => $adm_pass ){
        if ($adm_name == $form_usernname){
            if ($adm_pass == $form_password){
                // girildi
                $kontrol=true;
            }

        }
    }
    if ($kontrol==true){
        $_SESSION["admingirdi"]= "1";
        $_SESSION["username"]="$form_usernname";
        $_SESSION["password"]="$form_password";
        echo "Admin Olarak Giriş Yapıldı"."<br>";
        echo "Hoş Geldiniz, Sn. ".$kullanici["ad-soyad"]."<br>";
        echo "Ana Sayfaya Gitmek İçin <a href='home.html'>Tıklayınız</a>";
        exit;
    }

    if($num==0){
        echo "Kullanıcı Bulunamadı";
    }
    else if($num==1){
        $_SESSION["admingirdi"]= "0";
        $_SESSION["username"]="$form_usernname";
        $_SESSION["password"]="$form_password";
        echo "Hoş Geldiniz, Sn. ".$kullanici["ad-soyad"]."<br>";
        echo "Ana Sayfaya Gitmek İçin <a href='home.html'>Tıklayınız</a>";
        exit;
    }

    

}
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
<head>
    <meta charset="UTF-8">
    <title>Kuaför</title>
</head>

<div class="giris">
    <form action="login.php" method="POST">
        <h2>Giriş Yapmak İçin Bilgilerinizi Giriniz</h2>
        <hr> <br>
        <label for="username">Kullanıcı Adı : <input type="text" name="username"><br>
        <label for="password">Şifre : <input type="password" name="password"><br>
        <button type="submit">Giriş Yap</button>
    </form>
    <h2>Üye Değilseniz Üye Olmak İçin <a href="index.php">Tıklayınız</a></h2>
</div>