<?php

class OrderDAO {

    //Place to store the PDOWrapper
    private static $db;

    // you must initialize the PDOAgent
    static function initialize(string $className){                
        self::$db = new PDOWrapper($className);
    }

// MariaDB [enchanted]> desc orders;
// +---------+------------------+------+-----+---------+----------------+
// | Field   | Type             | Null | Key | Default | Extra          |
// +---------+------------------+------+-----+---------+----------------+
// | OrderID | int(10) unsigned | NO   | PRI | NULL    | auto_increment |
// | UserID  | int(10) unsigned | NO   | MUL | NULL    |                |
// | Amount  | float(6,2)       | YES  |     | NULL    |                |
// | Date    | date             | NO   |     | NULL    |                |
// +---------+------------------+------+-----+---------+----------------+
// 4 rows in set (0.013 sec)
    
    // function to create (insert) orderitem
    static function addOrder(Order $order) : int  {
        // prepared statement
        $sql = "INSERT INTO Orders (UserID, Amount, Date)
                VALUES (:userid, :amount, :date)";

        // prepare the query
        self::$db->query($sql);

        // bind the parameters
        self::$db->bind(':userid',$order->getUserID());
        self::$db->bind(':amount', $order->getAmount());
        self::$db->bind(':date',$order->getDate());

        // execute the query
        self::$db->execute();

        return self::$db->lastInsertId();
    }

    static function getOrder(int $id){        
        $sql = "SELECT * from Orders WHERE OrderID=:id";
        self::$db->query($sql);
        self::$db->bind(':id', $id);
        self::$db->execute();

        return self::$db->resultSet();
    }

}

?>