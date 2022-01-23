<?php 
    include "header.php";
?>
<a href="profile.php" ><i class="fas fa-arrow-left"></i></a>   

<form class="update-details" action="includes/cpassword.inc.php">
            <div class="input-group">
                <label for="rest_name">Restaurant Name</label>
                <input type="text" id="rest_name" name="rest_name" value="<?php echo $userDetails['rest_name'] ?>">
            </div>
            <div class="input-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" value="<?php echo $userDetails['name'] ?>">
            </div>
            <div class="input-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" value="<?php echo $userDetails['username'] ?>">
            </div>
            <div class="input-group">
                <label for="email">Email</label>
                <input type="text" id="email" name="email" value="<?php echo $userDetails['email'] ?>">
            </div>
            <button type="submit" name="update" class="btn">Update</button>
            
</form>