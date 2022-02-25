<?php

    


// $statement = $pdo->prepare('SELECT * FROM foods WHERE user_id = :user_id');
//     $statement->bindValue(':user_id', $_SESSION['userid']);
//     $statement->execute();
//     $foods = $statement->fetchAll(PDO::FETCH_ASSOC);


declare(strict_types=1);

use chillerlan\QRCode\QRCode;
use chillerlan\QRCode\QROptions;

// require_once('./../vendor/autoload.php');
require_once('vendor/autoload.php');

// GENERATE QR CODE
function generateQR($link){
    $options = new QROptions(
        [
          'eccLevel' => QRCode::ECC_L,
          'outputType' => QRCode::OUTPUT_MARKUP_SVG,
          'version' => 5,
        ]
      );
      
      $qrcode = (new QRCode($options))->render($link);

      return $qrcode;
}
    

// FETCH FOOD WITH PDO
function fetchItems($pdo, $user_id){
    $statement = $pdo->prepare('SELECT * FROM foods WHERE user_id = :user_id');
    $statement->bindValue(':user_id', $user_id);
    $statement->execute();
    $foods =$statement->fetchAll(PDO::FETCH_ASSOC);

    return $foods;
}
// LOGIN PAGE

function emptyInputLogin($username, $userpass){
    $result = null;
    if (empty($username) || empty($userpass)) {
        $result = true; 
    }else{
        $result = false;
    }
    return $result;
}

function usernameExists($conn, $username, $email){
    $sql = "SELECT * FROM users WHERE username = ? OR email = ?;";

    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../login.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    }
    else{
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);

}

function loginUser($conn, $username, $userpass){
    $usernameExists = usernameExists($conn, $username, $username);



    if ($usernameExists === false) {
        header("location: ../login.php?error=wronglogin");
        exit();
    }

    $pwdHashed = $usernameExists['password'];
    $checkPwd = password_verify($userpass, $pwdHashed);
    
    // $checkPwd = password_verify($userpass, $userPwd);

    if ($checkPwd === false) {
        header("location: ../login.php?error=wrongpass");
        exit();
    }

    if ($checkPwd === true) {
        session_start();
        $_SESSION['userid'] = $usernameExists['id'];
        $_SESSION['useruid'] = $usernameExists['username'];
        header("location: ../index.php");
        exit();
    }

}

// LOGIN PAGE ENDS HERE



// CREATE PAGE

function emptyInputCreate($food_name, $food_price){
    $result = null;
    if (empty($food_name) || empty($food_price) ) {
        $result = true;
    }else{
        $result = false;
    }
    return $result;
}

function addFoodItem($conn, $userid, $food_name, $food_price, $food_desc){
    $sql = "INSERT INTO foods (user_id, food_name, food_price, food_desc) VALUES (?, ?, ?, ?);";

    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../create.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, 'isis', $userid, $food_name, $food_price, $food_desc);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../index.php");
    exit();
}

// CREATE PAGE ENDS HERE

// MAIN DASHBOARD PAGE

// function fetchItems($pdo, $user_id){
//     $statement = $pdo->prepare('SELECT * FROM foods WHERE user_id = :user_id');
//     $statement->bindValue(':user_id', $user_id);
//     $statement->execute();
//     $food_data = $statement->fetchAll(PDO::FETCH_ASSOC);

//     return $food_data;

//     // if ($food_data) {
//     //     return $food_data;
//     // }else{
//     //     $result = false;
//     //     return $result;
//     // }
// }

// ACTIONS - DELETE & EDIT
function deleteItem($conn, $user_id,  $food_id){
    $sql = "DELETE FROM foods WHERE user_id = ? AND id = ?;";

    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../index.php?error=deletefailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ii", $user_id, $food_id);
    mysqli_stmt_execute($stmt);

    header("location: ../index.php?error=deletesuccesful");
    exit();
}

