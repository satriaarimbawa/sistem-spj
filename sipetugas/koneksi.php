<?php

$username = "localhost";
$user = "root";
$pass = "";
$db = "sipeluang";


$koneksi = mysqli_connect($username,$user,$pass,$db);

if (!$koneksi) {
    echo"
    
<script>
alert('koneksi anda gagall');
</script>
    ";
}
