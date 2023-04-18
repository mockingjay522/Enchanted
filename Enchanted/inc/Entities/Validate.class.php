<?php

class Validate{

    static function ValidateRegistrationInput(){

        $valid = true;

        //validate full Name
        if($_POST['fullname']== ""){
            $valid = false;
            array_push(Page::$notifications, "Name cannot be empty\n");
        }

        //check if the name is fullname or not
        if (!preg_match("/\s/", $_POST['fullname'])){
            $valid=false;
            array_push(Page::$notifications,"Please enter both first name and last name");
        }    

        //validate email
        if($_POST['username']== ""){
            $valid = false;
            array_push(Page::$notifications, "Email Address cannot be empty");
        }
        
        if(!filter_input(INPUT_POST, 'username', FILTER_VALIDATE_EMAIL)){
            $valid = false;
            array_push(Page::$notifications,"Please enter a valid email address");  
        }

        //validate password
        if (strlen($_POST['password']) ==0 ||  strlen($_POST['password2']) ==0){
            $valid=false;
            array_push(Page::$notifications,"Passwords cannot be empty\n");
        }

        if ($_POST['password'] != $_POST['password2']){
                $valid=false;
                array_push(Page::$notifications,"Passwords do not match\n");
        }

        //validate address
        if($_POST['address']== ""){
            $valid = false;
            array_push(Page::$notifications, "Address cannot be empty\n");
        }

        //validate phone number
        if($_POST['phoneno']== ""){
            $valid = false;
            array_push(Page::$notifications, "Phone number cannot be empty\n");
        }

        $exp = array("options"=>array("regexp"=>"/^\d{3}[\s]?\d{7}$/"));
        if (!filter_input(INPUT_POST, 'phoneno', FILTER_VALIDATE_REGEXP, $exp)){
            $valid = false;
            array_push(Page::$notifications, "Please enter a ten digit phone number\n");
        }   

        //returns true if all the inputs pass validation
        return $valid;
    }

    static function ValidateLoginInput(){

        $valid = true;

        //validate username
        if($_POST['username']== ""){
            $valid = false;
            array_push(Page::$notifications, "User Name cannot be empty\n");
        }

        if (strlen($_POST['password'])==0){
            $valid=false;
            array_push(Page::$notifications,"Password cannot be empty\n");
        }

        return $valid;
    }

    static function validateUpdateInput(){
        $valid = true;

        //validate full Name
        if($_POST['fullname']== ""){
            $valid = false;
            array_push(Page::$notifications, "Name cannot be empty\n");
        }

        //check if the name is fullname or not
        if (!preg_match("/\s/", $_POST['fullname'])){
            $valid=false;
            array_push(Page::$notifications,"Please enter both first name and last name");
        }    

        //validate email
        if($_POST['username']== ""){
            $valid = false;
            array_push(Page::$notifications, "Email Address cannot be empty");
        }
        
        if(!filter_input(INPUT_POST, 'username', FILTER_VALIDATE_EMAIL)){
            $valid = false;
            array_push(Page::$notifications,"Please enter a valid email address");  
        }

        //validate address
        if($_POST['address']== ""){
            $valid = false;
            array_push(Page::$notifications, "Address cannot be empty\n");
        }

        //validate phone number
        if($_POST['phoneno']== ""){
            $valid = false;
            array_push(Page::$notifications, "Phone number cannot be empty\n");
        }

        $exp = array("options"=>array("regexp"=>"/^\d{3}[\s]?\d{7}$/"));
        if (!filter_input(INPUT_POST, 'phoneno', FILTER_VALIDATE_REGEXP, $exp)){
            $valid = false;
            array_push(Page::$notifications, "Please enter a ten digit phone number\n");
        }   

        //returns true if all the inputs pass validation
        return $valid;
    }
}
?>