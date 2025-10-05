<?php
session_start();
include 'function.php';
include 'config.php';

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

include 'navbar.php';
?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Rethink+Sans:ital,wght@0,400..800;1,400..800&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Martian+Mono:wght@100..800&display=swap" rel="stylesheet">
    <style>
    body {
        display: flex;
        flex-direction: column;
        min-height: 100vh;
        margin: 0;
    }

    #nlp {
        background-color: #4D62A5;
        color: white;
        font-weight: 450;
    }

    .form-select {
        background-image: url("panah.png");
        background-repeat: no-repeat;
        background-position: right 0.75rem center;
        background-size: 2vw 0.8vw;
    }

    .t1 {
        border-collapse: collapse;
    }

    .t1 td {
        padding: 1vw;
    }

    .t2 {
        color: #4D62A5;
        padding: 0;
    }

    .t2 td {
        padding: 2vw 3vw;
    }

    .t3 {
        color: #4D62A5;
        padding: 0;
    }

    .t3 td {
        padding: 2vw 3vw;
        border-bottom: 0.1vw solid;
    }

    .collapse {
        transition: none !important;
    }

    .collapsing {
        transition: none !important;
        display: none;
    }

    footer {
        display: flex;
        justify-content: flex-start;
        align-items: center;
        background-color: #1F2844;
        color: white;
        bottom: 0;
        width: 100%;
        text-align: center;
        position: relative;
        /* Default position */
        padding: 2vw;
    }

    .logout-btn {
        display: flex;
        align-items: center;
        background-color: #ff4d4d;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
    }

    .logout-btn i {
        margin-right: 8px;
        /* Jarak antara ikon dan teks */
    }

    .logout-btn:hover {
        background-color: #ff3333;
    }
    .logo {
            max-width: 150px;
            height: 30px;
        }
    .premium-text {
        color: black;
        font-size: 10px;
        padding-right : 12px;
    }
    @media screen and (max-width: 768px) {
            .container2 {
                flex-direction: column;
                align-items: center;
            }

            .logo {
                max-width: 100px;
            }
        }
    </style>
</head>

