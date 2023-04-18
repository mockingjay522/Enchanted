<?php

class ProductsDAO {

    //Place to store the PDOWrapper
    private static $db;

    // you must initialize the PDOAgent
    static function initialize(string $className)   {                
        self::$db = new PDOWrapper($className);
    }

    // MariaDB [enchanted]> desc products;
    // +-------------+------------+------+-----+---------+-------+
    // | Field       | Type       | Null | Key | Default | Extra |
    // +-------------+------------+------+-----+---------+-------+
    // | ID          | char(5)    | NO   | PRI | NULL    |       |
    // | Name        | char(50)   | YES  |     | NULL    |       |
    // | Description | char(100)  | YES  |     | NULL    |       |
    // | Image       | char(50)   | YES  |     | NULL    |       |
    // | Type        | char(50)   | YES  |     | NULL    |       |
    // | Price       | float(4,2) | YES  |     | NULL    |       |
    // +-------------+------------+------+-----+---------+-------+


    // function to get (select) products
    static function getProducts() : Array {        
        $sql = "SELECT * from Products";
        // no parameter --> no need to bind
        self::$db->query($sql);
        self::$db->execute();

        return self::$db->resultSet();
    }

    static function getProduct(string $id){        
        $sql = "SELECT * from Products WHERE ID=:id";
        self::$db->query($sql);
        self::$db->bind(':id', $id);
        self::$db->execute();

        return self::$db->singleResult();
    }

}

?>