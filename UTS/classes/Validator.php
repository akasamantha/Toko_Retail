<?php

class Validator {

    public static function validasiStok($stok){

        if(!is_numeric($stok)){
            return false;
        }

        if($stok < 0){
            return false;
        }

        return true;
    }
}
?>