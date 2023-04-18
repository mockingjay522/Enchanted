<?php

class OrderItemsDAO {

    //Place to store the PDOWrapper
    private static $db;

    // you must initialize the PDOAgent
    static function initialize(string $className){                
        self::$db = new PDOWrapper($className);
    }

// MariaDB [enchanted]> desc order_items;
// +-----------+------------------+------+-----+---------+-------+
// | Field     | Type             | Null | Key | Default | Extra |
// +-----------+------------------+------+-----+---------+-------+
// | OrderID   | int(10) unsigned | NO   | PRI | NULL    |       |
// | ProductID | char(5)          | NO   | PRI | NULL    |       |
// | Amount    | float(6,2)       | YES  |     | NULL    |       |
// | Name      | char(50)         | YES  |     | NULL    |       |
// +-----------+------------------+------+-----+---------+-------+
// 4 rows in set (0.012 sec)
    
    // function to create (insert) orderitem
    static function createOrderItems(OrderItems $orderitem) : int  {
        // prepared statement
        $sql = "INSERT INTO Order_Items
                VALUES (:orderid, :productid, :amount, :name)";

        // prepare the query
        self::$db->query($sql);

        // bind the parameters
        self::$db->bind(':orderid',$orderitem->getOrderID());
        self::$db->bind(':productid',$orderitem->getProductID());
        self::$db->bind(':name', $orderitem->getName());
        self::$db->bind(':amount',$orderitem->getAmount());

        // execute the query
        self::$db->execute();

        return self::$db->lastInsertId();
    }

}

?>