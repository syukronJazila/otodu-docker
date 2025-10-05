<?php
include 'function.php';
session_start();

if( !isset($_SESSION['login']) ){
    header("Location: login.php");
    exit;
}

$kode_subtopik_pilih = $_SESSION['kode_subtopik'];

$isi_subtopik = ambilData("SELECT * FROM isi_subtopik WHERE kode_subtopik = $kode_subtopik_pilih ORDER BY nomor ASC");
$nama_materi = ambilData("SELECT subtopik.nama_subtopik, topik.nama_topik
    FROM subtopik
    JOIN topik ON subtopik.kode_topik = topik.kode_topik
    WHERE subtopik.kode_subtopik = $kode_subtopik_pilih;"
);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <mta name="viewport" content="width=device-width, initial-scale=1">
        <title>Isi Sub Topik</title>
        <link rel="stylesheet" href="css/isi_subtopik2.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
    <div class="main">

        <div class="top-element">
            <header class="header-container">
                <div class="header-content">
                    <a class="navbar-brand" href="#">
                        <img src="./image/otodu.png" alt="Bootstrap" class="responsive-img">
                    </a>
                    <p class="responsive-text">Fungsi | 1. Pengantar ->
                        <b><span><?php echo $nama_materi[0]['nama_topik']; ?></span></b> ->
                        <?php echo $nama_materi[0]['nama_subtopik']; ?>
                    </p>
                </div>
            </header>

            <section id="nav-soal" style="background-color: #375679;">
                <div class="container section-container">
                    <!-- Button Close -->
                    <div data-bs-theme="dark">
                        <button type="button" class="btn-close" aria-label="Close" style="margin: 0;"></button>
                    </div>

                    <!-- Pagination Buttons -->
                    <div class="pagination"
                        style="display: flex; justify-content: center; align-items: center; gap: 1vw;">
                        <button class="nav-button" onclick="prevContent()"
                            style="color: #5D81AB; background-color: transparent;">&#60;</button>
                        <?php if (count($isi_subtopik) > 0): ?>
                        <?php foreach ($isi_subtopik as $isi): ?>
                        <button class="btn-pagination" id="btn-materi<?= $isi['nomor']; ?>"
                            onclick="showContent('materi<?= $isi['nomor']; ?>')"></button>
                        <?php endforeach; ?>
                        <?php else: ?>
                        <button class="btn-pagination"></button>
                        <button class="btn-pagination"></button>
                        <button class="btn-pagination"></button>
                        <?php endif; ?>
                        <button class="nav-button" onclick="nextContent()"
                            style="color: #5D81AB; background-color: transparent;">&#62;</button>
                    </div>


                    <!-- Flag Icon Trigger for Modal -->
                    <i class="bi bi-flag text-white hint-btn" data-bs-toggle="modal" data-bs-target="#exampleModal"
                        style="cursor: pointer;"></i>

                </div>

                <!-- Modal Bootstrap -->
                <div class="modal fade mt-5" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-top modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Petunjuk!</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>Tidak Ada Yang Namanya Jalan Pintas</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Ok</button>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section id="materi">
                <div class="container">

                    <?php if (count($isi_subtopik) > 0): ?>

                    <?php foreach ($isi_subtopik as $isi ): ?>
                    <?php if ($isi['keterangan'] == 'materi'): ?>
                    <div id="materi<?= $isi['nomor']; ?>" class="content">
                        <div class=" isi-subtopik" style="<?= $isi['gambar_url'] === null ? 'display:flex' : ''; ?>">
                            <img src="<?= $isi['gambar_url']; ?>" alt="" class="svg"
                                style="<?php if (!isset($isi['gambar_url'])) echo "display: none;"?>">
                            <p><?= $isi['materi']; ?></p>
                        </div>
                    </div>

                    <?php elseif ($isi['keterangan'] == 'cocok'): ?>
                    <div class=" content" id="materi<?= $isi['nomor']; ?>">
                        <img src="<?= $isi['gambar_url']; ?>" alt="" class="svg">

                        <div class="question mt-4"><?= $isi['soal']; ?></div>

                        <!-- Tempat untuk jawaban yang tersusun -->
                        <div class="answer-slot choices" id="answer-slot">
                            <div onclick="removeAnswer(this)"></div>
                            <div onclick="removeAnswer(this)"></div>
                            <div onclick="removeAnswer(this)"></div>
                            <div onclick="removeAnswer(this)"></div>
                            <div onclick="removeAnswer(this)"></div>
                        </div>

                        <?php 
                            $pilihan = explode(";", $isi['opsi']); 
                            shuffle($pilihan);
                        ?>

                        <!-- Pilihan jawaban sebagai puzzle -->
                        <div class="choices" id="choices">
                            <?php foreach ($pilihan as $opsi): ?>
                            <div onclick="placeAnswer(this)"><?= htmlspecialchars($opsi) ?></div>
                            <?php endforeach; ?>
                        </div>

                        <div id="hasil"></div>
                    </div>
                    <?php else: ?>
                    <div id="materi<?= $isi['nomor']; ?>" class="content">
                        <h5 id="soal" style="45pxnavmargin-top:4vh;"><?= $isi['soal']; ?></h5>
                        <div>
                            <?php $pilihan = explode(";", $isi['opsi']); ?>
                            <ul>
                                <?php foreach ($pilihan as $index => $opsi): ?>
                                <li>
                                    <button class="pernyataan" id="pernyataan-<?= $index + 1 ?>"
                                        onclick="tentukan(<?= $index + 1 ?>)">
                                        <?= htmlspecialchars($opsi) ?>
                                    </button>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>

                        <h5 id="hasilPilihan"></h5>
                    </div>
                    <?php endif; ?>
                    <?php endforeach; ?>

                    <?php else: ?>
                    <div id="bt-container" style="text-align: center; color: #000;;">
                        <div style="text-align: center;">
                            <div id="belum-tersedia" class="d-flex flex-column align-items-center">
                                <img src="image/folder.png" width="200" alt="Example Image" class="mb-3">
                                <p>Maaf, Subtopik belum tersedia</p>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </section>
        </div>

        <footer>
            <div id="petunjuk">
                <i class="bi bi-info-circle-fill text-white"></i>
                <p class="text-light" id="deskripsiPetunjuk">
                    <?= (count($isi_subtopik) > 0) 
                ? 'Isi Kotak Kosong Dengan Memilih dan Mengetik Saran Jawaban' 
                : 'Belum ada materi nih'; ?>
                </p>
            </div>
            <?php if(count($isi_subtopik) > 0):?>
            <but onclick="cekHalaman()" class="btn text-light" id="lanjut-btn"
                style="display: flex; justify-content: center; align-items: center; ">
                <p style="color: white; margin: 0;">Lanjut</p>
        </footer>
    </div>
    <?php endif; ?>
    <script>
    const isi_subtopik = <?= json_encode($isi_subtopik); ?>;
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="js/isi_subtopik.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>