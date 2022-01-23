<?php 
    include "header.php";
?>
<div class="cpassword-container">
    <a href="profile.php" class="go-back" ><i class="fas fa-arrow-left"></i></a>   

    <form class="update-details" action="includes/cpassword.inc.php">
                <div class="input-group">
                    <label for="cpassword">New Password</label>
                    <input type="password" id="cpassword" name="cpassword" minlength="8">
                </div>
                <button type="submit" class="btn">Change Password</button>
    </form>
</div>