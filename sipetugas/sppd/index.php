<?php
include "../template/header.php";
include "../template/navbar.php";
?>
    <h1>surat spt</h1>

    <a href="tambah.php" class="btn btn-primary mb-3">tambah</a>

    <table border="1" class="table table-bordered">
        <tr>
            <th>no</th>
            <th>id</th>
            <th>tgl</th>
            <th>tempat</th>
            <th>aksi</th>
        </tr>
        <?php
        include "../koneksi.php";
        $i = 1;
        // $cek = mysqli_fetch_assoc(mysqli_query($koneksi,"SELECT DISTINCT angkatan FROM `daftar` "));
        $query = mysqli_query($koneksi,"SELECT * FROM sppd ORDER BY idsppd desc");
        while ($dat = mysqli_fetch_assoc($query)) {
            $ang = mysqli_fetch_assoc(mysqli_query($koneksi,"SELECT * FROM kantor INNER JOIN sppd ON kantor.idrek = sppd.anggaran where idsppd = '$dat[idsppd]'"));
        ?>
        <tr>
            <td><?=$i?></td>
            <td><?=$dat['perintah']?></td>
            <td><?=$dat['tujuan']?></td>
            <td><?=$ang['norek']?></td>
            <?php
            if ($dat['status'] == 'verify') {
            ?>
                <td><a href="laporan_sppd.php?id=<?=$dat['idsppd']?>">cetak</a></td>
            <?php
            } elseif ($dat['status'] == 'ditolak') {
            ?>
                <td><a href="update.php?id=<?=$dat['idsppd']?>"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="red" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-circle"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg></a></td>
            <?php
            }elseif ($dat['status'] == 'PENDING') {
                # code...
            }
            ?>
            
        </tr>
        <?php
        $i++;
        // var_dump($query);
        }
        ?>
    </table>
<?php include "../template/footer.php"; ?>