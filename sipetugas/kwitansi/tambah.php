<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
<form action="proses.php" method="post">
    <div class="d-grid" style="margin-left: 35%; margin-right: 35%;">
            <label for="">di terima dari</label>
            <select name="pemberi" id="">
                <option value=""></option>
                <option value="Bendahara Pengeluaran Satuan Polisi Pamong Praja Provinsi Bali">Bendahara Pengeluaran Satuan Polisi Pamong Praja Provinsi Bali</option>
                <option value="bendahara umum">bendahara umum</option>
            </select>

            <label for="">tujuan</label>
            <textarea name="tujuan" id="" cols="30" rows="10"></textarea>

            <label for="">nominal</label>
            <input type="number" name="nominal" id="">

            <label for="">jumlah nominal</label>
            <input type="text" name="jumlah" id="">

            <label for="">kode rekening</label>
            <select name="norek" id="" >
                <option value=""></option>
            <?php
            include "../koneksi.php";
            $querypet = mysqli_query($koneksi,"SELECT * FROM petugas");
            $querypet2 = mysqli_query($koneksi,"SELECT * FROM petugas");
            $querypet3 = mysqli_query($koneksi,"SELECT * FROM petugas");
            $query = mysqli_query($koneksi,"SELECT * FROM kantor");
            while ($kan = mysqli_fetch_assoc($query)) {
            ?>
                <option value="<?=$kan['idrek']?>"><?=$kan['namarek']?></option>
                <?php
            }
            ?>
            </select>


            <label for="">petugas yang menerima/membagikan</label>
            <select name="membagikan" id="">
                <option value=""></option>

            <?php
            while ($pet = mysqli_fetch_assoc($querypet)) {
            ?>
            <option value="<?=$pet['idpetugas']?>"><?=$pet['nama']?></option>
            <?php
            }
            ?>
            </select>

            <label for="">pejabat pelaksana teknis</label>
            <select name="peltek" id="">
                <option value=""></option>

            <?php
            while ($petu = mysqli_fetch_assoc($querypet2)) {
            ?>
            <option value="<?=$petu['idpetugas']?>"><?=$petu['nama']?></option>
            <?php
            }
            ?>
            </select>

            <label for="">pengguna anggaran</label>
            <select name="pengguna" id="">
                <option value=""></option>

            <?php
            while ($petug = mysqli_fetch_assoc($querypet3)) {
            ?>
            <option value="<?=$petug['idpetugas']?>"><?=$petug['nama']?></option>
            <?php
            }
            ?>
            </select>

            <label for="">tanggal transaksi</label>
            <input type="date" name="tgltrans" id="">
            
            <button type="submit" style="margin-top: 4%">simpan</button>
        </div>
    </form>
</body>
</html>