<?php

session_start();

require_once "dbh.inc.php";
require_once "functions.inc.php";

if (isset($_SESSION['useruid'])) {
    if (isset($_GET['update-food'])) {

        $userid = $_SESSION['userid'];
        $food_id = intval($_GET['food_id']);
        $food_name = $_GET['food_name']; 
        $food_price = $_GET['food_price']; 
        $food_desc = $_GET['food_desc']; 
        // $food_img = $_GET['food_img']; 

        if (emptyInputCreate($food_name, $food_price) !== false) {
            header("location: ../create.php?error=emptyinputcreate");
            exit();
        }

        updateFoodItem($pdo, $userid, $food_id, $food_name, $food_price, $food_desc);

    }
}
else{
    header("location: login.php");
    exit;
}