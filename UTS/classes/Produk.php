<?php

class Produk {

    protected $conn;
    protected $table = "produk";

    public $nama_produk;
    public $jenis_produk;
    public $harga;
    public $stok;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function tambahProduk() {

        if($this->stok < 0){
            die("Stok tidak boleh negatif!");
        }

        $query = "INSERT INTO produk
                (nama_produk, jenis_produk, harga, stok)
                VALUES (?, ?, ?, ?)";

        $stmt = $this->conn->prepare($query);

        $stmt->bind_param(
            "ssdi",
            $this->nama_produk,
            $this->jenis_produk,
            $this->harga,
            $this->stok
        );

        return $stmt->execute();
    }

    public function tampilProduk() {

        $query = "SELECT * FROM produk";

        return $this->conn->query($query);
    }
}

?>