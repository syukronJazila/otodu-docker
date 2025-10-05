<?php
session_start();


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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Rethink+Sans:ital,wght@0,400..800;1,400..800&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Martian+Mono:wght@100..800&display=swap" rel="stylesheet">
    <title>OTODU | Solusi Otodidakmu!</title>
    <style>
    * {
        font-family: "Rethink Sans";
    }

    .logo img {
        width: 10vw;
        margin-right: 1vw;
    }

    .intro {
        padding: 5vw 5vw 10vw 27vw;
        background-image: url('./image/gradien\ blue.avif');
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: cover;
        color: white;
        font-size: 16px;
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
        padding: 2vw;
    }

    #bab {
        cursor: pointer;
    }

    #nlp-android {
        display: none;
    }

    #nlp-desktop {
        display: block;
    }

    #bab {
        width: 40vw;
    }

    @media (max-width: 1000px) {
        #nlp-desktop {
            display: none;
        }

        #nlp-android {
            display: block;
        }

        #tulisan-bawah-gambar {
            font-size: 3vw;
        }

        .container-3r {
            margin-left: 30vw;
        }

        #header-gambar-bulat {
            margin-top: 12vw;
            margin-left: 3vw;
        }

        #arrow-tengah {
            margin-left: 28vw;
            margin-top: 15vw;
        }

        #tulisan-quiz-nlp-selesai {
            margin-left: 26vw;
            margin-top: 13vw;
        }

        #arrow-kiri {
            margin-left: 23vw;
            margin-top: 22vw;
        }

        #tulisan-quiz-subbab-dikuasai {
            margin-left: 20vw;
            margin-top: 20vw;
        }

        #arrow-kanan {
            margin-left: 35vw;
            margin-top: 20vw;
        }

        #tulisan-quiz-subbab-baru-dipelajari {
            margin-left: 33vw;
            margin-top: 15vw;
        }

        #bab {
            width: 100%;
        }

        footer {
            display: flex;
            justify-content: flex-start;
            align-items: center;
            background-color: #1F2844;
            padding: 20px;
            color: white;
        }


    }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="button.css">
</head>

