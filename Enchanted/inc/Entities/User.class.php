<?php

// +----------+------------------+------+-----+---------+----------------+
// | Field    | Type             | Null | Key | Default | Extra          |
// +----------+------------------+------+-----+---------+----------------+
// | UserID   | int(10) unsigned | NO   | PRI | NULL    | auto_increment |
// | Name     | char(50)         | NO   |     | NULL    |                |
// | Password | char(100)        | NO   |     | NULL    |                |
// | Email    | char(20)         | NO   |     | NULL    |                |
// | Address  | char(100)        | NO   |     | NULL    |                |
// | PhoneNo  | char(100)        | NO   |     | NULL    |                |
// +----------+------------------+------+-----+---------+----------------+

class User{

    //Class Properties
    private $UserID;
    private $Name;
    private $Password;
    private $Email;
    private $Address;
    private $PhoneNo;

    //Getters
    function getUserId(): string {
        return $this->UserID;
    }

    function getName(): string {
        return $this->Name;
    }

    function getPassword(): string {
        return $this->Password;
    }

    function getEmail(): string {
        return $this->Email;
    }

    function getAddress(): string {
        return $this->Address;
    }

    function getPhoneNo(): string {
        return $this->PhoneNo;
    }

    //Setters
    function setUserId(string $Userid){
        $this->UserID = $Userid;
    }
    
    function setName(string $Name){
        $this->Name = $Name;
    }

    function setPassword(string $Password){
        $this->Password = $Password;
    }

    function setEmail(string $Email){
        $this->Email = $Email;
    }

    function setAddress(string $Address){
        $this->Address = $Address;
    }

    function setPhoneNo(string $Phoneno){
        $this->PhoneNo = $Phoneno;
    }

    //Verify the password
    function verifyPassword(string $passwordToVerify){
        return password_verify($passwordToVerify, $this->Password);
    }
}

?>