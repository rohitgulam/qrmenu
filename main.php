<?php
    session_start();
    require_once "includes/dbh.inc.php";
    require_once "includes/functions.inc.php";
    $foods = fetchItems($pdo, $_GET['rest_id']);
    $userDetails = fetchAccountDetails($conn, $_GET['rest_id']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="assets/qr-code-1.svg" type="image/x-icon">
    <title><?php echo $userDetails['rest_name'] ?> Menu</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css" integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous">
    
</head>
<body>
    <nav class="navbar">
        <a href="#" class="header-logo">
            <img src="assets/qr-code-1.svg" alt="QR Menu Logo">
        </a>
        <ul>
            <li><a href="profile.php">profile</a></li>
        </ul>
    </nav>
    <?php if(isset($_GET["rest_id"])) : ?>

            <div class="menu-preview">
                
                <div class="banner-area">
                    <div class="img"></div>
                    <h1 class="restaurant-name"><?php echo $userDetails['rest_name'] ?></h1>
                </div>
                    <?php foreach ($foods as $food) { ?>
                            <div class="menu-area">
                                <div class="name-price">
                                    <h3 class="menu-food-title"><?php echo $food['food_name'] ?></h3>
                                    <p class="menu-food-price">Tsh <?php echo $food['food_price'] ?></p>
                                </div>
                                <p class="menu-food-desc"><?php echo $food['food_desc'] ?></p>
                            </div>
            
                    <?php }?>

            </div>
                </div>
            </div>
    <?php else : ?>  
        <h3>Something went wrong</h3>
    <?php endif ;?>

    <footer>
        <p>Made by <a href="https://rohitgulam.com">Rohit Gulam</a></p>
    </footer>
</body>
</html>