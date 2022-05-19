<?php


if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $restaurant = $_POST['restaurant'];
    $name = $_POST['name'];
    $phone_number = $_POST['number'];
    $email = $_POST['email'];
    $source = $_POST['source'];
    $password = $_POST['userpass'];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';
    
    createUser($conn, $username, $name, $restaurant, $email, $phone_number, $password, $source);
}
else{
    header("location: createuser.php?error=true");
}