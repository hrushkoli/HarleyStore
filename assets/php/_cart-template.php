<!-- Shopping cart section  -->

<?php

    require_once ('functions.php');

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        if (isset($_POST['delete-cart-submit'])){
            $deletedrecord = $Cart->deleteCart($_POST['item_id'],'cart');
        }
        // if (isset($_POST['delete-cart-submit'])){
        //     $Cart->increaseQuantity($_POST['item_id']);
        // }
    } 
?>
<section id="cart" class="py-3 mb-5" style="margin-top:80px"> 
    <div class="container-fluid w-75">
        <h5 class="font-baloo font-size-20">Shopping Cart</h5>
        <!--  shopping cart items   -->
        <div class="row">
            <div class="col-sm-9">
                <?php

                if (!isset($_SESSION['Username'])){
                    echo "Login Again";
                }
                    foreach ($product->getCart("hrushiKoli") as $item) :
                        $cart = $product->getProduct($item['pID'],'products');
                        $subTotal[] = array_map(function ($item){
                ?> 
                <!-- cart item -->
                <div class="row border-top py-3 mt-3">
                    <div class="col-sm-2">
                        <img src="<?php echo $item['imagelink']?>" style="height: 120px;" alt="cart1" class="img-fluid">
                    </div>
                    <div class="col-sm-8">
                        <h5 class="font-baloo font-size-20" > <a href="<?php echo "product.php?item_id=$item[pID]";?>"> <?php echo $item['brand'] . $item['pName']; ?> </a> </h5>

                    </div>

                    <div class="col-sm-2 text-right">
                        <div class="font-size-20 text-danger font-baloo">
                        ₹<span class="product_price" data-id="<?php echo $item['pID'] ;?>"><?php echo $item['price']; ?></span>
                        </div>  
                    </div>
 
                    <!-- product qty -->
                    <div class="qty d-flex pt-2">
                    <form method="post">
                        <input value="<?php echo $item['pID'] ?? 0; ?>" name="item_id">
                        <button type="submit" name="delete-cart-submit" class="btn font-baloo text-danger px-3 border-right">Delete</button>
                    </form>
                    <div class="d-flex font-rale w-25">
                        <select id='Quantity'>
                        <option value="1">1</option>    
                        <option value="2">2</option>    
                        <option value="3">3</option>    
                        <option value="4">4</option>    
                        <option value="5">5</option>    
                        </select>
                    </div>

                    <form method="post">
                        <input value="<?php echo $item['pID'] ?? 0; ?>" name="item_id">
                        <button type="submit" name="delete-cart-submit" class="btn font-baloo text-danger px-3 border-right">Delete</button>
                    </form>
            </div>
                </div>
                <!-- !cart item -->
                <?php
                            return $item['price'];
                        }, $cart); // closing array_map function
                    endforeach;
                ?>
            </div>

            <!-- subtotal section-->
            <div class="col-sm-3">
                <div class="sub-total border text-center mt-2">
                    <h6 class="font-size-12 font-rale text-success py-3"><i class="fas fa-check"></i> Your order is eligible for FREE Delivery.</h6>
                    <div class="border-top py-4">
                        <h5 class="font-baloo font-size-20">Subtotal ( <?php echo isset($subTotal) ? count($subTotal) : 0; ?> item):&nbsp; <span class="text-danger">₹<span class="text-danger" id="deal-price"><?php echo isset($subTotal) ? @$Cart->getSum($subTotal) : 0; ?></span> </span> </h5>
                        <button type="submit" class="btn btn-warning mt-3">Proceed to Checkout</button>
                    </div>
                </div>
            </div>
            <!-- !subtotal section-->
        </div>
        <!--  !shopping cart items   -->
    </div>
</section>
<!-- !Shopping cart section  -->
