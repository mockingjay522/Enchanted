<?php

// MariaDB [enchanted]> desc cart;
// +-----------+------------------+------+-----+---------+-------+
// | Field     | Type             | Null | Key | Default | Extra |
// +-----------+------------------+------+-----+---------+-------+
// | UserID    | int(10) unsigned | NO   | PRI | NULL    |       |
// | ProductID | char(5)          | NO   | PRI | NULL    |       |
// | Name      | char(50)         | YES  |     | NULL    |       |
// | Amount    | float(6,2)       | YES  |     | NULL    |       |
// +-----------+------------------+------+-----+---------+-------+
class Cart{

    //class properties
    private $ProductID;
    private $UserID;
    private $Name;
    private $Amount;

    //Getters
    function getProductID(): string {
        return $this->ProductID;
    }

    function getUserID(): int {
        return $this->UserID;
    }

    function getAmount(): float {
        return $this->Amount;
    }

    function getName(): string {
        return $this->Name;
    }

    //Setters
    function setProductID(string $id){
        $this->ProductID = $id;
    }

    function setUserID(int $id){
        $this->UserID = $id;
    }

    function setAmount(float $amount){
        $this->Amount = $amount;
    }

    function setName(string $name){
        $this->Name = $name;
    }
}

?>