<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<?php
include "../koneksi.php";
$kwit = mysqli_fetch_assoc(mysqli_query($koneksi,"SELECT * FROM kwitansi WHERE idkwit = '$_GET[id]'"));
?>
<body>
    <div class="d-flex justify-content-center mt-4">
<table border="1" >
    <tr>
        <td>Kaspos no</td>
        <td>:</td>
        <td width="100"></td>
    </tr>
    <tr>
        <td>Tanggal</td>
        <td>:</td>
        <td width="100"><?=$kwit['tgltrans']?></td>
    </tr>
</table>
<table border="1" style="margin-left: 2%;">
    <?php
    $rek = mysqli_fetch_assoc(mysqli_query($koneksi,"SELECT * FROM kantor WHERE idrek = '$kwit[rek]'"));
    ?>
    <tr>
        <td>
            Kode rekening :<br>
            <?=$rek['norek']?>
        </td>
    </tr>
</table>
<h5 style="margin-left: 2%;">Tahun <?=date('Y')?></h5>
    </div>


<h1 align="center"><u>KWITANSI</u></h1>

<div class="">
    <table border="1" align="center" width="59%">
        <tr>
            <td align="top">Sudah di terima dari :</td>
            <td width=""><?=$kwit['pemberi']?></td>
        </tr>
        <tr >
            <td>banyaknya</td>
            <td width="">==<?=$kwit['banyak']?>==</td>
        </tr>
        <tr>
            <td style="vertical-align: top;">untuk pembayaran :</td>
            <td width="79%"><?=$kwit['ket']?></td>
        </tr>
    </table>
</div>
<div class="container">
    <h1 style="font-size: large; margin-left: 15%; margin-top: 2%;">Terbilang Rp. <?=$harga_format = number_format($kwit['nom'], 0, ",", ".");?></h1>
</div>

<div class="container">
<table align="right" style="margin-right: 20%;">
    <tr>
        <td><h6>Bali, <?=$kwit['tglkwit']?></h6></td>
    </tr>
    <tr>
        <td><h6>Yang Menerima/membagikan</h6></td>
    </tr>
    <tr height="80">
        <td></td>
    </tr>
    <?php
        $pet1 = mysqli_fetch_assoc(mysqli_query($koneksi,"SELECT * FROM petugas WHERE idpetugas = '$kwit[penerima]'"));
    ?>
    <tr>
        <td><u><b><?=$pet1['nama']?></b></u></td>
    </tr>
    <tr>
        <td>NIP.<?=$pet1['nip']?></td>
    </tr>
</table>
</div>
</body>
</html>


<div class="" style="margin-top: 2000%;">
    <table align="center" width="270" style="text-align: center;">
        <tr>
            <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore reprehenderit tempora perspiciatis inventore assumenda at!</td>
        </tr>
        <tr height="80">
            <td></td>
        </tr>
        <?php
        $pet2 = mysqli_fetch_assoc(mysqli_query($koneksi,"SELECT * FROM petugas WHERE idpetugas = '$kwit[peltek]'"));
        ?>
        <tr>
            <td><u><b><?=$pet2['nama']?></b></u>
            <br>
            NIP.<?=$pet2['nip']?>
            </td>
        </tr>
    </table>

    <table  style="margin-top: 5%; text-align: left;" width="1000" align="center">
        <tr>
            <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit nostrum sint tenetur!</td>
            <td style="width: 20%;"></td>
            <td>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Minima amet tempora corrupti!</td>
        </tr>
        <?php
        $pet3 = mysqli_fetch_assoc(mysqli_query($koneksi,"SELECT * FROM petugas WHERE idpetugas = '$kwit[pengguna]'"));
        ?>
        <tr height="250">
            <td><u><b><?=$pet3['nama']?></b></u><br>
            NIP.<?=$pet3['nip']?>
            </td>
            <td style="width: 20%;"></td>
            <td><u><b>I Made Suartawan.,S.Sos</b></u><br>
            NIP.
            </td>
        </tr>
    </table>
</div>
