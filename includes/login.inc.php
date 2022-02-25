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

    // loginUser($conn, $username, $userpass);

    // createUser($conn, 'rgulam', 'Rohit Gulam', 'Sub-Zero Ice Creams', 'rohitg@gmail.com', '12345678');
    
    // createUser($conn, 'zein', 'Zein Aklan', 'Zein Ice Creams', 'zein@gmail.com', '12345678');


    // createUser($conn, 'userone', 'Change Name', 'Change Restaurant Name', 'change@gmail.com', '12345678');
    createUser($conn, 'usertwo', 'Change Name', 'Change Restaurant Name', 'change@gmail.com', '12345678');
    // createUser($conn, 'userthree', 'Change Name', 'Change Restaurant Name', 'change@gmail.com', '12345678');

}
else {
    header("location: ../login.php");
    exit();
}