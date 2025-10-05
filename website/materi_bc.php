<head>
    <link rel="stylesheet" href="css/materi_bc.css">
</head>

<?php
include 'function.php';
session_start();

$id = $_SESSION['user_id'];

if (
    $_SERVER['REQUEST_METHOD'] == 'POST' && $_SERVER["CONTENT_TYPE"] == "application/json"
) {
    // Ambil data yang diterima dari permintaan POST
    $request_body = file_get_contents('php://input');
    $data = json_decode($request_body, true);
    $kode_subbab = $data['kode_subabb'];
    $indeks_terpilih;
    $nama_terpilih;
    $video_topik;
    $rangkuman_topik;
    $topik_terpilih;

    $koin = ambilData("SELECT koin FROM users WHERE id = $id");

    $topik = ambilData("SELECT * FROM topik WHERE kode_subbab=$kode_subbab");

    // Pastikan data kode_topik diterima
    if (isset($data['kode_topik'])) {
        $topik_terpilih = $data['kode_topik'];

        if (true) {
            // Kembalikan HTML untuk ditampilkan pada halaman
?>
<div class="row" style="margin-left: 1.5vw; margin-right: 1.5vw; font-family: Rethink Sans">
    <div id="kolomKanan-android" class="col-md-6">
        <?php
                    $topik_aktif = array_filter($topik, fn($item) => $item['kode_topik'] == $topik_terpilih);
                    $topik_aktif = reset($topik_aktif); // Ambil elemen pertama dari hasil filter
                    if ($topik_aktif !== false && !empty($topik_aktif)) {
                        $video_topik = $topik_aktif['video_url'];
                        $rangkuman_topik = $topik_aktif['rangkuman'];
                    }
                    if (isset($video_topik)) { ?>
        <div class="boxright box-4">
            <!-- Rangkuman dan video sesuai dengan topik yang dipilih -->

            <div class="column d-flex flex-column mb-4">
                <span style="color: #3A425A; margin-left: 0.8vw; display:flex; align-items:center; margin-bottom: 1vw;">
                    <span style="font-size: 15px; margin-top:1rem">
                        Rangkuman Topik
                    </span>

                </span>
                <div style="height: 0.1vw; width: 20vw; background-color: #3A425A; margin-left: 0.8vw;"></div>
            </div>
            <div class="inner-box column d-flex flex-column mb-3"
                style="background-color: #ffffff; border: 0.1vw solid #B2B5BF; align-items: center; padding:10px">
                <!-- <img width="420vw"> -->
                <?php if (isset($rangkuman_topik)): ?>
                <video style="border-radius: 0.5vw; width:100%" controls>
                    <source src="<?php echo htmlspecialchars($topik_aktif['video_url']); ?>">
                </video>
                <p
                    style="margin-top:5rem;color: #1F2844; font-size: 12px; margin-left: 4.5vw; margin-right: 4.5vw; margin-top: 1vw; text-align:justify; ">
                    <?php echo nl2br(htmlspecialchars($topik_aktif['rangkuman'])); ?>
                </p>
                <?php else: ?>
                <img src="image/folder.png" width="150" alt="Example Image" class="mb-3">
                <p
                    style="color: #000000; font-size: 1rem; margin-left: 4.5vw; margin-right: 4.5vw; margin-top: 1vw; text-align:justify; ">
                    Maaf, materi belum tersedia
                </p>
                <?php endif; ?>
            </div>
        </div>
        <?php } ?>

    </div>

    <div id="kolomKiri" class="col-md-6">
        <div class="boxleft box-4">
            <div class="column d-flex flex-column mb-4 mt-2">
                <span class="materi-title">Materi NLP</span>
                <div class="divider"></div>
            </div>

            <!-- Konten topik -->
            <?php if (empty($topik)): ?>
            <div class="empty-topik">
                <div class="empty-topik-inner">
                    <div class="d-flex flex-column align-items-center">
                        <img src="image/folder.png" width="200" alt="Example Image" class="mb-3">
                        <p style="margin-left: 20px;">Maaf, Topik belum tersedia</p>
                    </div>
                </div>
            </div>
            <?php else: ?>
            <?php foreach ($topik as $index => $item): ?>
            <?php if ($item['kode_topik'] == $topik_terpilih): ?>
            <?php
                                    $indeks_terpilih = $index + 1;
                                    $nama_terpilih = $item['nama_topik'];
                                    ?>
            <div class="row topik-row">
                <div class="inner-box topik-box selected-topik" id="topik_<?php echo $item['kode_topik']; ?>"
                    onclick="selectTopik(<?php echo $item['kode_topik']; ?>)">
                    <div class="nomor">
                        0<?php echo $indeks_terpilih ?>
                    </div>
                    <b><?php echo htmlspecialchars($item['nama_topik']); ?></b>
                </div>
                <div class="inner-box mulai" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <b>Mulai</b>
                </div>
            </div>
            <?php else: ?>
            <div class="inner-box topik-box" id="topik_<?php echo $item['kode_topik']; ?>"
                onclick="selectTopik(<?php echo $item['kode_topik']; ?>)">
                <div class="nomor-alt">
                    0<?php echo $index + 1 ?>
                </div>
                <p><?php echo htmlspecialchars($item['nama_topik']); ?></p>
            </div>
            <?php endif; ?>
            <?php endforeach; ?>
            <?php endif; ?>

        </div>
    </div>

    <div id="kolomKanan" class="col-md-6">
        <?php
                    $topik_aktif = array_filter($topik, fn($item) => $item['kode_topik'] == $topik_terpilih);
                    $topik_aktif = reset($topik_aktif); // Ambil elemen pertama dari hasil filter
                    if ($topik_aktif !== false && !empty($topik_aktif)) {
                        $video_topik = $topik_aktif['video_url'];
                        $rangkuman_topik = $topik_aktif['rangkuman'];
                    }
                    if (isset($video_topik)) { ?>
        <div class="boxright box-4">
            <!-- Rangkuman dan video sesuai dengan topik yang dipilih -->

            <div class="column d-flex flex-column mb-4">
                <span style="color: #3A425A; margin-left: 0.8vw; display:flex; align-items:center; margin-bottom: 1vw;">
                    <span style="font-size: 1.3vw;">
                        Rangkuman Topik
                    </span>
                    <div
                        style="border-radius: 4vw; font-size: 1vw; background-color: #A2A6B2; padding: 0.2vw 0.4vw; margin-left:0.5vw; color: #ffffff">
                        0<?php echo $indeks_terpilih ?>
                    </div>
                </span>
                <div style="height: 0.1vw; width: 20vw; background-color: #3A425A; margin-left: 0.8vw;"></div>
            </div>
            <div class="inner-box column d-flex flex-column mb-3"
                style="background-color: #ffffff; border: 0.1vw solid #B2B5BF; align-items: center;">
                <!-- <img width="420vw"> -->
                <?php if (isset($rangkuman_topik)): ?>
                <video width="400vw" style="border-radius: 0.5vw;" controls>
                    <source src="<?php echo htmlspecialchars($topik_aktif['video_url']); ?>">
                </video>
                <p
                    style="color: #1F2844; font-size: 1vw; margin-left: 4.5vw; margin-right: 4.5vw; margin-top: 1vw; text-align:justify; ">
                    <?php echo nl2br(htmlspecialchars($topik_aktif['rangkuman'])); ?>
                </p>
                <?php else: ?>
                <img src="image/folder.png" width="170" alt="Example Image" class="mb-3">
                <p
                    style="color: #000000; font-size: 1rem; margin-left: 4.5vw; margin-right: 4.5vw; margin-top: 1vw; text-align:justify; ">
                    Maaf, materi belum tersedia
                </p>
                <?php endif; ?>
            </div>
        </div>
        <?php } ?>

    </div>
</div>

<!-- popup -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content bg-transparent">
            <div style="text-align: right; margin-right: 0.8vw;">
                <button type="button" data-bs-dismiss="modal" aria-label="Close"
                    style="margin-top: 0.7vw; margin-right: 0.7vw; background-color: white; border-radius: 5vw; font-size: 15px; padding: 0px 0.2vw">
                    &nbsp;X&nbsp;</button>
            </div>
            <div class="modal-body">
                <div style="display: flex; background-color: #375679; border-radius: 0.5vw; margin-bottom: 2vw;">
                    <div
                        style="border-radius: 4vw; font-size: 1vw; background-color: #F6F7FA; padding-left: 0.25vw; padding-right: 0.25vw; margin: 1.2vw 1vw 1.2vw 2.5vw; color: #375679">
                        0<?php echo $indeks_terpilih ?>
                    </div>
                    <div style="margin-top: 0.8vw; color: #F6F7FA;">
                        <?php echo htmlspecialchars($nama_terpilih); ?>
                    </div>
                </div>


                <div style="display: flex; justify-content: space-around">

                    <div
                        style="width: 40vw; height: 30vw; background-color: white; border-radius: 0.5vw; overflow-y: auto">
                        <center>
                            <table style="margin-left: 2vw; margin-right: 2vw;">
                                <tr>
                                    <td style="margin: 1vw;">
                                        <font
                                            style="border-bottom: 1px solid #3A425A; color: #3A425A;  padding-bottom: 4px;">
                                            Sub Topik NLP</font>
                                    </td>
                                    <td></td>
                                    <td style="padding: 0.8vw;"></td>
                                    <td style="padding-left: 3.8vw;"></td>
                                    <td
                                        style="background-color: #96AA03; border-radius: 0.2vw; padding: 0vw 0.4vw 0.4vw 0.4vw;">
                                        <div style="padding: 0%;">
                                            <img src="./image/coin.png" width="20" height="20">
                                            <font style="font-size: 1vw; color: white;"><?= $koin[0]['koin']; ?></font>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="5" style="padding: 0.7vw;"></td>
                                </tr>
                                <?php $subtopik = ambilData("SELECT * FROM subtopik WHERE kode_topik = $topik_terpilih"); ?>
                                <?php foreach ($subtopik as $rowsub) {
                                                if ($rowsub['keterangan'] == 'materi') { ?>
                                <tr>
                                    <!--Tombol utama-->
                                    <?php
                                                        $kode_subtopik_pilih  = $rowsub['kode_subtopik'];
                                                        $status_bayar = ambilData("SELECT * FROM beli_subtopik 
                                        WHERE kode_subtopik = $kode_subtopik_pilih AND id_user = $id");
                                                        ?>
                                    <td colspan="2"
                                        style="background-color: <?= ($status_bayar) ? '#375679' : '#B4BFCC'; ?>; 
                                                                   
                                        color: white; width: 20vw; max-width: 30vw; padding: 0.5vw 1vw 0.5vw 1.5vw; border-radius: 0.5vw;">

                                        <div style="display: flex;">
                                            <div>
                                                <img src="./image/coin.png" width="18" height="18"
                                                    style="margin-right: 5vw;">
                                            </div>
                                            <div style="color: white;">
                                                <?= $rowsub['nama_subtopik']; ?>
                                            </div>
                                        </div>
                                    </td>
                                    <td></td>
                                    <!--Tombol Beli/Buka-->
                                    <td colspan="2"
                                        style="background-color: #96AA03; color: white;  border-radius: 0.5vw;">
                                        <form method="POST" class="form-beli">
                                            <input type="hidden" name="kode_subtopik"
                                                value="<?= $rowsub['kode_subtopik'] ?>">
                                            <input type="hidden" name="harga" value="<?= $rowsub['harga'] ?>">
                                            <?php if ($status_bayar): ?>
                                            <button type="submit" class="btn btn-beli"
                                                style="background-color: #96AA03; color: white;"
                                                data-harga="<?= $rowsub['harga'] ?>">
                                                Buka
                                                <span style=" text-decoration-color: black;">
                                                    <img src="./image/coin.png" width="20" height="20"
                                                        style="vertical-align: middle;">
                                                    <?= $rowsub['harga']; ?>
                                                </span>
                                            </button>
                                            <?php else: ?>
                                            <button type="submit" class="btn btn-beli"
                                                style="background-color: #96AA03; color: white;"
                                                data-harga="<?= $rowsub['harga'] ?>"
                                                data-nama="<?= $rowsub['nama_subtopik']; ?>">
                                                Beli
                                                <img src="./image/coin.png" width="20" height="20"
                                                    style="vertical-align: middle;">
                                                <?= $rowsub['harga']; ?>
                                            </button>
                                            <?php endif; ?>
                                        </form>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="5" style="padding: 0.7vw;"></td>
                                </tr>
                                <?php } ?>
                                <?php } ?>
                                <tr>
                                    <td colspan="5" style="padding: 0.7vw;"></td>
                                </tr>
                                <tr>
                                    <td style="margin: 1vw;">
                                        <font
                                            style="border-bottom: 1px solid #3A425A; color: #3A425A;  padding-bottom: 4px;">
                                            Sub Topik Tambahan</font>
                                    </td>
                                    <td></td>
                                    <td style="padding: 0.8vw;"></td>
                                    <td style="padding-left: 3.8vw;"></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td colspan="5" style="padding: 0.7vw;"></td>
                                </tr>
                                <?php foreach ($subtopik as $rowsub) {
                                                if ($rowsub['keterangan'] == 'tambahan') { ?>
                                <?php
                                                    $kode_subtopik_pilih  = $rowsub['kode_subtopik'];
                                                    $status_bayar = ambilData("SELECT * FROM beli_subtopik 
                                    WHERE kode_subtopik = $kode_subtopik_pilih AND id_user = $id");
                                                    ?>
                                <tr>
                                    <!--Baris 1 Sub Topik 1-->
                                    <td colspan="2"
                                        style="background-color: <?= ($status_bayar) ? '#375679' : '#B4BFCC'; ?>; color: white; width: 20vw; max-width: 30vw; padding: 0.5vw 1vw 0.5vw 1.5vw; border-radius: 0.5vw;">
                                        <div style="display: flex;">
                                            <div>
                                                <img src="./image/coin.png" width="18" height="18"
                                                    style="margin-right: 5vw;">
                                            </div>
                                            <div style="color: white;">
                                                <?= $rowsub['nama_subtopik']; ?>
                                            </div>
                                        </div>
                                    </td>
                                    <!--Baris 1 Sub Topik 1-->
                                    <td></td>
                                    <td colspan="2"
                                        style="background-color: #96AA03; color: white;  border-radius: 0.5vw;">
                                        <form method="POST" class="form-beli">
                                            <input type="hidden" name="kode_subtopik"
                                                value="<?= $rowsub['kode_subtopik'] ?>">
                                            <input type="hidden" name="harga" value="<?= $rowsub['harga'] ?>">
                                            <?php if ($status_bayar): ?>
                                            <button type="submit" class="btn btn-beli"
                                                style="background-color: #96AA03; color: white;"
                                                data-harga="<?= $rowsub['harga'] ?>">
                                                Buka
                                                <span style="text-decoration-color: black;">
                                                    <img src="./image/coin.png" width="20" height="20"
                                                        style="vertical-align: middle;">
                                                    <?= $rowsub['harga']; ?>
                                                </span>
                                            </button>
                                            <?php else: ?>
                                            <button type="submit" class="btn btn-beli"
                                                style="background-color: #96AA03; color: white;"
                                                data-harga="<?= $rowsub['harga'] ?>"
                                                data-nama="<?= $rowsub['nama_subtopik']; ?>">
                                                Beli
                                                <img src="./image/coin.png" width="20" height="20"
                                                    style="vertical-align: middle;">
                                                <?= $rowsub['harga']; ?>
                                            </button>
                                            <?php endif; ?>
                                        </form>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="5" style="padding: 0.5vw;"></td>
                                </tr>
                                <?php } ?>
                                <?php } ?>
                                <tr>
                                    <td colspan="5" style="padding: 0.3vw;"></td>
                                </tr>
                                <tr>
                                    <td colspan="5" style="padding: 0.5vw;"></td>
                                </tr>
                                <tr>
                                    <td style="margin: 1vw;">
                                        <font
                                            style="border-bottom: 1px solid #3A425A; color: #3A425A;  padding-bottom: 4px;">
                                            Latihan Soal</font>
                                    </td>
                                    <td></td>
                                    <td style="padding: 0.8vw;"></td>
                                    <td style="padding-left: 3.8vw;"></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td colspan="5" style="padding: 0.7vw;"></td>
                                </tr>
                                <?php foreach ($subtopik as $rowsub) {
                                                if ($rowsub['keterangan'] == 'latihan') { ?>
                                <?php
                                                    $kode_subtopik_pilih  = $rowsub['kode_subtopik'];
                                                    $status_bayar = ambilData("SELECT * FROM beli_subtopik 
                                    WHERE kode_subtopik = $kode_subtopik_pilih AND id_user = $id");
                                                    ?>
                                <tr>
                                    <!--Baris 1 Sub Topik 1-->
                                    <td colspan="2"
                                        style="background-color: <?= ($status_bayar) ? '#375679' : '#B4BFCC'; ?>; color: white; width: 20vw; max-width: 30vw; padding: 0.5vw 1vw 0.5vw 1.5vw; border-radius: 0.5vw;">
                                        <div style="display: flex;">
                                            <div>
                                                <img src="./image/coin.png" width="18" height="18"
                                                    style="margin-right: 5vw;">
                                            </div>
                                            <div style="color: white;">
                                                <?= $rowsub['nama_subtopik']; ?>
                                            </div>
                                        </div>
                                    </td>
                                    <!--Baris 1 Sub Topik 1-->
                                    <td></td>
                                    <td colspan="2"
                                        style="background-color: #96AA03; color: white;  border-radius: 0.5vw;">
                                        <form method="POST" class="form-beli">
                                            <input type="hidden" name="kode_subtopik"
                                                value="<?= $rowsub['kode_subtopik'] ?>">
                                            <input type="hidden" name="harga" value="<?= $rowsub['harga'] ?>">
                                            <?php if ($status_bayar): ?>
                                            <button type="submit" class="btn btn-beli"
                                                style="background-color: #96AA03; color: white;"
                                                data-harga="<?= $rowsub['harga'] ?>">
                                                Buka
                                                <span style="text-decoration-color: black;">
                                                    <img src="./image/coin.png" width="20" height="20"
                                                        style="vertical-align: middle;">
                                                    <?= $rowsub['harga']; ?>
                                                </span>
                                            </button>
                                            <?php else: ?>
                                            <button type="submit" class="btn btn-beli"
                                                style="background-color: #96AA03; color: white;"
                                                data-harga="<?= $rowsub['harga']; ?>"
                                                data-nama="<?= $rowsub['nama_subtopik']; ?>">
                                                Beli
                                                <img src="./image/coin.png" width="20" height="20"
                                                    style="vertical-align: middle;">
                                                <?= $rowsub['harga']; ?>
                                            </button>
                                            <?php endif; ?>
                                        </form>
                                    </td>
                                </tr>
                                <?php } ?>
                                <?php } ?>
                            </table>
                        </center>
                    </div>
                    <div
                        style="overflow: auto ;width: 40vw; height: 30vw; background-color: white; border-radius: 0.5vw;">
                        <?php if (isset($rangkuman_topik)): ?>
                        <div style="margin-top: 1vw; text-align: center;">
                            <video width="250" height="150" style="border-radius: 0.5vw;" controls>
                                <source src="<?php echo htmlspecialchars($video_topik); ?>">
                            </video>
                        </div>
                        <div
                            style="padding-left: 4vw; padding-right: 4vw; padding-top: 1vw; font-size: 1.2vw; color: #1F2844">
                            <?php echo nl2br(htmlspecialchars($rangkuman_topik)); ?>
                        </div>
                        <?php else: ?>
                        <div
                            style="display: flex; flex-direction: column; justify-content: center; align-items: center; height: 100%;">
                            <img src="image/folder.png" width="200" alt="Example Image" class="mb-3">
                            <p
                                style="padding-left: 4vw; padding-right: 4vw; padding-top: 1vw; font-size: 1.2vw; color: #1F2844; text-align: center;">
                                Maaf, materi belum tersedia
                            </p>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
</div>
</div>
</div>

<?php
        } else {
            echo "<p>Topik tidak ditemukan.</p>";
        }
    } else {
        echo "<p>Kode topik tidak disediakan.</p>";
    }
} else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $koin = ambilData("SELECT koin FROM users WHERE id = $id");
    $kode_subtopik_pilih = trim($_POST['kode_subtopik']);
    $harga_subtopik = trim($_POST['harga']);
    $status_bayar = ambilData("SELECT * FROM beli_subtopik WHERE kode_subtopik = $kode_subtopik_pilih AND id_user = $id");

    if ($status_bayar) {
        $_SESSION['kode_subtopik'] = $kode_subtopik_pilih;
        echo "isi_subtopik.php";
        exit;
    } else if ($koin[0]['koin'] >= $harga_subtopik) {
        // Update koin
        $new_koin = $koin[0]['koin'] - $harga_subtopik;
        mysqli_query($conn, "UPDATE users SET koin = $new_koin WHERE id = $id;");
        mysqli_query($conn, "INSERT INTO beli_subtopik (kode_subtopik, id_user) VALUES ($kode_subtopik_pilih, $id);");

        echo 'Selamat anda telah membeli subtopik ini!';

        exit();
    } else {
        echo 'Koin tidak cukup!';
        exit();
    }
}
?>