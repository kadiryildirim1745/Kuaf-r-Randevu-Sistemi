<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
        .h4{
            width: 100%;
            font-size: 23px;
            background-color:darkcyan;
            color: #f1f1f1;
            text-align: center;

        }
        .container {
            height: 21%;
            width: 100%;
            text-align: center;
            display: flex;
            justify-content: center;
            background-color: #f1f1f1;
        }
        .resim {
            position: relative;
            display: inline-block;
            width: 400px;
            height: 150px;
        }
        .resim img{
            width: 150px;
            height: 150px;
        }

        a:hover{
            background-color:darkcyan;
            color: #f1f1f1;
        }


    </style>
</head>
<body>
    <div class="h4">
        <h4>ÇALIŞANLARIMIZ</h4>
    </div>
    <div class="container">
        <div class="resim">
            <img src="images/1.png" alt="Emre Kaplan" >
        </div>
        <br>
        <div class="bilgi">
            <?php
                require_once "config.php";
                $giris=mysqli_query($db,"SELECT* FROM kuafor WHERE id=1");
                $kullanici= mysqli_fetch_assoc($giris);
                echo "<br>".$kullanici["ad-soyad"]."<br>";
                echo "ID: ".$kullanici["id"]."<br>";
                echo "Yaş: ".$kullanici["yas"]."<br>";
                echo "Ücreti: ".$kullanici["ucret"]."<br>";
            ?>
        </div>
    </div>

    <div class="container">
        <div class="resim">
            <img src="images/2.png" alt="Mustafa Bozok" >
        </div>
        <br>
        <div class="bilgi">
            <?php
                require_once "config.php";
                $giris=mysqli_query($db,"SELECT* FROM kuafor WHERE id=2");
                $kullanici= mysqli_fetch_assoc($giris);
                echo "<br>".$kullanici["ad-soyad"]."<br>";
                echo "ID: ".$kullanici["id"]."<br>";
                echo "Yaş: ".$kullanici["yas"]."<br>";
                echo "Ücreti: ".$kullanici["ucret"]."<br>";
            ?>
        </div>
    </div>

    <div class="container">
        <div class="resim">
            <img src="images/3.png" alt="Anıl Taş" >
        </div>
        <br>
        <div class="bilgi">
            <?php
                require_once "config.php";
                $giris=mysqli_query($db,"SELECT* FROM kuafor WHERE id=3");
                $kullanici= mysqli_fetch_assoc($giris);
                echo "<br>".$kullanici["ad-soyad"]."<br>";
                echo "ID: ".$kullanici["id"]."<br>";
                echo "Yaş: ".$kullanici["yas"]."<br>";
                echo "Ücreti: ".$kullanici["ucret"]."<br>";
            ?>
        </div>
    </div>
    
    <div class="container">
        <div class="resim">
            <img src="images/4.png" alt="Hasan Akay" >
        </div>
        <br>
        <div class="bilgi">
            <?php
                require_once "config.php";
                $giris=mysqli_query($db,"SELECT* FROM kuafor WHERE id=4");
                $kullanici= mysqli_fetch_assoc($giris);
                echo "<br>".$kullanici["ad-soyad"]."<br>";
                echo "ID: ".$kullanici["id"]."<br>";
                echo "Yaş: ".$kullanici["yas"]."<br>";
                echo "Ücreti: ".$kullanici["ucret"]."<br>";
            ?>
        </div>
    </div>
    <div class="h4">
        <h4>Ana Sayfaya Dönmek İçin <a href="home.html">TIKLAYNIZ</a></h4>
    </div>
</body>
</html>