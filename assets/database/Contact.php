<?php

// Use to fetch product data
class Contact
{
    public $db = null;

    public function __construct(DBController $db)
    {
        if (!isset($db->con)) return null;
        $this->db = $db;
    }

    public  function addToContact($id , $name , $email , $message){
        if (isset($id) && isset($itemid)){
            $query = "insert into contact (id,name,email,message) values ('$id','$name','$email','$message')";
            mysqli_query($this->db->con, $query);
        }
    }

}