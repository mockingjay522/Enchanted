<?php

class CartDAO {

    //Place to store the PDOWrapper
    private static $db;

    // you must initialize the PDOAgent
    static function initialize(string $className){                
        self::$db = new PDOWrapper($className);
    }

// MariaDB [enchanted]> desc cart;
// +-----------+------------------+------+-----+---------+-------+
// | Field     | Type             | Null | Key | Default | Extra |
// +-----------+------------------+------+-----+---------+-------+
// | UserID    | int(10) unsigned | NO   | PRI | NULL    |       |
// | ProductID | char(5)          | NO   | PRI | NULL    |       |
// | Name      | char(50)         | YES  |     | NULL    |       |
// | Amount    | float(6,2)       | YES  |     | NULL    |       |
// +-----------+------------------+------+-----+---------+-------+
    // 3 rows in set (0.013 sec)
    
    // function to create (insert) user
    static function addToCart(Cart $newCart) : int  {
        // prepared statement
        $sql = "INSERT INTO Cart
                VALUES (:userid, :productid, :name, :amount)";

        // prepare the query
        self::$db->query($sql);

        // bind the parameters
        self::$db->bind(':userid',$newCart->getUserID());
        self::$db->bind(':productid',$newCart->getProductID());
        self::$db->bind(':name', $newCart->getName());
        self::$db->bind(':amount',$newCart->getAmount());

        // execute the query
        self::$db->execute();

        return self::$db->lastInsertId();
    }

    static function getItems(string $id){        
        $sql = "SELECT * from Cart WHERE UserID=:id";
        self::$db->query($sql);
        self::$db->bind(':id', $id);
        self::$db->execute();

        return self::$db->resultSet();
    }

}

?>