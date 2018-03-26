<?php include "includes/db.php"; ?>
<?php include "includes/header.php"; ?>
<!--HEADER -->
<?php include "includes/navigation.php"; ?>

<!--Video Section-->
<video poster="assets/video/UN_building/UN_building.jpg" id="bgvid" playsinline autoplay muted loop>
  <!-- WCAG general accessibility recommendation is that media such as background video play through only once. Loop turned on for the purposes of illustration; if removed, the end of the video will fade in the same way created by pressing the "Pause" button  -->
<source src="assets/video/UN_building/UN_building.webm" type="video/webm">
<source src="assets/video/UN_building/UN_building.mp4" type="video/mp4">
</video>
<!--Video Section Ends Here-->

<!-- ======================= Video Carousel ======================== -->
  
<section id="video">
    <div id="carousel" class="carousel slide carousel-fade" data-ride="carousel" data-interval="false">
  <ol class="carousel-indicators">
      <li data-target="#carousel" data-slide-to="0" class="active"></li>
      <li data-target="#carousel" data-slide-to="1"></li>
      <li data-target="#carousel" data-slide-to="2"></li>
      <li data-target="#carousel" data-slide-to="3"></li>
  </ol>
  
  <!-- Carousel items -->
  <div class="carousel-inner">
    <div class="item active">
      <div class="slide-content">
        <video poster="http://192.241.175.50/videos/london.jpg" webkit-playsinline id="bgvid" loop>
          <source src="http://192.241.175.50/videos/london.webm" type="video/webm">
          <source src="http://192.241.175.50/videos/london.mp4" type="video/mp4">
        </video>
        <div class="slide-overlay door">
          <div class='title'>UniFinder</div>
          <div class="description"> Try Search ===> </div>
        </div>
        
      </div>
    </div>
    <div class="item">
      <div class="slide-content">
        <video poster="http://192.241.175.50/videos/boston.jpg" webkit-playsinline id="bgvid" loop>
          <source src="http://192.241.175.50/videos/boston.webm" type="video/webm">
          <source src="http://192.241.175.50/videos/boston.mp4" type="video/mp4">
        </video>
        <div class="slide-overlay door">
          <form action="search.php" method="post">
              <div class='title'>
                  <input name="search" type="text" class="form-control">
                  
              </div>
          <div class="description"> 
             <select name="uni_state_id" id="">
                      <option value="null">Select State</option>
                        <?php
                            $query = "SELECT * FROM states";
                            $select_states = mysqli_query($connection,$query);

                            //confirmQuery($select_states);

                            while($row = mysqli_fetch_assoc($select_states)) {
                                $state_id = $row['state_id'];
                                $state_name = $row['state_name'];
                                $state_short_name = $row['state_short_name'];
                                echo "<option value='$state_short_name'>{$state_short_name}</option>";
                            }

                        ?>
             </select>
                     <select name="uni_city_id" id="">
                 <option value="null">Select City</option>
                                <?php
                                    $query = "SELECT * FROM cities";
                                    $select_cities = mysqli_query($connection,$query);

                                    //confirmQuery($select_cities);

                                    while($row = mysqli_fetch_assoc($select_cities)) {
                                        $city_id = $row['city_id'];
                                        $city_name = $row['city_name'];
                                        echo "<option value='$city_name'>{$city_name}</option>";
                                    }

                                ?>

             </select>
                      
                 
              <button name="submit" class="btn btn-success btn-lg pull-right" type ="submit">Search</button> 
          </div>
          
          </form>
        </div>
      </div>
    </div>
    <div class="item">
      <div class="slide-content">
        <video poster="http://192.241.175.50/videos/split.jpg" webkit-playsinline id="bgvid" loop>
          <source src="http://192.241.175.50/videos/split.webm" type="video/webm">
          <source src="http://192.241.175.50/videos/split.mp4" type="video/mp4">
        </video>
        <div class="slide-overlay door">
          <div class='title'>UniFinder</div>
          
        </div>
      </div>
    </div>
    <div class="item">
      <div class="slide-content">
        <video poster="http://192.241.175.50/videos/samo.jpg" webkit-playsinline id="bgvid" loop>
          <source src="http://192.241.175.50/videos/samo.webm" type="video/webm">
          <source src="http://192.241.175.50/videos/samo.mp4" type="video/mp4">
        </video>
        <div class="slide-overlay door">
          <div class='title'>UniFinder</div>
          <div class="description"> </div>
        </div>
      </div>
    </div>
  </div>
  
  <a class="carousel-control left" href="#carousel" data-slide="prev">
   <span class="glyphicon glyphicon-chevron-left"></span>
  </a>
  
  <a class="carousel-control right" href="#carousel" data-slide="next">
   <span class="glyphicon glyphicon-chevron-right"></span>
  </a>
  
</div>
</section>



<!-- ======================= End Video Carousel ======================== -->


<!--HERO -->

<!-- HERO  -->

