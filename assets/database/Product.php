<?php

// Use to fetch product data
class Product
{
    public $db = null;

    public function __construct(DBController $db)
    {
        if (!isset($db->con)) return null;
        $this->db = $db;
    }

    // fetch product data using getData Method
    public function getData($table = 'products'){
        $result = $this->db->con->query("SELECT * FROM {$table}");

        $resultArray = array();

        // fetch product data one by one
        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $resultArray[] = $item;
        }

        return $resultArray;
    }
    public function getCart($Username=0){
        $Username = $_SESSION['Username'];
        $result = $this->db->con->query("SELECT * FROM cart where id = '{$Username}'");

        $resultArray = array();

        // fetch product data one by one
        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $resultArray[] = $item;
        }

        return $resultArray;
    }

    public function getQuantity($pID){
        // $username = $_SESSION['Username'];
        $result = $this->db->con->query("SELECT * FROM cart where pID = {$pID}");

        $resultArray = array();

        // fetch product data one by one
        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $resultArray[] = $item;
        }

        return $resultArray;
    }

    // get product using item id
    public function getProduct($item_id = null, $table= 'products'){
        if (isset($item_id)){
            $result = $this->db->con->query("SELECT * FROM products WHERE pID='{$item_id}'");
            // echo $this->db->con->query("SELECT * FROM {$table} WHERE pID='{$item_id}'");
            $resultArray = array();

            // fetch product data one by one
            while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                $resultArray[] = $item;
            }

            return $resultArray;
        }
    }

    public function getCatData($table = 'products' , $cat ){
        $result = $this->db->con->query("SELECT * FROM {$table} WHERE pID like '{$cat}%' ");

        $resultArray = array();

        // fetch product data one by one
        while ($item = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $resultArray[] = $item;
        }
        return $resultArray;
    }

}