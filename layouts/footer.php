 <footer>
        <div class="container mt-5 py-5">
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="single-box">
                        <a href="index.php"><img class="footer-logo" src="assets/images/logo-02.png" alt=""> </a>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single-box">
                        <h2>QUICK LINKS</h2>
                    <ul>
                        <li><a href="assets/legal/Privacy Policy for Home Furnishing Online Store.pdf">Privacy Policy</a></li>
                        <li><a href="assets/legal/Home Furnishing - Refund Policy.pdf">Refund Policy</a></li>
                        <li><a href="assets/legal/Home Furnishing - Terms of Service.pdf">Terms of Service</a></li>
                    </ul>
                    </div>                    
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single-box socials">
                        <h2>FOLLOW US</h2>
                    <ul>
                        <li><a href="#"><i class="fa fa-facebook"></i>Facebook</a></li>
                        <li><a href="#"><i class="fa fa-instagram"></i>Instagram</a></li>
                    </ul>
                    </div>                    
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single-box">
                        <h2>SIGN UP FOR OUR NEWSLETTER</h2>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Email Address" aria-label="Enter your Email ..." aria-describedby="basic-addon2">
                            <span class="input-group-text" id="basic-addon2"><i class="fa-solid fa-envelope"></i></i></span>
                </div>
                <br>
                <br>
                <div class="card-area">
                            <i class="fa fa-cc-visa"></i>
                            <i class="fa fa-credit-card"></i>
                            <i class="fa fa-cc-mastercard"></i>
                            <i class="fa fa-cc-paypal"></i>
                    </div>
            </div>
        </div>
        <div class="footer_copyright">
    <div class="page-width">
      <small>Copyright &copy; 2023, <a href="index.php" title="">Home Furnishing</a>.</small>
    </div>
  </div>
    </footer>


    <div onclick="scrollToTop()" class="scrollTop">
    <i class="fa-solid fa-arrow-up"></i>
    </div>

<script>
      function scrollToTop(){
        window.scrollTo(0, 0);
      }
    </script>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Additional Scripts -->
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/owl.js"></script>
    <script src="assets/js/slick.js"></script>
    <script src="assets/js/isotope.js"></script>
    <script src="assets/js/accordions.js"></script>
    <script src="assets/js/cart.js"></script>
  


    <script language="text/Javascript">
      cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
      function clearField(t) {
        //declaring the array outside of the
        if (!cleared[t.id]) {
          // function makes it static and global
          cleared[t.id] = 1; // you could use true and false, but that's more typing
          t.value = ""; // with more chance of typos
          t.style.color = "#fff";
        }
      }
    </script>
  </body>
</html>