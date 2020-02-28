<?php
require_once("config.php");
session_start();
@ob_start();

$idf = 6;
$gas="SELECT * FROM fenomena WHERE id_fenomena ='$idf'";
$stmt = $db->prepare($gas);
$stmt->execute();
$datafe=$stmt->fetch(PDO::FETCH_ASSOC);

$idu=$_SESSION['user_id'];
$sql="SELECT * FROM users WHERE no_identitas =:no_identitas";
$stmt = $db->prepare($sql);
$params = array(
    ":no_identitas" => $idu
);
$stmt->execute($params);
$datu=$stmt->fetch(PDO::FETCH_ASSOC);

$tgl = date("Y-m-d");

if (isset($_POST['submited'])){
    $relawan = $datu['no_identitas'];
    $fenomena = $datafe['id_fenomena'];
    $status = 'Belum Valid';
    $sql1 = "INSERT INTO volunteer (tgl_join, user, fenomena, status)
            VALUES (:tgl_join, :user, :fenomena, :status)";
    $sql2 = "UPDATE fenomena SET n_relawan = n_relawan - 1 WHERE id_fenomena = '$idf'";
    $stmt1 = $db->prepare($sql1);
    $stmt2 = $db->prepare($sql2);
    $params = array(
        ":tgl_join" => $tgl, 
        ":user" => $relawan, 
        ":fenomena" => $fenomena, 
        ":status" => $status 
    );
    //eksekusi query untuk menyimpan ke database
    $stmt2->execute();
    $saved = $stmt1->execute($params);
    if($saved) {
        echo "<script> alert('Berhasil Daftar');</script>";
        header("Location: index.php");
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Home | Volunteerku</title>
        <link rel="stylesheet" href="css/jadivolunteer.css">
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
                <div class="content">
                    <div class="card">
                        <img src="img/<?php echo "$datafe[gambar]";?>" alt="Avatar">
                        <div class="judul">
                            <b><h1><?php echo "$datafe[judul]";?></h1></b>
                        </div>
                        <table class="detail">
                            <tr>
                                <td>Kategori</td>
                                <td>:</td>
                                <td><?php echo "$datafe[kategori]";?></td>
                            </tr>
                            <tr>
                                <td>Dimulai pada</td>
                                <td>:</td>
                                <td><?php echo "$datafe[waktu_mulai]";?></td>
                            </tr>
                            <tr>
                                <td>Berakhir pada</td>
                                <td>:</td>
                                <td><?php echo "$datafe[waktu_selesai]";?></td>
                            </tr>
                            <tr>
                                <td>Kota penempatan</td>
                                <td>:</td>
                                <td><?php echo "$datafe[kota]";?></td>
                            </tr>
                            <tr>
                                <td>Jumlah relawan yang dibutuhkan</td>
                                <td>:</td>
                                <td><?php echo "$datafe[n_relawan]";?> Orang</td>
                            </tr>
                        </table>
                        <div class="keterangan">
                            <h3><?php echo "$datafe[keterangan]";?></h3>
                        </div>
                        <form method="POST" action="#"><input class="button2" type="submit" name="submited" value="BE A VOLUNTEER"></form>
                    </div>
                </div>
            </div>
        </body>
        <!-- <script type="text/javascript" src="js/index.js"></script> -->
    <footer>
        <marquee>&copy Copy right by shabri dkk</marquee>
    </footer>
</html>
