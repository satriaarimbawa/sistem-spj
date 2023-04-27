
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>peserta</title>


</head>
<?php

    include "../koneksi.php";

if (@$_GET['id']) {
    $query1 = mysqli_fetch_assoc(mysqli_query($koneksi,"SELECT * FROM daftar WHERE iddaf = '$_GET[id]'"));
    // $tempat = mysqli_fetch_assoc($query);
    $i = 1;
    $tgl = date('d-m-Y');
}else {
        $query1 = mysqli_fetch_assoc(mysqli_query($koneksi,"SELECT * FROM daftar ORDER BY angkatan DESC LIMIT 1"));
    // $tempat = mysqli_fetch_assoc($query);
    $i = 1;
    $tgl = date('d-m-Y');
    if (isset($_GET['submit'])) {
    $query = mysqli_query($koneksi,"UPDATE daftar SET status='PENDING' WHERE angkatan ='$query1[angkatan]'");

    if (!$query) {
        echo"query anda gagal";
        die;
    }else {
echo"<script>
        alert('dokumen sudah di ajukan');
        document.location.href = 'index.php'
    </script>";
    }

            if ($query1['st atus'] == 'pending') {

    }
    }


}
    ?>
<?php
if (!isset($_GET['id'])) {
    echo"<body>";

}else {
    echo"<body onload='window.print()'>";
}
?>
    <table>
        <tr>
            <td><b>DAFTAR</b></td>
            <td><b>:</b></td>
            <td><b>PENERIMAAN PERJALANAN DINAS KOTA DALAM RANGKA PELAKSAAN PENGAWAL</b></td>
            <tr><b>           
            <td>KE</td>
            <td>:</td>
            <td><b><?=strtoupper($query1['tempat'])?></b></td>
            </b>
            </tr>
            <tr>
            <td><b>TANGGAL</b></td> 
            <td>:</td>
            <td><b><?=$tgl?></b></td>
            </tr>

        </tr>
    </table>


    <table border="1" class="table table-bordered">
        <tr>
            <th>no</th>
            <th>nama</th>
            <th>gol</th>
            <th>no.rekening</th>
            <th>jumlah terima</th>
            <th>tanda tangan</th>
        </tr>
        <?php
        if (isset($_GET['id'])) {
            $query = mysqli_query($koneksi,"SELECT * FROM daftar WHERE angkatan = '$_GET[id]'");
            $daf = mysqli_fetch_assoc($query);
            $querypet = mysqli_query($koneksi,"SELECT * FROM petugas INNER JOIN  daftar ON petugas.idpetugas = daftar.idpetugas where angkatan = '$daf[angkatan]'");
            while ($pet = mysqli_fetch_assoc($querypet)) {
            $querygol = mysqli_query($koneksi,"SELECT * FROM gol where idgol = '$pet[gol]'");
            $gol = mysqli_fetch_assoc($querygol);
            ?>
        <tr>
            <td><?=$i?></td>
            <td><?=$pet['nama']?></td>
            <td><?=$gol['golongan']?></td>
            <td><?=$pet['norek']?></td>
            <td><?=$daf['jumlahterima']?></td>
            <td></td>
        </tr>
            <?php
            $i++;
            }
        ?>

        <tr>
            <td>jumlah</td>
            <td></td>
            <td></td>
            <td></td>
            <?php
            $i++;
            ?>
            <?php
            $sum = $daf['jumlahterima']*$i;
            ?>
            <td><?=number_format($sum)?></td>
        </tr>
        <?php
        } else {
            $query = mysqli_query($koneksi,"SELECT * FROM daftar ORDER BY angkatan DESC LIMIT 1");
            while ($daf = mysqli_fetch_assoc($query)) {
                $querypet = mysqli_query($koneksi,"SELECT * FROM petugas INNER JOIN  daftar ON petugas.idpetugas = daftar.idpetugas where angkatan = '$daf[angkatan]'");
                while ($pet = mysqli_fetch_assoc($querypet)) {
                $querygol = mysqli_query($koneksi,"SELECT * FROM gol where idgol = '$pet[gol]'");
                $gol = mysqli_fetch_assoc($querygol);
                ?>
            <tr>
                <td><?=$i?></td>
                <td><?=$pet['nama']?></td>
                <td><?=$gol['golongan']?></td>
                <td><?=$pet['norek']?></td>
                <td><?=$daf['jumlahterima']?></td>
                <td></td>
            </tr>
                <?php
                $i++;
                }
            ?>
    
            <tr>
                <td>jumlah</td>
                <td></td>
                <td></td>
                <td></td>
                <?php
                $i++;
                ?>
                <?php
                $sum = $daf['jumlahterima']*$i;
                }
                ?>
                <td><?=number_format($sum)?></td>
            </tr>
<?php    
        }
?>
 
    </table>

    <?php
    if (@$_GET[''] ) {
        echo"haloo";
    } elseif (@$_GET['page']) {
    ?>
    <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Launch demo modal
</button>

 <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="proses.php" method="post">
            <input type="hidden" name="id" value="<?=$_GET['page']?>">
            <textarea name="note" id="" cols="30" rows="10"></textarea>            
            <div class="modal-footer">
              <button type="submit" name="cancel" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" name="komen" class="btn btn-primary">Save changes</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div> 
    <?php
    } else {
    ?>  
        <form action="" method="get">
            <input type="submit" name="submit" value="submit" onclick="return confirm('yakin mengajukan berkas')">
        </form>
    <?php
    }
    ?>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
</body>
</html>