<?php
session_start();
include 'config.php';

if (isset($_SESSION['login'])) {
    header("Location: dashboard.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $nama = $_POST['nama'];
    $nomor = $_POST['nomor'];
    $latitude = $_POST['latitude'];
    $longitude = $_POST['longitude'];
    $password = $_POST['password'];
    $passwordKonfirmasi = $_POST['passwordKonfirmasi'];
    $role = $_POST['role'];
    if ($role == 'Siswa') {
        $nama .= "_new";
    } else if ($role == 'Mentor') {
        $nama .= "_newMentor";
    }

    if ($password !== $passwordKonfirmasi) {
        echo "Password dan Konfirmasi Password tidak sama.";
        exit;
    } elseif (empty($latitude) || empty($longitude)) {
        echo "Lokasi belum dipilih. Silakan pilih lokasi pada peta.";
        exit;
    } else {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Cek apakah email sudah terdaftar
        $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
            
        if ($result->num_rows > 0) {
            echo "Email sudah terdaftar. Silakan gunakan email lain.";
            exit;
        } else {
            $stmt = $conn->prepare("INSERT INTO users (email, nama, nomor, latitude, longitude, password, role) VALUES (?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("sssddss", $email, $nama, $nomor, $latitude, $longitude, $hashedPassword, $role);
            
            if ($stmt->execute()) {
                $_SESSION['new_user'] = true;
                echo "success";
            } else {
                echo "Gagal melakukan registrasi. Silakan coba lagi.";
            }
            exit;
        }
        $stmt->close();
        $conn->close();

    }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Martian+Mono:wght@100..800&display=swap" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <style>
    * {
        font-family: "Poppins";
    }

    body {
        background-color: #E3ECF5;
    }

    .navbar {
        background-color: white;
        padding-inline-start: 15px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .logo {
        display: flex;
        align-items: center;
    }

    h5 {
        color: #4D62A5;
        font-weight: 700;
    }

    h3 {
        color: black;
        font-weight: 700;
        margin-bottom: 30px;
    }

    #masuk-btn {
        background-color: white;
        color: #4A90E2;
        border: 1px solid #4D62A5;
    }

    #masuk-btn:hover {
        background-color: #4D62A5;
        color: white;
    }

    .card {
        margin: 50px auto;
        padding: 30px 50px;
        border-radius: 10px;
        max-width: 650px;
        /* nilai awal 600px */
    }

    .form-check {
        margin: 25px 0;
    }

    #register-btn {
        background-color: #4D62A5;
        color: white;
        width: 100%;
    }

    #register-btn:hover {
        background-color: white;
        color: #4D62A5;
        border: 1px solid #4D62A5;
    }

    .akun {
        margin-top: 15px;
        text-align: center;
    }

    .akun a {
        color: #4A90E2;
    }

    input::placeholder {
        font-size: 0.95rem;
        color: #888;
    }

    .form-label {
        font-weight: 500;
    }

    #map {
        height: 400px;
        width: 100%;
    }

    #checkbox {
        cursor: pointer;
    }

    footer {
        display: flex;
        justify-content: flex-start;
        align-items: center;
        background-color: #1F2844;
        padding: 20px;
        color: white;
    }

    .form-select {
        background-color: white;
        color: black;
        border-radius: 0.5vw;
        border: 1px solid #ccc;
        padding: 0.5vw 1vw;
        width: 100%;
        margin-bottom: 2vh;
    }

    .form-select option {
        background-color: white;
        color: black;
    }

    /* Menghilangkan panah naik dan turun pada input bertipe number */
    /* Untuk browser Chrome, Safari, Edge, dan Opera */
    input[type=number]::-webkit-outer-spin-button,
    input[type=number]::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    /* Untuk browser Firefox */
    input[type=number] {
        -moz-appearance: textfield;
    }

    @media (max-width: 600px) {
        .card {
            margin: 0;
            border-radius: 0px;
            padding: 25px 7vw;
        }

        .form-control {
            height: 45px;
            font-size: 1.2rem;
        }

        #nomor {
            margin-top: 20px;
            margin-bottom: 7px;
        }

        .form-label {
            font-weight: 500;
            font-size: 1.2rem;
        }

        select {
            height: 42px;
            font-size: 1.1rem;
        }

        #register-btn {
            height: 5.5vh;
            font-size: 1.1rem;
        }

        footer {
            display: flex;
        }
    }
    </style>

</head>

