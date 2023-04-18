<?php

class Page{

    public static $title = "ENCHANTED";
    public static $notifications = [];

    //Display Header element of the page
    static function showHeader(){
        ?>
        <!DOCTYPE html>
            <html lang="en">
                <head>
                    <meta charset="UTF-8">
                    <meta http-equiv="X-UA-Compatible" content="IE=edge">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <link rel = "Stylesheet" href = "style/style.css">
                    <title><?=self::$title?></title>
                </head>
                <body>
                    <header>
                        <p class="notice">Welcome to Enchanted! Browse through our premium jewelry collection</p>
                        <h1 id = "title"><?=self::$title?></h1>
                        <nav class = "navigation">
                            <ul class="nav_list">
                                <li><h2><a href="TeamNumber11.php">Home</a></h2></li>
                                <li><h2><a href="Products.php">Products</a></h2></li>
                                <li><h2><a href = "Register.php">Register</a></h2></li>
                                <li><h2><a href = "signIn.php">SignIn</a></h2></li>
                                <li><h2><a href ="Cart.php">ViewCart</a></h2></li>
                                <?php
                                if(isset($_SESSION['loggedin'])){
                                    echo "<li><h2><a href ='Profile.php'>".$_SESSION['loggedin']."</a></h2></li>";
                                    echo "<li><h2><a href ='signOut.php'>SignOut</a></h2></li>";  
                                }
                                ?>
                            </ul>
                        </nav>
                    </header>
                    <div class = "main">
        <?php
    }

    //display footer
    static function showFooter(){
        ?>
            </div>
            <footer>
                <hr>
                <p><?="Developed By - ". DEVELOPER1. " (". DEVELOPER_ID1. ") AND ". DEVELOPER2. " (". DEVELOPER_ID2. ")" ?></p>
            </footer>
        <?php
    }

    //show Home Page
    static function showHome(){
        ?>      
            <img id = "home_page_image" src = "image/home_page.jpg">
            <div id="button_wrapper">
            <a href = "Products.php"><button id = "explore">EXPLORE COLLECTION</button></a>
            </div>
        <?php
    }

    //Login
    static function showLogin(){
        ?>
            <div id="signIn_input">
                <h2>Sign In</h2>
                <p class="error">
                    <?php
                        if (!empty(self::$notifications)){
                            for ($i=0; $i<count(self::$notifications); $i++){
                                echo "<br>".self::$notifications[$i];
                            }
                        }
                    ?>
                </p>
                <form id ="signIn_form" method="post">
                    Username: <input type="text" name="username" size="30" placeholder="Enter your email"><br>
                    Password: <input type="password" name="password" size="30" placeholder="Enter your password"><br>
                    <input id = "button_signIn" type="submit" name="submit" value="SIGN IN">
                    <p>Don't have an account? Register <a href="Register.php">here</a></p>
                </form>
            </div>
        <?php
    }

    //Registeration Form
    static function showRegister(){
        ?>
            <div id="register_input">
                <h2>Register</h2>
                <p class="error">
                    <?php
                        if (!empty(self::$notifications)){
                            for ($i=0; $i<count(self::$notifications); $i++){
                                echo "<br>".self::$notifications[$i];
                            }
                        }
                    ?>
                </p>
                <form id ="register_form" method="post">
                    Full Name: <input type="text" name="fullname" size="30" placeholder="Enter your full name" required><br>
                    Username/Email: <input type="text" name="username" size="30" placeholder="Enter your email" required><br>
                    Password: <input type="password" name="password" size="30" placeholder="Enter your password" required><br>
                    Confirm Password: <input type="password" name="password2" size="30" placeholder="Confirm your password" required><br>
                    Address: <input type="text" name="address" size="30" placeholder="Enter your address" required><br>
                    Phone Number: <input type="text" name="phoneno" size="30" placeholder="Enter your phone number" required><br>
                    <input id = "button_register" type="submit" name="submit" value="REGISTER">
                    <p>Already have an account? Sign In <a href="signIn.php">here</a></p>
                </form>
            </div>
        <?php
    }

