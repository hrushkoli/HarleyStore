<?php

// php cart class
class Cart
{
    public $db = null;

    public function __construct(DBController $db)
    {
        if (!isset($db->con)) return null;
        $this->db = $db;
    }

    // insert into cart table
    public  function insertIntoCart($params = null, $table = "cart"){
        if ($this->db->con != null){
            if ($params != null){
                // get table columns
                $columns = implode(',', array_keys($params));

                $values = implode(',' , array_values($params));

                // create sql query
                $query_string = sprintf("INSERT INTO %s(%s) VALUES(%s)", $table, $columns, $values);

                // execute query

                mysqli_query($this->db->con,$query_string);
                $result = $this->db->con->query($query_string);
                return $result;
            }
        }
    }

    // to get user_id and item_id and insert into cart table
    public  function addToCart($userid, $itemid){
        $quantity = mysqli_query($this->db->con,"select * from cart where pID = $itemid and id = $userid");
        // echo $quantity;
        if (isset($userid) && isset($itemid)){
            if (!isset($quantity['pID']) ){
                $query = "insert into cart (id,pID) values ('$userid','$itemid')";
                mysqli_query($this->db->con, $query);    
            }
                // } else if ($quantity != null){
            //     $query = "alter cart set quantity = '$quantity' values ('$userid','$itemid')";
            // }
                // mysqli_query($this->db->con, $query);    
            // }
        }
    }

    // delete cart item using cart item id
    public function deleteCart($item_id = null, $table = 'cart'){
        if($item_id != null){
            echo $item_id;
            $result = $this->db->con->query("DELETE FROM {$table} WHERE pID='{$item_id}'");
            if($result){
                header("Location:" . $_SERVER['PHP_SELF']);
            }
            return $result;
        }
    }

    // calculate sub total
    public function getSum($arr){
        if(isset($arr)){
            $sum = 0;
            foreach ($arr as $item){
                $i = 0;
                $sum += floatval($item[$i]);
                $i+=1;
            }
            return sprintf('%.2f' , $sum);
        }
    }
}