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

// unset our registered session
unset($_SESSION['loggedin']);
$name = $_SESSION['name'];
unset($_SESSION['name']);

// destroy the session
session_destroy();

//show thank you message
Page::showHeader();
Page::showLogOutThankYou($name);
Page::showFooter();

?>