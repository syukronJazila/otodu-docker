<?php
include 'function.php';
session_start();

if( !isset($_SESSION['login']) ){
    header("Location: login.php");
    exit;
}

$id = $_SESSION['user_id'];
$koin = ambilData("SELECT koin FROM users WHERE id = $id");

// Ambil latitude dan longitude pengguna dari POST
$userLat = $_SESSION['latitude']; 
$userLng = $_SESSION['longitude']; 

// Query untuk mengambil data Mentor (role = 'Mentor')
$mentors = ambilData("SELECT * FROM users WHERE role = 'Mentor'");

// Fungsi untuk menghitung jarak antara dua koordinat (Haversine formula)
function calculateDistance($lat1, $lon1, $lat2, $lon2) {
    $earthRadius = 6371; // Radius bumi dalam kilometer
    
    $latFrom = deg2rad($lat1);
    $lonFrom = deg2rad($lon1);
    $latTo = deg2rad($lat2);
    $lonTo = deg2rad($lon2);

    $latDiff = $latTo - $latFrom;
    $lonDiff = $lonTo - $lonFrom;

    $a = sin($latDiff / 2) * sin($latDiff / 2) +
         cos($latFrom) * cos($latTo) *
         sin($lonDiff / 2) * sin($lonDiff / 2);
    $c = 2 * atan2(sqrt($a), sqrt(1 - $a));

    return $earthRadius * $c; // Mengembalikan jarak dalam kilometer
}

// Filter mentor yang jaraknya kurang dari 2 km
// $nearbyMentors = [['nama' => 'Lokasi pengguna', 'latitude' => $userLat, 'longitude' => $userLng]];
$nearbyMentors = [];
foreach ($mentors as $mentor) {
    $distance = calculateDistance($userLat, $userLng, $mentor['latitude'], $mentor['longitude']);
    $mentor['jarak'] = number_format($distance,2);
    $nearbyMentors[] = $mentor; // Menambahkan mentor ke array jika jaraknya <= 2 km

    usort($nearbyMentors, function ($a, $b) {
        return $a['jarak'] <=> $b['jarak'];
    });
}

include 'navbar.php';
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">

    <title>Cari Mentor</title>
    <style>
    .logo img {
        width: 10vw;
        margin-right: 1vw;
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
        padding: 30px;
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

    .intro {
        padding: 5vw 5vw 10vw 27vw;
        background-image: url('./image/gradien\ blue.avif');
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: cover;
        color: white;
        font-size: 16px;
    }

    #map {
        height: 350px;
        width: 350px;
    }


    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: "Rethink Sans";
    }

    body {
        /* min-height: 100vh; */
        background: white;
        color: white;
        background-size: cover;
        background-position: center;
    }

    .main {
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 50px;
    }

    header {
        background: #5E88B6;
    }

    #judul-materi {
        padding-top: 2vw;
        padding-left: 1vw;
    }

    #judul-materi {
        padding-top: 2vw;
        padding-left: 1vw;
    }

    #nama-materi {
        padding-top: 0.5vw;
        padding-left: 1vw;
        padding-bottom: 1vw;
        font-weight: 700;
        font-size: 1em;
    }

    .head {
        position: fixed;
        top: 0;
        left: 0;
        width: 100vw;
        z-index: 1000;
    }

    table td {
        border: 1px;
    }

    table td {
        border: 1px;
    }

    .section-title {
        border-bottom: 0.1vw solid #1F2844;
        padding-bottom: 2px;
        display: inline-block;
        margin-bottom: 1rem;
    }

    #map {
        height: 300px;
        width: 100%;
        background-color: #f8f9fa;
        border-radius: 8px;
    }

    @media (max-width: 768px) {
        .button-container {
            flex-direction: column;
        }

        .button-container button {
            margin: 0.5rem 0;
            width: 100%;
        }

        #map {
            height: 200px;
            margin-top: 1rem;
        }
    }

    /* css konten halaman (kode anugrah) */
    .box {
        height: 4.5vw;
        color: white;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 1.4vw;
    }

    .boxleft {
        color: white;
        display: flex;
        font-size: 1.4vw;
        flex-direction: column;
    }

    .boxleft {
        color: white;
        display: flex;
        font-size: 1.4vw;
        flex-direction: column;
    }

    .full-row {
        background-color: #375679;
        padding: 0;
        /* Remove horizontal padding */
    }

    .inner-box {
        border-radius: 1vw;
    }

    .materi_ajar div {
        display: flex;
        flex-wrap: wrap;
    }

    .materi_ajar div button:nth-child(2n) {
        margin-right: 0;
    }

    #btn-outline-utbk-s {
        color: #fff;
        background-color: #89622B;
        border-color: #89622B;
    }

    #btn-outline-mtk-s {
        color: #fff;
        background-color: #793738;
        border-color: #793738;
    }

    #btn-outline-bing-s {
        color: #fff;
        background-color: #375679;
        border-color: #375679;
    }

    #btn-outline-dp-s {
        color: #fff;
        background-color: #6C3779;
        border-color: #6C3779;
    }

    #btn-outline-on-s {
        color: #fff;
        background-color: #6A7937;
        border-color: #6A7937;
    }

    #btn-outline-off-s {
        color: #fff;
        background-color: #377939;
        border-color: #377939;
    }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/button.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Rethink+Sans:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400;1,500;1,600;1,700;1,800&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Martian+Mono:wght@100..800&display=swap" rel="stylesheet">


