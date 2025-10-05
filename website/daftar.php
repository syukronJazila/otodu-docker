<?php
include 'function.php';
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

if (isset($_GET['kode_materi'])) {
    $_SESSION['kode_materi'] = $_GET['kode_materi'];
    $_SESSION['kode_subbab'] = $_GET['kode_subbab'];
    $_SESSION['kode_bab'] = $_GET['kode_bab'];

    $_SESSION['nama_subbab'] = $_GET['nama_subbab'];
    $_SESSION['nama_bab'] = $_GET['nama_bab'];
    $_SESSION['materi_terakhir'] = $_SESSION['nama_bab'].' - '.$_SESSION['nama_subbab'];
    $_SESSION['daftar_materi'] = true;
        
    header("Location: materi.php");
  
   
}

$id = $_SESSION['user_id'];
$koin = ambilData("SELECT koin FROM users WHERE id = $id");

$materi = ambilData("SELECT * FROM materi");

include 'navbar.php';
?>



<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar Materi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link
        href="https://fonts.googleapis.com/css2?family=Rethink+Sans:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400;1,500;1,600;1,700;1,800&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Martian+Mono:wght@100..800&display=swap" rel="stylesheet">
    <style>
    * {
        padding: 0;
        margin: 0;
    }

    #nlp {
        background-color: #4D62A5;
        color: white;
        font-weight: 450;
    }

    .form-select {
        background-image: url("./image/panah.png");
        background-repeat: no-repeat;
        background-position: right 0.75rem center;
        background-size: 2vw 0.8vw;
    }

    footer {
        display: flex;
        justify-content: flex-start;
        align-items: center;
        background-color: #1F2844;
        padding: 20px;
        color: white;
    }

    option {
        font-family: 'Rethink Sans', sans-serif;
    }

    #subbabContainer .btn {
        display: block;
        margin-bottom: 1rem;
        /* Jarak antar elemen */
        box-shadow: 0px 1px 3px rgba(0, 0, 0, 0.1);
        /* Efek bayangan */
        text-align: left;
    }

    #subbabContainer .btn div {
        padding: 10px;
        border-radius: 10px;
    }


    @media (max-width: 600px) {
        footer {
            display: flex;
        }

        #subbabContainer .btn {
            width: 100%;
            /* Satu elemen per baris */
        }

        #subbabContainer {
            margin-top: 2rem;
        }

        #subbabContainer .col-12 {
            margin: 0;
        }

        .form-select {
            height: 3rem;
        }
    }
    </style>
</head>

