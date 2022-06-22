<?php 
// require MySQL Connection
require_once ('assets/database/DBController.php');

// require Product Class
require_once ('assets/database/Product.php');

//require functions Class
require_once ('assets/php/functions.php');

$product = new Product($db);
$product_shuffle = $product->getData('products');
?>

<style type="text/css">
    .body {
    /* background-image: url(); */
    background-color:rgb(40, 13, 63);
    margin-left:80px;
    margin-right:80px;
    margin-bottom:25px;
    margin-top:25px;
}
</style>

<div class="BgIMG" style="background-image:url('assets/images/IndexIMG1.jpg') ; height:800px; object-fit: cover; margin-top:-55px">

    <div class="container" style="background-image:url(assets\images\productsbg.jpg)">

    <div class="row">
        <div class="col-5"><span></span></div>
        <div class="col-5"><h2><br>Our Products<br><br></h2></div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12"> <hr></hr></div>
        </div>

        <?php
            echo '<div class="row">';
            foreach($product_shuffle as $item) {  
        ?>
            <div class='col-md-3 col-sm-6 col-centered'>

                <div class="product-image ">

                    <a href="<?php printf('%s?item_id=%s', 'product.php',  $item['pID']); ?>"><img class="pic" src="<?php echo $item['imagelink']?>" alt="<?php echo $item['pName']?>" border="0" ></a>
                    <span class="product-trend-label"></span>
                    <div class="product-content">
                        <h1 class="ProdNamTxt"><a href=""><?php echo $item['pName']?></a></h1>
                        <div class="price">₹<?php echo $item['price']?>/-</div>
                    </div>
            </div>
    </div>
</div>
    
        <?php  } ?>