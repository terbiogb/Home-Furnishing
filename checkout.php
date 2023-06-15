<?php session_start(); ?>
<?php

include('server/connection.php');

if(!isset($_SESSION['logged_in'])){
header('location: login.php');
exit;
}

if( !empty($_SESSION['cart'])){

  //let user IN


  //route user to the home page
}else{

  header('location: login.php');
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta
      name="description"
      content="This is an Online Furniture Store made by Group 4 - Full Stack Web Development KodeGo Bootcamp 2023"
    />
    <meta name="title" content="Online Home Furnishing" />
    <link
      href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap"
      rel="stylesheet"
    />

    <title>Home Furnishing</title>

    <script src="https://kit.fontawesome.com/aab2d75e67.js" crossorigin="anonymous"></script>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
  

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css" />
    <link rel="stylesheet" href="assets/css/styles-one.css" />
    <link rel="stylesheet" href="assets/css/owl.css" />
  

   <!-- Favicon -->
   <link rel="shortcut icon" type="image/png" href="assets/images/logo-02.jpg">

  </head>

  <body>
    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
      <div class="jumper">
        <div></div>
        <div></div>
        <div></div>
      </div>
    </div>
    <!-- ***** Preloader End ***** -->

    <!-- Header -->
    <header class="">
      <nav class="navbar navbar-expand-lg">
        <div class="container">
          <a class="navbar-brand" href="index.php"
            ><h2>Home Furnishing</h2></a>
          <button
            class="navbar-toggler"
            type="button"
            data-toggle="collapse"
            data-target="#navbarResponsive"
            aria-controls="navbarResponsive"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item active">
                <a class="nav-link" href="index.php"
                  >Home
                  <span class="sr-only">(current)</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="products.php">Products</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="about.php">About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="contact.php">Contact </a>
              </li>
               <li class="nav-item">
              <a href="login.php" class="nav-link"><i class="fa-solid fa-circle-user"></i></a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>



<?php


?>


<!-- Checkout -->
<div class="container text-center mt-3 pt-5">
    <h3 class="form-weight-bold">Check Out</h3>
  </div>
  <div class="mx-auto container">
    <form id="checkout-form" method="POST" action="server/place_order.php">
      <div class="form-group checkout-small-element">
        <label>Name</label>
        <input type="text" class="form-control" id="checkout-name" name="name" placeholder="Name" required>
      </div>
      <div class="form-group checkout-small-element">
        <label>Email</label>
        <input type="text" class="form-control" id="checkout-email" name="email" placeholder="Email" required>
      </div>
      <div class="form-group checkout-small-element">
        <label>Phone</label>
        <input type="tel" class="form-control" id="checkout-phone" name="phone" placeholder="+63" required>
      </div>
      <div class="form-group checkout-small-element">
        <label>City</label>
        <input type="text" class="form-control" id="checkout-city" name="city" placeholder="City" required>
      </div>
      <div class="form-group checkout-large-element">
        <label>Address</label>
        <input type="text" class="form-control" id="checkout-address" name="address" placeholder="Address" required>
      </div>
      <div class="form-group checkout-btn-container">
        <p>Total Amount: &#8369; <?php echo $_SESSION['total']; ?></p>
        <input type="submit" class="btn" id="checkout-btn" name="place_order" value="Place Order">
      </div>
      <p class="text-center" style="color: red;"><?php if(isset($_GET['message'])) { echo $_GET['message']; } ?>
      <?php if(isset($_GET['message'])) { ?>

        <a class="" href="login.php"></a>
    <?php } ?>
    </p>
    </form><br><br>
  </div>

  <!-- Footer -->
  <?php include('layouts/footer-one.php'); ?>

