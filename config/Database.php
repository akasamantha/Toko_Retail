<?php

class Database {

    protected $conn;
    public function __construct() {
        $this->conn = new mysqli(
            "localhost",
            "root",
            "",
            "toko_db"
        );
        if($this->conn->connect_error){
            die("Koneksi gagal");
        }
    }
}
?>
