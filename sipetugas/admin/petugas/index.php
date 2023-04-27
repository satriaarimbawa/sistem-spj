<?php include "../template/header.php" ?>
<?php include "../template/navbar.php" ?>

<a href="insert.php">tambah data</a>

<?php
include "../../koneksi.php";
$i=1;
$query = mysqli_query($koneksi,"SELECT * FROM petugas")

?>
<table class="table table-bordered" width="12">
    <tr>
        <th>No</th>
        <th>nama</th>
        <th>nip</th>
        <th>norek</th>
        <th>telp</th>
        <th>golongan</th>
        <th>jabatan</th>
        <th>aksi</th>
    </tr>
    <?php
    $key = 'saTpoLpp';
    $iv = 'pEmeRinThpEmeRin';
    while ($pet = mysqli_fetch_assoc($query)) {
    $rek = openssl_decrypt($pet['nip'], 'AES-256-CBC', $key, 0, $iv);   
    $nip = openssl_decrypt($pet['norek'], 'AES-256-CBC', $key, 0, $iv);   
    $telp = openssl_decrypt($pet['telp'], 'AES-256-CBC', $key, 0, $iv);   
    ?>
    <tr>
        <td><?=$i?></td>
        <td><?=$pet['nama']?></td>
        <td><?=$rek?></td>
        <td><?=$nip?></td>
        <td><?=$telp?></td>
        <td><?=$pet['gol']?></td>
        <td><?=$pet['jabatan']?></td>
        <td><i data-feather="edit"></td>
    </tr>
    <?php
    $i++;
    }
    ?>

</table>


<?php include "../template/footer.php" ?>