<?php
// This is just for very basic implementation reference, in production, you should validate the incoming requests and implement your backend more securely.
// Please refer to this docs for sample HTTP notifications:
// https://docs.midtrans.com/en/after-payment/http-notification?id=sample-of-different-payment-channels

namespace Midtrans;

require_once dirname(__FILE__) . '/../Midtrans.php';
Config::$isProduction = false;
Config::$serverKey = 'SB-Mid-server-jTvEEirRWBgQVUywIo8lCLDz';
$_SESSION['bayar'] = true;
header("Location: ../../price.php");
// non-relevant function only used for demo/example purpose
printExampleWarningMessage();

try {
    // Instantiate a notification instance
    $notif = new Notification();

    // Retrieve the notification response as an object
    $transaction = $notif->transaction_status;
    $transaction_id = $notif->transaction_id;
    $type = $notif->payment_type;
    $order_id = $notif->order_id;
    $fraud = $notif->fraud_status;

    // Connect to the database
    include "koneksi.php";

    // Update the transaction status based on the Midtrans notification
    if ($transaction == 'settlement') {
        mysqli_query($koneksi, "UPDATE peserta SET transaction_status='3', transaction_id='$transaction_id' WHERE order_id='$order_id'");
    } else if ($transaction == 'pending') {
        mysqli_query($koneksi, "UPDATE peserta SET transaction_status='2' WHERE order_id='$order_id'");
    } else if ($transaction == 'deny' || $transaction == 'expire' || $transaction == 'cancel') {
        mysqli_query($koneksi, "UPDATE peserta SET transaction_status='1' WHERE order_id='$order_id'");
    }
} catch (\Exception $e) {
    // Handle the exception and output the error message
    exit($e->getMessage());
}

// Function for example warning message
function printExampleWarningMessage()
{
    if ($_SERVER['REQUEST_METHOD'] != 'POST') {
        echo 'Notification-handler are not meant to be opened via browser / GET HTTP method. It is used to handle Midtrans HTTP POST notification / webhook.';
    }
    if (strpos(Config::$serverKey, 'your ') !== false) {
        echo "<code>";
        echo "<h4>Please set your server key from sandbox</h4>";
        echo "In file: " . __FILE__;
        echo "<br>";
        echo "<br>";
        echo htmlspecialchars('Config::$serverKey = \'<Server Key>\';');
        die();
    }
}
