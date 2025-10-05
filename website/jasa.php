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
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/jasa.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Rethink+Sans:ital,wght@0,400..800;1,400..800&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Martian+Mono:wght@100..800&display=swap" rel="stylesheet">
    <title>Desain Web & App</title>
    <style>
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
    </style>
</head>

<body>
    <section class="header">
        <p class="header-p">Kami memiliki professional Developer & Designer <br>
            Wujudkan ide Anda sekarang! di <img style="margin-left: 0.5vw;" src="image/otodu-logo.png" width="30vw">
        </p>
        <div class="card-jasa shadow">
            <button type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false"
                aria-controls="collapseExample">
                <div class="jasa text-center">
                    <img src="image/design.png" width="60vw" alt=""> <br>
                    <p>Desain Grafis</p>
                </div>
            </button>
            <button type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample2" aria-expanded="false"
                aria-controls="collapseExample2">
                <div class="jasa text-center">
                    <img src="image/website.png" width="60vw" alt=""> <br>
                    <p>Jasa Website</p>
                </div>
            </button>
            <button type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample3" aria-expanded="false"
                aria-controls="collapseExample3">
                <div class="jasa text-center">
                    <img src="image/mobile-app.png" width="60vw" alt=""> <br>
                    <p>Jasa Aplikasi</p>
                </div>
            </button>

        </div>
    </section>

    <section class="container">
        <div class="collapse" id="collapseExample">
            <div class="isi-jasa" class="collapse" id="collapseExample">
                <div class="d-flex justify-content-around">
                    <div class="row">
                        <div class="col-md-4 d-flex justify-content-center">
                            <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                <div class="img-jasa d-flex flex-column justify-content-end"
                                    style="background-image: url(image/design1.png); ">
                                    <div class="d-flex justify-content-between">
                                        <p class="mb-0">Logo</p>
                                        <p class="mb-0">Rp100k - Rp1000k</p>
                                    </div>
                                </div>
                            </button>
                        </div>
                        <div class="col-md-4 d-flex justify-content-center">
                            <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                <div class="img-jasa d-flex flex-column justify-content-end"
                                    style="background-image: url(image/design2.png); ">
                                    <div class="d-flex justify-content-between">
                                        <p class="mb-0">Desain Website</p>
                                        <p class="mb-0">Rp100k - Rp1000k</p>
                                    </div>
                                </div>
                            </button>
                        </div>
                        <div class="col-md-4 d-flex justify-content-center">
                            <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                <div class="img-jasa d-flex flex-column justify-content-end"
                                    style="background-image: url(image/desain3.png); ">
                                    <div class="d-flex justify-content-between">
                                        <p class="mb-0">Banner</p>
                                        <p class="mb-0">Rp100k - Rp1000k</p>
                                    </div>
                                </div>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div div class="collapse" id="collapseExample2">
            <div class="isi-jasa">
                <div class="d-flex justify-content-around">
                    <div class="row">
                        <div class="col-md-4 d-flex justify-content-center">
                            <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                <div class="img-jasa d-flex flex-column justify-content-end"
                                    style="background-image: url(image/website1.png); ">
                                    <div class="d-flex justify-content-between">
                                        <p class="mb-0">Profile</p>
                                        <p class="mb-0">Rp100k - Rp1000k</p>
                                    </div>
                                </div>
                            </button>
                        </div>
                        <div class="col-md-4 d-flex justify-content-center">
                            <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                <div class="img-jasa d-flex flex-column justify-content-end"
                                    style="background-image: url(image/website2.png); ">
                                    <div class="d-flex justify-content-between">
                                        <p class="mb-0">Promosi</p>
                                        <p class="mb-0">Rp100k - Rp1000k</p>
                                    </div>
                                </div>
                            </button>
                        </div>
                        <div class="col-md-4 d-flex justify-content-center">
                            <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                <div class="img-jasa d-flex flex-column justify-content-end"
                                    style="background-image: url(image/website3.png); ">
                                    <div class="d-flex justify-content-between">
                                        <p class="mb-0">S.Informasi</p>
                                        <p class="mb-0">Rp100k - Rp1000k</p>
                                    </div>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>

        <div class="collapse" id="collapseExample3">
            <div class="isi-jasa">
                <div class="d-flex justify-content-around">
                    <div class="row">
                        <div class="col-md-4 d-flex justify-content-center">
                            <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                <div class="img-jasa d-flex flex-column justify-content-end"
                                    style="background-image: url(image/aplikasi1.png); ">
                                    <div class="d-flex justify-content-between">
                                        <p class="mb-0">Bisnis</p>
                                        <p class="mb-0">Rp100k - Rp1000k</p>
                                    </div>
                                </div>
                            </button>
                        </div>
                        <div class="col-md-4 d-flex justify-content-center">
                            <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                <div class="img-jasa d-flex flex-column justify-content-end"
                                    style="background-image: url(image/aplikasi2.png); ">
                                    <div class="d-flex justify-content-between">
                                        <p class="mb-0">Edukasi</p>
                                        <p class="mb-0">Rp100k - Rp1000k</p>
                                    </div>
                                </div>
                            </button>
                        </div>
                        <div class="col-md-4 d-flex justify-content-center">
                            <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                <div class="img-jasa d-flex flex-column justify-content-end"
                                    style="background-image: url(image/aplikasi3.png); ">
                                    <div class="d-flex justify-content-between">
                                        <p class="mb-0">Kustom</p>
                                        <p class="mb-0">Rp100k - Rp1000k</p>
                                    </div>
                                </div>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="teks1">
            <p class="teks1-p1">Kenapa Otodu?</p>
            <p class="teks1-p2">Karena kami akan mewujudkan ide Anda dengan para developer
                terbaik!</p>
            <div class="teks1-fitur row">
                <div class="col-md-6">
                    <div class="d-flex align-items-start">
                        <img class="penggunaan-img1" src="image/developer_best.png" alt="">
                        <div class="isi-fitur">
                            <p class="judul-fitur">Developer terbaik</p>
                            <p class="deskripsi-fitur">Kami bekerja dengan developer profesional <br>
                                yang memiliki pengalaman luas, menjamin <br>
                                kualitas proyek Anda.</p>
                        </div>
                    </div>

                </div>
                <div class="col-md-6">
                    <div class="d-flex align-items-start">
                        <img class="penggunaan-img1" src="image/layanan.png" alt="">
                        <div class="isi-fitur">
                            <p class="judul-fitur">Tersedia Berbagai Layanan</p>
                            <p class="deskripsi-fitur">Kami menawarkan 4 layanan utama dan layanan <br>
                                tambahan yang mendukung kebutuhan spesifik <br>
                                Anda.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="teks1 mb-5">
            <p class="teks1-p2">Langkah mudah dalam menggunakan jasa OTODU !</p>
            <div class="teks1-fitur row">
                <div class="col-md-6">
                    <div class="d-flex align-items-start">
                        <img class="penggunaan-img2" src="image/login.png" alt="">
                        <div class="isi-fitur">
                            <p class="judul-fitur">1. Cari layanan</p>
                            <p class="deskripsi-fitur">Cari dan pilih layanan sesuai dengan <br>
                                kebutuhan proyek Anda.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="d-flex align-items-start">
                        <img class="penggunaan-img2" src="image/resume.png" alt="">
                        <div class="isi-fitur">
                            <p class="judul-fitur">2. Isi formulir</p>
                            <p class="deskripsi-fitur">Silahkan isi data diri anda dan <br>
                                detail proyek anda.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="teks1-fitur row">
                <div class="col-md-6">
                    <div class="d-flex align-items-start">
                        <img class="penggunaan-img2" src="image/talk.png" alt="">
                        <div class="isi-fitur">
                            <p class="judul-fitur">3. Diskusi</p>
                            <p class="deskripsi-fitur">Diskusikan detail proyek anda serta <br>
                                penawaran harga kepada developer</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="d-flex align-items-start">
                        <img class="penggunaan-img2" src="image/invoice.png" alt="">
                        <div class="isi-fitur">
                            <p class="judul-fitur"> 4. Pembayaran dan Ulasan
                            </p>
                            <p class="deskripsi-fitur">Setujui proyek Anda dan lakukan Pembayaran. <br>
                                Berikan ulasan sebagai evaluasi kami.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="teks1-fitur">
        <div class="d-flex align-items-start">
          <img class="penggunaan-img2" src="image/login.png" alt="">
          <div class="isi-fitur">
            <p class="judul-fitur">1. Cari layanan</p>
            <p class="deskripsi-fitur">Cari dan pilih layanan sesuai dengan <br>
              kebutuhan proyek Anda.</p>
          </div>
          <img class="penggunaan-img2" src="image/resume.png" alt="">
          <div class="isi-fitur">
            <p class="judul-fitur">2. Isi formulir</p>
            <p class="deskripsi-fitur">Silahkan isi data diri anda dan <br>
              detail proyek anda.</p>
          </div>
        </div>
        <div style="margin-top: 2vw;" class="d-flex align-items-start">
          <img class="penggunaan-img2" src="image/talk.png" alt="">
          <div class="isi-fitur">
            <p class="judul-fitur">3. Diskusi</p>
            <p class="deskripsi-fitur">Diskusikan detail proyek anda serta <br>
              penawaran harga kepada developer</p>
          </div>
          <img class="penggunaan-img2" src="image/invoice.png" alt="">
          <div class="isi-fitur">
            <p class="judul-fitur"> 4. Pembayaran dan Ulasan
            </p>
            <p class="deskripsi-fitur">Setujui proyek Anda dan lakukan Pembayaran. <br>
              Berikan ulasan sebagai evaluasi kami.</p>
          </div>
        </div>
      </div> -->
        </div>
    </section>
    <form>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content p-3">
                    <div class="modal-header border-0">
                        <h4 style="font-weight: bold;" class="modal-title text-center w-100" id="exampleModalLabel">
                            Pesan Jasa <i class="bi bi-envelope-fill"></i></h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="nama" aria-describedby="emailHelp" required>
                            <div id="emailHelp" class="form-text"></div>
                        </div>
                        <div class="mb-3">
                            <label for="dropdown" class="form-label">Pilih Opsi</label>
                            <select class="form-select" id="dropdown" aria-label="Dropdown" required>
                                <option value="" selected>Pilih opsi...</option>
                                <option value="Desain Grafis - Logo">Desain Grafis - Logo</option>
                                <option value="Desain Grafis - Desain Website">Desain Grafis - Desain Website</option>
                                <option value="Desain Grafis - Banner 3">Desain Grafis - Banner 3</option>
                                <option value="Website - Promosi">Website - Promosi</option>
                                <option value="Website - Company Profile">Website - Company Profile</option>
                                <option value="Website - Sistem Informasi">Website - Sistem Informasi</option>
                                <option value="Aplikasi - Bisnis">Aplikasi - Bisnis</option>
                                <option value="Aplikasi - Edukasi">Aplikasi - Edukasi</option>
                                <option value="Aplikasi - Kustom">Aplikasi - Kustom</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="whatsapp" class="form-label">No. Whatsapp</label>
                            <input type="text" class="form-control" id="whatsapp" required>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Deskripsi</label>
                            <textarea class="form-control" id="description" rows="6" placeholder="Masukkan deskripsi..."
                                required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer border-0">
                        <button onclick="sendToWhatsApp()" style="background-color: #25D366; font-size: 1.5vw;"
                            type="submit" class="btn w-100 text-center text-white border-0" data-bs-dismiss="modal">
                            Kirim <i class="bi bi-whatsapp ms-1"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <footer>
        <img src="image/logo otodu terang.png" alt="logo" style="width: 120px; margin-right: 2vw; margin-left: 2.3vw;">
        <p style="font-family: 'Martian Mono'; font-size: 10px; margin-top: 17px;">@2024 OTODU Limited</p>
    </footer>

    <script>
    function sendToWhatsApp() {
        // Ambil nilai input
        const nama = document.getElementById("nama").value.trim();
        const dropdown = document.getElementById("dropdown").value;
        const whatsapp = document.getElementById("whatsapp").value.trim();
        const description = document.getElementById("description").value.trim();

        // Validasi form
        if (!nama || !dropdown || !whatsapp || !description) {
            alert("Semua kolom harus diisi!");
            return;
        }

        // Ganti dengan nomor tujuan WhatsApp
        const nomorWhatsApp = "628123456789"; // contoh nomor (62 adalah kode negara Indonesia)

        // Buat pesan untuk dikirim
        const message =
            `Halo, saya ${nama}. Saya ingin memesan:\n\n- Layanan: ${dropdown}\n- Deskripsi: ${description}\n- Nomor Whatsapp: ${whatsapp}`;

        // Encode pesan untuk URL
        const encodedMessage = encodeURIComponent(message);

        // Buka WhatsApp dengan pesan yang sudah dibuat
        window.open(`https://wa.me/${nomorWhatsApp}?text=${encodedMessage}`, "_blank");
    }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>


</body>

</html>