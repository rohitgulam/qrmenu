<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="assets/qr-code-1.svg" type="image/x-icon">
</head>
<body>
    <div class="login-main container">
        <div class="login-container">
            <img class="logo" src="assets/qr-code-1.svg" alt="QR Menu Logo">
            
        </div>
        <form action="includes/login.inc.php" class="form" method="post">
            <div class="form-group">
                <label for="user-name">Username or Email Address</label>
                <input type="text" name="username" id="user-name">
            </div>
            <div class="form-group">
                <label for="user-pass">Password</label>
                <input type="password" name="userpass" id="user-pass">
            </div>
            <?php 
                if (isset($_GET['error'])) {
                    if ($_GET['error'] === 'emptyinput'){
                        echo "<p class='form-validation' >Please fill in all the fields</p>";
                    }
                    if ($_GET['error'] === 'wronglogin'){
                        echo "<p class='form-validation' >Incorrect username or password. Please try again</p>";
                    }
                }
            ?>
            <button type="submit" name="submit" id="login" class="btn btn-block" >Log In</button>
        </form>
        <a href="" class="lostpassword">Forgot your password?</a>
    </div>

    
</body>
</html>