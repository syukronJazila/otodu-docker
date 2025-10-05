<?php
session_start();

/*
if (!isset($_SESSION['login'])) {
  header("Location: login.php");
  exit;
}
*/
include 'navbar.php';
?>



<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link
        href="https://fonts.googleapis.com/css2?family=Rethink+Sans:ital,wght@0,400..800;1,400..800&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Martian+Mono:wght@100..800&display=swap" rel="stylesheet">
    <title>OTODU | Solusi Otodidakmu!</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="button.css">
    <style>
    * {
        font-family: "Rethink Sans";
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
    
@media (max-width: 768px) {
    .col-md-7 {
        padding: 2vw;
        border-radius: 2vw;
        height:50vw;
    }

    /* Gambar bulat */
    .col-md-7 > div:first-child {
        width: 30vw;
        height: auto;
    }
    .col-md-7 > div:first-child img {
        top: 4vw;
        left: 2vw;
    }

    /* Gambar 3r */
    .col-md-7 > div:nth-child(2) {
        transform: scale(0.8);
    }
    .col-md-7 > div:nth-child(2) div {
        top: 5vw;
        left: 15vw;
    }
    .col-md-7 > div:nth-child(2) div img {
        top: 40px;
    }

    /* Perkembangan */
    .col-md-7 > div:nth-child(4) div {
        gap: 2vw;
    }
    .col-md-7 > div:nth-child(4) div > div {
        width: 30vw;
    }
    .col-md-7 > div:nth-child(4) div > div p {
        font-size: 0.5rem;
        margin-top: 0.5vw;
    }
    
    #footer-p{
      margin-top:vw;
    }
    

}

    </style>
</head>

<body>

                <section id="nlp">
            <div class="p-5" style="background-color:#375679;">
                <h3 class="text-white">Statistik NLP</h3>
                <p class="text-white">Statistik capaian belajar mingguan Kamu ditampilkan di sini!</p>
                <div class="row text-center" style="gap:3vw;">
                    <div class="col-md-7 bg-white" style="eight:30vw;padding:0vw 4vw 1vw 4vw; border-radius:1vw;">
                        <!-- Gmbar Bulat -->
                        <div style="position: relative; width: 10vw; height: auto;">
                            <img src="image/Subtract.png" alt=""
                                style="width: 100%; position: absolute; top: 6vw; left: 4vw; z-index: 1;">
                            <img src="image/Subtract_hijau.png" alt=""
                                style="width: 100%; position: absolute; top: 6vw; left: 4vw; z-index: 2; clip-path: inset(40% 0 0 0);">
                        </div>
                        <!-- Gmbar Bulat Akhir -->
                        
                        <!-- Gambar 3r  -->
                        <div style="transform: scale(0.5);">
                            <div style="position: absolute; top: 3vw; left: 30vw; display: inline-block; ">
                                <img src="image/3r/3rputih_tengah.png" alt=""
                                    style="position: relative; top: 6vw; display: block; margin-left: auto; margin-right: auto;">
                                <div style="display: flex; justify-content: space-between; argin-top: 10px;">
                                    <img style="margin-right: 10px;" src="image/3r/3rputih_kiri.png" alt="">
                                    <img src="image/3r/3rputih_kanan.png" alt="">
                                </div>
                            </div>

                            <div
                                style="position: absolute;  top: 3vw; left: 30vw; display: inline-block; pointer-events: none;">
                                <img src="image/3r/3rhijau_tengah.png" alt=""
                                    style="position: relative; top: 6vw; display: block; margin-left: auto; margin-right: auto; clip-path: inset(50% 0 0 0);">
                                <div style="display: flex; justify-content: space-between; margin-top: 10px;">
                                    <img style="margin-right: 10px; clip-path: inset(40% 0 0 0);"
                                        src="image/3r/3rhijau_kiri.png" alt="">
                                    <img style="clip-path: inset(70% 0 0 0);" src="image/3r/3rhijau_kanan.png" alt="">
                                </div>
                            </div>
                        </div>
                        <!-- Gambar 3r Akhir  -->
                        <div
                            style="display: flex; flex-direction: column; justify-content: flex-end; height: 100%; width: 100%;">
                            <div class="mt-2" style="display: flex; gap: 5vw;">
                                <div style="display: flex; width: 20vw; align-items: center; justify-content: center;">
                                    <div
                                        style="width: 10vw; height: 5px; background-color: #46CC6A; border-radius: 1vw;">
                                        .</div>
                                    <p style="margin-top: 1vw; margin-left: 1vw; font-size: 0.65rem;">Perkembangan saat
                                        ini</p>
                                </div>

                                <div style="display: flex; width: 25vw; align-items: center; justify-content: center;">
                                    <div
                                        style="width: 10vw; height: 5px; background-color: #C4CBE0; border-radius: 1vw;">
                                        .</div>
                                    <p style="margin-top: 1vw; margin-left: 1vw; font-size: 0.65rem;">Target
                                        capaian/capaian minggu lalu</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="my-auto col-md-4 bg-white p-5" style="border-radius: 1vw;">
                        <div style="color: #1F2844;">
                            <p>Halo <b>Pengguna</b>!</p>
                            <p style="">Kamu terakhir mempelajari <b>Limit Tak Hingga - Subbab
                                    III</b>. pengen lanjut lagi ?</p>
                            <p class="text-white p-1"
                                style="background-color:#375679; text-align:center; border-radius:5px; cursor:pointer; font-size: 0.9 rem"
                                id="materi-nlp">Buka <b>Limit Tak Hingga - Subbab III</b></p>
                            <p class="bg-white"
                                style="color:#375679; text-align:center; border-radius:5px; border:1px solid; cursor:pointer; font-size: 1rem"
                                id="daftar-materi">Buka materi lainnya</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
                        <section id="konten">
            <div class="p-5">
                <h4>Bab Saya</h4>
                <br>
                <div style="background-color: #E3ECF5; border-radius: 0.5vw; padding: 2vw 3vw;">
                    <div class="col-md-12" style="background-color: white; border-radius: 0.5vw; padding: 2vw 1vw 2vw 3vw;"
                        id="bab">
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
            <img class="img-fluid" src="image/logo otodu terang.png" alt="logo"
                style="width: 10vw; margin-right: 2vw; margin-left: 2.3vw;"> <!-- 120px -->
            <p id="footer-p" style="font-family: 'Martian Mono'; font-size: 0.8vw; margin-top: 4vw;">@2024 OTODU Limited</p>
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