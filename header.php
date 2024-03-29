<?php
    session_start();
    if(!isset($_SESSION["useruid"])){
        header("location: login.php");
        exit();
    }
    require_once "includes/dbh.inc.php";
    require_once "includes/functions.inc.php";
    fetchItems($pdo, $_SESSION['userid']);
    $categories = getAllCategories($pdo, $_SESSION['userid']);
    $userDetails = fetchAccountDetails($conn, $_SESSION['userid']);
    $position = getWaitlistPosition($conn, $_SESSION['userid']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="assets/qr-code-1.svg" type="image/x-icon">
    <title>Dashboard</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css" integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous">
    
</head>
<body>

<nav class="navbar">
        <a href="index.php" class="header-logo">
            <img src="assets/qr-code-1.svg" alt="QR Menu Logo">
        </a>
        <ul>
            <li><a href="profile.php">profile</a></li>
            <li><a href="includes/logout.inc.php">log out</a></li>
        </ul>
    </nav>