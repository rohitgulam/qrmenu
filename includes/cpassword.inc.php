<?php 

session_start();

if (isset($_SESSION['userid'])) {
    if (isset($_GET['cpassword'])) {
        $newPassword = $_GET['cpassword'];
        $userid = $_SESSION['userid']; 

    require_once "dbh.inc.php";
    require_once "functions.inc.php";

    changePassword($conn, $userid, $newPassword);
    }
}
else{    
    header("location: ../cpassword.php?error=somethingwentwrong");
    exit;
}

