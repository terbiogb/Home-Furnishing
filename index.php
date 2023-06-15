<?php include('layouts/header.php'); ?>



    <!-- Page Content -->
    <!-- Banner Starts Here -->
    <div class="slide banner header-text">
      <div class="owl-banner owl-carousel">
        <div class="banner-item-01">
        <video class="video-bg" autoplay muted loop>
    <source src="assets/video/video-06.mp4" type="video/mp4">
  </video>
          <div class="text-content">
            <h4>Transform Your Home with Home Furnishing</h4>
            <h2>Latest Trends in Furniture and Decor</h2>
            <br>
            <a href="products.php" class="shop-btn">Shop Now</a>
          </div>
        </div>
        <div class="banner-item-02">
        <video class="video-bg" autoplay muted loop>
    <source src="assets/video/video-05.mp4" type="video/mp4">
  </video>
          <div class="text-content">
            <!-- <h4>Discover the Best Deals on Home Furnishings</h4> -->
            <h2>Upgrade Your Living Space Today!</h2>
            <br>
            <a href="products.php" class="shop-btn">Shop Now</a>
          </div>
        </div>
        <div class="banner-item-03">
        <video class="video-bg" autoplay muted loop>
    <source src="assets/video/video-04.mp4" type="video/mp4">
  </video>
          <div class="text-content">
            <h4>Get Ready to Fall in Love with Your Home</h4>
            <h2>Wide Selection of Quality Furniture</h2>
            <br>
            <a href="products.php" class="shop-btn">Shop Now</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Banner Ends Here -->

    <!-- Featured Products -->

    <section id="featured" class="my-5 pb-5">
      <div class="container text-center mt-5 py-5">
        <h3>Featured Products</h3>
        <hr />
      </div>
      <div class="row mx-auto container-fluid">

      <?php include('server/get_featured_products.php'); ?>

      <?php while($row= $featured_products->fetch_assoc()){ ?>

        <div class="product text-center img-fluid col-lg-3 col-md-6 col-sm-12">
        <a href="<?php echo "single_product.php?product_id=". $row['product_id']; ?>"><img class="img-fluid mb-3" src="assets/images/<?php echo $row['product_image']; ?>" alt="" /></a>
          <div class="stars">
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
          </div>
          <h5 class="p-name"><?php echo $row['product_name']; ?></h5>
          <h4 class="p-price">&#8369;<?php echo $row['product_price']; ?></h4>
        </div>
        <?php } ?>
      </div>
    </section>

    <!-- Brands -->
    <section id="brand" class="happy-clients">
    <div class="container text-center mt-5 py-5">
        <h3>Partner Brands</h3>
        <hr />
      <div class="owl-clients owl-carousel">
        <img class="client-item" src="assets/images/brands/brand-01.png" alt="1">
        <img class="client-item" src="assets/images/brands/brand-02.png" alt="2">
        <img class="client-item" src="assets/images/brands/brand-03.png" alt="3">
        <img class="client-item" src="assets/images/brands/brand-04.png" alt="4">
        <img class="client-item" src="assets/images/brands/brand-05.png" alt="5">
        <img class="client-item" src="assets/images/brands/brand-06.png" alt="6">
        <img class="client-item" src="assets/images/brands/brand-08.png" alt="8">
        <img class="client-item" src="assets/images/brands/brand-09.png" alt="9">
        <img class="client-item" src="assets/images/brands/brand-10.png" alt="10">
      </div>
    </section>


    <!-- video ad -->
    <div class="page-heading header-text">
  <video class="video-bg" autoplay muted loop>
    <source src="assets/video/video-03.mp4" type="video/mp4">
  </video>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="text-content">
          <br><br><br>
          <h2>15% off selected products</h2>
          <br>
          <a href="products.php" class="shop-btn">SHOP THE SALE</a>
        </div>
      </div>
    </div>
  </div>
</div>



    <!-- Latest Products -->
    <div class="latest-products">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Latest Products</h2>
              <a href="products.php"
                >view all products <i class="fa fa-angle-right"></i
              ></a>
            </div>
          </div>

          <?php include('server/get_latest_products.php'); ?>

          <?php while($row= $latest_products->fetch_assoc()){ ?>
          <div class="col-md-4">
            <div class="product-item">
            <a href="<?php echo "single_product.php?product_id=". $row['product_id']; ?>"><img class="prod-img" src="assets/images/<?php echo $row['product_image']; ?>" alt="" /></a>
              <div class="down-content">
                <h4><?php echo $row['product_name']; ?></h4>
                <h6>&#8369;<?php echo $row['product_price']; ?></h6>
                <p><?php echo $row['product_description']; ?></p>
                <ul class="stars text-center">
                  <li><i class="fa fa-star"></i></li>
                  <li><i class="fa fa-star"></i></li>
                  <li><i class="fa fa-star"></i></li>
                  <li><i class="fa fa-star"></i></li>
                  <li><i class="fa fa-star"></i></li>
                </ul>
                <br>
          <form method="POST">
          <input type="hidden" name="product_id" value="<?php echo $row['product_id']; ?>">
          <input type="hidden" name="product_image" value="<?php echo $row['product_image']; ?>">
          <input type="hidden" name="product_name" value="<?php echo $row['product_name']; ?>">
          <input type="hidden" name="product_price" value="<?php echo $row['product_price']; ?>">
          <input type="hidden" name="product_quantity" value="1" />
          <button class="add" type="submit" name="add_to_cart"><i class="fa fa-shopping-cart"></i></button>
          </form>

              </div>
            </div>
          </div>
          <?php } ?>
        </div>
      </div>
    </div>

<!-- Footer -->
    <?php include('layouts/footer.php'); ?>
