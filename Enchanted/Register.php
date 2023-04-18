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

session_start();

UserDAO::initialize("User");

if(!empty($_POST)){
        if(Validate::ValidateRegistrationInput()){
            $nu = new User();
            $nu->setName($_POST['fullname']);
            $nu->setPassword(password_hash($_POST['password'], PASSWORD_DEFAULT));
            $nu->setEmail($_POST['username']);
            $nu->setAddress($_POST['address']);
            $nu->setPhoneNo($_POST['phoneno']);

            //Add the user to the database
            UserDAO::createUser($nu);

            //Redirect to login page
            header("Location: signIn.php");
        }
        else{
            Page::showHeader();
            Page::showRegister();
            Page::showFooter();
        }
}else{
    Page::showHeader();
    Page::showRegister();
    Page::showFooter();
}

?>