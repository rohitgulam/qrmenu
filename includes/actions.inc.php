<?php

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

if (isset($_GET['delete'])) {
    $food_id = $_GET['id'];
    $user_id = $_GET['userId'];
    deleteItem($conn, $user_id, $food_id);

}elseif (isset($_GET['edit'])) {
    $food_id = $_GET['id'];
    $user_id = $_GET['userId'];

    $foodItem = fetchFoodItem($conn, $user_id, $food_id);
    
    header("location: ../create.php?update=true&foodid=".$food_id."&userid=".$user_id);
    exit();


}