<body style="font-family: 'Rethink Sans', sans-serif;">

    <br><br>

    <div style="display: flex; justify-content: space-around; flex: 1;" id="elemen-top">
        <div>
            <table class="t1">
                <tr>
                    <td style="border-top: 0.1vw solid; border-bottom: 0.1vw solid;">
                        <a class="btn btn-primary" style="background-color: white; border: 0; color: #4D62A5;"
                            data-bs-toggle="collapse" href="#profil" role="button" aria-expanded="false"
                            aria-controls="profil" onclick="closeOtherCollapses('profil')">
                            <b>Profil</b>
                        </a>
                    </td>
                </tr>
                <tr>
                    <td style="border-top: 0.1vw solid; border-bottom: 0.1vw solid; width: 20vw;">
                        <a class="btn btn-primary" style="background-color: white; border: 0; color: #4D62A5; text-align : left;"
                            data-bs-toggle="collapse" href="#riwayat" role="button" aria-expanded="false"
                            aria-controls="riwayat" onclick="closeOtherCollapses('riwayat')">
                            <b>Riwayat Pembelian</b>
                        </a>
                    </td>
                </tr>
                <tr>
                    <td style="border-top: 0.1vw solid; border-bottom: 0.1vw solid;">
                        <a class="btn btn-primary" style="background-color: white; border: 0; color: #4D62A5;"
                            data-bs-toggle="collapse" href="#terimakasih" role="button" aria-expanded="false"
                            aria-controls="profil" onclick="closeOtherCollapses('terimakasih')">
                            <b>Terimakasih</b>

                        </a>
                    </td>
                </tr>
            </table>
        </div>
        <div class="collapse" id="profil">
            <div class="card card-body" style="border: 0;">
                <div class="mb-4" style="box-shadow: 0 0.1vw 0.2vw;">
                    <table class="t2">
                        <tr>
                            <td colspan="2" style="border-bottom: 1px solid; padding: 1.5vw 3vw; width: 50vw;">
                                <b>Akun</b>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 15vw;"><b>Email</b></td>
                            <td><?= $_SESSION['user_email']; ?></td>
                        </tr>
                        <tr>
                            <td><b>Jenis Target</b></td>
                            <td><?= $_SESSION['nama_target'] ?></td>
                        </tr>
                        <tr>
                            <td><b>Password</b></td>
                            <td>****************</td>
                        </tr>
                    </table>

                </div><br>
                <div style="box-shadow: 0 0.1vw 0.2vw;">
                    <table class="t2">
                        <tr>
                            <td colspan="2" style="border-bottom: 1px solid; padding: 1.5vw 3vw; width: 50vw;">
                                <b>Informasi Pengguna</b>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 15vw;"><b>Nama</b></td>
                            <td><?= $_SESSION['user_name']; ?></td>
                        </tr>
                        <tr>
                            <td><b>No. HP</b></td>
                            <td><?= $_SESSION['no_hp']; ?></td>
                        </tr>
                        <tr>
                            <td><b>Latitude</b></td>
                            <td><?= $_SESSION['latitude']; ?></td>
                        </tr>
                        <tr>
                            <td><b>Longitude</b></td>
                            <td><?= $_SESSION['longitude']; ?></td>
                        </tr>
                    </table>
                </div>
                <div style="box-shadow: 0 0.1vw 0.2vw; margin-top: 2vw">
                    <table class="t2">
                        <tr>
                            <td>
                                <button id="logoutButton" class="logout-btn">
                                    <i class="fas fa-sign-out-alt"></i> Keluar
                                </button>
                            </td>
                        </tr>
                    </table>

                </div>
            </div>
        </div>

        <div class="collapse" id="riwayat">
            <div class="card card-body" style="border: 0;">
                <div style="box-shadow: 0 0.1vw 0.2vw;">
                    <table class="t3">
                        <tr>
                            <td colspan="3" style="border-bottom: 1px solid; padding: 1.5vw 3vw;"><b>Koin</b></td>
                        </tr>
                        <!-- <tr>
                            <td><img src="image/coin2.png" width="18" height="18"> 20</td>
                            <td>Rp20.000</td>
                            <td style="width: 27vw;">29-10-2024</td>
                        </tr>
                        <tr>
                            <td><img src="image/coin2.png" width="18" height="18"> 10</td>
                            <td>Rp10.000</td>
                            <td>28-10-2024</td>
                        </tr>
                        <tr>
                            <td><img src="image/coin2.png" width="18" height="18"> 5</td>
                            <td>Rp5.000</td>
                            <td>27-10-2024</td>
                        </tr> -->
                        <?php
                        $id = $_SESSION['user_id'];
                        $riwayatbeli = ambilData("SELECT jumlah, biaya, waktu
                                                      FROM transaksi
                                                      WHERE id_user = $id
                                                      ORDER BY waktu DESC");

                        if (empty($riwayatbeli)) : // Mengecek jika riwayat pembelian kosong
                        ?>
                            <tr>
                                <td colspan="3" style="text-align: center; width:100%">Anda belum membeli koin apapun</td>
                                <td></td>
                                <td></td>
                            </tr>
                            <?php
                        else:
                            foreach ($riwayatbeli as $riwayat) :
                                // Mengubah format tanggal dari yyyy-mm-dd menjadi dd-mm-yyyy
                                $tanggal_pembelian = date("d-m-Y", strtotime($riwayat['waktu']));
                            ?>
                        <tr>
                            <td>
                                <img src="image/coin2.png" width="18"
                                    height="18"><?= "  " . htmlspecialchars($riwayat['jumlah']); ?> 
                                </td>
                            <td><?= htmlspecialchars($riwayat['biaya']); ?></td>
                            <td style="width: 58%;"><?= $tanggal_pembelian; ?></td>
                        </tr>
                        <?php
                            endforeach;
                        endif;
                        ?>
                    </table>

                </div><br><br><br>
                <div style="box-shadow: 0 0.1vw 0.2vw;">
                    <table class="t3">
                        <tr>
                            <td colspan="3" style="border-bottom: 1px solid; padding: 1.5vw 3vw;"><b>Subtopik</b></td>
                        </tr>
                        <?php
                        $id = $_SESSION['user_id'];
                        $riwayatbeli = ambilData("SELECT p.kode_subtopik, p.tanggal_pembelian, s.nama_subtopik, s.harga 
                                                      FROM beli_subtopik p
                                                      JOIN subtopik s ON p.kode_subtopik = s.kode_subtopik
                                                      WHERE p.id_user = $id
                                                      ORDER BY p.tanggal_pembelian DESC");

                        if (empty($riwayatbeli)) : // Mengecek jika riwayat pembelian kosong
                        ?>
                            <tr>
                                <td colspan="3" style="text-align: center; width:100%;">Anda belum membeli subtopik apapun
                                </td>
                                <td></td>
                                <td></td>
                            </tr>
                            <?php
                        else:
                            foreach ($riwayatbeli as $riwayat) :
                                // Mengubah format tanggal dari yyyy-mm-dd menjadi dd-mm-yyyy
                                $tanggal_pembelian = date("d-m-Y", strtotime($riwayat['tanggal_pembelian']));
                            ?>
                                <tr>
                                    <td><?= htmlspecialchars($riwayat['nama_subtopik']); ?></td>
                                    <td><?= $tanggal_pembelian; ?></td>
                                    <td style="width: 20vw;"><img src="image/coin2.png" width="18" height="18">
                                        <?= htmlspecialchars($riwayat['harga']); ?></td>
                                </tr>
                        <?php
                            endforeach;
                        endif;
                        ?>
                    </table>

                </div>

            </div>
        </div>
        <div class="collapse" id="terimakasih">
            <div class="card card-body" style="border: 0; padding-left: 3vw;">
                <div style="box-shadow: 0 0.1vw 0.2vw; color: #4D62A5; padding-bottom : 1vw;">
                    <div style="border-bottom: 0.1vw solid; padding: 2.5vw 3vw 1vw 3vw;"><b>Terimakasih kepada.....</b>
                    </div>
                    <div style="padding: 2.5vw 3vw 1vw 3vw;">Sumber asset</div>
                    <div style="width: 50vw; padding-left: 3vw;" class = "container2">
                        <div style="display: flex; flex-wrap : wrap;">
                            <img src="image/1.png" class = "logo">
                            <img src="image/2.png" class = "logo">
                            <div style="display: flex; align-items : center;">
                                <img src="image/3.png" width="30" height="30">
                                <b>
                                <div class="premium-text" > Prosymbols Premium</div>
                                </b>
                            </div>
                            <img src="image/4.png" class = "logo">
                            <div style="display: flex; align-items : center;">
                                <img src="image/5.png" width="30" height="30">
                                <b>
                                    <div class="premium-text"> Ilham Fitrotul
                                        Hayat </div>
                                </b>
                            </div>

                            <div style="display: flex; align-items : center;">
                                <img src="image/6.png" width="30" height="30">
                                <b>
                                    <div class="premium-text"> Mayor Icons </div>
                                </b>
                            </div>


                            <div style="display: flex; align-items : center;">
                                <img src="image/7.png" width="30" height="30">
                                <b>
                                    <div class="premium-text"> Andrean Prabowo </div>
                                </b>
                            </div>

                            <div style="display: flex; align-items : center;">
                                <img src="image/8.png" width="30" height="30">
                                <b>
                                        <div class="premium-text"> Md Tanvirul Haque </div>
                                </b>
                            </div>
                                <div style="display: flex; align-items : center;">
                                    <img src="image/9.png" width="30" height="30">
                                    <b>
                                    <div class="premium-text"> mk933 </div>
                                    </b>
                                </div>

                                <div style="display: flex; align-items : center;">
                                    <img src="image/10.png" width="30" height="30">
                                    <b>
                                        <div class="premium-text"> Maxim Basinski </div>
                                    </b>
                                </div>


                        </div>


                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>
    <br><br>

    <footer>
        <img src="image/logo otodu terang.png" alt="logo" style="width: 10vw; margin-right: 2vw; margin-left: 2.3vw;">
        <!-- 120px -->
        <p style="font-family: 'Martian Mono'; font-size: 0.8vw; margin-top: 3vh;">@2024 OTODU Limited</p>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const defaultOpenId = 'profil'; // ID yang ingin dibuka pertama kali
            const collapseElement = document.getElementById(defaultOpenId);

            if (collapseElement) {
                const bsCollapse = new bootstrap.Collapse(collapseElement, {
                    show: true
                });
            }

            // Tutup collapse lainnya
            closeOtherCollapses(defaultOpenId);
        });

        function closeOtherCollapses(openId) {
            const collapseIds = ['profil', 'riwayat', 'terimakasih'];

            collapseIds.forEach(id => {
                if (id != openId) {
                    const collapseElement = document.getElementById(id);
                    if (collapseElement) {
                        const bsCollapse = bootstrap.Collapse.getInstance(collapseElement);
                        if (bsCollapse) {
                            bsCollapse.hide();
                        }
                    }
                }
            })

            const collapseElement = document.getElementById(openId);

            if (collapseElement) {
                const bsCollapse = new bootstrap.Collapse(collapseElement, {
                    show: true
                });
            }
        }

        document.getElementById("logoutButton").addEventListener("click", function() {
            window.location.href = "logout.php";
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>