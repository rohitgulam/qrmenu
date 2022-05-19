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
        <form action="includes/register.inc.php" class="form" method="post">
            <div class="form-group">
                <label for="name">Full Name</label>
                <input type="text" name="name" id="name">
            </div>
            <div class="form-group">
                <label for="restaurant-name">Restaurant Name</label>
                <input type="text" name="restaurant" id="restaurant-name">
            </div>
            <div class="form-group">
                <label for="user-name">Username</label>
                <input type="text" name="username" id="user-name">
            </div>
            <div class="form-group">
                <label for="number">Phone Number</label>
                <input type="number" name="number" id="number">
            </div>
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" name="email" id="email">
            </div>
            <div class="form-group">
                <label for="hear-about-us">Where did you hear about us?</label>
                <select name="source" id="hear-about-us">
                    <option value="Twitter">Twitter</option>
                    <option value="Friend or Colleague">Friend or Colleague</option>
                    <option value="Instagram">Instagram</option>
                    <option value="Ambassador">Ambassador</option>
                    <option value="Other">Other</option>
                </select>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="userpass" id="password">
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
            <button type="submit" name="submit" id="login" class="btn btn-block" >Join Waitlist</button>
        </form>
    </div>

    
</body>
</html>