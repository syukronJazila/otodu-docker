<?php

namespace Midtrans;

require_once dirname(__FILE__) . '/../../Midtrans.php';
Config::$serverKey = 'SB-Mid-server-jTvEEirRWBgQVUywIo8lCLDz';
Config::$clientKey = 'SB-Mid-client-vP30I6evwPVV5p-F';
session_start();

// Konfigurasi Midtrans
Config::$isProduction = false;
Config::$isSanitized = Config::$is3ds = true;

// Data dari session dan query database
include "config.php";
$order_id = $_GET['order_id'];
$id = $_SESSION['user_id'];

$query = "SELECT * FROM users WHERE id='" . $id . "'";
$sql = mysqli_query($conn, $query);
$data = mysqli_fetch_array($sql);

$nama = $data['nama'];
$email = $data['email'];
$nomor = $data['nomor'];
$biaya = $_SESSION['biaya'];
$jumlah = $_SESSION['jumlah'];
if ($_SESSION['keterangan'] == "Satuan") {
    $_SESSION['nama_transaksi'] = "Beli " . $jumlah . " Koin";
    $biaya = 2000;
} else $_SESSION['nama_transaksi'] = "Beli " . $_SESSION['keterangan'];

// Detail transaksi
$transaction_details = array(
    'order_id' => $order_id,
    'gross_amount' => $biaya,
);
$item_details = array(
    array(
        'id' => 'Koin',
        'price' => $biaya,
        'quantity' => $jumlah,
        'name' => $_SESSION['nama_transaksi']
    ),
);
$customer_details = array(
    'first_name'    => $nama,
    'last_name'     => "",
    'email'         => $email,
    'phone'         => $nomor
);

$transaction = array(
    'transaction_details' => $transaction_details,
    'customer_details' => $customer_details,
    'item_details' => $item_details,
);

// Mendapatkan token transaksi dari Midtrans
try {
    $snap_token = Snap::getSnapToken($transaction);
    echo $snap_token; // Mengembalikan token sebagai respons
} catch (\Exception $e) {
    echo 'Error: ' . $e->getMessage();
}
