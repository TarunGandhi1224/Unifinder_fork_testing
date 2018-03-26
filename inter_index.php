<?php session_start() ;?>
<?php include "includes/db.php"; ?>
<?php include "includes/header.php"; ?>
<?php include "includes/inter_navigation.php"; ?>

<!--Video Section-->


<video poster="assets/video/UN_building/UN_building.jpg" id="bgvid" playsinline autoplay muted loop>
  <!-- WCAG general accessibility recommendation is that media such as background video play through only once. Loop turned on for the purposes of illustration; if removed, the end of the video will fade in the same way created by pressing the "Pause" button  -->
<source src="assets/video/UN_building/UN_building.webm" type="video/webm">
<source src="assets/video/UN_building/UN_building.mp4" type="video/mp4">
</video>


<!--Video Section Ends Here-->

<!--     Inter Search    -->
<section id="InSearch" data-type="background" data-speed="5">
    <article>
        <div class="container clearfix">
            <div class="row">
                <!-- col -->
                <div class="col-sm-12  hero-text">
                    <h1>UniFinder</h1>

                    <form action="inter_match.php" method="post">
                        <div class="input-group search-bar">
                            <input name="search" type="text" class="form-control">
                            <span class="input-group-btn">
                                <button name="submit" class="btn btn-success" type ="submit">Search</button>
                                </span>
                        </div>
                        <div class="form-group input-lg">
                            <label for="checkbox">Search Your location</label>
                        </div>
                        <div class="form-group">
                            <span><label  for="university_state_id">University State Id</label>
                                <select  name="uni_state_id" id="">
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

                                </select></span>
                            <span>
                                    <label for="university_city_id">University City Id</label>
                                <select name="uni_city_id" id="state_select">
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
                                </span>
                        </div>
                    </form>         
                </div>
                <!-- col -->
            </div>
            <!--row -->
        </div>
        <!-- container  -->
    </article>
</section>
<!--     End Inter Search    -->


<!--HERO -->
<section id="hero" data-type="background" data-speed="10">
    <article>
        <div class="container clearfix">
            <div class="row">
                <div class="col-sm-5">
                    <img src="assets/img/logo-badge2.png" alt="UniFinder" class="logo">
                </div>
                <!-- col -->
                <div class="col-sm-7 hero-text">
                    <h1>UniFinder</h1>
                    <p class="lead">Use UniFinder To Start Your Fantastic University Dream &amp; Custom Your Own Profile </p>

                    <div id="price-timeline">
                        <div class="price active">
                            <h4>Regular Membership <small>Comming Soon</small></h4>

                            <span>$10</span>
                        </div>
                        <!-- price -->
                        <div class="price">
                            <h4>Golden Membership <small>Comming Soon</small></h4>

                            <span>$50</span>
                        </div>
                        <!-- price -->
                        <div class="price">
                            <h4>Platinum Membership <small>Comming Soon</small></h4>

                            <span>$300</span>
                        </div>
                        <!-- price -->
                    </div>
                    <!-- price-timelime -->

                    <p><a class="btn btn-lg btn-danger" href="/" role="button">Enroll &raquo;</a></p>

                </div>
                <!-- col -->
            </div>
            <!--row -->
        </div>
        <!-- container  -->
    </article>
</section>
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

<!--TESTIMONIALS -->
<section id="kudos">
    <div class="container">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2">
                <h2>Comment Instructors</h2>
                <!-- testimonial -->
                <div class="row testimonial">
                    <div class="col-sm-4">
                        <img src="assets/img/ben.png" alt="ben">
                    </div>
                    <div class="col-sm-8">
                        <blockquote>The First Famous Instructor<cite>&#45;Computer Science</cite></blockquote>
                    </div>
                </div>
                <!-- testimonial end -->

                <!-- testimonial -->
                <div class="row testimonial">
                    <div class="col-sm-4">
                        <img src="assets/img/aj.png" alt="ben">
                    </div>
                    <div class="col-sm-8">
                        <blockquote>The Second Famous Instructor<cite>&#45;Information System</cite></blockquote>
                    </div>
                </div>
                <!-- testimonial end -->

                <!-- testimonial -->
                <div class="row testimonial">
                    <div class="col-sm-4">
                        <img src="assets/img/ben.png" alt="ben">
                    </div>
                    <div class="col-sm-8">
                        <blockquote>The Third Famous Instructor<cite>&#45;Engineering</cite></blockquote>
                    </div>
                </div>
                <!-- testimonial end -->
            </div>
        </div>
    </div>
    <!-- container -->

</section>
<!-- kudos -->

<!--Match SECTION -->
<section id="signup">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3">
                <h2>Are you ready to apply for a <strong>university!</strong></h2>
                <p><a href="inter_match.php" class="btn btn-lg btn-block btn-success">Match University!</a></p>
            </div>
            <!-- col-end -->
        </div>
        <!-- row -->
    </div>
    <!-- container -->
</section>
<!-- match -->


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


<?php include "includes/inter_footer.php"; ?>