<!-- OPT IN SECTION -->
<section id="optin">
    <div class="container">
        <div class="row">
            <div class="col-sm-8">
                <p class="lead"><strong>Subscribe to our mailing list.</strong>We'll send something special as a thank you.</p>
            </div>
            <!-- col -->

            <div class="col-sm-4">
                <button class="btn btn-success btn-lg btn-block" data-toggle="modal" data-target="#myModal">Click here to subscribe</button>
            </div>
            <!-- col -->
        </div>
        <!-- row -->
    </div>
    <!-- container -->
</section>
<!-- optin -->

<!--Introduction -->
<section id="boost-income">
    <div class="container">
        <div class="section-header">
            <img src="assets/img/icon-boost.png" alt="Chart">
            <h2>Website Introduction</h2>
        </div>
        <!-- section-header -->

        <p class="lead">&#39;In fall 2017, some 20.4 million students are expected to attend American colleges and universities, constituting an increase of about 5.1 million since fall 2000&#39; (nces.ed.gov). there is thousands of colleges and universities left alone each of them has hundreds of majors within their institution.</p>

        <div class="row">
            <div class="col-sm-6">
                <h3>Our Vision I</h3>
                <p>As the purpose to ease millions of students who want to scout out and select a right fit colleges or universities she/he could apply on, our team is developing an application that helps candidates go through search, select, apply process.</p>
            </div>
            <!-- col -->

            <div class="col-sm-6">
                <h3>Our Vision II</h3>
                <p>With this app, users could search out the he/she conditions and criteria, the app will generate list of result based on them. Thus, save users go through every step of each college hunt.</p>
            </div>
            <!-- col -->

        </div>
        <!-- row  -->
    </div>
    <!-- container -->
</section>
<!-- Introduction -->

<!--WHO BENEFITS  -->
<section id="who-benefits">
    <div class="container">
        <div class="section-header">
            <img src="assets/img/icon-pad.png" alt="Pad and Pencil">
            <h2>Who Should Use This UniFinder</h2>
        </div>
        <!-- section-header -->

        <div class="row">
            <div class="col-sm-8 col-sm-offset-2">
                <h3>Target audience of users &amp; Web Designers</h3>
                <p>The product mainly aims at high school graduates and people who wants to <strong>apply for a degree of a University.</strong></p>

                <h3>Value proposition</h3>
                <p>Our product is innovative and more efficient. With our product, student could find the universities which fit them properly, and they do not search the university by themselves. The product saves them time. Our product is an integrated platform for finding a school.</p>

                <h3>How the system is used</h3>
                <p>Student could easily upload their documents which related to their study. The documents should include resume, transcript with GPA, financial budget, major which they looking for and the rank of university. The platform receive the document form students and will match some of the corresponding universities to students.</p>

                <h3>Expected Benefits</h3>
                <p>Students could easily find schools matching them perfectly so that do not need to search and check application information on each university website separately.</p>
            </div>
            <!-- col -->
        </div>
        <!-- row -->
    </div>
    <!-- container -->

</section>
<!-- who-benefits -->

<!--COURSE FEATURES -->
<section id="course-features">
    <div class="container">
        <div class="section-header">
            <img src="assets/img/icon-rocket.png" alt="Rocket">
            <h2>UniFinder Features</h2>
        </div>
        <!-- section-header -->

        <div class="row">
            <div class="col-sm-2">
                <i class="ci ci-computer"></i>
                <h4>University Search</h4>
            </div>
            <!-- end col -->

            <div class="col-sm-2">
                <i class="ci ci-watch"></i>
                <h4>University Match</h4>
            </div>
            <!-- end col -->

            <div class="col-sm-2">
                <i class="ci ci-calender"></i>
                <h4>University Ranking</h4>
            </div>
            <!-- end col -->

            <div class="col-sm-2">
                <i class="ci ci-community"></i>
                <h4>Financial Aid Details</h4>
            </div>
            <!-- end col -->

            <div class="col-sm-2">
                <i class="ci ci-instructor"></i>
                <h4>Communication Network</h4>
            </div>
            <!-- end col -->

            <div class="col-sm-2">
                <i class="ci ci-device"></i>
                <h4>Profile Generation</h4>
            </div>
            <!-- end col -->
        </div>
        <!-- row -->
    </div>
    <!-- conatiner -->
</section>
<!-- course-features -->

