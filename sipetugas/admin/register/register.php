<?php
include "../template/header.php";
include "../template/navbar.php";
?>
<form method="post" action="../login/proseslogin.php" name="registerForm" onsubmit="return validateForm()">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required><br><br>
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required><br><br>
    <label for="email">Level:</label>
    <input type="text" id="level" name="level" required><br><br>
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required><br><br>
    <label for="confirm_password">Confirm Password:</label>
    <input type="password" id="confirm_password" name="confirm_password" required><br><br>
    <input type="submit" name="register" value="Register">
</form>

<script>
    function validateForm() {
    var name = document.forms["registerForm"]["name"].value;
    var email = document.forms["registerForm"]["email"].value;
    var level = document.forms["registerForm"]["level"].value;
    var password = document.forms["registerForm"]["password"].value;
    var confirm_password = document.forms["registerForm"]["confirm_password"].value;
    
    if (name == "") {
        alert("Name must be filled out");
        return false;
    }
    
    if (email == "") {
        alert("Email must be filled out");
        return false;
    }
    if (level == "") {
        alert("isi level user");
        return false;
    }
    
    if (password == "") {
        alert("Password must be filled out");
        return false;
    }
    
    if (confirm_password == "") {
        alert("Confirm Password must be filled out");
        return false;
    }
    
    if (password != confirm_password) {
        alert("Passwords do not match");
        return false;
    }
}

<?php
include "../template/footer.php";
?>