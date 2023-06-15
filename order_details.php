<?php session_start(); ?>

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
            </ul>
          </div>
        </div>
      </nav>
    </header>

<?php

/*
NOT PAID
PAID
Shipped
Delivered
*/

include('server/connection.php');

if(isset($_POST['order_details_btn']) && isset($_POST['order_id'])){

    $order_id = $_POST['order_id'];
    $order_status = $_POST['order_status'];

    $stmt = $conn->prepare("SELECT * FROM order_items WHERE order_id = ?");
    $stmt->bind_param('i',$order_id);
    $stmt->execute();

    $order_details = $stmt->get_result();

    $order_total_price = calculateTotalOrderPrice($order_details);

}else{
    header('location: account.php');
    exit;


}

function calculateTotalOrderPrice($order_details){

  $total = 0;

  foreach($order_details as $row) {

    $product_price = $row['product_price'];
    $product_quantity = $row['product_quantity'];

    $total = $total + ($product_price * $product_quantity);
  }

  return $total;

}



?>
    <!-- Order Details -->
    <div id="orders" class="orders container my-5 py-3">
      <div class="container mt-5">
        <h2 class="font-weight-bold text-center">Order Details</h2>
        <hr class="mx-auto">
      </div>

      <table class="mt-5 pt-5 mx-auto">
        <tr>
          <th>Product</th>
          <th>Price</th>
          <th>Quantity</th>
        </tr>

        <?php foreach($order_details as $row) { ?>

        <tr>
            <td>
                <div class="product-info">
                    <img src="assets/images/<?php echo $row['product_image']; ?>" alt="">
                    <div>
                        <p class="mt-3"><?php echo $row['product_name']; ?></p>
                    </div>
                </div>
            </td>
          <td><span>&#8369; <?php echo $row['product_price']; ?></span></td>
          <td><span><?php echo $row['product_quantity']; ?></span></td>
        </tr>

        <?php } ?>
      </table>

      <?php 
      
      if($order_status == "NOT PAID"){?>

      <form style="float: right;" method="POST" action="payment.php">
      <input type="hidden" name="order_total_price" value="<?php echo $order_total_price; ?>">
      <input type="hidden" name="order_status" value="<?php echo $order_status; ?>">
      <input type="submit" name="order_pay-btn" class="btn btn-primary" value="Pay Now">
      </form>

      <?php } ?>


    </div>

<!-- footer -->
  <?php include('layouts/footer-one.php'); ?>