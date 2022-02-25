<?php


if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $name = $_POST['name'];
    $restaurant = $_POST['restaurant'];
    $email = $_POST['email'];
    $userpass = $_POST['userpass'];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';
    
    createUser($conn, $username, $name, $restaurant, $email, $userpass);
}
else{
    header("location: createuser.php?error=true");
}