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


//start session
session_start();
 
//initialize DAO
ProductsDAO::initialize("Products");
$product = ProductsDAO::getProduct($_GET['id']);

//If product is added to cart
if(!empty($_POST)){
    //if the user is signed in
    if(isset($_SESSION['loggedin'])){
        UserDAO::initialize("User");
        $user = UserDAO::getUser($_SESSION["loggedin"]);

        CartDAO::initialize("Cart");

        $nc = new Cart();
        $nc->setUserID($user->getUserId());
        $nc->setProductID($product->getID());
        $nc->setName($product->getName());
        $nc->setAmount($product->getPrice());

        CartDAO::addToCart($nc);

        header("Location: Products.php");
    }else{
        header("Location: signIn.php");
    }
}else{
    Page::showHeader();
    Page::showProduct($product);
    Page::showFooter();
}
?>