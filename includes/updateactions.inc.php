<?php

if (isset($_GET['update'])) {
    header("location: ../updatedetails.php");
    exit();

}elseif(isset($_GET['cpassword'])){
    header("location: ../cpassword.php");
    exit();
}