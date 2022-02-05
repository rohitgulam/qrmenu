<?php
    include 'header.php'
?>
        <div class="qr-group">
            <div class="qr-group-inner">
                <a href=<?php echo 'https://itsqrmenu.com/public/main.php?rest_id='.$_SESSION["userid"] ?> ><img src='<?php echo generateQR( 'https://itsqrmenu.com/public/main.php?rest_id='.$_SESSION["userid"]) ?>' alt='QR Code' width='220' height='220'></a>
                <p>Scan this code with your phone's camera or Google lens</p>
            </div>
            <p>To print your QR codes, <br> screenshot this page and crop the above code then show it to a stationery for printing</p>
        </div>

        <div class="profile-container">
            <form action="includes/updateactions.inc.php">
                <div class="input-group">
                    <label for="rest_name">Restaurant Name</label>
                    <input type="text" id="rest_name" name="rest_name" value="<?php echo $userDetails['rest_name'] ?>" disabled>
                </div>
                <div class="input-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" value="<?php echo $userDetails['name'] ?>" disabled>
                </div>
                <div class="input-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" value="<?php echo $userDetails['username'] ?>" disabled>
                </div>
                <div class="input-group">
                    <label for="email">Email</label>
                    <input type="text" id="email" name="email" value="<?php echo $userDetails['email'] ?>" disabled>
                </div>
                <!-- <button type="submit" name="update" class="btn">Edit</button> -->
                <button type="submit" name="cpassword" id="change-pwd" class="btn">Change Password</button>
            </form>
        </div>
<?php
    include 'footer.php'
?>
   
