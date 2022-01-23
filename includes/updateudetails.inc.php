<?php




if (isset($_SESSION['useruid'])) {
    if (isset($_GET['update'])) {

        $userId = $_SESSION['useruid'];
        $restName = $_GET['rest_name'];
        $name = "James";
        $userName = $_GET['username'];
        $email = $_GET['email'];
        
        require_once "dbh.inc.php";
        require_once "functions.inc.php";
    
        updateDetails($conn, $userId, $name, $userName, $restName, $email);
    }
}
else {
    header("location: ../updatedetails.php");
    exit();
}
