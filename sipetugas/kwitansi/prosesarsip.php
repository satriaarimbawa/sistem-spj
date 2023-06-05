<?php

class myclass{

    private $koneksi;

    public function __construct()
    {
        $this->koneksi = mysqli_connect('localhost','root','','sipeluang');

        if (!$this->koneksi) {
            echo "koneksi gagal dijalankan";
        }
    }

    public function arsip() {
        
    }

}