    //Products
    static function showProducts($products){
        ?>
            <div id="product_list">
                
                <table>
                    <thead><tr>
                        <th>Product</th>                        
                        <th>Image</th>
                        <th>Price</th>
                        <th>View</th>                       
                    </tr></thead>
                <?php
                        $i = 0;
                        foreach($products as $product){
                                if($i%2 == 1)
                                    echo "<tbody class=\"oddRow\">";
                                else
                                    echo "<tbody class=\"evenRow\">";
                                echo "<tr>";
                                echo "<td>" . $product->getName() ."</td>";
                                echo "<td><img class = 'product_image' src=" . $product->getImage() ." width= '100px'></td>";
                                echo "<td>" . $product->getPrice() ."</td>";
                                $link = "Product.php?id=".$product->getID();
                                echo "<td><a href=\"".$link."\">View</td>";
                                echo "</tr></tbody>";
                                $i++;    
                            }
                                echo "</table>"
                ?>
            </div>
        <?php
    }

    //Product Description
    static function showProduct($product){
        ?>      
            <h2>Product Description</h2>
            
            <div id="product_details_container">
            <img id = "product_image" width = 500px src = <?=$product->getImage()?>>
            <form id ="register_form" method="post">
                    <input type="text" name="id" value = "<?=$product->getID()?>" hidden><br>
                    <div class="product_details">
                    <h2 id="product_title"><?=$product->getName()?></h2>
                    <h3>Description</h3>
                    <p><?=$product->getDescription()?></p>
                    <h3>Type</h3>
                    <p><?=$product->getType()?></p>
                    <h3>Price</h3>
                    <p><?=$product->getPrice()?></p>
                    </div>
                    <input id = "button_register" type="submit" name="add" value="ADD TO CART">
            </form>
            <div id="button_wrapper">
            <a href = "Products.php"><button id = "explore">BACK TO COLLECTION</button></a>
        <?php
    }

    //User Profile
    static function showProfile($user){
        echo "<h2> Hello ". $_SESSION['name']. "</h2>"            
        ?>
        <p class="error">
                    <?php
                        if (!empty(self::$notifications)){
                            for ($i=0; $i<count(self::$notifications); $i++){
                                echo "<br>".self::$notifications[$i];
                            }
                        }
                    ?>
                </p>
        <form id ="register_form" method="post">
                    Full Name: <input type="text" name="fullname" size="30" value = "<?=$user->getName()?>" required><br>
                    Username/Email: <input type="text" name="username" size="30" value = "<?=$user->getEmail()?>" readonly><br>
                    Address: <input type="text" name="address" size="30" value = "<?=$user->getAddress()?>" required><br>
                    Phone Number: <input type="text" name="phoneno" size="30" value = "<?=$user->getPhoneNo()?>" required><br>
                    <input id = "button_register" type="submit" name="update" value="UPDATE PROFILE">
                </form>
        <?php
    }

    //Thank You message
    static function showThankYou($name){
        ?>
        <p>Your profile details have been updated. Thank you</p>
        <a href = "Products.php"><button id = "explore">EXPLORE COLLECTION</button></a>
        <?php
    }

    //Cart
    static function showCart($items){
        ?>
        <div id="product_list">
                <h2>Spring Collection</h2>
                <table>
                    <thead><tr>
                        <th>SN</th>
                        <th>Product</th>                        
                        <th>Price</th>
                    </tr></thead>
                <?php
                        $i = 0;
                        $total = 0;
                        foreach($items as $item){
                                if($i%2 == 1)
                                    echo "<tbody class=\"oddRow\">";
                                else
                                    echo "<tbody class=\"evenRow\">";
                                echo "<tr>";
                                echo "<td>" . $i+1 ."</td>";
                                echo "<td>" . $item->getName() ."</td>";
                                echo "<td>" . $item->getAmount(). "</td>";
                                $total += $item->getAmount();
                                echo "</tr></tbody>";
                                $i++;    
                            }
                                echo "<tbody><tr>";
                                echo "<td></td>";
                                echo "<td>Order Total: </td>";
                                echo "<td><strong>".$total."</strong></td>";
                                echo "</table>"
                ?>
                <form id ="register_form" method="post">
                    <input id = "button_register" type="submit" name="submit" value="CHECK OUT">
                </form>
            </div>
        <?php
    }

    //Order Placed
    static function showOrderPlaced(){
        ?>
        <p>Your order has been placed. Thank you for shopping with enchanted</p>
        <div id="button_wrapper">
            <a href = "Products.php"><button id = "explore">EXPLORE COLLECTION</button></a>
            </div>
        <?php

    }

    //Log Out
    static function showLogOutThankYou($name){
        ?>
        <p>Thank you for your visit here <?=$name?></p>
        <p>Hope to see you again soon</p>
        <div id="button_wrapper">
            <a href = "TeamNumber11.php"><button id = "explore">Home</button></a>
            </div>
        <?php
    }
}


?>