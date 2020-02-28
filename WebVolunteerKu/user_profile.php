<?php
require_once("config.php");
session_start();
$idu=$_SESSION['user_id'];
$gas="SELECT * FROM users WHERE no_identitas =:no_identitas";
$stmt = $db->prepare($gas);
$params = array(
    ":no_identitas" => $idu
);
$stmt->execute($params);
$data=$stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
    <html lang="en">
    <head>
        <link rel="stylesheet" href="css/user_profile.css">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>
        <section class="sideMenu">
            <nav>
                <a href="/WebVolunteerku/index.php" class="active"><svg class="bi bi-house" width="17" height="17" viewBox="0 0 20 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M9.646 3.146a.5.5 0 01.708 0l6 6a.5.5 0 01.146.354v7a.5.5 0 01-.5.5h-4.5a.5.5 0 01-.5-.5v-4H9v4a.5.5 0 01-.5.5H4a.5.5 0 01-.5-.5v-7a.5.5 0 01.146-.354l6-6zM4.5 9.707V16H8v-4a.5.5 0 01.5-.5h3a.5.5 0 01.5.5v4h3.5V9.707l-5.5-5.5-5.5 5.5z" clip-rule="evenodd"/>
                    <path fill-rule="evenodd" d="M15 4.5V8l-2-2V4.5a.5.5 0 01.5-.5h1a.5.5 0 01.5.5z" clip-rule="evenodd"/>
                  </svg>Home</a>
                <a href="#"><svg class="bi bi-person" width="17" height="17" viewBox="0 0 20 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M15 16s1 0 1-1-1-4-6-4-6 3-6 4 1 1 1 1h10zm-9.995-.944v-.002zM5.022 15h9.956a.274.274 0 00.014-.002l.008-.002c-.001-.246-.154-.986-.832-1.664C13.516 12.68 12.289 12 10 12c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664a1.05 1.05 0 00.022.004zm9.974.056v-.002zM10 9a2 2 0 100-4 2 2 0 000 4zm3-2a3 3 0 11-6 0 3 3 0 016 0z" clip-rule="evenodd"/></svg>
                  </svg>Ubah Data</a>
                <a href="#"><svg class="bi bi-image" width="17" height="17" viewBox="0 0 20 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M16.002 4h-12a1 1 0 00-1 1v10a1 1 0 001 1h12a1 1 0 001-1V5a1 1 0 00-1-1zm-12-1a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2h-12z" clip-rule="evenodd"/>
                    <path d="M12.648 9.646a.5.5 0 01.577-.093l3.777 1.947V16h-14v-2l2.646-2.354a.5.5 0 01.63-.062l2.66 1.773 3.71-3.71z"/>
                    <path fill-rule="evenodd" d="M6.502 9a1.5 1.5 0 100-3 1.5 1.5 0 000 3z" clip-rule="evenodd"/>
                  </svg>Ubah Foto</a>
                <a href="gantipassword.php"><svg class="bi bi-lock" width="17" height="17" viewBox="0 0 20 20" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M13.655 9H6.333c-.264 0-.398.068-.471.121a.73.73 0 00-.224.296 1.626 1.626 0 00-.138.59V15c0 .342.076.531.14.635.064.106.151.18.256.237a1.122 1.122 0 00.436.127l.013.001h7.322c.264 0 .398-.068.471-.121a.73.73 0 00.224-.296 1.627 1.627 0 00.138-.59V10c0-.342-.076-.531-.14-.635a.658.658 0 00-.255-.237 1.123 1.123 0 00-.45-.128zm.012-1H6.333C4.5 8 4.5 10 4.5 10v5c0 2 1.833 2 1.833 2h7.334c1.833 0 1.833-2 1.833-2v-5c0-2-1.833-2-1.833-2zM6.5 5a3.5 3.5 0 117 0v3h-1V5a2.5 2.5 0 00-5 0v3h-1V5z" clip-rule="evenodd"/>
                  </svg>Ganti Password</a>
            </nav>
        </section>
        <header>
            <div class="user-area">
                <?php include 'head.php'; ?>
            </div> 
        </header>
        <section class="content-area">
            <div class="heading">
                <h1>Dashboard</h1>
                <p>welcome User</p>
            </div>

            <div class="cards"> 
                <div class="col-md-4">
                <div class="card">
                    <div class="user-img"></div>
                    <span class="user-name"><?php echo $data['nama'];?></span>
                    <span class="user-title"><?php echo $data['no_identitas'];?></span>
                    <hr>
                    <div class="col-md-3">
                    <span class="education">Education</span>
                </div>
                <div class="col-md-9">
                        <span class="school">Telkom University</span>
                        <span class="school">ITB Bandung</span>
                </div>
            </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <h6>Anggota Sejak</h6>
                    <span class="date">
                        November 22, 2019
                    </span>
                    <div class="col-md-2">
                    <span class="icon">IT</span>
                </div>
                <div class="col-md-10">
                        <span class="location">Best Seller in Sukabirus</span>
                        <span class="position">Manager of Oemah Soepatu</span>
                        <span class="time">09:30</span>
                </div>
            </div>
            </div>
        </section>
    </body>
</html>