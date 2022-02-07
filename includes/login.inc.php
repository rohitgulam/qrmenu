<?php

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $userpass = $_POST['userpass'];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if (emptyInputLogin($username, $userpass) !== false) {
        header("location: ../login.php?error=emptyinput");
        exit();
    }

    loginUser($conn, $username, $userpass);

    // createUser($conn, 'rgulam', 'Rohit Gulam', 'Sub-Zero Ice Creams', 'rohitg@gmail.com', '12345678');

    // createUser($conn, 'John', 'Doe', "Golden Fork", 'JohnDoe@gmail.com', '12345678');
}
else {
    header("location: ../login.php");
    exit();
}