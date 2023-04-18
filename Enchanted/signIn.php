<?php

//Require the config file
require_once('inc/config.inc.php');

//Require Entities
require_once('inc/Entities/Page.class.php');
require_once('inc/Entities/Orders.class.php');
require_once('inc/Entities/Products.class.php');
require_once('inc/Entities/User.class.php');
require_once('inc/Entities/Validate.class.php');
require_once('inc/Entities/Cart.class.php');
require_once('inc/Entities/Orders.class.php');
require_once('inc/Entities/OrderItems.class.php');

//Require Utilities
require_once('inc/Utilities/PDOWrapper.class.php');
require_once('inc/Utilities/UserDAO.class.php');
require_once('inc/Utilities/ProductsDAO.class.php');
require_once('inc/Utilities/CartDAO.class.php');
require_once('inc/Utilities/OrderDAO.class.php');
require_once('inc/Utilities/OrderItemsDAO.class.php');


if(!empty($_POST)){
    // Initialize the DAO
    UserDAO::initialize("User");

    $valid = true;

    if(!Validate::ValidateLoginInput()){
        $valid = false;
    }
  
    //Get the current user
    $user = UserDAO::getUser($_POST["username"]);

    //if there is no such user, update the page notifications
    if(!$user){
        $valid=false;
        array_push(Page::$notifications, "User does not exist");
    }else{
        //Verify the password with the posted data
        $passMatch = $user->verifyPassword($_POST["password"]);

        if($passMatch == false){
            $valid=false;
            array_push(Page::$notifications, "Password does not match");
        }
    }

    if($valid){
        //Start the session
        session_start();
        //Set the user to logged in. Remember, the username is email address 
        $_SESSION['loggedin'] = $user->getEmail();
        $_SESSION['name'] = $user->getName();
        //Use header to send the user to the products page
        header("Location: Products.php");
    }else{
        Page::showHeader();
        Page::showLogin();
        Page::showFooter();
    }
}else{
    Page::showHeader();
    Page::showLogin();
    Page::showFooter();
}

?>