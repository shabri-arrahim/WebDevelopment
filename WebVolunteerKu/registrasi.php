<?php
require_once("config.php");

if(isset($_POST['no_identitas'])){
   //filter data
   $no_identitas = filter_input(INPUT_POST, 'no_identitas');
   $nama = filter_input(INPUT_POST, 'nama');
   $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
   $alamat = filter_input(INPUT_POST, 'alamat');
   $tipe_akun = filter_input(INPUT_POST, 'tipe_akun');
   //Enkripsi Password
   $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

   //menyiapkan query
    $sql = "INSERT INTO users (no_identitas, nama, email, alamat, tipe_akun, password) 
            VALUES (:no_identitas, :nama, :email, :alamat, :tipe_akun, :password)";
    $stmt = $db->prepare($sql);


    //bind parameter ke query
    $params = array(
        ":no_identitas" => $no_identitas, 
        ":nama" => $nama, 
        ":email" => $email, 
        ":alamat" => $alamat, 
        ":tipe_akun" => $tipe_akun, 
        ":password" => $password
    );

    //eksekusi query untuk menyimpan ke database
    $saved = $stmt->execute($params);

    // jika query simpan berhasil, maka user sudah terdaftar
    // maka alihkan ke halaman login
    echo "<script> alert('Registrasi Berhasil. Silahkan Login'); </script>";
    if($saved) header("Location: login.php");
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Create Your Account | Volunteerku</title>
        <link rel="stylesheet" href="css/register.css">
        <link rel="shortcut icon" href="img/logoMin.png">
    </head>
        <body>
            <div class="container" id="colums">
                <a href="index.php"><img src="img/logo2.png" alt="VolunterkuLogo"></a>
                <h2 class="page-heading">
                    <span class="page-heading-title2">Create Your Account</span>
                </h2>
                <div class="page-content">
                    <div class="row">
                        <form method = "POST" action = "#">
                            <!-- <div class="image">
                                <img src="img/regis.JPG" alt="#">
                            </div> -->
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <input type="text" placeholder="No Identitas" class = "form-control" name = "no_identitas" required>
                                </div>
                                <div class="form-group">
                                    <input type = "text" placeholder="Nama Lengkap" class="form-control" name = "nama"required>
                                </div>
                                <div class="form-group">
                                    <input type="email" placeholder="Email" class="form-control" name ="email" required>
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" placeholder="Alamat Lengkap" name="alamat"rows="1" required></textarea>
                                </div>
                                <div class="form-group">
                                    <select name="tipe_akun" aria-placeholder="Tipe Akun" class="form-control" required>
                                        <option value="">-- Pilih Tipe Akun --</option>
                                        <option value="Media">Media</option>
                                        <option value="Pengguna Biasa">Pengguna Biasa</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="Password" placeholder="Password" class="form-control" name="password" required>
                                </div>
                                <div class="navigator">
                                    <a href="login.php"><button class="button2" type="button" name="login">Sign in instead</button></a>
                                    <button class="button1" type="submit" name="register"><i class="fa fa-user">Create Account</i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </body>
    <footer>
        <!-- <marquee>&copy Copy right by shabri dkk</marquee> -->
    </footer>
</html>
