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
              <li class="nav-item">
              <a href="login.php" class="nav-link"><i class="fa-solid fa-circle-user"></i></a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>

<?php

if(isset($_POST['order_pay_btn'])) {
$order_statu = $_POST['order_status'];
$order_total_price = $_POST['order_total_price'];
}
?>

<!-- Payment -->
<div class="container text-center mt-3 pt-5">
    <h3 class="form-weight-bold">Payment</h3>
  </div>
  <div class="mx-auto text-center container" style="display: flex; flex-direction: column; align-items: center;">
    <?php if(isset($_SESSION['total']) && $_SESSION['total'] !=0) { ?>
        <?php $amount = strval($_SESSION['total']); ?>
    <p>Total Payment:  &#8369;  <?php echo $_SESSION['total']; ?></p>
    <!-- <input class="btn btn-primary" value="Pay Now"type="submit"> -->
    <!-- Set up a container element for the button -->
    <div id="paypal-button-container"></div>
    


    <?php } else if(isset($_POST['order_status']) && $_POST['order_status'] == "NOT PAID"){ ?>
        <?php $amount = strval($_POST['order_total_price']); ?>
        <p>Total Payment:  &#8369;  <?php echo $_POST['order_total_price']; ?></p>
        <!-- <input class="btn btn-primary" value="Pay Now"type="submit"> -->
        <!-- Set up a container element for the button -->
    <div id="paypal-button-container"></div>

    <?php } else { ?>

          <p>You don't have an order</p>

      <?php } ?>



  </div>

      <!-- Replace "test" with your own sandbox Business account app client ID -->
      <script src="https://www.paypal.com/sdk/js?client-id=AarNHm75hLTVjoiFdCF17PMrX2WuXYHilVjfgs4Zbh7OUQGW0DWL9Y_mEfBHovnjjPA-UTWaM1Nd5ZGO&currency=USD"></script>

    <script>
      paypal.Buttons({
        // Order is created on the server and the order id is returned
createOrder: function(data, actions) {
    return actions.order.create({
        purchase_units: [{
            amount: {
                value: '<?php echo $amount; ?>'
            }
        }]
    });
},
        // Finalize the transaction on the server after payer approval
        onApprove(data, actions) {
          return actions.order.capture().then(function(orderData){

          
            // Successful capture! For dev/demo purposes:
            console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
            const transaction = orderData.purchase_units[0].payments.captures[0];
            alert(`Transaction ${transaction.status}: ${transaction.id}\n\nSee console for all available details`);
            // When ready to go live, remove the alert and show a success message within this page. For example:
            // const element = document.getElementById('paypal-button-container');
            // element.innerHTML = '<h3>Thank you for your payment!</h3>';
            // Or go to another URL:  window.location.href = 'thank_you.html';
          });
        }
      }).render('#paypal-button-container');
    </script>

<!-- Footer -->
  <?php include('layouts/footer-one.php'); ?>
