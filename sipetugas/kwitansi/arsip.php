<?php include "../template/header.php" ?>
<?php include "../template/navbar.php" ?>

    <h1>Upload File</h1>
    <form action="proses.php" method="POST" enctype="multipart/form-data">
        <input type="file" name="files[]" multiple>
        <br>
        <input type="submit" value="Upload">
    </form>

    



<?php include "../template/footer.php" ?>