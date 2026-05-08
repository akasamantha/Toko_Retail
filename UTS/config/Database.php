<?php

class Database {

    private $conn;

    public function getConnection() {

        $this->conn = new mysqli(
            "localhost",
            "root",
            "",
            "toko_db"
        );

        if($this->conn->connect_error){
            die("Koneksi gagal: " .
            $this->conn->connect_error);
        }

        return $this->conn;
    }
}
?>