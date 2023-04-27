<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="proses.php" method="post">
        <label for="">Nama petugas</label>
        <input type="text" name="nama" id="">
        <label for="">Nip</label>
        <input type="text" name="nip" id="">
        <label for="">no rek</label>
        <input type="text" name="norek" id="">
        <label for="">no telp</label>
        <input type="text" name="telp" id="">
        <label for="golonga">golongan</label>
        <select name="gol" id="">
            <option value=""></option>
            <?php
            include "../koneksi.php";
            $query = mysqli_query($koneksi,"SELECT * FROM gol");
            while ($g = mysqli_fetch_assoc($query)) {
            ?>
            <option value="<?=$g['idgol']?>"><?=$g['golongan']?></option>
            <?php
            }
            ?>
        </select>
        <label for="">jabatan</label>
        <input type="text" name="jabatan" id="">

        <input type="submit" name="simpan" value="simpan">
    </form>

</body>
</html>