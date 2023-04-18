<?php

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

class Order{

    //class properties
    private $OrderID;
    private $UserID;
    private $Amount;
    private $Date;

    //Getters
    function getOrderID(): int {
        return $this->OrderID;
    }

    function getUserID(): string {
        return $this->UserID;
    }

    function getAmount(): float {
        return $this->Amount;
    }

    function getDate(): string {
        return $this->Date;
    }

    //Setters
    function setOrderID(string $id){
        $this->OrderID = $id;
    }

    function setUserID(string $id){
        $this->UserID = $id;
    }

    function setAmount(float $amount){
        $this->Amount = $amount;
    }

    function setDate(string $date){
        $this->Date = $date;
    }
}

?>