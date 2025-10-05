<?php
session_start();

// Cek apakah user sudah login, jika belum arahkan ke login.php
if( !isset($_SESSION['login']) ){
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Papan Peringkat</title>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Martian+Mono:wght@100..800&display=swap" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Rethink+Sans:ital,wght@0,400..800;1,400..800&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">

    <style>
    * {
        font-family: "Poppins";
    }

    body {
        background-color: #F6F7FA;
        display: flex;
        flex-direction: column;
        min-height: 100vh;
        /* Minimal setinggi layar */
        margin: 0;
        /* Menghilangkan margin body default */
    }

    a {
        text-decoration: none;
    }

    .main {
        flex: 1;
    }

    .container-2 {
        display: flex;
        align-items: center;
        gap: 0;
        margin-top: 2vw;
    }

    .text-container {
        align-items: center;
        padding: 1.5vw;
        border-radius: 0.4vw;
        background-color: #4D62A5;
        opacity: 85%;
        display: inline-flex;
        justify-content: center;
        max-height: fit-content;
        width: fit-content;
        margin: 0 auto;
    }

    #logo {
        margin-left: 1.5vw;
        margin-right: 1vw;
    }

    #trophy {
        margin-right: 1vw;
        margin-left: 4vw;
    }

    .text-container h4 {
        color: white;
        font-weight: 500;
        margin-top: 0.6vw;
    }

    #text-logo {
        margin-right: 4vw;
    }

    .dropdown-container {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 2vw;
    }

    .dropdown {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .form-select {
        background-color: white;
        color: black;
        border-radius: 0.5vw;
        border: 1px solid #ccc;
        padding: 0.5vw 1vw;
        width: 230px;
    }

    .form-select option {
        background-color: white;
        color: black;
    }

    .table-container {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-bottom: 1vw;
    }

    .content-table {
        font-family: 'Rethink Sans';
        border-collapse: collapse;
        margin: 25px 0;
        font-size: 0.9em;
        min-width: 400px;
        border-radius: 5px;
        overflow: hidden;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
    }

    .content-table thead tr {
        background-color: #60B1ED;
        color: #ffffff;
        text-align: center;
        font-weight: 500;
    }

    .content-table th,
    .content-table td {
        padding: 12px 15px;
    }

    .content-table tbody tr {
        border-bottom: 1px solid #dddddd;
    }

    .content-table tbody td {
        text-align: center;
    }

    .content-table tbody tr:nth-of-type(even) {
        background-color: #EAF0FE;
    }

    .content-table tbody tr:nth-of-type(odd) {
        background-color: #F6F7FA;
    }

    footer {
        display: flex;
        justify-content: flex-start;
        align-items: center;
        background-color: #1f2844;
        color: white;
        bottom: 0;
        width: 100%;
        text-align: center;
        padding: 2vw;
    }

    #nlp {
        background-color: #4D62A5;
        color: white;
        font-weight: 450;
    }

    #trophy {
        width: 3vw;
    }

    #logo {
        height: 5vh;
    }

    @media (max-width: 600px) {
        #trophy {
            width: 40px;
            margin-right: 15px;
        }

        #logo {
            height: 4vh;
            margin: 0 3vw
        }

        .container-2 {
            margin-top: 4vh;
        }

    }
    </style>

</head>

<body style="background-color: #F6F7FA">

    <?php include 'navbar.php';?>

    <div class="main">
        <div class="container-2">
            <div class="text-container">
                <img src="image/trophy.png" style="" id="trophy">
                <h4>Papan Peringkat</h4>
                <img src="image/logo otodu.png" id="logo">
                <h4 style="font-family: 'Martian Mono'; font-weight: 600;" id="text-logo">OTODU</h4>
            </div>
        </div>

        <div class="dropdown-container">
            <div class="dropdown">
                <select class="form-select dp1" id="dp1" aria-label="Default select example">
                    <option selected>Semua</option>
                    <option value="sd">SD</option>
                    <option value="smp">SMP</option>
                    <option value="sma">SMA</option>
                </select>
                <select class="form-select dp2" id="dp2" aria-label="Default select example">
                    <option selected>Semua</option>
                    <option value="matematika">Matematika</option>
                    <option value="bahasa_inggris">Bahasa Inggris</option>
                    <option value="daspro">Dasar Pemrograman</option>
                    <option value="utbk">UTBK</option>
                </select>
            </div>
        </div>


        <div class="table-container">
            <table class="content-table">
                <thead>
                    <tr>
                        <td><b>No</b></td>
                        <td><b>Nama</b></td>
                        <td><b>Jenjang</b></td>
                        <td><b>Materi</b></td>
                        <td><b>Poin</b></td>
                    </tr>
                </thead>
                <tbody id="leaderboard-table">
                </tbody>
            </table>
        </div>
    </div>

    <footer>
        <img src="image/logo otodu terang.png" alt="logo" style="width: 120px; margin-right: 2vw; margin-left: 2.3vw" />
        <p style="font-family: 'Martian Mono'; font-size: 10px; margin-top: 17px">
            @2024 OTODU Limited
        </p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script>
    function adjustWidth() {
        // Ambil elemen dengan class text-container
        var textContainer = document.querySelector('.text-container');

        // Dapatkan lebar dari text-container
        var textContainerWidth = textContainer.offsetWidth;

        // Ambil elemen dengan class dropdown-container dan content-table
        var dropdownContainer = document.querySelector('.dropdown');
        var tableContainer = document.querySelector('.content-table');

        // Terapkan lebar text-container ke dropdown-container dan tableContainer
        dropdownContainer.style.width = textContainerWidth + 'px';
        tableContainer.style.width = textContainerWidth + 'px';

        loadLeaderboard();
    }

    window.onload = adjustWidth;

    // Panggil fungsi saat ukuran layar berubah
    window.addEventListener('resize', adjustWidth);

    // Fungsi untuk memuat data leaderboard
    function loadLeaderboard() {
        const jenjang = document.getElementById("dp1").value;
        const materi = document.getElementById("dp2").value;

        const xhr = new XMLHttpRequest();
        xhr.open("GET", `leaderboard_bc.php?jenjang=${jenjang}&materi=${materi}`, true);
        xhr.onload = function() {
            if (this.status === 200) {
                document.getElementById("leaderboard-table").innerHTML = this.responseText;
            }
        };
        xhr.send();
    }

    // Panggil loadLeaderboard ketika dropdown berubah
    document.getElementById("dp1").addEventListener("change", loadLeaderboard);
    document.getElementById("dp2").addEventListener("change", loadLeaderboard);
    </script>

</body>

</html>