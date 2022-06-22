<?php 
// require MySQL Connection
require_once ('assets/database/DBController.php');

// require Product Class
require_once ('assets/database/Product.php');
require_once('server.php');

//require functions Class
require_once ('assets/php/functions.php');
include('assets/database/Contact.php');   


$product = new Product($db);
$product_shuffle = $product->getData('products');
?>
<link rel="stylesheet" href="assets/css/footer.css">

<nav >
<div style="background-color:black ; height:20px;"></div>
  <div class="wrapper" style="background-image:url('assets\images\IndexIMG1.jpg')">
    <div class="logo">
      <img src="assets\images\anuraglogo.png" alt="" width="50px"/>
      <a href="index.php">&nbsp;&nbsp;&nbsp;Anurag Pandey</a></div>
    <input type="radio" name="slider" id="menu-btn">
    <input type="radio" name="slider" id="close-btn">
    <ul class="nav-links">
      <label for="close-btn" class="btn close-btn"><i class="fas fa-times"></i></label>
      <!-- <li><a href="market.php">Home</a></li> -->
      <li>
        <a href="#" class="desktop-item">Products</a>
        <input type="checkbox" id="showDrop">
        <label for="showDrop" class="mobile-item">Products</label>
        <ul class="drop-menu">
          <li><a href="<?php printf('%s?cat_id=%s', 'category.php',  'Accessories'); ?>">Accessories</a></li>
          <li><a href="<?php printf('%s?cat_id=%s', 'category.php',  'Monitors'); ?>">Monitors</a></li>
          <li><a href="<?php printf('%s?cat_id=%s', 'category.php',  'Cabinets'); ?>">Cabinets</a></li>
          <li><a href="<?php printf('%s?cat_id=%s', 'category.php',  'Processors'); ?>">Processors</a></li>
          <li><a href="<?php printf('%s?cat_id=%s', 'category.php',  'GraphicsCards'); ?>">Graphics Cards</a></li>
          <li><a href="<?php printf('%s?cat_id=%s', 'category.php',  'Ram/Storage'); ?>">Ram & Storage</a></li>
          <li><a href="<?php printf('%s?cat_id=%s', 'category.php',  'Motherboards'); ?>">Motherboards</a></li>          
        </ul>
      </li>
      <li><a href="cart.php" class="">Cart</a></li>
      <?php 
        if (isset($_SESSION['Username'])) {
          echo '<li><a href="profile.php" class="">My Profile</a></li></script>';
          echo '<li><a href="logout.php" class="">Log Out</a></li>';
        }
        else{
          echo '<li><a href="login.php" class="">Login</a></li></script>';
          echo '<li><a href="signup.php" class="">Signup</a></li></script>';
        }
      ?>
      <!-- <li><a href="login.php" class="">Login</a></li>
      <li><a href="signup.php" class="button">Signup</a></li> -->
      <li><a href="contact.php">Contact Us</a></li>
    </ul>
    <label for="menu-btn" class="btn menu-btn"><i class="fas fa-bars"></i></label>
  </div>
  <div background="#1a022a" style="height:15px"> </div>
</nav>
<br>
<br>
<br>

