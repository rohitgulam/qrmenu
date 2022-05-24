<?php include "header.php"; ?>
        <div class="login-container">
            <div class="fields">
                <div class="img">
                    <img class="logo" src="assets/qr-code-1.svg" alt="QR Menu Logo" width="120px" height="120px">
                </div>
                <form action="includes/register.inc.php" class="login-form" method="post">
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
                    <button type="submit" name="submit" id="login" class="btn btn-block" >Join Waitlist</button>
                </form>
                <!-- <a href="" class="lostpassword">Forgot your password?</a> -->
            </div>
        </div>
</body>
</html>




<!-- 
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
            <button type="submit" name="submit" id="login" class="btn btn-block" >Join Waitlist</button>
        </form>
    </div>    
</body>
</html> -->