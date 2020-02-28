<?php
require_once("config.php");

if (isset($_POST['submited'])){
    $judul = $_POST['judul'];
    $kategori = $_POST['kategori_fenomena'];
    $waktu_mulai = $_POST['post_start'];
    $n_relawan = $_POST['jumlah_relawan'];
    $kota = $_POST['kabupaten_kota'];
    $prov = $_POST['provinsi'];
    $waktu_selesai = $_POST['post_end'];
    $keterangan = $_POST['deskripsi'];

    if(isset($_FILES['image'])){
        $gambar = $_FILES['image']['name'];
        $ekstensi_boleh = array('png', 'jpg', 'jpeg', 'JPG', 'JPEG');
        $x = explode('.', $gambar);
        $ekstensi = strtolower(end($x));
        $file_tmp = $_FILES['image']['tmp_name'];
        $file_baru = "fenomena_".rand(100,1000).".".$ekstensi;

        if(in_array($ekstensi, $ekstensi_boleh) === true){
            move_uploaded_file($file_tmp, 'img/'.$file_baru);
            $sql = "INSERT INTO fenomena (judul, kategori, waktu_mulai, n_relawan, kota, prov, gambar, waktu_selesai, keterangan)
            VALUES (:judul, :kategori, :waktu_mulai, :n_relawan, :kota, :prov, :file_baru, :waktu_selesai, :keterangan)";
            $stmt = $db->prepare($sql);
            $params = array(
                ":judul" => $judul, 
                ":kategori" => $kategori, 
                ":waktu_mulai" => $waktu_mulai, 
                ":n_relawan" => $n_relawan, 
                ":kota" => $kota,
                ":prov" => $prov,
                ":file_baru" => $file_baru,
                ":waktu_selesai" => $waktu_selesai,
                ":keterangan" => $keterangan
            );
        
            //eksekusi query untuk menyimpan ke database
            $saved = $stmt->execute($params);
            if($saved) header("Location: admin.php");

        }else{
            echo "<script> alert('Ekstensi tidak diperbolehkan');</script>";    
        }
    }else{
        echo "<script> alert('File tidak ada');</script>";
    }
}
?>
<!DOCTYPE html>
<html>
     <head>
        <title>Input Fenomena | Volunteerku</title>
        <link rel="stylesheet" href="css/inputFenomena.css">
        <link rel="shortcut icon" href="img/logoMin.png">
     </head>
     <body>
         <div class="container">
             <div class="logo">
                <a href="admin.php"><img src="img/logo2.png" alt="VolunterkuLogo"></a>
             </div>
             <h1 class="page-heading">
                <span class="page-heading-title2">Input Fenomena</span>
            </h1>
            <form method="POST" enctype="multipart/form-data" action="">
                <div class="content">
                    <div class="judul">
                        <input type="text" placeholder="Judul Fenomena" class="form-control" name="judul" required > 
                    </div>
                    <div class="content_1">
                        <div class="kategori">
                            <label for="Kategori">Kategori Fenomena</label>
                            <select name="kategori_fenomena" aria-placeholder="Kategori Fenomena" class="form-control" >
                                <option value="">-- Pilih Kategori Fenomena --</option>
                                <option value="Event">Event</option>
                                <option value="Bencana">Bencana</option>
                            </select>
                        </div>
                        <div class="start_date">
                            <label for="start">Waktu Posting</label>
                            <input type="date" class="form-control" id="start" name="post_start" required>
                        </div>
                        <!-- <div class="kebutuhan">
                            <label for="kebutuhan">Kebutuhan</label>
                            <input type="checkbox" name="c_kebutuhan[]" value="Ya">
                            <label for="relawan">Relawan</label>
                            <input type="checkbox" name="c_kebutuhan[]" value="Ya">
                            <label for="donasi">Donasi</label>
                        </div> -->
                        <div class="general">
                             <input type="text" placeholder="Jumlah relawan" class="form-control" name="jumlah_relawan" required>
                             <!-- <input type="text" placeholder="Jumlah donasi" class="form-control" name="jumlah_donasi" required> -->
                        </div>
                        <div class="deskripsi">
                            <textarea type="text" placeholder="Tuliskan deskripsi, pesan atau keterangan terkait fenomena yang ingin anda posting" class="form-control" name="deskripsi" required></textarea>
                        </div>
                    </div>
                    <div class="content_2">
                        <div class="kabupatenkotaprofince">
                            <input type="text" placeholder="Kabupaten/Kota" class="form-control" name="kabupaten_kota" id=kab required>
                            <input type="text" placeholder="Provinsi" class="form-control" name="provinsi" id=prov required>
                        </div>
                        <div class="end_date">
                            <label for="end">Sampai</label>
                            <input type="date" class="form-control" id="end" name="post_end" required>
                        </div>
                        <div class="unggah_file_pendukung">
                            Unggah File Pendukung: <input type="file" placeholder="File Gambar/Video" class="form-control" name="image" required>
                            <div class="tos">
                                <input type="checkbox" name="term" required>
                                <label for="tm">Saya bersedia menerima sanksi dan hukuman
                                    apabila informasi yang saya posting tidak benar adanya
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="navigasi">
                        <div class="snk">
                            <input type="checkbox" name="sk" required>
                            <label for="sNk">Saya telah paham dengan <a href="">syarat dan ketentuan</a> yang berlaku</label>
                        </div>
                        <button class="button" type="submit" name="submited">Suarakan!!</button>
                    </div>
                </div>
            </form>
         </div>
     </body>
</html>