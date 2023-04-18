<?php

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

class Products{

    //Class Properties
    private $ID;
    private $Name;
    private $Description;
    private $Image;
    private $Type;
    private $Price;

    //Getters
    function getID(): string {
        return $this->ID;
    }

    function getName(): string {
        return $this->Name;
    }

    function getDescription(): string {
        return $this->Description;
    }

    function getImage(): string {
        return $this->Image;
    }

    function getType(): string {
        return $this->Type;
    }

    function getPrice(): string {
        return $this->Price;
    }

    //Setters
    function setID(string $id){
        $this->ID = $id;
    }
    
    function setName(string $Name){
        $this->Name = $Name;
    }

    function setDescription(string $Description){
        $this->Description = $Description;
    }

    function setImage(string $Image){
        $this->Image = $Image;
    }

    function setType(string $Type){
        $this->Type = $Type;
    }

    function setPrice(string $Price){
        $this->Price = $Price;
    }
}

?>