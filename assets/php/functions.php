<?php

// require MySQL Connection
require_once ('assets/database/DBController.php');

// require Product Class
require_once ('assets/database/Product.php');

// include Cart Class
require_once ('assets/database/Cart.php');

function check_login($con)
{
	if(isset($_SESSION['user_id']))
	{

		$id = $_SESSION['user_id'];
		$query = "select * from users where user_id = '$id' limit 1";

		$result = mysqli_query($con,$query);
		if($result && mysqli_num_rows($result) > 0)
		{

			$user_data = mysqli_fetch_assoc($result);
			return $user_data;
		}
	}
	//redirect to login
	header("Location: login.php");
	die;
}

function random_num($length)
{
	$text = "";
	if($length < 5)
	{
		$length = 5;
	}

	$len = rand(4,$length);

	for ($i=0; $i < $len; $i++) { 
		# code...
		$text .= rand(0,9);
	}
	return $text;
}
// DBController object
$db = new DBController();

// Product object
$product = new Product($db);
$product_shuffle = $product->getData();
$Cart = new Cart($db)
?>