<body>
    <header>
        <section id="nlp-android">
            <div style="padding: 4vw; background-color:#375679;">
                <h3 class="text-white">Statistik NLP</h3>
                <p class="text-white">Statistik capaian belajar mingguan Kamu ditampilkan di sini!</p>
                <div class="row" style="display: flex; flex-wrap: wrap; gap: 3vw;">
                    <div class="col-md-6 bg-white"
                        style="height:30vw; min-height:300px; padding:0vw 4vw 1vw 4vw; border-radius:1vw;">
                        <!-- Gmbar Bulat -->
                        <p id="header-gambar-bulat"
                            style="font-size:12px;font-weight:600;position: absolute; top:150px; left: 4vw;">
                            Persentase NLP minggu ini</p>
                        <div id="gambar-bulat-utama" style="position: relative; width: 15vw; min-width:120px;">
                            <img src="image/Subtract.png" alt=""
                                style="width: 100%; position: absolute; top: 17vw; left: 4vw; z-index: 1;">
                            <img src="image/Subtract_hijau.png" alt=""
                                style="width: 100%; position: absolute; top: 17vw; left: 4vw; z-index: 2; clip-path: inset(50% 0 0 0);">
                            <div
                                style="position: absolute; top: 28vw; left: 4vw; width: 100%; height: 100%; display: flex; justify-content: center; align-items: center; z-index: 3; font-size: 5vw; text-align: center; font-weight:500">
                                50%
                            </div>
                        </div>
                        <!-- Gmbar Bulat Akhir -->
                        <!-- Gambar 3r  -->
                        <p style="font-size:12px;font-weight:600;position: absolute; top: 195px; left: 65vw;">Capaian
                            NLP</p>
                        <p id="tulisan-quiz-nlp-selesai"
                            style="font-size:9px;font-weight:600;position: absolute; top: 200px; left: 100px;">Quiz NLP
                            <br>
                            selesai
                        </p>
                        <p id="tulisan-quiz-subbab-dikuasai"
                            style="font-size:9px;font-weight:600;position: absolute; top: 210px; left: 28vw;">Subbab
                            <br>
                            dikuasai
                        </p>
                        <p id="tulisan-quiz-subbab-baru-dipelajari"
                            style="font-size:9px;font-weight:600;position: absolute; top: 210px; left: 52vw;">Subbab
                            baru <br>
                            dipelajari</p>
                        <i id="arrow-tengah"
                            style="transform: rotate(-20deg);position: absolute; top: 200px; left: 37vw; font-size: 9px"
                            class="bi bi-arrow-up-left"></i>
                        <i id="arrow-kiri"
                            style="transform: rotate(-20deg);position: absolute; top: 210px; left: 35vw; font-size: 9px"
                            class="bi bi-arrow-up-left"></i>
                        <i id="arrow-kanan"
                            style="transform: rotate(90deg);position: absolute; top: 230px; left: 55vw; font-size: 9px"
                            class="bi bi-arrow-up-left"></i>

                        <div style="transform:scale(0.45)">
                            <!-- Container untuk gambar pertama -->
                            <div class="container-3r" id="container-3r-1"
                                style=" position: absolute; top: 120px; left: 30vw; display: inline-block; text-align: center;">
                                <!-- Gambar tengah putih -->
                                <div style="position: relative; display: inline-block;">
                                    <img src="image/3r/3rputih_tengah.png" alt=""
                                        style="position: relative; top: 35px; display: block; margin-left: auto; margin-right: auto; width:15vw; min-width:140px;">
                                </div>
                                <!-- Gambar kiri dan kanan putih -->
                                <div style="display: flex; justify-content: space-between; margin-top: 10px;">
                                    <div style="position: relative; display: inline-block;">
                                        <img style="margin-right: 10px; width:15vw; min-width:140px;"
                                            src="image/3r/3rputih_kiri.png" alt="">
                                    </div>
                                    <div style="position: relative; display: inline-block;">
                                        <img src="image/3r/3rputih_kanan.png" alt=""
                                            style="width:15vw; min-width:140px;">
                                    </div>
                                </div>
                            </div>

                            <!-- Container untuk gambar kedua -->
                            <div class="container-3r" id="container-3r-2"
                                style="position: absolute; top: 120px; left: 30vw; display: inline-block; pointer-events: none; text-align: center;">
                                <!-- Gambar tengah hijau -->
                                <div style="position: relative; display: inline-block;">
                                    <img src="image/3r/3rhijau_tengah.png" alt=""
                                        style="position: relative; top: 35px; display: block; margin-left: auto; margin-right: auto; clip-path: inset(50% 0 0 0); width:15vw; min-width:140px;">
                                    <div
                                        style=" position: absolute; top: 7vw; left: 0; width: 100%; height: 100%; display: flex; justify-content: center; align-items: center; z-index: 4; color: black; font-size: 18px; font-weight:600">
                                        15/27
                                    </div>
                                </div>
                                <!-- Gambar kiri dan kanan hijau -->
                                <div style="display: flex; justify-content: space-between; margin-top: 10px;">
                                    <div style="position: relative; display: inline-block;">
                                        <img style="margin-right: 10px; clip-path: inset(70% 0 0 0); width:15vw; min-width:140px;"
                                            src="image/3r/3rhijau_kiri.png" alt="">
                                        <div
                                            style=" position: absolute; top: 2vw; left: 0; width: 100%; height: 100%; display: flex; justify-content: center; align-items: center; z-index: 4; color: black; font-size: 18px; font-weight:600">
                                            2/5
                                        </div>
                                    </div>
                                    <div style="position: relative; display: inline-block;">
                                        <img style="clip-path: inset(40% 0 0 0); width:15vw; min-width:140px;"
                                            src="image/3r/3rhijau_kanan.png" alt="">
                                        <div
                                            style=" position: absolute; top: 2vw; left: 0; width: 100%; height: 100%; display: flex; justify-content: center; align-items: center; z-index: 4; color: black; font-size: 18px; font-weight:600">
                                            5/7
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Gambar 3r Akhir  -->
                        <div class=""
                            style=" display: flex; flex-direction: column; justify-content: flex-end; height: 100%; width: 100%;">
                            <div style="display: flex; gap: 5vw;">
                                <div style="display: flex; width: 40vw; align-items: center; justify-content: center;">
                                    <div class="text-center" id="tulisan-bawah-gambar" style="">
                                        Persentase NLP minggu lalu: <br>
                                        0%
                                    </div>
                                </div>

                                <div style="display: flex; width: 40vw; align-items: center; justify-content: center;">
                                    <div class="text-center" id="tulisan-bawah-gambar" style="">
                                        Target NLP mingguan: <br>
                                        <span style="font-weight: 600; color:#650505"> Belum terpenuhi</span>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-2" style="display: flex; gap:120px;">
                                <div
                                    style="margin-left:4vw; display: flex; width: 20vw; align-items: center; justify-content: center;">
                                    <div
                                        style="width: 10vw; min-width:100px; height: 5px; background-color: #46CC6A; border-radius: 1vw;">
                                    </div>
                                    <p style="margin-top: 1vw; margin-left: 1vw; font-size: 0.65rem;">
                                        saat
                                        ini</p>
                                </div>

                                <div style="display: flex; width: 25vw; align-items: center; justify-content: center;">
                                    <div
                                        style="width: 10vw; min-width:100px; height: 5px; background-color: #C4CBE0; border-radius: 1vw;">
                                    </div>
                                    <p style="margin-top: 1vw; margin-left: 1vw; font-size: 0.65rem;">Target
                                        capaian/capaian minggu lalu</p>
                                </div>

                            </div>

                        </div>
                    </div>

                    <div class="col-md-5 bg-white p-4 rounded"
                        style="height:30vw; min-height:220px; border-radius: 1vw;">
                        <div style="color: #1F2844; padding:4vw;">
                            <p>Halo <b>
                                    <?= $_SESSION['user_name'] ?>
                                </b>!</p>
                            <p style="margin-bottom: 1.5rem;">Kamu terakhir mempelajari <b>Limit Tak Hingga - Subbab
                                    III</b>. Pengen
                                lanjut lagi?</p>
                            <p class="text-white text-center"
                                style="background-color:#375679; border-radius: 8px; padding: 0.5rem; cursor: pointer;">
                                Lanjut Belajar</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="nlp-desktop">
            <div style="padding: 4vw 4vw 4vw 3vw; background-color:#375679;">
                <h3 class="text-white">Statistik NLP</h3>
                <p class="text-white">Statistik capaian belajar mingguan Kamu ditampilkan di sini!</p>
                <div style="display:flex; gap:3vw;">
                    <div class="bg-white" style="height:30vw; width:60vw; padding:0vw 4vw 1vw 4vw; border-radius:1vw;">
                        <!-- Gmbar Bulat -->
                        <p style="font-size:1.8vw;font-weight:600;position: absolute; top: 16vw; left: 8vw;">Persentase
                            NLP minggu ini</p>
                        <div style="position: relative; width: 15vw; height: auto;">
                            <img src="image/Subtract.png" alt=""
                                style="width: 100%; position: absolute; top: 6vw; left: 4vw; z-index: 1;">
                            <img src="image/Subtract_hijau.png" alt=""
                                style="width: 100%; position: absolute; top: 6vw; left: 4vw; z-index: 2; clip-path: inset(50% 0 0 0);">
                            <div
                                style="position: absolute; top: 13vw; left: 4vw; width: 100%; height: 100%; display: flex; justify-content: center; align-items: center; z-index: 3; ; font-size: 2.5vw; text-align: center; font-weight:500">
                                50%
                            </div>
                        </div>
                        <!-- Gmbar Bulat Akhir -->
                        <!-- Gambar 3r  -->
                        <p style="font-size:1.8vw;font-weight:600;position: absolute; top: 16vw; left: 37vw;">Capaian
                            NLP</p>
                        <p style="font-size:1.3vw;font-weight:600;position: absolute; top: 21vw; left: 31vw;">Quiz NLP
                            <br>
                            selesai
                        </p>
                        <p style="font-size:1.3vw;font-weight:600;position: absolute; top: 26vw; left: 28vw;">Subbab
                            <br>
                            dikuasai
                        </p>
                        <p style="font-size:1.3vw;font-weight:600;position: absolute; top: 26vw; left: 52vw;">Subbab
                            baru <br>
                            dipelajari</p>
                        <i style="transform: rotate(-20deg);position: absolute; top: 21vw; left: 38vw; font-size: 1.5vw"
                            class="bi bi-arrow-up-left"></i>
                        <i style="transform: rotate(-20deg);position: absolute; top: 28vw; left: 34vw; font-size: 1.5vw"
                            class="bi bi-arrow-up-left"></i>
                        <i style="transform: rotate(90deg);position: absolute; top: 28vw; left: 50vw; font-size: 1.5vw"
                            class="bi bi-arrow-up-left"></i>

                        <div style="transform:scale(0.45)">
                            <!-- Container untuk gambar pertama -->

                            <div
                                style="position: absolute; top: 7vw; left: 30vw; display: inline-block; text-align: center;">
                                <!-- Gambar tengah putih -->

                                <div style="position: relative; display: inline-block;">
                                    <img src="image/3r/3rputih_tengah.png" alt=""
                                        style="position: relative; top: 60px; display: block; margin-left: auto; margin-right: auto;">
                                </div>
                                <!-- Gambar kiri dan kanan putih -->
                                <div style="display: flex; justify-content: space-between; margin-top: 10px;">
                                    <div style="position: relative; display: inline-block;">
                                        <img style="margin-right: 10px;" src="image/3r/3rputih_kiri.png" alt="">
                                    </div>
                                    <div style="position: relative; display: inline-block;">
                                        <img src="image/3r/3rputih_kanan.png" alt="">
                                    </div>
                                </div>
                            </div>

                            <!-- Container untuk gambar kedua -->
                            <div
                                style="position: absolute; top: 7vw; left: 30vw; display: inline-block; pointer-events: none; text-align: center;">
                                <!-- Gambar tengah hijau -->
                                <div style="position: relative; display: inline-block;">
                                    <img src="image/3r/3rhijau_tengah.png" alt=""
                                        style="position: relative; top: 60px; display: block; margin-left: auto; margin-right: auto; clip-path: inset(50% 0 0 0);">
                                    <div
                                        style=" position: absolute; top: 4vw; left: 0; width: 100%; height: 100%; display: flex; justify-content: center; align-items: center; z-index: 4; color: black; font-size: 3.2vw; font-weight:600">
                                        15/27
                                    </div>
                                </div>
                                <!-- Gambar kiri dan kanan hijau -->
                                <div style="display: flex; justify-content: space-between; margin-top: 10px;">
                                    <div style="position: relative; display: inline-block;">
                                        <img style="margin-right: 10px; clip-path: inset(70% 0 0 0);"
                                            src="image/3r/3rhijau_kiri.png" alt="">
                                        <div
                                            style=" position: absolute; top: 2vw; left: 0; width: 100%; height: 100%; display: flex; justify-content: center; align-items: center; z-index: 4; color: black; font-size: 3.2vw; font-weight:600">
                                            2/5
                                        </div>
                                    </div>
                                    <div style="position: relative; display: inline-block;">
                                        <img style="clip-path: inset(40% 0 0 0);" src="image/3r/3rhijau_kanan.png"
                                            alt="">
                                        <div
                                            style=" position: absolute; top: 2vw; left: 0; width: 100%; height: 100%; display: flex; justify-content: center; align-items: center; z-index: 4; color: black; font-size: 3.2vw; font-weight:600">
                                            5/7
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!-- Gambar 3r Akhir  -->
                        <div class=""
                            style=" display: flex; flex-direction: column; justify-content: flex-end; height: 100%; width: 100%;">
                            <div style="display: flex; gap: 5vw;">
                                <div style="display: flex; width: 20vw; align-items: center; justify-content: center;">
                                    <div class="text-center">
                                        Persentase NLP minggu lalu: <br>
                                        0%
                                    </div>
                                </div>

                                <div style="display: flex; width: 20vw; align-items: center; justify-content: center;">
                                    <div class="text-center">
                                        Target NLP mingguan: <br>
                                        <spans style="font-weight: 600; color:#650505"> Belum terpenuhi</spans>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-2" style="display: flex; gap: 5vw;">
                                <div style="display: flex; width: 20vw; align-items: center; justify-content: center;">
                                    <div
                                        style="width: 10vw; height: 5px; background-color: #46CC6A; border-radius: 1vw;">
                                        .</div>
                                    <p style="margin-top: 1vw; margin-left: 1vw; font-size: 0.65rem;">
                                        saat
                                        ini</p>
                                </div>

                                <div style="display: flex; width: 25vw; align-items: center; justify-content: center;">
                                    <div
                                        style="width: 10vw; height: 5px; background-color: #C4CBE0; border-radius: 1vw;">
                                    </div>
                                    <p style="margin-top: 1vw; margin-left: 1vw; font-size: 0.65rem;">Target
                                        capaian/capaian minggu lalu</p>
                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="bg-white" style="height:30vw; width:40vw; border-radius: 1vw; padding:5vw;">
                        <div style="color: #1F2844;">
                            <p>Halo <b>
                                    <?= $_SESSION['user_name'] ?>
                                </b>!</p>
                            <?php if(isset($_SESSION['materi_terakhir'])): ?>
                            <p style="margin-bottom: 2vw">Kamu terakhir mempelajari
                                <b><?php echo $_SESSION['materi_terakhir']; ?></b>. pengen
                                lanjut lagi ?
                            </p>
                            <p class="text-white"
                                style="background-color:#375679; text-align:center; border-radius:5px; padding:5px; cursor:pointer; font-size: 0.9 rem"
                                id="materi-nlp">Buka <b><?php echo $_SESSION['materi_terakhir']; ?></b>
                            </p>
                            <p class="bg-white"
                                style="color:#375679; text-align:center; border-radius:5px; padding:3px; border:1px solid; cursor:pointer; font-size: 1rem"
                                id="daftar-materi">Buka materi lainnya</p>
                            <?php else : ?>
                            <p class="text-white" style="background-color:#375679; text-align:center; border-radius:5px; padding:5px; cursor:pointer; font-size: 0.9 rem;
                            display: none;" id="materi-nlp">Buka <b><?php echo $_SESSION['materi_terakhir']; ?></b>
                            </p>
                            <p style="margin-bottom: 2vw">Klik tombol di bawah untuk mulai belajar
                                otodidak!</p>
                            <p class="bg-white"
                                style="color:#375679; text-align:center; border-radius:5px; padding:3px; border:1px solid; cursor:pointer; font-size: 1rem"
                                id="daftar-materi">Jelajahi Materi Sekarang</p>
                            <?php endif ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="konten">
            <div style="padding: 4vw 4vw 4vw 7vw;">
                <h4>Bab Saya</h4>
                <br>
                <div style="background-color: #E3ECF5; border-radius: 0.5vw; padding: 2vw 3vw;">
                    <div style="background-color: white; border-radius: 0.5vw; padding: 2vw 1vw 2vw 3vw;" id="bab">
                        <table style="border-collapse: collapse;">
                            <tr>
                                <td rowspan="4" style="padding-right: 1.5vw;"><img src="image/Bab.png" width="60"
                                        height="60"></td>
                                <td style="font-size: 16px; padding-bottom: 0;"><b>Fungsi</b></td>
                            </tr>
                            <tr>
                                <td style="font-size: 16px; padding-top: 0;">Matematika Kelas XI</td>
                            </tr>
                            <tr>
                                <td style="padding: 0.3vw;"></td>
                            </tr>
                            <tr>
                                <td style="font-size: 12px;">1/2 subtopik selesai</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </section>

        <footer>
            <img src="image/logo otodu terang.png" alt="logo"
                style="width: 120px; margin-right: 2vw; margin-left: 2.3vw;">
            <p style="font-family: 'Martian Mono'; font-size: 10px; margin-top: 17px;">@2024 OTODU Limited</p>
        </footer>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
        </script>

        <script>
        document.getElementById('bab').addEventListener('click', function(event) {
            event.preventDefault(); // Mencegah perilaku default tautan
            window.location.href = 'materi.php'; // Ganti dengan URL yang sesuai
        });

        document.getElementById('materi-nlp').addEventListener('click', function(event) {
            event.preventDefault(); // Mencegah perilaku default tautan
            window.location.href = 'materi.php'; // Ganti dengan URL yang sesuai
        });

        document.getElementById('daftar-materi').addEventListener('click', function(event) {
            event.preventDefault(); // Mencegah perilaku default tautan
            window.location.href = 'daftar.php'; // Ganti dengan URL yang sesuai
        });
        </script>
</body>

</html>
