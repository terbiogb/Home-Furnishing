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
    <link rel="stylesheet" href="assets/css/styles.css" />
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
              <li class="nav-item" id="cart-btn">
                <a class="nav-link"><i class="fa-solid fa-cart-shopping">
                <?php if (isset($_SESSION['quantity']) && $_SESSION['quantity'] !=0) { ?>
                      <span class="cart-quantity"><?php echo $_SESSION['quantity']; ?></span>
                  <?php } ?>
                </i></a>
              </li>
               <li class="nav-item">
              <a href="login.php" class="nav-link"><i class="fa-solid fa-circle-user"></i></a>
              </li>
            </ul>
          </div>
        </div>
      </nav>

      
      <?php 

if(isset($_POST['add_to_cart'])){

  //if the customer has already added a product to the cart
 if(isset($_SESSION['cart'])){

  $products_array_ids = array_column($_SESSION['cart'], "product_id");
  //if product has been added to the cart or not
  if(!in_array($_POST['product_id'], $products_array_ids)){

    $product_id = $_POST['product_id'];

  $product_array = array(
    'product_id' => $_POST['product_id'],
    'product_name' => $_POST['product_name'],
    'product_price' => $_POST['product_price'],
    'product_image' => $_POST['product_image'],
    'product_quantity' => $_POST['product_quantity']
  );
  
$_SESSION['cart'] [$product_id] = $product_array;

    //if the product has been added already
  }else{

echo '<script>alert("The product selected was already added to the cart");</script>';
  }

  //if this is the 1st product
 }else{

  $product_id = $_POST['product_id'];
  $product_name = $_POST['product_name'];
  $product_price = $_POST['product_price'];
  $product_image = $_POST['product_image'];
  $product_quantity = $_POST['product_quantity'];

  $product_array = array(
    'product_id' => $product_id,
    'product_name' => $product_name,
    'product_price' => $product_price,
    'product_image' => $product_image,
    'product_quantity' => $product_quantity
  );

$_SESSION['cart'] [$product_id] = $product_array;


 }

 //calculate total cart
 calculateTotalCart();

 //remove the product from the cart
}else if(isset($_POST['remove_product'])){

  $product_id = $_POST['product_id'];
  unset($_SESSION['cart'][$product_id]);

//calculate total
calculateTotalCart();



}else if(isset($_POST['edit_quantity'])){

  //we get ID nd quantity from the form
  $product_id = $_POST['product_id'];
$product_quantity =  $_POST['product_quantity'];

//get the product rray from the session
$product_array = $_SESSION['cart'][$product_id];

//update product quantity
$product_array['product_quantity'] = $product_quantity;

//return array back to its place
$_SESSION['cart'][$product_id] = $product_array;

//calculate total
calculateTotalCart();

}else{
  // header('location: index.php');
}

function calculateTotalCart(){

  $total_price = 0;
  $total_quantity = 0;

   foreach($_SESSION['cart'] as $key => $value) {
      $product = $_SESSION['cart'][$key];
    $price = $product['product_price'];
    $quantity = $product['product_quantity'];
    $total_price = $total_price + ($price * $quantity);
    $total_quantity = $total_quantity + $quantity;
   }

   $_SESSION['total'] =  $total_price;
   $_SESSION['quantity'] =  $total_quantity;
}
?>


      <div class="shopping-cart">


      <?php if(isset($_SESSION['cart'])) { ?>
      <?php foreach($_SESSION['cart'] as $key => $value) { ?>

                <div class="box">
                    <img src="assets/images/<?php echo $value['product_image']; ?>" >


                                <div class="content">
                                 <p><?php echo $value['product_name']; ?></p>
                                  <p class="price">&#8369; <?php echo $value['product_quantity'] * $value['product_price']; ?></p>
                                  <form class="quantity-form" method="POST" action="#">
                                  <input type="hidden" name="product_id" value="<?php echo $value['product_id']; ?>">
                                  <input class="quantity" type="number" name="product_quantity" value="<?php echo $value      ['product_quantity']; ?>">
                                  <button class="edit-btn" type="submit" value="edit" name="edit_quantity">Edit</button>
                                  </form>
                                </div>

                            <form method="POST" action="#">
                            <input type="hidden" name="product_id" value="<?php echo $value['product_id']; ?>">
                            <button class="remove-btn" type="submit" name="remove_product"><i class="fa fa-trash"></i></button>
                            </form>
                </div>


                        <?php } ?>
                        <?php } ?>

            <?php if(isset($_SESSION['cart'])) {?>
            <div class="total">Total: &#8369; <?php echo $_SESSION['total']; ?>
            <?php } ?> 




            <form action="checkout.php" method="POST">
            <input class="btn" type="submit" name="checkout" value="Checkout"></input>
            </form>  


      </div>
    </header>
