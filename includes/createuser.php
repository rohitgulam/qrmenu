<?php 

    require_once "dbh.inc.php";
    require_once "functions.inc.php";
    $users = getAllUsers($conn)["COUNT(username)"];
    $usersDetails = getAllUsersDetails($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create User</title>
</head>
<body>
    <form action="signupuser.inc.php" method="post">
        <input type="text" name="username" placeholder="Username">
        <input type="text" name="name" placeholder="Name">
        <input type="text" name="restaurant" placeholder="restaurant">
        <input type="email" name="email" placeholder="email">
        <input type="passoword" name="userpass" placeholder="password">
        <button type="submit" name="submit">Create User</button>
    </form>

    <div>

    </div>

    
</body>
</html>