<body style="font-family: 'Rethink Sans', sans-serif;">
    <div style="display: flex; justify-content: space-between;">
        <div style="margin-left: 7vw;">
            <?php include "koin.php" ?>
        </div>
        <div>
            <?php include "navbarkecil.php" ?>
        </div>
    </div>
    <h4 style="padding: 4vw 10vw 2vw 10vw;">Daftar Materi</h4>
    <br>
    <div style="background-color: #F6F7FA; border-radius: 0.5vw; padding: 2vw 3vw;">
        <div class="row">
            <div class="col-md-4">
                <div style="margin: 4vw ;">
                    <h6 style="margin-bottom: 1.5vw;">Pilih Materi</h6>
                    <select id="pilihMateri" class="form-select" aria-label="Default select example"
                        style="background-color: white; padding: 1vw 4vw 1vw 2vw; border-radius: 1vw;">
                        <?php $no = 0;
                        foreach ($materi as $row) : if ($no == 0) { ?>
                        <option selected value="<?= $row['kode_materi'] ?>">
                            <?= $row['nama_materi'] . ' Kelas ' . $row['kelas']; ?></option>
                        <?php } else { ?>
                        <option value="<?= $row['kode_materi'] ?>">
                            <?= $row['nama_materi'] . ' Kelas ' . $row['kelas']; ?></option>
                        <?php }
                            $no++;
                        endforeach ?>
                    </select>
                    <br>
                    <h6 style="margin-bottom: 1.5vw;">Pilih Bab</h6>
                    <select id="pilihBab" class="form-select" aria-label="Default select example"
                        style="background-color: white; padding: 1vw 4vw 1vw 2vw; border-radius: 1vw;">
                        <?php $bab1 = ambilData("SELECT * FROM bab WHERE kode_materi = 1");
                        foreach ($bab1 as $row): ?>
                        <option value="<?= $row['kode_bab'] ?>"><?= $row['nama_bab']; ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
            </div>

            <div class="col-md-8" id="subbabContainer">
            </div>

            <!-- <div id="subbabContainer" style="width: 60%;">
                </div> -->

        </div>
    </div>
    </div>
    <!-- <footer>
        <img src="image/logo otodu terang.png" alt="logo" style="width: 120px; margin-right: 2vw; margin-left: 2.3vw;">
        <p style="font-family: 'Martian Mono'; font-size: 10px; margin-top: 17px;">@2024 OTODU Limited</p>
    </footer> -->

    <script>
    isiSubBab(1);

    document.getElementById("pilihMateri").addEventListener("change", function() {
        const idMateri = this.value;
        const babSelect = document.getElementById("pilihBab");
        babSelect.innerHTML = "";

        fetch(`daftar_bc.php?id_materi=${idMateri}`)
            .then(response => response.json())
            .then(data => {
                let temp;
                data.forEach((bab, index) => {
                    const option = document.createElement("option");
                    if (bab.nama_bab == "Tidak ada bab") {
                        option.textContent = "Tidak ada bab";
                        option.disabled = true; // Buat opsi tidak bisa dipilih
                        option.selected = true; // Tampilkan sebagai opsi default
                        babSelect.appendChild(option);
                        console.log("bab kosong")
                        topikKosong();
                        return;
                    } else {
                        option.value = bab.kode_bab;
                        option.textContent = bab.nama_bab;
                        babSelect.appendChild(option);
                    }


                    if (index === 0) {
                        temp = bab.kode_bab; // Simpan data pertama
                    }
                });

                // Panggil isiSubBab setelah data pertama dipastikan
                if (temp) {
                    isiSubBab(temp);
                }
            })
            .catch(error => console.error("Error fetching bab data:", error));
    });


    document.getElementById("pilihBab").addEventListener("change", function() {
        console.log()
        isiSubBab(this.value);
    });

    function topikKosong() {
        const subbabContainer = document.getElementById("subbabContainer");
        subbabContainer.classList.remove("gap-4");
        subbabContainer.classList.remove("d-flex");
        subbabContainer.innerHTML = ` 
                        <div class="d-flex flex-column align-items-center">
                            <img src="image/folder.png" width="200" alt="Example Image" class="mb-3">
                            <p>Maaf, Topik belum tersedia</p>
                        </div>
                        `;
    }

    function isiSubBab(temp) {
        let row
        const idBab = temp
        const materi = document.getElementById("pilihMateri");
        const bab = document.getElementById("pilihBab");
        const selectedMateri = materi.options[materi.selectedIndex].text;
        const selectedBab = bab.options[bab.selectedIndex].text;
        const subbabContainer = document.getElementById("subbabContainer");
        console.log("ID Bab:", idBab, "Materi yang dipilih:", selectedMateri);
        subbabContainer.innerHTML = "";
        fetch(`daftar_bc.php?id_bab=${idBab}`)
            .then(response => response.json())
            .then(data => {
                if (data.length === 0 || (data.length === 1 && data[0].id_subbab === 0)) {
                    topikKosong()
                } else {

                    data.forEach((subbab, index) => {
                        if (index % 2 === 0) {
                            // Buat baris baru setiap 2 elemen
                            row = document.createElement('div');
                            row.classList.add('row');
                            row.classList.add('d-flex',
                                'justify-content-start'); // Flexbox untuk tata letak
                            subbabContainer.appendChild(row);
                        }

                        // Buat div pembungkus dengan kelas col-md-6 dan col-12
                        const colDiv = document.createElement('div');
                        colDiv.className = "col-md-6 col-12 "; // Responsif + margin bawah

                        // Buat elemen <a>
                        const aTag = document.createElement("a");
                        aTag.className = "btn";
                        aTag.href =
                            `daftar.php?kode_materi=${materi.options[materi.selectedIndex].value}&kode_bab=${bab.options[bab.selectedIndex].value}&kode_subbab=${subbab.kode_subbab}&nama_subbab=${subbab.nama_subbab}&nama_bab=${selectedBab}`;
                        aTag.role = "button";
                        aTag.style =
                            "background-color: white; outline-color: white; text-align: left; box-shadow: 0px 1px 3px rgba(0, 0, 0, 0.1); display: block; height: auto; padding: 1vw; border-radius: 1vw;";
                        aTag.innerHTML = `
        <div style="background-color: white; border-radius: 1vw; padding: 1vw; height: auto;">
            <table style="border-collapse: collapse; width: 100%;">
                <tr>
                    <td rowspan="4" style="padding-right: 1.5vw;"><img src="image/Bab.png" width="60" height="60"></td>
                    <td style="font-size: 16px; padding-bottom: 0;"><b>${subbab.nama_subbab}</b></td>
                </tr>
                <tr>
                    <td style="font-size: 16px; padding-top: 0;">${selectedBab} - ${selectedMateri}</td>
                </tr>
                <tr>
                    <td style="padding: 0.3vw;"></td>
                </tr>
                <tr>
                    <td style="font-size: 12px;">1/2 subtopik selesai</td>
                </tr>
            </table>
        </div>
    `;

                        // Masukkan <a> ke dalam <div>
                        colDiv.appendChild(aTag);

                        // Masukkan <div> ke dalam row
                        row.appendChild(colDiv);
                    });


                }
            })
            .catch(error => console.error("Error fetching subbab data:", error));
    }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>