<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="../css/general.css">
</head>
<body>
<div class="formulir">   
<form action="" method="get">
    <table>
        <tr>
            <td><label for="peserta">masukan jumlah peserta</label></td>
            <td><input type="number" name="banyak" id="banyak"></td>
            <td><button type="submit" name="submit">generate</button></td>
        </tr>



</form>
<?php

?>

<form action="prosesdafatar.php" method="post">
    
    <input type="hidden" name="total" value="<?=$_GET['banyak']?>">
        <?php
        if (isset($_GET['submit'])) {
            for ($i=1; $i <=$_GET['banyak']; $i++) { 
            ?>
            <tr>
                <td>
                    <label for="peserta">pilih peserta</label>
                </td>
                <td>
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
                <td></td>
            </tr>
            <?php
            }
        }
        ?>
        <tr>
            <td><label for="">jumlah terima</label></td>
            <td><input type="number" name="jumlah" id=""></td>
            <td></td>
        </tr>
        <tr>
            <td><label for="">input tujuan</label></td>
            <td><input type="text" name="tempat" id=""></td>
            <td></td>
        </tr>
    </table>
    <div class="submit">
    <input type="submit" name="insert" value="SUBMIT">
    </div>
</form>
</div>

</body>
</html>