<body>

    <nav class="navbar">
        <div class="container">
            <div class="logo">
                <img src="image/logo otodu2.png" alt="logo" style="width: 130px; margin-right: 10px;">
            </div>
            <a href="login.php" class="btn" id="masuk-btn">Masuk</a>
        </div>
    </nav>

    <div class="card">
        <h3>Daftar Akun</h3>
        <form id="registerForm" method="POST">

            <div class="form-group">
                <label for="nama" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control" name="nama" placeholder="Masukkan nama lengkap" required>
            </div>

            <div class="form-group row g-2">
                <div class="col-md-6">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" placeholder="Contoh: john@gmail.com" required>
                </div>

                <div class="col-md-6" id="nomor">
                    <label for="nomor" class="form-label">Nomor Telepon</label>
                    <input type="number" class="form-control" name="nomor" placeholder="Contoh: 08xx" required
                        onwheel="this.blur()">
                </div>
            </div>


            <div class="form-group">
                <label for="map" class="form-label">Pilih Lokasi</label>
                <div id="map" name="map"></div>
            </div>

            <input type="hidden" name="latitude" id="latitude">
            <input type="hidden" name="longitude" id="longitude">

            <label for="role" class="form-label">Peran</label>
            <select name="role" class="form-select dp1" aria-label="Default select example">
                <option selected value="Siswa">Siswa</option>
                <option value="Mentor">Mentor</option>
            </select>

            <div class="form-group">
                <label for="Password" class="form-label">Kata Sandi</label>
                <input type="password" class="form-control" name="password" placeholder="Masukkan kata sandi" required>
            </div>

            <div class="form-group">
                <label for="PasswordKonfirmasi" class="form-label">Konfirmasi Kata Sandi</label>
                <input type="password" class="form-control" name="passwordKonfirmasi"
                    placeholder="Masukkan konformasi kata sandi" required>
            </div>

            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="checkbox" required>
                <label for="checkbox" class="form-checkbox-label">Saya menyetujui syarat dan ketentuan</label>
            </div>

            <button type="submit" id="register-btn" class="btn">Daftar</button>
        </form>
        <p class="akun">
            Sudah punya akun? <a href="login.php">Masuk disini</a>
        </p>
    </div>

    <footer>
        <img src="image/logo otodu terang.png" alt="logo" style="width: 120px; margin-right: 2vw; margin-left: 2.3vw;">
        <p style="font-family: 'Martian Mono'; font-size: 10px; margin-top: 17px;">@2024 OTODU Limited</p>
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script async defer
        src="https://maps.gomaps.pro/maps/api/js?key=AlzaSyeT3ed8_nmf_1VGDtIOF0Z0FYT88xg945v&callback=initMap"></script>

    <script>
    function initMap() {
        // Lokasi default (Medan) jika geolokasi tidak diizinkan
        var defaultLocation = {
            lat: 3.5833,
            lng: 98.6667
        };

        // Inisialisasi peta
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 13,
            center: defaultLocation
        });

        // Marker default pada lokasi Medan
        var marker = new google.maps.Marker({
            position: defaultLocation,
            map: map,
            draggable: true
        });

        // Fungsi untuk memperbarui marker dan pusat peta
        function updateMapLocation(lat, lng) {
            var newLocation = {
                lat: lat,
                lng: lng
            };
            map.setCenter(newLocation);
            marker.setPosition(newLocation); // Pindahkan marker ke lokasi baru

            // Update nilai latitude dan longitude ke input tersembunyi
            document.getElementById('latitude').value = lat;
            document.getElementById('longitude').value = lng;
        }

        // Gunakan Geolocation API untuk mendapatkan lokasi pengguna
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(
                function(position) {
                    var userLat = position.coords.latitude;
                    var userLng = position.coords.longitude;
                    updateMapLocation(userLat, userLng); // Perbarui peta dengan lokasi pengguna
                },
                function() {
                    // Jika pengguna menolak akses lokasi, tetap gunakan defaultLocation
                    alert("Geolocation tidak diizinkan, menggunakan lokasi default.");
                }
            );
        } else {
            // Jika browser tidak mendukung Geolocation API
            alert("Browser Anda tidak mendukung Geolocation, menggunakan lokasi default.");
        }

        // Listener untuk marker yang dapat dipindahkan
        marker.addListener('dragend', function(event) {
            var lat = event.latLng.lat();
            var lng = event.latLng.lng();
            updateMapLocation(lat, lng); // Perbarui lokasi
            // alert("Latitude: " + lat + ", Longitude: " + lng);
        });

        // Listener untuk klik di peta
        map.addListener('click', function(event) {
            var lat = event.latLng.lat();
            var lng = event.latLng.lng();
            marker.setPosition(event.latLng); // Pindahkan marker ke lokasi yang diklik
            updateMapLocation(lat, lng); // Perbarui lokasi
            // alert("Latitude: " + lat + ", Longitude: " + lng);
        });
    }
    </script>
    <script>
    $(document).ready(function() {
        $('#registerForm').on('submit', function(e) {
            e.preventDefault(); // Mencegah form submit secara default

            $.ajax({
                url: 'registrasi.php', // Arahkan ke file PHP untuk proses
                type: 'POST',
                data: $(this).serialize(), // Mengambil semua data form
                success: function(response) {
                    if (response === 'success') {
                        window.location.href =
                            'login.php'; // Arahkan ke halaman login jika berhasil
                    } else {
                        alert(response); // Tampilkan pesan kesalahan
                    }
                }
            });
        });
    });
    </script>

</body>

</html>