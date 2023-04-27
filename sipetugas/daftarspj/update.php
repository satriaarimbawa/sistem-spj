<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<form action="" method="get">
<label for="peserta">masukan jumlah peserta</label>
<input type="number" name="banyak" id="banyak">
<button type="submit" name="submit">generate</button>
</form>
<form action="prosesdafatar.php" method="post">
    <?php
    include "../koneksi.php";
    $t=1;
    $iddf = mysqli_query($koneksi,"SELECT iddaf FROM daftar WHERE angkatan =  '$_GET[page]'");
    while ($s = mysqli_fetch_assoc($iddf)) {
    ?>
    <input type="hidden" name="iddaf<?=$t?>" value="<?=$s['iddaf']?>">
    <?php
    $t++;
    }
    ?>
    <input type="hidden" name="id" value="<?=$_GET['page']?>">
    <input type="hidden" name="total" value="<?=$_GET['banyak']?>">
    <div class="table">
        <table>
            <?php
            if (isset($_GET['banyak'])) {
                for ($i=1; $i <=$_GET['banyak']; $i++) { 
                    ?>
                <tr>
                    <td>
                        <label for="peserta">pilih peserta</label>
                        <select name="pet<?=$i?>" id="">
                        <option value=""></option>
                        <?php
                        include "../koneksi.php";
                        $query = mysqli_query($koneksi,"SELECT * FROM petugas");
                        while ($pet = mysqli_fetch_assoc($query)) {
                        ?>
                        <option value="<?=$pet['idpetugas']?>"><?=$pet['nama']?></option>
                        <?php
                        }
                        ?>
                        </select>
                    </td>
                </tr>
                <?php
            }
        }
            ?>
        </table>
        <table>
            <?php
            $select = mysqli_query($koneksi,"SELECT * FROM petugas inner join daftar on petugas.idpetugas = daftar.idpetugas where angkatan = '$_GET[page]'");
            while ($se = mysqli_fetch_assoc($select)) {
                ?>
                <tr>
                <td><?=$se['nama']?></td>
                </tr>
            <?php
            }
            $tam = mysqli_query($koneksi,"SELECT * FROM petugas inner join daftar on petugas.idpetugas = daftar.idpetugas where angkatan = '$_GET[page]'");
            $sl = mysqli_fetch_assoc($tam);
            ?>
        </table>
    </div>
    <label for="">jumlah terima</label>
    <input type="text" name="jumlah" id="" value="<?=$sl['jumlahterima']?>"><br>
    <label for="">input tujuan</label>
    <input type="text" name="tempat" id="" value="<?=$sl['tempat']?>">
    <input type="submit" name="update" value="SUBMIT">
</form>


</body>
</html>