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

//lead to sign in if user is not signed in
if(!isset($_SESSION['loggedin'])){
    header("Location: signIn.php");
}else{
    CartDAO::initialize("Cart");
    UserDAO::initialize("User");

    $user = UserDAO::getUser($_SESSION["loggedin"]);
    $items = CartDAO::getItems($user->getUserID());

    //if order is placed
    if(!empty($_POST)){
        OrderDAO::initialize("Orders");
        OrderItemsDAO::initialize("Order_Items");

        $totalAmount =0;
        foreach($items as $item){
            $totalAmount += $item->getAmount();
        }

        $no = new Order();
        $no->setAmount($totalAmount);
        $no->setUserID($user->getUserId());
        $no->setDate(date("Y/m/d"));
        
        $orderid = OrderDAO::addOrder($no);

        foreach($items as $item){
            $noi = new OrderItems();
            $noi->setOrderID($orderid);
            $noi->setProductID($item->getProductID());
            $noi->setAmount($item->getAmount());
            $noi->setName($item->getName());

            OrderItemsDAO::createOrderItems($noi);
        }
        Page::showHeader();
        Page::showOrderPlaced();
    }else{
        Page::showHeader();
        Page::showCart($items);
    }
        Page::showFooter();
}

?>