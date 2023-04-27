<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index||kwitansi</title>
</head>
<body>
    <table border="1">
        <tr>
            <th>no</th>
            <th>nominal</th>
            <th>tanggal kwitansi</th>
            <th>aksi</th>
        </tr>
        <?php
        include "../koneksi.php";
        $i=1;
        $query = mysqli_query($koneksi,"SELECT * FROM kwitansi");
        while ($kwit = mysqli_fetch_assoc($query)) {
        ?>
        <tr>
            <td><?=$i?></td>
            <td><?=$kwit['nom']?></td>
            <td><?=$kwit['tglkwit']?></td>
            <td><a href="laporan_kwitansi.php?id=<?=$kwit['idkwit']?>">lihat</a></td>
        </tr>
        <?php
        $i++;
        }
        ?>
    </table>
</body>
</html>