function fetchFoodItem($conn, $user_id,  $food_id){
    $sql = "SELECT * FROM foods WHERE user_id = ? AND id = ?;";

    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../index.php?error=fecthfoodfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ii", $user_id, $food_id);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)){
        return $row;
    }
    else{
        $result = false;
        return $result;
    }
}


function updateFoodItem($pdo, $user_id, $food_id, $food_name, $food_price, $food_desc){
    // $sql = 'UPDATE foods SET food_name=?, food_price=?, food_desc=? WHERE id=? AND user_id=?';

    

    // $stmt = mysqli_stmt_init($conn);

    // if (!mysqli_stmt_prepare($stmt, $sql)) {
    //     header("location: ../create.php?error=stmtfailed");
    //     exit();
    // }
    
    // mysqli_stmt_bind_param($stmt, 'sisii', $food_name, $food_price, $food_desc, $user_id, $food_id);
    // mysqli_stmt_execute($stmt);
    // mysqli_stmt_close($stmt);

    $statement = $pdo->prepare("UPDATE foods SET food_name =:food_name, food_price = :food_price, food_desc = :food_desc WHERE user_id = :user_id AND id = :id ;");

    $statement->bindValue(':food_name', $food_name);
    $statement->bindValue(':food_price', $food_price);
    $statement->bindValue(':food_desc', $food_desc);
    $statement->bindValue(':user_id', $user_id);
    $statement->bindValue(':id', $food_id);
    $statement->execute();

    header("location: ../index.php");
}


// ACTIONS ENDS HERE - DELETE & EDIT

// FETCH ACCOUNT DETAILS

function fetchAccountDetails($conn, $user_id){
    $sql = "SELECT * FROM users WHERE id = ?;";

    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../index.php?error=fecthAccountDetailsFailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "i", $user_id);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    }
    else{
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

// END FETCH ACCOUNT DETAILS



// UPDATE ACCOUNT DETAILS
function updateDetails($conn, $user_id, $name, $user_name, $rest_name, $email){
    $sql = "UPDATE users SET name=?, username=?, rest_name=?, email=? WHERE id=?;";

    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../profile.php?error=updateFailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ssssi", $name, $user_name, $rest_name, $email, $user_id);
    mysqli_stmt_execute($stmt);

    header("location: ../profile.php");
    exit();
}

// END UPDATE ACCOUNT DETAILS

// CHANGE PASSWORD

function changePassword($conn, $userId, $newPass){
    $sql = "UPDATE users SET password = ? WHERE id = ?;";

    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../profile.php?error=ChangePasswordFailed");
        exit();
    }

    $hashedPwd = password_hash($newPass, PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt, 'si', $hashedPwd, $userId);
    mysqli_stmt_execute($stmt);

    header("location: ../index.php?error=none");
    exit();
}
// CHANGE PASSWORD ENDS

// CREATE USER

function createUser($conn, $username, $name, $rest_name, $email, $password){
    $sql = "INSERT INTO users (username, name, rest_name, email, password) VALUES (?, ?, ?, ?, ?) ;";
 
    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../login.php?error=stmtfailed");
        exit();
    }

    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "sssss", $username, $name, $rest_name, $email, $hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: createuser.php?error=none");
    exit();
}

// CREATE USER END

// GET ALL USERS

function getAllUsersDetails($conn){
    $sql = "SELECT * FROM users;";

    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../index.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_execute($stmt);
    
    $resultData = mysqli_stmt_get_result($stmt);
   
    if ($row = mysqli_fetch_assoc($resultData)){
        return $row;
    }
    else{
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

function getAllUsers($conn){
    $sql = "SELECT COUNT(username) FROM users;";

    $stmt = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../index.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_execute($stmt);
    
    $resultData = mysqli_stmt_get_result($stmt);
   
    if ($row = mysqli_fetch_assoc($resultData)){
        return $row;
    }
    else{
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);


}

// GET ALL USERS END
