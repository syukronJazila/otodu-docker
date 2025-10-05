<?php
session_start();
include 'config.php';

// if (isset($_SESSION['login'])) {
//     header("Location: dashboard.html");
//     exit;
// }

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_user = $_SESSION['user_id'];
    $materi = isset($_POST['materi']) ? implode(';', $_POST['materi']) : '';
    $jenjang = [];
    
    foreach ($_POST['materi'] as $mat) {
        $jenjangKey = "jenjang-" . $mat;
        if (isset($_POST[$jenjangKey])) {
            $jenjang[] = $mat . '-' . $_POST[$jenjangKey];
        }
    }
    $jenjangStr = implode(';', $jenjang);
    
    $onlineAvailability = isset($_POST['online-availability']) ? $_POST['online-availability'] : 'unavailable';
    $online = [];
    if ($onlineAvailability === 'available') {
        foreach ($_POST['online-start'] as $index => $start) {
            $online[] = $start . ' - ' . $_POST['online-end'][$index];
        }
        $onlineStr = implode(';', $online);
    }else {
        $onlineStr = 'N/A';
    }
    
    $offlineAvailability = isset($_POST['offline-availability']) ? $_POST['offline-availability'] : 'unavailable';
    $offline = [];
    if ($offlineAvailability === 'available') {
        foreach ($_POST['offline-start'] as $index => $start) {
            $offline[] = $start . '-' . $_POST['offline-end'][$index];
        }
        $offlineStr = implode(';', $offline);
    }else {
        $offlineStr = 'N/A';
    }
    
    $majors = isset($_POST['majors']) ? $_POST['majors'] : [];
    $universities = isset($_POST['universities']) ? $_POST['universities'] : [];
    $studyHistory = [];
    foreach ($majors as $index => $major) {
        $studyHistory[] = $major . ' - ' . $universities[$index];
    }
    $studyHistoryStr = implode(';', $studyHistory);
    
    // Simpan data ke dalam satu tabel
    try {
        $stmt = $conn->prepare("
            INSERT INTO data_mentor (
                id_user, materi, jenjang, online, offline, riwayat_studi
            ) VALUES (?, ?, ?, ?, ?, ?)
        ");
        $stmt->bind_param("ssssss", $id_user, $materi, $jenjangStr, $onlineStr, $offlineStr, $studyHistoryStr);
        $stmt->execute();

        echo "success";
        // header("Location: dashboard.php");
        exit;
    } catch (Exception $e) {
        echo "Terjadi kesalahan: " . $e->getMessage();
    }
    
    $conn->close();
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

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
        padding: 20px;
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

    .card {
        margin: 50px auto;
        padding: 30px 50px;
        border-radius: 10px;
        max-width: 650px;
        /* nilai awal 600px */
    }

    .tambah-btn {
        background-color: white;
        color: #4A90E2;
        border: 1px solid #4D62A5;
    }

    .tambah-btn:hover {
        background-color: #4D62A5;
        color: white;
    }

    .time-select {
        height: 25px;
    }

    .remove-icon {
        color: red;
        cursor: pointer;
        font-size: 16px;
        margin-left: 10px;
    }

    .remove-icon:hover {
        color: darkred;
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
        </div>
    </nav>

    <div class="card">
        <h3>Daftar Mentor</h3>
        <form id="registerForm" method="POST">

            <label for="materi" class="form-label">Pilih Materi yang Bisa Diajarkan</label><br>

            <!-- Checkbox untuk memilih materi -->
            <input type="checkbox" id="MM" name="materi[]" value="MM" onchange="updateJenjangOptions()">
            <label for="MM">Matematika</label><br>
            <div id="jenjang-MM" style="display:none; margin-bottom: 10px">
                <label for="jenjang-MM-select">Jenjang untuk Matematika:</label>
                <select id="jenjang-MM-select" name="jenjang-MM" class="form-select">
                    <option value="">Pilih Jenjang</option> <!-- Placeholder yang tidak akan terkirim -->
                </select>
            </div>

            <input type="checkbox" id="Bing" name="materi[]" value="Bing" onchange="updateJenjangOptions()">
            <label for="Bing">Bahasa Inggris</label><br>
            <div id="jenjang-Bing" style=" display:none; margin-bottom: 10px">
                <label for="jenjang-Bing-select" style="font-size: 0.9em;">Jenjang untuk Bahasa
                    Inggris:</label>
                <select id="jenjang-Bing-select" name="jenjang-Bing" class="form-select">
                    <option value="">Pilih Jenjang</option> <!-- Placeholder yang tidak akan terkirim -->
                </select>
            </div>

            <input type="checkbox" id="Daspro" name="materi[]" value="Daspro" onchange="updateJenjangOptions()">
            <label for="Daspro">Dasar Pemrograman</label><br>
            <div id="jenjang-Daspro" style="display:none; margin-bottom: 10px">
                <label for="jenjang-Daspro-select">Jenjang untuk Dasar Pemrograman:</label>
                <select id="jenjang-Daspro-select" name="jenjang-Daspro" class="form-select">
                    <option value="">Pilih Jenjang</option> <!-- Placeholder yang tidak akan terkirim -->
                </select>
            </div>

            <input type="checkbox" id="UTBK" name="materi[]" value="UTBK" onchange="updateJenjangOptions()">
            <label for="UTBK">UTBK</label><br>

            <br>

            <label for="online-availability" class="form-label">Ketersediaan Online</label><br>

            <input type="checkbox" id="online-available" name="online-availability" value="available"
                onchange="toggleOnlineAvailability()">
            <label for="online-available">Saya tersedia secara online</label><br>

            <div id="online-times" style="display:none;">
                <label>Rentang Waktu Online:</label><br>
                <div id="online-time-slots">
                    <div class="time-slot">
                        <label for="online-start-1">Mulai:</label>
                        <input type="time" id="online-start-1" class="time-select" name="online-start[]" required>
                        <label for="online-end-1">Sampai:</label>
                        <input type="time" id="online-end-1" class="time-select" name="online-end[]" required>
                        <i class="fas fa-trash-alt remove-icon" onclick="removeOfflineSlot(this)"></i>
                    </div>
                </div>
                <button class="tambah-btn" type="button" onclick="addOnlineSlot()">Tambah Waktu</button><br>
            </div>

            <br>

            <label for="offline-availability" class="form-label">Ketersediaan Offline</label><br>

            <input type="checkbox" id="offline-available" name="offline-availability" value="available"
                onchange="toggleOfflineAvailability()">
            <label for="offline-available">Saya tersedia secara offline</label><br>

            <div id="offline-times" style="display:none;">
                <label>Rentang Waktu Offline:</label><br>
                <div id="offline-time-slots">
                    <div class="time-slot">
                        <label for="offline-start-1">Mulai:</label>
                        <input type="time" id="offline-start-1" class="time-select" name="offline-start[]" required>
                        <label for="offline-end-1">Sampai:</label>
                        <input type="time" id="offline-end-1" class="time-select" name="offline-end[]" required>
                        <i class="fas fa-trash-alt remove-icon" onclick="removeOfflineSlot(this)"></i>
                    </div>
                </div>
                <button class="tambah-btn" type="button" onclick="addOfflineSlot()">Tambah Waktu</button><br>
            </div>

            <br>

            <!-- <input type="checkbox" id="no-schedule" name="no-schedule" value="no-schedule">
            <label for="no-schedule">Saya tidak memiliki jadwal yang tersedia</label><br> -->

            <label for="study-entries" class="form-label">Riwayat Studi</label><br>

            <div id="study-entries">
                <div class="study-entry">
                    <label for="major-1">Jurusan:</label>
                    <input type="text" id="major-1" name="majors[]" placeholder="Contoh: Teknik Informatika" required>
                    <i class="fas fa-trash-alt remove-icon" onclick="removeStudyEntry(this)"></i>
                    <br>
                    <label for="university-1">Kampus:</label>
                    <input type="text" id="university-1" name="universities[]"
                        placeholder="Contoh: Universitas Indonesia" required>
                </div>
            </div>

            <button type="button" onclick="addStudyEntry()" class="tambah-btn">Tambah Riwayat Studi</button>
            <br><br>

            <button type="submit" id="register-btn" class="btn">Daftar</button>
        </form>
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

    <script>
    $(document).ready(function() {
        $('#registerForm').on('submit', function(e) {
            e.preventDefault(); // Mencegah form submit secara default
            console.log("tes")
            $.ajax({
                url: 'info_mentor.php', // Arahkan ke file PHP untuk proses
                type: 'POST',
                data: $(this).serialize(), // Mengambil semua data form
                success: function(response) {
                    if (response === 'success') {
                        window.location.href =
                            'dashboard.php'; // Arahkan ke halaman login jika berhasil
                    } else {
                        alert(response); // Tampilkan pesan kesalahan
                    }
                }
            });
        });
    });
    </script>

    <script>
    const jenjangOptions = {
        'MM': ['SD Kelas 1', 'SD Kelas 2', 'SD Kelas 3', 'SMP Kelas 1', 'SMP Kelas 2', 'SMP Kelas 3',
            'SMA Kelas 10', 'SMA Kelas 11', 'SMA Kelas 12'
        ],
        'Bing': ['SD Kelas 1', 'SD Kelas 2', 'SD Kelas 3', 'SMP Kelas 1', 'SMP Kelas 2', 'SMP Kelas 3',
            'SMA Kelas 10', 'SMA Kelas 11', 'SMA Kelas 12'
        ],
        'Daspro': ['SD', 'SMP', 'SMA', 'Universitas']
    };

    function updateJenjangOptions() {
        // Cek masing-masing checkbox dan tampilkan dropdown sesuai dengan materi yang dipilih
        ['MM', 'Bing', 'Daspro'].forEach(materi => {
            const isChecked = document.getElementById(materi).checked;
            const jenjangDiv = document.getElementById(`jenjang-${materi}`);
            const jenjangSelect = document.getElementById(`jenjang-${materi}-select`);

            if (isChecked) {
                jenjangDiv.style.display = 'block';
                // Reset dropdown sebelum menambahkan opsi baru
                jenjangSelect.innerHTML =
                    `<option value="">Pilih Jenjang</option>`; // Placeholder untuk dropdown

                // Menambahkan opsi berdasarkan materi
                jenjangOptions[materi].forEach(option => {
                    let opt = document.createElement('option');
                    opt.value = option;
                    opt.textContent = option;
                    jenjangSelect.appendChild(opt);
                });
            } else {
                jenjangDiv.style.display = 'none';
            }
        });
    }
    </script>

    <script>
    function toggleOnlineAvailability() {
        const onlineTimesDiv = document.getElementById("online-times");
        const onlineCheckbox = document.getElementById("online-available");
        if (onlineCheckbox.checked) {
            onlineTimesDiv.style.display = "block";
        } else {
            onlineTimesDiv.style.display = "none";
        }
    }

    function toggleOfflineAvailability() {
        const offlineTimesDiv = document.getElementById("offline-times");
        const offlineCheckbox = document.getElementById("offline-available");
        if (offlineCheckbox.checked) {
            offlineTimesDiv.style.display = "block";
        } else {
            offlineTimesDiv.style.display = "none";
        }
    }

    function addOnlineSlot() {
        const onlineTimeSlotsDiv = document.getElementById("online-time-slots");
        const newSlotDiv = document.createElement("div");
        newSlotDiv.classList.add("time-slot");
        newSlotDiv.innerHTML = `
        <label for="online-start">Mulai:</label>
        <input type="time" name="online-start[]">
        <label for="online-end">Sampai:</label>
        <input type="time" name="online-end[]">
         <i class="fas fa-trash-alt remove-icon" onclick="removeOfflineSlot(this)"></i>
      `;
        onlineTimeSlotsDiv.appendChild(newSlotDiv);
    }

    function addOfflineSlot() {
        const offlineTimeSlotsDiv = document.getElementById("offline-time-slots");
        const newSlotDiv = document.createElement("div");
        newSlotDiv.classList.add("time-slot");
        newSlotDiv.innerHTML = `
        <label for="offline-start">Mulai:</label>
        <input type="time" name="offline-start[]">
        <label for="offline-end">Sampai:</label>
        <input type="time" name="offline-end[]">
         <i class="fas fa-trash-alt remove-icon" onclick="removeOfflineSlot(this)"></i>
      `;
        offlineTimeSlotsDiv.appendChild(newSlotDiv);
    }

    function removeOnlineSlot(button) {
        const slotDiv = button.closest(".time-slot");
        slotDiv.remove();
    }

    function removeOfflineSlot(button) {
        const slotDiv = button.closest(".time-slot");
        slotDiv.remove();
    }
    </script>

    <script>
    // Counter untuk ID unik setiap entry
    let studyCounter = 1;

    function addStudyEntry() {
        studyCounter++;
        const studyEntriesDiv = document.getElementById("study-entries");

        const newStudyDiv = document.createElement("div");
        newStudyDiv.classList.add("study-entry");
        newStudyDiv.innerHTML = `
        <br>
        <label for="major-${studyCounter}">Jurusan:</label>
        <input type="text" id="major-${studyCounter}" name="majors[]" placeholder="Contoh: Teknik Informatika">
        <i class="fas fa-trash-alt remove-icon" onclick="removeStudyEntry(this)"></i>
        <br>
        <label for="university-${studyCounter}">Kampus:</label>
        <input type="text" id="university-${studyCounter}" name="universities[]" placeholder="Contoh: Universitas Indonesia">
      `;

        studyEntriesDiv.appendChild(newStudyDiv);
    }

    function removeStudyEntry(button) {
        const studyEntryDiv = button.closest(".study-entry");
        studyEntryDiv.remove();
    }
    </script>
</body>

</html>