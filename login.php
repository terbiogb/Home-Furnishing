<?php

session_start();

include('server/connection.php');

if(isset($_SESSION['logged_in'])){
  header('location: account.php');
  exit;
}

  if(isset($_POST['login_btn'])){

    $email =  $_POST['email'];
    $password =  md5($_POST['password']);

    $stmt = $conn->prepare("SELECT user_id,user_name, user_password, user_email FROM users WHERE user_email = ? AND user_password = ? LIMIT 1");

    $stmt->bind_param('ss',$email,$password);

    if($stmt->execute()){
      $stmt->bind_result($user_id,$user_name,$user_password,$user_email);
      $stmt->store_result();

      if($stmt->num_rows() == 1){
      $stmt->fetch();

      $_SESSION['user_id'] = $user_id;
      $_SESSION['user_name'] = $user_name;
      $_SESSION['user_email'] = $user_email;
      $_SESSION['logged_in'] = true;

      header('location: account.php?login_success=You logged in successfully!');

    }else{
      header('location: login.php?error=Could not verify your account');
    }

    }else{
        //error
        header('location: login.php?error=Something went wrong');
    }

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
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
    />
    <link rel="stylesheet" href="assets/css/sign-in.css" />
    <link
      href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap"
      rel="stylesheet"
    />
    <title>Home Furnishing</title>
  </head>
  <body>
    <section class="side">
      <img src="assets/images/image-15.png" alt="" />
    </section>

    <section class="main">
      <div class="login-container">
        <p class="title">Welcome Back!</p>
        <div class="separator"></div>
        <p class="welcome-message">
        Enjoy a seamless shopping experience with secure transactions and prompt delivery. <br> Don't have an account?<a href="register.php"> Click Here.</a>
        </p>

      <form id="login-form" method="POST" action="login.php">
          <div class="form-control">
            <input
              type="text"
              class="form-control"
              id="login-email"
              name="email"
              placeholder="Email"
              required
            />
            <i class="fas fa-user"></i>
          </div>
          <div class="form-control">
            <input
              type="text"
              class="form-control"
              id="login-password"
              name="password"
              placeholder="Password"
              required
            />
            <i class="fas fa-lock"></i>
          </div>
          <p style="color: red;" class="back-btn"><?php if(isset($_GET['error'])) {echo $_GET['error']; }?></p>
          <button type="submit" class="submit" id="login-btn" name="login_btn" value="Login">Login</button>
        </form>
        <a href="index.php" class="back-btn">Go back to store</a>
      </div>
    </section>
  </body>
</html>
