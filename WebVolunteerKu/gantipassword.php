<!DOCTYPE html>
<html>
    <head>
        <title> Ganti Password | Volunteerku</title>
        <link rel="stylesheet" href="css/halamangantipassword.css">
        <link rel="shortcut icon" href="img/logoMin.png">
    </head>
    <body>
        <div class="container" id="colums">
            <a href="index.php"><img src="img/logo2.png" alt="VolunterkuLogo"></a>
            <h2 class="page-heading">
                <span class="page-heading-title2">Ganti Password</span>
            </h2>
            <div class="page-content">
                <div class="row">
                    <form method = "POST" action = "">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input type="Password Lama" placeholder="Password Lama" class="form-control" name ="password_lama" required>
                            </div>
                            <div class="form-group">
                                <input type="Password Baru" placeholder="Password Baru" class="form-control" name="password_baru" required>
                            </div>
                            <div class="form-group">
                                <input type="Konfirmasi Password Baru" placeholder="Konfirmasi Password Baru" class="form-control" name="konfirmasi_password" required>
                            </div>
                            <div class="navigator">
                                <button class="button1" type="submit" name="Konfirmasi">Konfirmasi</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>