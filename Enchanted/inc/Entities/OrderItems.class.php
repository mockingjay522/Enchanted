<?php

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
class OrderItems{

    //class properties
    private $OrderID;
    private $ProductID;
    private $Amount;
    private $Name;

    //Getters
    function getOrderID(): int {
        return $this->OrderID;
    }

    function getProductID(): string {
        return $this->ProductID;
    }

    function getAmount(): float {
        return $this->Amount;
    }

    function getName(): string{
        return $this->Name;
    }

    //Setters
    function setorderID(int $id){
        $this->OrderID = $id;
    }

    function setProductID(string $id){
        $this->ProductID = $id;
    }

    function setAmount(float $amount){
        $this->Amount = $amount;
    }

    function setName(string $name){
        $this->Name = $name;
    }
}

?>
