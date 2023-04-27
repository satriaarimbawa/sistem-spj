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
<?php

?>
<form action="prosesdafatar.php" method="post">
    <input type="hidden" name="total" value="<?=$_GET['banyak']?>">
    <table>
        <?php
        if (isset($_GET['submit'])) {
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
    <label for="">jumlah terima</label>
    <input type="number" name="jumlah" id=""><br>
    <label for="">input tujuan</label>
    <input type="text" name="tempat" id="">
    <input type="submit" name="insert" value="SUBMIT">
</form>


</body>
</html>