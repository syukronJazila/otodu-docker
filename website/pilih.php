<?php
session_start();

$_SESSION['new_user'] = false;
// if( !isset($_SESSION['login']) ){
//     header("Location: login.php");
//     exit;
// }
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/pilih.css">
    <title>Pilih Preferensi</title>
</head>

<body>
    <!-- Modal 1 -->
    <div class="modal fade text-white" id="exampleModalToggle" data-bs-backdrop="static" aria-hidden="true"
        tabindex="-1">
        <div class="modal-dialog modal-fullscreen modal-dialog-centered p-5">
            <div class="modal-content p-4" style="background-color: #365373;">
                <div class="modal-header" style="border: none;">
                    <h3 class="text-center w-100">Fitur yang membuat anda tertarik?</h3>
                    <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                </div>
                <div class="modal-body">
                    <div class="container mt-5">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card selectable-card" data-title="NLP">
                                    <button type="button" class="btn-card">
                                        <div class="card-body">
                                            <img src="image/book.png" class="card-img-top" alt=" ...">
                                            <h5 class="card-title">NLP</h5>
                                            <p class="card-text">Lagi butuh bahan materi dan latihan soal nih...</p>
                                        </div>
                                    </button>
                                </div>

                            </div>
                            <div class="col-md-4">
                                <div class="card selectable-card" data-title="Cari Mentor">
                                    <button type="button" class="btn-card">
                                        <div class="card-body">
                                            <img src="image/teaching.png" class="card-img-top" alt="...">
                                            <h5 class="card-title">Cari Mentor</h5>
                                            <p class="card-text">Bingung mau nanya kesiapa? Cari Mentor Solusinya</p>
                                        </div>
                                    </button>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card selectable-card" data-title="Jasa Design">
                                    <button type="button" class="btn-card">
                                        <div class="card-body">
                                            <img src="image/web-design.png" class="card-img-top" alt="...">
                                            <h5 class="card-title">Jasa Design</h5>
                                            <p class="card-text">Mau bikin aplikasi/website tapi gatau minta ke siapa?
                                            </p>
                                        </div>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center mt-4">
                            <button disabled=true class="btn" data-bs-target="#exampleModalToggle2"
                                data-bs-toggle="modal" data-bs-dismiss="modal" id="nextModal1">Selanjutnya</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal 2 -->
    <div class="modal fade text-white" id="exampleModalToggle2" data-bs-backdrop="static" aria-hidden="true"
        tabindex="-1">
        <div class="modal-dialog modal-fullscreen modal-dialog-centered p-5">
            <div class="modal-content p-4" style="background-color: #365373;">
                <div class="modal-header" style="border: none;">
                    <h3 class="text-center w-100">Jenjang Anda Saat ini?</h3>
                    <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                </div>
                <div class="modal-body">
                    <div class="container mt-5">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="card selectable-card" data-title="SD">
                                    <button type="button" class="btn-card">
                                        <div
                                            class="card-body d-flex flex-column justify-content-center align-items-center">
                                            <img style="margin-top: 1vw;" src="image/sd.png" class="card-img-top2"
                                                alt=" ...">
                                            <br>
                                            <h5 class="card-title">SD</h5>
                                        </div>
                                    </button>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card selectable-card" data-title="SMP">
                                    <button type="button" class="btn-card">
                                        <div
                                            class="card-body d-flex flex-column justify-content-center align-items-center">
                                            <img style="margin-top: 1vw;" src="image/smp.png" class="card-img-top2"
                                                alt="...">
                                            <br>
                                            <h5 class="card-title">SMP</h5>
                                        </div>
                                    </button>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card selectable-card" data-title="SMA">
                                    <button type="button" class="btn-card">
                                        <div
                                            class="card-body d-flex flex-column justify-content-center align-items-center">
                                            <img style="margin-top: 0.5vw;" src="image/sma.png" class="card-img-top2"
                                                alt="...">
                                            <br>
                                            <h5 class="card-title">SMA</h5>
                                        </div>
                                    </button>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card selectable-card" data-title="Lain-lain">
                                    <button type="button" class="btn-card">
                                        <div
                                            class="card-body d-flex flex-column justify-content-center align-items-center">
                                            <img src="image/question-mark.png" height="130vw" alt="...">
                                            <br>
                                            <h5 class="card-title">Lain-lain</h5>
                                        </div>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center mt-4">
                            <button class="btn " data-bs-target="#exampleModalToggle3" data-bs-toggle="modal"
                                data-bs-dismiss="modal" id="nextModal2">Selanjutnya</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade text-white" id="exampleModalToggle3" data-bs-backdrop="static" aria-hidden="true"
        tabindex="-1">
        <div class="modal-dialog modal-fullscreen modal-dialog-centered p-5">
            <div class="modal-content p-4" style="background-color: #365373;">
                <div class="modal-header" style="border: none;">
                    <h3 class="text-center w-100">Pelajaran yang Anda Minati?</h3>
                    <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                </div>
                <div class="modal-body">
                    <div class="container mt-5">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="card selectable-card card3" data-title="Matematika">
                                    <button type="button" class="btn-card">
                                        <div class="card-body">
                                            <img src="image/math.png" class="card-img-top3" alt=" ...">
                                            <h5 class="card-title">Matematika</h5>
                                        </div>
                                    </button>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card selectable-card card3" data-title="Bahasa Inggris">
                                    <button type="button" class="btn-card">
                                        <div class="card-body">
                                            <img src="image/eng.png" class="card-img-top3" alt="...">
                                            <h5 class="card-title">Bahasa Inggris</h5>
                                        </div>
                                    </button>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card selectable-card card3" data-title="Pemrograman">
                                    <button type="button" class="btn-card">
                                        <div class="card-body">
                                            <img src="image/code.png" class="card-img-top3" alt="...">
                                            <h5 class="card-title">Pemrograman</h5>
                                        </div>
                                    </button>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card selectable-card " data-title="UTBK">
                                    <button type="button" class="btn-card card3">
                                        <div
                                            class="card-body d-flex flex-column justify-content-center align-items-center">
                                            <img src="image/SNBT-2023.png" style="max-height: 120px;" alt="...">
                                            <br>
                                            <h5 class="card-title">UTBK</h5>
                                        </div>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center mt-4">
                            <button class="btn " data-bs-target="#exampleModalToggle4" data-bs-toggle="modal"
                                data-bs-dismiss="modal" id="nextModal3">Selanjutnya</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade text-white" id="exampleModalToggle4" data-bs-backdrop="static" aria-hidden="true"
        tabindex="-1">
        <div class="modal-dialog modal-fullscreen modal-dialog-centered p-5">
            <div class="modal-content p-4" style="background-color: #365373;">
                <div class="modal-header" style="border: none;">
                    <h3 class="text-center w-100">Pilihan Tingkat Kesulitan</h3>
                    <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                </div>
                <div class="modal-body">
                    <div class="container mt-5">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card selectable-card" data-title="3">
                                    <button type="button" class="btn-card">
                                        <div class="card-body">
                                            <img src="image/sleeping-face.svg" class="card-img-top" alt=" ...">
                                            <h5 class="card-title">Santai</h5>
                                            <p class="card-text">Langkah awal, dasar yang kuat.</p>
                                        </div>
                                    </button>
                                </div>

                            </div>
                            <div class="col-md-4">
                                <div class="card selectable-card" data-title="2">
                                    <button type="button" class="btn-card">
                                        <div class="card-body">
                                            <img src="image/smiling-face-with-sunglasses.svg" class="card-img-top"
                                                alt="...">
                                            <h5 class="card-title">Normal</h5>
                                            <p class="card-text">Lebih dalam, lebih paham.</p>
                                        </div>
                                    </button>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card selectable-card" data-title="1">
                                    <button type="button" class="btn-card">
                                        <div class="card-body">
                                            <img src="image/smiling-face-with-fire-eyes.svg" class="card-img-top"
                                                alt="...">
                                            <h5 class="card-title">Ambis</h5>
                                            <p class="card-text">Tantangan puncak, kemampuan maksimal!</p>
                                        </div>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center mt-4">
                            <button class="btn " data-bs-target="#exampleModalToggle5" data-bs-toggle="modal"
                                data-bs-dismiss="modal" id="nextModal4">Selanjutnya</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>





    <a class="btn btn-primary" data-bs-toggle="modal" href="#exampleModalToggle" role="button" id="openFirstModal"
        style="display: none;">Open first modal</a>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        let selectedOptions = [];

        function off() {
            nextModal1.disabled = true;
            nextModal2.disabled = true;
            nextModal3.disabled = true;
            nextModal4.disabled = true;
        }

        function on() {
            nextModal1.disabled = false;
            nextModal2.disabled = false;
            nextModal3.disabled = false;
            nextModal4.disabled = false;
        }

        document.querySelectorAll('.selectable-card').forEach(card => {
            card.addEventListener('click', function() {
                // Remove the selection from all cards in the same modal
                this.closest('.row').querySelectorAll('.selectable-card').forEach(c => c.classList.remove(
                    'card-selected'));
                // Add selection to the clicked card
                this.classList.add('card-selected');
                on()
            });
        });


        document.getElementById('nextModal1').addEventListener('click', function() {
            let selectedCard = document.querySelector('#exampleModalToggle .card-selected');
            off()
            selectedOptions.push(selectedCard.getAttribute('data-title'));

        });

        document.getElementById('nextModal2').addEventListener('click', function() {
            let selectedCard = document.querySelector('#exampleModalToggle2 .card-selected');
            off()
            if (selectedCard) {
                selectedOptions.push(selectedCard.getAttribute('data-title'));
            }
        });
        document.getElementById('nextModal3').addEventListener('click', function() {
            off()
            let selectedCard = document.querySelector('#exampleModalToggle3 .card-selected');
            if (selectedCard) {
                selectedOptions.push(selectedCard.getAttribute('data-title'));
            }
        });

        document.getElementById('nextModal4').addEventListener('click', function() {

            let selectedCard = document.querySelector('#exampleModalToggle4 .card-selected');
            if (selectedCard) {
                selectedOptions.push(selectedCard.getAttribute('data-title'));
            }

            if (selectedOptions.length >= 4) {
                // Kirim data ke server
                var xhr = new XMLHttpRequest();
                xhr.open("POST", "pilih_bc.php", true);
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

                xhr.onreadystatechange = function() {
                    if (xhr.readyState === XMLHttpRequest.DONE) {
                        if (xhr.status === 200) {
                            // Berhasil
                            console.log("Data berhasil terkirim:", xhr.responseText);
                        } else {
                            // Gagal
                            console.error("Gagal mengirim data. Status:", xhr.status, "Response:", xhr.responseText);
                        }
                    }
                };

                xhr.onerror = function() {
                    console.error("Terjadi kesalahan jaringan atau server.");
                };

                xhr.send(
                    "jenjang=" +
                    encodeURIComponent(selectedOptions[1]) +
                    "&minat=" +
                    encodeURIComponent(selectedOptions[2]) +
                    "&kode_target=" +
                    encodeURIComponent(selectedOptions[3])
                );
            } else {
                console.error("Data tidak lengkap.");
            }
            if (selectedOptions[0] == "NLP") window.location.href = "dashboard.php"
            else if (selectedOptions[0] == "Cari Mentor") window.location.href = "mentor.php"
            else window.location.href = "jasa.php"

        });




        window.onload = function() {
            document.getElementById('openFirstModal').click();
        };
    </script>
</body>

</html>