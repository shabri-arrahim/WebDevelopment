<?php
require_once("config.php");
#session_start();
@ob_start();
?>

<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" href="css\head.css">
    </head>
    <body>
        <div class="head">
            <div id="user-info-top" class="user-info-pull-right">
                <?php
                    if(isset($_SESSION['user_id'])) {
                        if($_SESSION['user_akun'] == 'Pengguna Biasa') {
                            echo "<a href='user_profile.php'><span>$_SESSION[user_name]</span>
                            <a href='logout.php'>Keluar</a>
                            <style> a { padding-right:20px; } </style>";    
                        }else if($_SESSION['user_akun'] == 'Admin'){
                            echo "<a href='admin.php'><span>$_SESSION[user_name]</span>
                            <a href='logout.php'>Keluar</a>
                            <style> a { padding-right:20px; } </style>";
                        }
                    }else{
                        echo "<a href='login.php'>Login</a>
                        <a href='registrasi.php'>Register</a>
                        <style> a { padding-right:20px; } </style>
                        ";
                    }
                ?>
            </div>
        </div>
    </body>
</html>