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

//initialize DAO
UserDAO::initialize("User");

//start session
session_start();

//get current user
$user = UserDAO::getUser($_SESSION["loggedin"]);

//Show Page
if(!empty($_POST)){
    //if validation is true
    if(Validate::validateUpdateInput()){

        //Assemble the user
        $un = new User();
        $un->setName($_POST['fullname']);
        $un->setAddress($_POST['address']);
        $un->setPhoneNo($_POST['phoneno']);
        $un->setEmail($_POST['username']);

        // send the updated user to the database
        UserDAO::editUser($un);
        Page::showHeader();
        Page::showThankYou($_SESSION["name"]);
    }else{
        Page::showHeader();
        Page::showProfile($user);
    }
}else{
        Page::showHeader();
        Page::showProfile($user);
}
        Page::showFooter();
?>