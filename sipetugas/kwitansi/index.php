<?php include "../template/header.php" ?>
<?php include "../template/navbar.php" ?>
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
        $query = mysqli_query($koneksi,"SELECT * FROM `kwitansi` ORDER BY `idkwit` DESC");
        while ($kwit = mysqli_fetch_assoc($query)) {
        ?>
        <tr>
            <td><?=$i?></td>
            <td><?=$kwit['nom']?></td>
            <td><?=$kwit['tglkwit']?></td>
            <td><a href="kwitansi.php?id=<?=$kwit['idkwit']?>">lihat</a></td>
        </tr>
        <?php
        $i++;
        }
        ?>
    </table>

<?php include "../template/footer.php" ?>
