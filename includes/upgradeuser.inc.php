<?php 

session_start();
require_once "dbh.inc.php";
require_once "functions.inc.php";

if (isset($_SESSION['useruid'])) {
    if (isset($_POST['submit'])) {

        

        $inviteCode = $_POST['invite-code'];

        upgradeUser($conn, $inviteCode, $_SESSION['userid']);
    }
}
else{
    header("location: login.php");
    exit;
}