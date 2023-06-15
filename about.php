<?php include('layouts/header.php'); ?>
 

    <!-- Page Content -->
    <div class="page-heading about-heading header-text">
    <video class="video-bg" autoplay muted loop>
    <source src="assets/video/video-02.mp4" type="video/mp4">
  </video>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="text-content">
              <h4>about us</h4>
              <h2>our company</h2>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="best-features about-features">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
            </div>
          </div>
          <div class="col-md-6">
            <div class="right-image">
              <img src="assets/images/logo-02.png" alt="" />
            </div>
          </div>
          <div class="col-md-6 col-sm-12">
            <div class="left-content">
              <h4>Who we are &amp; What we do?</h4>
              <p>
                Welcome to our online home furnishing store! We are a team of
                passionate and experienced individuals who are dedicated to
                providing you with the best possible shopping experience.<br /><br />Our
                store was founded with the goal of making home furnishing easy
                and convenient for everyone. We understand that shopping for
                furniture and decor can be overwhelming, which is why we strive
                to provide a stress-free and enjoyable shopping experience. Our
                team consists of experts in the field of home decor, who are
                always on the lookout for the latest trends and designs.<br /><br />At
                our store, we offer a wide range of home furnishing products,
                including furniture, decor, lighting, and bedding. Our inventory
                is carefully curated to ensure that we only offer high-quality
                products from reputable brands. We believe that everyone should
                have access to beautiful and functional home decor, which is why
                we offer our products at competitive prices.<br /><br />We also
                understand the importance of excellent customer service, which
                is why our team is always available to answer any questions you
                may have about our products or your order. We offer free
                shipping on most orders and hassle-free returns, so you can shop
                with confidence. Our mission is to help you create a home that
                you love, and we are committed to providing you with the best
                possible shopping experience. Thank you for choosing our store
                for your home furnishing needs.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
<!-- 
    <div class="team-members">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Our Team Members</h2>
            </div>
          </div>
          <div class="col-md-4">
            <div class="team-member">
              <div class="thumb-container">
                <img src="assets/images/team_02.jpg" alt="" />
                <div class="hover-effect">
                  <div class="hover-content">
                    <ul class="social-icons">
                      <li>
                        <a
                          href="https://github.com/terbiogb"
                          target="_blank"
                          ><i class="fa fa-github"></i
                        ></a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="down-content">
                <h4>Gilbert Terbio</h4>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="team-member">
              <div class="thumb-container">
                <img src="assets/images/team_01.jpg" alt="" />
                <div class="hover-effect">
                  <div class="hover-content">
                    <ul class="social-icons">
                      <li>
                        <a href="https://github.com/raymondkingusman" target="_blank"
                          ><i class="fa fa-github"></i
                        ></a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="down-content">
                <h4>Raymond Usman</h4>
                </p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="team-member">
              <div class="thumb-container">
                <img src="assets/images/team_03.jpg" alt="" />
                <div class="hover-effect">
                  <div class="hover-content">
                    <ul class="social-icons">
                      <li>
                        <a href="https://github.com/regiem14" target="_blank"
                          ><i class="fa fa-github"></i
                        ></a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="down-content">
                <h4>Regie Marzan</h4>
                </p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="team-member">
              <div class="thumb-container">
                <img src="assets/images/team_06.jpg" alt="" />
                <div class="hover-effect">
                  <div class="hover-content">
                    <ul class="social-icons">
                      <li>
                        <a href="https://github.com/Jie1020" target="_blank"
                          ><i class="fa fa-github"></i
                        ></a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="down-content">
                <h4>Benjie Gorgod</h4>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div> -->

    <section id="featured" class="my-5 pb-5">
      <div class="container text-center mt-5 py-5">
        <h3>Team Members</h3>
        <hr />
      </div>
      <div class="row mx-auto container-fluid">

      <?php include('server/get_team_member.php'); ?>

      <?php while($row= $team_member->fetch_assoc()){ ?>

        <div class="product text-center img-fluid col-lg-3 col-md-6 col-sm-12">
        <img class="img-fluid mb-3" src="assets/images/<?php echo $row['team_image']; ?>" alt="" />
          <h5 class="p-name"><?php echo $row['team_name']; ?></h5>
        </div>
        <?php } ?>
      </div>
    </section>

    
<!-- Footer -->
  <?php include('layouts/footer.php'); ?>