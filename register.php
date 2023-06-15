<?php

  session_start();

    include('server/connection.php');



    // if user has already registered, then the user will be routed to account page
  if(isset($_SESSION['logged_in'])){
    header('location: account.php');
    exit;
  }


    if(isset($_POST['register'])){

      $name = $_POST['name'];
      $email = $_POST['email'];
      $password = $_POST['password'];
      $confirmPassword = $_POST['confirmPassword'];

          //if passwords didn't match
        if($password !== $confirmPassword){
            header('location: register.php?error=Passwords did not match');
  

                        //if password is less than 6 characters
                      }else if(strlen($password) < 6){
                          header('location: register.php?error=Password must be at least 6 characters');
                        


                        //if there is no error 
                      }else{

                        //check whether there is a user with this email or not
                        $stmt1 = $conn->prepare("SELECT count(*) FROM users where user_email = ?");
                        $stmt1->bind_param('s',$email);
                        $stmt1->execute();
                        $stmt1->bind_result($num_rows);
                        $stmt1->store_result();
                        $stmt1->fetch();


                        //if there is a user already registered with this email
                      if($num_rows != 0){
                          header('location: register.php?error=Email address already used');

                        //if no user registered with this email  
                        }else{

                        //create a new user
                      $stmt = $conn->prepare("INSERT INTO users (user_name,user_email,user_password)
                                                      VALUES(?,?,?)");

                      $stmt->bind_param('sss',$name,$email,md5($password));    

                      //if account was created successfully
                      if($stmt->execute()) {
                      $user_id = $stmt->insert_id;
                      $_SESSION['user_id'] = $user_id;
                      $_SESSION['user_email'] = $email;
                      $_SESSION['user_name'] = $name;
                      $_SESSION['logged_in'] = true;
                      header('location: account.php?register_success=Registered Successfully!');


                      //account couldn't be created
                      }else{
                      header('location: register.php?error=Could not create an account at the moment');
                      }

        }

      }
    }

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta
      name="description"
      content="This is an Online Furniture Store made by Group 4 - Full Stack Web Development KodeGo Bootcamp 2023"
    />
    <meta name="title" content="Online Home Furnishing" />
    <title>Online Home Furnishing</title>
    <link rel="stylesheet" href="assets/css/sign-up.css" />
    <link
      href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap"
      rel="stylesheet"
    />

        <!-- Favicon -->
        <link rel="icon" href="assets/images/logo-02.jpg">
  </head>
  <body>
    <div class="split-screen">
      <div class="left">
        <section class="copy">
          <h1>Explore your creativity.</h1>
        </section>
      </div>
      <div class="right">
      <form id="register-form" method="POST" action="register.php">
          <section class="copy">
            <h2>Sign up</h2>
            <div class="login-container">
              <p>
                Already have an account?<a href="login.php"><strong> Log In</strong></a>
              </p>
            </div>
          </section>
          <div class="input-container name">
            <label for="fname">Full Name</label>
            <input type="text" id="fname" name="name" />
          </div>
          <div class="input-container email">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" />
          </div>
          <div class="input-container password">
            <label for="password">Password</label>
            <input
              type="password"
              id="password"
              name="password"
              placeholder="Must be at least 6 characters"
            />
            <i class="far fa-eye-slash"></i>
          </div>
          <div class="input-container confirmpassword">
            <label for="password">ConfirmPassword</label>
            <input
              type="password"
              id="password"
              name="confirmPassword"
              placeholder="Must be at least 6 characters"
            />
            <i class="far fa-eye-slash"></i>
          </div>
          <p style="color: red; text-align: center;"><?php if(isset($_GET['error'])) { echo $_GET['error'];} ?></p>
          <!-- <div class="input-container cta">
            <label class="checkbox-container">
              <input type="checkbox" />
              <span class="checkmark"></span>
              Sign up for email updates.
            </label>
          </div> -->
          <button class="signup-btn" type="submit" name="register">Sign Up</button>
          <section class="copy legal">
            <span class="small"
              >By continuing, you agree to accept our <br />
              <a href="#">Privacy Policy</a> &amp;
              <a href="#">Terms of Service</a>.</span
            >
          </section>
        </form>
      </div>
    </div>
  </body>
</html>
