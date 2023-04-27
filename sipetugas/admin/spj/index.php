<?php include "../template/header.php"; ?>
<?php include "../template/navbar.php"; ?>


    <table class="d-flex justify-content-center table table-bordered">
        <tr>
            <th>no</th>
            <th>id</th>
            <th>tgl</th>
            <th>tempat</th>
            <th>aksi</th>
        </tr>
        <?php
        include "../../koneksi.php";
        $i = 1;
        // $cek = mysqli_fetch_assoc(mysqli_query($koneksi,"SELECT DISTINCT angkatan FROM `daftar` "));
        $query = mysqli_query($koneksi,"SELECT * FROM daftar WHERE status IN ('PENDING', 'verify') GROUP BY angkatan DESC");
        while ($dat = mysqli_fetch_assoc($query)) {
            // var_dump($query);
        ?>
        <tr>
            <th><?=$i?></th>
            <th><?=$dat['angkatan']?></th>
            <th><?=$dat['tglbuat']?></th>
            <th><?=$dat['tempat']?></th>
            <?php
            if ($dat['status'] == 'verify') {
            ?>
            <td><a href="laporan_peserta.php?id=<?=$dat['angkatan']?>"><i data-feather="download"></i></a></td>
            <?php
            }else {
            ?>
                <td><i data-feather="clock"></i></td>
                <td><a href="laporan_admin.php?page=<?=$dat['angkatan']?>"><i data-feather="eye"></i></a></td>

            <?php
            }
            ?>
        </tr>
        <?php
        $i++;
        }
        ?>
    </table>




<?php include "../template/footer.php"; ?>