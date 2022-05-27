<?php
    include "header.php";
?>
            <?php if ($_SESSION['usertype'] === 0) : ?>
                <div class="waitlist-container">
                    <div class="text">
                        <h1>Congrats! You're number 43 on the waitlist!</h1>
                        <h2>You can skip the waitlist and get access right away if you have an invite code</h2>
                    </div>
                    <div class="code-area">
                        <form class="login-form" action="upgradeuser.inc.php" method="POST">
                            <div class="form-group">
                                <label for="invite-code">Invite Code</label>
                                <input type="text" id="invite-code" name="invite-code">
                            </div>
                            <button class="btn" type="submit">Submit Code</button>
                        </form>
                        <p>You can get an invite code from other users who already use itsqrmenu, itsqrmenu ambassadors, or from <a href="https://twitter.com/RohitGulam">Rohit Gulam</a>.</p>
                    </div>
                </div>
            <?php else : ?>
            <div class="dashboard-container">
                <a href="create.php" class="btn btn-block" id="add-food" >Add Food</a>
            </div>

            <div class="menu-edit">
                <?php foreach($categories as $category) {?>
                    <h5 class="category-heading">
                        <?php echo $category['food_category'] ?>
                    </h5>
                    <?php $foods = fetchItemsViaCategories($pdo, $_SESSION['userid'], $category['food_category']); ?>
                    <?php foreach ($foods as $food) { ?>
                    <div class="menu-food-item">

                            <div class="name-price">
                                <h3 class="edit menu-food-title"><?php echo $food['food_name'] ?></h3>
                                <p class="edit menu-food-price">Tsh <?php echo $food['food_price'] ?></p>
                                <div class="actions">
                                    <form action="includes/actions.inc.php" method="get">
                                        <button id="edit" type="submit" name="edit"><i class="fas fa-pen action-icon"></i></button>
                                        <input type="hidden" name="id" value="<?php echo $food['id'] ?>">
                                        <input type="hidden" name="userId" value="<?php echo $_SESSION['userid'] ?>">
                                        <button
                                        id="delete" type="submit" name="delete"><i class="far fa-times-circle action-icon"></i></i></button>
                                    </form>
                                </div>
                            </div>
                            <p class="edit menu-food-desc"><?php echo $food['food_desc'] ?></p>
                    </div>
                <?php }?>

                <?php } ?>
            </div>

            <div class="menu-preview">
                
                <div class="banner-area">
                    <div class="img"></div>
                    <h1 class="restaurant-name"><?php echo $userDetails['rest_name'] ?></h1>
                </div>

                <?php foreach($categories as $category) {?>
                    <h5 class="category-heading">
                        <?php echo $category['food_category'] ?>
                    </h5>
                    <?php $foods = fetchItemsViaCategories($pdo, $_SESSION['userid'], $category['food_category']); ?>
                    <?php foreach ($foods as $food) { ?>
                        <div class="menu-area">
                            <div class="name-price">
                                <h3 class="menu-food-title"><?php echo $food['food_name'] ?></h3>
                                <p class="menu-food-price">Tsh <?php echo $food['food_price'] ?></p>
                            </div>
                            <p class="menu-food-desc"><?php echo $food['food_desc'] ?></p>
                        </div>
                    <?php }?>
                <?php } ?>

            </div>
            </div>
            </div>
            <div class="qr-group">
                <h4>Click or scan to preview your menu</h4>
                <a href=<?php echo 'main.php?rest_id='.$_SESSION["userid"] ?> ><img src='<?php echo generateQR( 'main.php?rest_id='.$_SESSION["userid"]) ?>' alt='QR Code' width='200' height='200'></a>
            </div>
            <?php endif; ?>
<?php 
    include "footer.php"
?>