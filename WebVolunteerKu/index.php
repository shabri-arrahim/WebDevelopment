<?php
require_once("config.php");
session_start();
@ob_start();

$gas="SELECT * FROM fenomena ORDER BY id_fenomena DESC LIMIT 3";
$stmt = $db->prepare($gas);
$stmt->execute();
$data=$stmt->fetch(PDO::FETCH_ASSOC)
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Home | Volunteerku</title>
        <link rel="stylesheet" href="css\style.css">
        <link rel="shortcut icon" href="img/logoMin.png">
    </head>
        <body>
            <div class="container">
                <div class="header" id="header">
                    <img src="img/logo2.png" alt="logo">
                    <div class="menu">
                        <div id="akun">
                            <a href=""><?php include 'head.php';?></a>
                        </div>
                        <ul>
                            <b><li><a href="index.php">HOME</a></li></b>
                            <b><li><a href="#">WHAT WE DO</a></li></b>
                            <b><li><a href="#">ABOUT US </a></li></b>
                            <!-- <b><li><a href="#">SPONSORSHIP </a></li></b> -->
                            <b><li><a href="#">CONTACT US </a></li></b>
                        </ul>
                    </div>
                </div>
                <div class="cover">
                    <div class="text">
                        <h1>
                            BERSAMA <br><br> MEMBANGUN <br><br> BANGSA
                        </h1>
                    </div>
                    <form action="#"><input class="button2" type="button" value="BE A VOLUNTEER"></form>
                    <form action="#"><input class="button3" type="button" value="MAKE A DONATION"></form>
                </div>
                <div class="content">
                        <h2>
                            Bangun Karir Volunteermu
                        </h2>
                        <div class="card">
                            <img src="img/<?php echo "$data[gambar]";?>" alt="Avatar">
                            <div class="container">
                                <h4><b><a href="jadivolunteer.php">CONTRIBUTE</a></b></h4>
                            </div>
                        </div>
                        <div class="card">
                            <img src="img/jihad.jpg" alt="Avatar">
                            <div class="container">
                                <h4><b>CONTRIBUTE</b></h4>
                            </div>
                        </div>
                        <div class="card">
                            <img src="img/palu.jpeg" alt="Avatar">
                            <div class="container">
                                <h4><b>CONTRIBUTE</b></h4>
                            </div>
                        </div>
                </div>
            </div>
        </body>
        <!-- <script type="text/javascript" src="js/index.js"></script> -->
    <footer>
        <marquee>&copy Copy right by shabri dkk</marquee>
    </footer>
</html>
