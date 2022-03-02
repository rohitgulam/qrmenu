<?php 
    include "header.php";
?>
            <?php if(isset($_GET['update'])) : ?>
            <div class="add-food-container">
                <a href="index.php" id="add-food-not" ><i class="fas fa-arrow-left"></i></a>
                <?php 
                if (isset($_GET['error'])) {
                    if ($_GET['error'] === 'emptyinputcreate') {
                        echo "<p class='alert error'>Fill in food name and food price<p>";
                    }
                }
                ?>
                <form class="add-food-form" action="includes/update.inc.php" method="get">
                    <div class="input-group">
                        <label for="food-name">Food Name</label>
                        <input type="text" id="food-name" name="food_name" value="<?php echo fetchFoodItem($conn, $_GET['userid'],$_GET['foodid'])['food_name'] ?>">
                    </div>
                    <div class="input-group">
                        <label for="food-price">Food Price</label>
                        <input type="number" id="food-price" name="food_price" value="<?php echo fetchFoodItem($conn, $_GET['userid'],$_GET['foodid'])['food_price'] ?>">
                    </div>
                    <div class="input-group">
                        <label for="food-category">Food Category</label>
                        <select name="food_category" id="food-category">
                        <?php foreach($categories as $category){ ?>
                            <option value="<?php  echo $category['food_category'] ?>"><?php  echo $category['food_category'] ?></option>
                            <?php }?>
                        </select>
                    </div>
                    <div class="input-group">
                        <label for="food-desc">Food Description</label>
                        <textarea id="food-desc" name="food_desc" cols="30"><?php echo fetchFoodItem($conn, $_GET['userid'],$_GET['foodid'])['food_desc'] ?></textarea>
                    </div>
                    <!-- <div class="input-group">
                        <label for="food-img">Food Image</label>
                        <input type="file" accept="image" id="food-img" name="food_img">
                    </div> -->
                    <input type="hidden" name="food_id" value="<?php echo $_GET['foodid'] ?>">
                    <button name="update-food" type="submit" class="btn btn-block">Update Food</button>
                </form>
            </div> 
            <?php else : ?>
            <div class="add-food-container">
                <a href="index.php" class="btn btn-block" id="add-food-not" >Go Back</a>
                <?php 
                if (isset($_GET['error'])) {
                    if ($_GET['error'] === 'emptyinputcreate') {
                        echo "<p class='alert error'>Fill in food name and food price<p>";
                    }
                }
                ?>
                <form class="add-food-form" action="includes/create.inc.php" method="get">
                    <div class="input-group">
                        <label for="food-name">Food Name</label>
                        <input type="text" id="food-name" name="food_name">
                    </div>
                    <div class="input-group">
                        <label for="food-price">Food Price</label>
                        <input type="number" id="food-price" name="food_price">
                    </div>
                    <div class="input-group">
                        <label for="food-category">Food Category</label>
                        <select name="food_category" id="food-category">
                        <?php foreach($categories as $category){ ?>
                            <option value="<?php  echo $category['food_category'] ?>"><?php  echo $category['food_category'] ?></option>
                            <?php }?>
                        </select>
                    </div>
                    <div class="input-group">
                        <label for="food-desc">Food Description</label>
                        <textarea id="food-desc" name="food_desc" cols="30"></textarea>
                    </div>
                    <!-- <div class="input-group">
                        <label for="food-img">Food Image</label>
                        <input type="file" accept="image" id="food-img" name="food_img">
                    </div> -->

                    <button name="add-food" type="submit" class="btn btn-block">Add Food</button>
                </form>
            </div> 
            <?php endif ; ?>   
<?php 
    include "footer.php"
?>