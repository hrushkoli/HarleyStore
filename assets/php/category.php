<?php
    // require MySQL Connection
    require_once ('assets/database/DBController.php');

    // require Product Class
    require_once ('assets/database/Product.php');

    //require functions Class
    require_once ('assets/php/functions.php');

    $product = new Product($db);
    $cat_id = $_GET['cat_id'] ?? 1;
    $product_shuffle = $product->getCatData('products',$cat_id);

?>

<div class="container">

<div class="row" style="margin-top:70px">
    <div class="col-5"><span></span></div>
    <div class="col-5"><h2><br><?php echo $cat_id; ?><br><br></h2></div>
</div>

<div class="container">
    <div class="row">
        <div class="col-12"> <hr></hr>
        </div>
        </div>
        <?php
            echo '<div class="row">';
            foreach($product_shuffle as $item) {  
        ?>
            <div class='col-md-3 col-sm-6' style='margin-bottom:50px;margin-bottom:50px'>
                <div class="product-image">
                    <a href="<?php printf('%s?item_id=%s', 'product.php',  $item['pID']); ?>"><img class="pic" src="<?php echo $item['imagelink']?>" alt="<?php echo $item['pName']?>" border="0" ></a>
                    <span class="product-trend-label"></span>
                    <div class="product-content">
                        <h1 class="ProdNamTxt"><a href=""><?php echo $item['brand'] ; echo $item['pName']?></a></h1>
                        <div class="price">₹<?php echo $item['price']?>/-</div>
                </div>
        </div>
</div>
      <?php  } ?>

