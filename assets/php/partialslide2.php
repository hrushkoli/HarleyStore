<div id='bestselling' class="slide2">
    <h1>Best Sellers</h1>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style type="text/css">
    .ProdNamTxt{
        font-size: 15px;
        text-align: center;
        margin-top: -30%;
        margin-left: -40%;
    }
    .owl-prev {
    width: 15px;
    height: 100px;
    position: absolute;
    top: 40% !important;
    margin-left: 20px;
    display: block !important;
    border:0px solid black;
}

    .owl-next {
        width: 15px;
        height: 100px;
        position: absolute;
        top: 40%;
        right: 25px;
        display: block !important;
        border:0px solid black;
    }
    .owl-nav {
        color: white;
        font-size: 50px;
    }
    .owl-prev i, .owl-next i {transform : scale(1,6); color: #ccc;}
</style>

<div class="owl-carousel owl-theme">
<?php
            
            foreach($product_shuffle as $item) 
            {
                if ($item['label'] == 'Best Selling') {  
        // ?>
                <div class="item" style="text-align:center;padding:20px">
                <a href="<?php printf('%s?item_id=%s', 'product.php',  $item['pID']); ?>">
                <img class="pic" src="<?php echo $item['imagelink']?>" alt="<?php echo $item['pName']?>" border="0" ></a>
                <h1 class="ProdNamTxt"><?php echo $item['brand'];echo $item['pName']?></h1>
                </div> 
                    
         <?php } } ?>
         </div>


<script type="text/javascript">
        $('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    dots:false,
    autoplay:true,
    autoplayHoverPause:true,
    autoplayTimeout:4000,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:6
        }
    }
})
</script>
</div>