</head>

<body style="font-family: 'Rethink Sans', sans-serif;">
    <header>

        <div class="intro">
            <div style="width: 20vw;">Otodidak jauh lebih terarah
                dengan..</div>
            <div style="display: flex;">
                <b>
                    Mentor &nbsp;
                    <img src="./image/otodu putih.png" width="20" height="12">
                    OTODU!
                </b>
            </div>
        </div>
    </header>

    <main>
        <div style="display: flex; justify-content: space-between; margin-left: 5vw;">
            <div style="display: flex;">
                <?php include "koin.php" ?>

                <div style="background-color: #4D62A5; color: white; padding: 0;">
                    <a href="riwayatmentor.php" class="btn btn-primary"
                        style="background-color: #4D62A5;  font-size: 14px; text-align: center; border: 0cm;"
                        tabindex="-1" role="button" aria-disabled="true">
                        <div style="display: flex;" id="riwayat-mentor">
                            <div style="margin-right: 0.4vw;">
                                <img src="./image/riwayat.png" width="20" height="20">
                            </div>
                            <div style="text-align: left;">Riwayat transaksi</div>
                        </div>
                    </a>
                </div>
            </div>

            <div>
                <?php include "navbarkecil.php" ?>
            </div>
        </div>
        <div class="container py-4">
            <div class="row g-4">
                <!-- Kolom Mentor Search -->
                <div class="col-12 col-md-4">
                    <h5 class="mb-3">Mentor apa yang Kamu cari?</h5>

                    <!-- Materi Sekolah Section -->
                    <div class="mb-4">
                        <div class="section-title">Materi sekolah</div>

                        <div class="d-flex flex-wrap gap-2 mb-3">
                            <button type="button" class="btn btn-outline-mtk rounded-pill" data-value="MM">
                                Matematika
                            </button>
                            <button type="button" class="btn btn-outline-bing rounded-pill" data-value="Bing">
                                B. Inggris
                            </button>
                        </div>

                        <div class="d-flex flex-wrap gap-2">
                            <button type="button" class="btn btn-outline-utbk rounded-pill" data-value="UTBK">
                                UTBK
                            </button>
                            <button type="button" class="btn btn-outline-dp rounded-pill" data-value="Daspro">
                                Dasar Pemrograman
                            </button>
                        </div>
                    </div>

                    <!-- Pemrograman Lanjutan Section -->
                    <div>
                        <div class="section-title">Pemrograman Lanjutan</div>

                        <div class="d-flex flex-wrap gap-2 mb-3">
                            <button type="button" class="btn btn-outline-bing rounded-pill" data-value="desain fa">
                                <i>Front-end App</i>
                            </button>
                            <button type="button" class="btn btn-outline-bing rounded-pill" data-value="desain fw">
                                <i>Front-end Web</i>
                            </button>
                        </div>

                        <div class="d-flex flex-wrap gap-2">
                            <button type="button" class="btn btn-outline-bing rounded-pill" data-value="desain be">
                                <i>Back-end</i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Kolom Ketersediaan -->
                <div class="col-12 col-md-4">
                    <h5 class="mb-3">Ketersediaan mentor?</h5>
                    <div class="d-flex flex-column gap-2 col-6">
                        <button type="button" class="btn btn-outline-off rounded-pill" data-value="offline">
                            Luring / <i>Offline</i>
                        </button>
                        <button type="button" class="btn btn-outline-on rounded-pill" data-value="online">
                            Daring / <i>Online</i>
                        </button>
                    </div>
                </div>

                <!-- Kolom Map -->
                <div class="col-12 col-md-4">
                    <h5 class="mb-3">Peta lokasi mentor</h5>
                    <div id="map"></div>
                </div>
            </div>
        </div>

        <h5 style="margin-left: 5vw;">List mentor</h5><br>

        <!--Baris pertama-->
        <div>
            <center id="mentor"
                style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 300px)); gap: 1vw; padding: 0 5vw;">
            </center>
        </div>

        </td>
        </tr>
        </table>
        </center>
        </div>
        </div>
    </main><br><br><br>

    <footer>
        <img src="image/logo otodu terang.png" alt="logo"
            style="width: 100px ; margin-right: 20px; margin-left: 23px; min-width: 10vw; height : 20px ; min-height : 2vw;">
        <!-- 120px -->
        <div style="font-size : 12px !important; font-family: 'Martian Mono';">@2024 OTODU Limited</div>
        <!-- <div class = "fs-6" style="font-family: 'Martian Mono'; ">@2024 OTODU Limited</div> -->
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <script async defer
        src="https://maps.gomaps.pro/maps/api/js?key=AlzaSyeT3ed8_nmf_1VGDtIOF0Z0FYT88xg945v&callback=initMap"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
    let selectedSubjects = new Set(); // Set untuk menyimpan pelajaran yang dipilih
    let selectedJadwal = new Set(); // Set untuk menyimpan pelajaran yang dipilih
    let selectedProgramLanjut = new Set(); // Set untuk menyimpan pelajaran yang dipilih
    let nearbyMentorses = <?php echo json_encode($nearbyMentors); ?>;

    document.querySelectorAll('.btn').forEach(button => {
        button.addEventListener('click', () => {
            console.log("tesss");
            const subject = button.getAttribute('data-value');


            if (subject.includes("desain")) {
                if (selectedProgramLanjut.has(subject)) {
                    selectedProgramLanjut.delete(subject); // Hapus jika sudah dipilih
                } else {
                    selectedProgramLanjut.add(subject); // Tambahkan jika belum dipilih
                }
            } else if (subject == 'online' || subject == 'offline') {
                if (selectedJadwal.has(subject)) {
                    selectedJadwal.delete(subject); // Hapus jika sudah dipilih
                } else {
                    selectedJadwal.add(subject); // Tambahkan jika belum dipilih
                }
            } else {
                if (selectedSubjects.has(subject)) {
                    selectedSubjects.delete(subject); // Hapus jika sudah dipilih
                } else {
                    selectedSubjects.add(subject); // Tambahkan jika belum dipilih
                }

            }

            const allClasses = Array.from(button.classList);
            console.log(allClasses[1] + "-s");

            // button.classList.toggle(allClasses[1] + "-s");

            const newId = allClasses[1] + "-s";

            if (button.id === newId) {
                button.removeAttribute('id');
            } else {
                button.id = newId;
            }


            // button.classList.toggle(allClasses[1] + "-s");
            kirimData();
        });
    });

    function kirimData() {
        // Kirim data menggunakan AJAX
        $.ajax({
            url: 'mentor_bc.php', // URL tujuan
            type: 'POST', // Metode pengiriman
            data: {
                subjects: Array.from(selectedSubjects),
                jadwal: Array.from(selectedJadwal),
                programLanjut: Array.from(selectedProgramLanjut),
                nearbyMentors: nearbyMentorses // Data mentor yang tersedia
            },
            success: function(response) {
                $('#mentor').html(response);
            },
            error: function(xhr, status, error) {
                console.error('Terjadi kesalahan:', error);
            }
        });
    }

    $(document).ready(function() {
        kirimData();
    });
    </script>

    <script>
    // Data dari PHP (Mentor dan lokasi pengguna)
    let nearbyMentors = <?php echo json_encode($nearbyMentors); ?>;
    let userLat = <?php echo $userLat; ?>;
    let userLng = <?php echo $userLng; ?>;

    // Fungsi untuk menginisialisasi peta
    function initMap() {
        let userLocation = {
            lat: userLat,
            lng: userLng
        };
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 13,
            center: userLocation
        });

        // Menambahkan marker untuk setiap mentor
        nearbyMentors.forEach(function(mentor) {
            // Konversi lat dan lng ke angka menggunakan Number() atau parseFloat()
            let mentorLat = Number(mentor.latitude);
            let mentorLng = Number(mentor.longitude);

            console.log(mentor.nama);

            // Cek apakah lat dan lng mentor valid
            if (!isNaN(mentorLat) && !isNaN(mentorLng) && mentor.jarak < 10) {
                let mentorLocation = {
                    lat: mentorLat,
                    lng: mentorLng
                };
                // console.log(mentorLocation);

                let ikon;
                if (mentor.nama == 'Lokasi pengguna') {
                    ikon = "image/red-marker-mini.png"
                    // ikon = "https://img.icons8.com/color/48/google-maps-new.png"
                    // ikon = 'http://maps.google.com/mapfiles/ms/icons/red-dot.png'
                } else {
                    ikon = "image/blue-marker-mini.png"
                    // ikon = "https://img.icons8.com/color-glass/480/google-maps-new.png"
                    // ikon = 'http://maps.google.com/mapfiles/ms/icons/blue-dot.png'
                }

                let mentorMarker = new google.maps.Marker({
                    position: mentorLocation,
                    map: map,
                    title: mentor.name,
                    icon: ikon
                });

                // Event listener untuk klik pada marker
                google.maps.event.addListener(mentorMarker, 'click', function() {
                    // alert('Marker ' + mentor.nama + ' diklik!');

                    // menampilkan info window
                    let infoWindow = new google.maps.InfoWindow({
                        content: `<h4>${mentor.nama}</h4><h5>Jarak: ${mentor.jarak} KM</h5>`
                    });
                    infoWindow.open(map, mentorMarker);
                });
            } else {
                console.log('Invalid mentor location for: ' + mentor.name);
            }
        });

        // Marker untuk lokasi pengguna
        let userMarker = new google.maps.Marker({
            position: userLocation,
            map: map,
            title: 'Your Location',
            icon: "image/red-marker-mini.png" // Merah untuk pengguna
        });

        // Event listener untuk klik pada marker lokasi pengguna
        google.maps.event.addListener(userMarker, 'click', function() {
            let infoWindow = new google.maps.InfoWindow({
                content: `<h5>Lokasi anda</h5>`
            });
            infoWindow.open(map, userMarker);
        });
    }

    document.getElementById('koin').addEventListener('click', function(event) {
        event.preventDefault();
        window.location.href = 'price.php';
    });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
    document.getElementById('pesan').addEventListener('click', function(event) {
        event.preventDefault();
        console.log("tesss")
        Swal.fire({
            title::"Pesan mentor berhasil",
            text: "Mohon menunggu, mentor akan segera menghubungi anda",
            icon: "success",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            confirmButtonText: "Ok",
        }).then((result) => {});
    });
    </script>

</body>

</html>