<!--PROJECT FEATURES -->
<section id="project-features">
    <div class="container">
        <h2>Project Features</h2>
        <p class="lead">The main scope of our project <strong>UNIFINDER</strong>, is to help students choose the best universities that suit their profile and requirements in a much easier way and to <em>attain their dream education in their best suited university.</em> It gives an interactive and much professional help that can be used by students to attain their dreams.</p>

        <div class="row">
            <div class="col-sm-4">
                <img src="assets/img/icon-design.png" alt="Design">
                <h3>University Search</h3>
                <p>for Undergraduate and Graduate students, who are struggling in finding University.</p>
            </div>
            <!-- end col -->
            <div class="col-sm-4">
                <img src="assets/img/icon-code.png" alt="Design">
                <h3>University Match</h3>
                <p>allow students to find a perfect University based on their profile.</p>
            </div>
            <!-- end col -->
            <div class="col-sm-4">
                <img src="assets/img/icon-design.png" alt="Design">
                <h3>University Ranking</h3>
                <p>Based on the Universities</p>
            </div>
            <!-- end col -->
        </div>
        <!-- row -->

    </div>
    <!-- container -->
</section>
<!-- Project features -->
<!--VIDEO FEATURES -->
<section id="featurette">
    <div class="container">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2">
                <h2>Watch Website Introduction</h2>
                <iframe width="560" height="315" src="https://www.youtube.com/embed/chWAgrDOriw" frameborder="0" allowfullscreen></iframe>
            </div>
            <!-- end-col -->
        </div>
        <!-- row -->
    </div>
    <!-- container -->

</section>
<!-- featurette -->

<!--Advertisement -->
<section id="advertisement">
    <div class="container">
        <div class="row">
            <div class="col-sm-10">
                <h2>Advertisement</h2>
                <hr>
                <div class="row">
                    <!-- ===================================== Carousel ======================================= -->
                    <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="3000">
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                            <li data-target="#myCarousel" data-slide-to="1"></li>
                            <li data-target="#myCarousel" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner" role="listbox">
                            <div class="item active">
                                <img class="first-slide" src="images/NYC.png" alt="First slide">
                                <div class="container">
                                    <div class="carousel-caption">
                                        <h1>The First Ad</h1>
                                        <p>The first ad introduction</p>
                                        <p><a class="btn btn-lg btn-primary" href="https://www.nyu.edu/" role="button">Learn More</a></p>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <img class="second-slide" src="images/Pace.jpeg" alt="Second slide">
                                <div class="container">
                                    <div class="carousel-caption">
                                        <h1>The Second Ad</h1>
                                        <p>The second ad introduction</p>
                                        <p><a class="btn btn-lg btn-primary" href="https://www.pace.edu/" role="button">Learn more</a></p>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <img class="third-slide" src="images/stevens-institute-of-technology.gif" alt="Third slide">
                                <div class="container">
                                    <div class="carousel-caption">
                                        <h1>The Third Ad</h1>
                                        <p>The third ad introduction</p>
                                        <p><a class="btn btn-lg btn-primary" href="https://www.stevens.edu/" role="button">Learn More</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
                        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
                    </div>
                    <!-- /.carousel -->

                </div>
                <!-- row -->
            </div>
            <!-- end col -->

            <div class="col-sm-2">
                <a href="#" target="_blank" class="badge social twitter"><i class="fa fa-twitter"></i></a>
                <a href="https://www.facebook.com/profile.php?id=100013126567055" target="_blank" class="badge social facebook"><i class="fa fa-facebook"></i></a>
                <a href="#" target="_blank" class="badge social gplus"><i class="fa fa-google-plus"></i></a>
            </div>

        </div>
        <!-- row -->
    </div>
    <!-- container -->
</section>
<!-- End AD -->

<!--TESTIMONIALS -->


<!--SIGN UP SECTION -->
<section id="signup" data-type="background" data-speed="5">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3">
                <h2>Are you ready to apply for a <strong>university!</strong></h2>
                <p><a href="registration.php" class="btn btn-lg btn-block btn-success">Sign me up!</a></p>
            </div>
            <!-- col-end -->
        </div>
        <!-- row -->
    </div>
    <!-- container -->
</section>
<!-- signup -->


<!-- MODAL -->
<div class="modal fade" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel"><i class="fa fa-envelope"></i> Subscribe to our Mailing Lists</h4>
            </div>
            <!-- modal-header -->

            <div class="modal-body">
                <p>Simply enter your name and email! As a thank you for joining us. <em>Free!!!</em></p>
                <form action="" class="form-inline" role="form">
                    <div class="form-group">
                        <label for="subscribe-name" class="sr-only">Your first name</label>
                        <input type="text" class="form-control" id="subscribe-name" placeholder="Your first name">
                    </div>
                    <!-- form-group -->

                    <div class="form-group">
                        <label for="subscribe-email" class="sr-only">and your email</label>
                        <input type="text" class="form-control" id="subscribe-email" placeholder="and your email">
                    </div>
                    <!-- form-group -->

                    <input type="submit" class="btn btn-danger" value="Subscribe!">
                </form>
                <hr>
                <p><small>By providing your e-mail you consent to receiving occasional promotional emails &amp; newsletters. <br> You may unsubscribe at any time</small></p>


            </div>
            <!-- modal-body -->
        </div>
        <!-- modal content -->
    </div>
    <!-- modal-dialog -->
</div>
<!-- modal -->


<?php include "includes/footer.php"; ?>
