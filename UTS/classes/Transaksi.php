<?php

class Transaksi {

    private $conn;
    public function __construct($db) {
        $this->conn = $db;
    }
    public function kurangiStok(
        $id_produk,
        $jumlah
    ) {

        if($jumlah <= 0){
            die("Jumlah transaksi tidak valid!");
        }

        $cek = $this->conn->prepare(
            "SELECT stok FROM produk
            WHERE id=?"
        );

        $cek->bind_param(
            "i",
            $id_produk
        );

        $cek->execute();
        $hasil = $cek->get_result();
        $data = $hasil->fetch_assoc();
        if($jumlah > $data['stok']){

            die("Stok tidak mencukupi!");
        }

        $update = $this->conn->prepare(
            "UPDATE produk
            SET stok = stok - ?
            WHERE id=?"
        );

        $update->bind_param(
            "ii",
            $jumlah,
            $id_produk
        );

        $update->execute();

        $insert = $this->conn->prepare(
            "INSERT INTO transaksi
            (id_produk, jumlah)
            VALUES (?, ?)"
        );

        $insert->bind_param(
            "ii",
            $id_produk,
            $jumlah
        );

        return $insert->execute();
    }
}

?>
