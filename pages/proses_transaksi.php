<?php

require_once '../config/Database.php';
require_once '../classes/Transaksi.php';

$db = new Database();

$conn = $db->getConnection();

$transaksi = new Transaksi($conn);

if(
    $transaksi->kurangiStok(
        $_POST['id_produk'],
        $_POST['jumlah']
    )
){
    echo "Transaksi berhasil";
}else{
    echo "Transaksi gagal";
}

?>
