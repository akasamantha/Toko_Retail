<?php

require_once '../config/Database.php';
require_once '../classes/Produk.php';
require_once '../classes/Validator.php';

$db = new Database();
$conn = $db->getConnection();

if(
    !Validator::validasiStok($_POST['stok'])
){
    die("Stok tidak valid!");
}

$produk = new Produk($conn);

$produk->nama_produk = $_POST['nama_produk'];
$produk->jenis_produk = $_POST['jenis_produk'];
$produk->harga = $_POST['harga'];
$produk->stok = $_POST['stok'];

if($produk->tambahProduk()){

    echo "Produk berhasil ditambahkan";

}else{

    echo "Produk gagal ditambahkan";
}
?>