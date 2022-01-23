<?php

session_start();

if (isset($_SESSION['useruid'])) {
    if (isset($_GET['add-food'])) {

        $userid = $_SESSION['userid']; 
        $food_name = $_GET['food_name']; 
        $food_price = $_GET['food_price']; 
        $food_desc = $_GET['food_desc']; 
        $food_img = $_GET['food_img']; 

        require_once "dbh.inc.php";
        require_once "functions.inc.php";

        if (emptyInputCreate($food_name, $food_price) !== false) {
            header("location: ../create.php?error=emptyinputcreate");
            exit();
        }

        addFoodItem($conn, $userid, $food_name, $food_price, $food_desc);

    }
}
else{
    header("location: login.php");
    exit;
}