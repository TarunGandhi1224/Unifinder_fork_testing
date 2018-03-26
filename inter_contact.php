<?php session_start() ;?>
<?php include "includes/db.php"; ?>
<?php include "includes/header.php"; ?>
    <!--HEADER -->
<?php include "includes/inter_navigation.php"; ?>
                
    <!--Feature Image -->
    <section class="feature-image feature-image-default" data-type="background" data-speed="2">
        <h1 class="page-title">Contact</h1>
    </section><!-- Feature Image  -->
    
 
    
    <!-- Main Content -->
    <div class="container">
        <div class="row" id="primary">
            <div id="content" class="col-sm-12">
                <section class="main-content">
                    <p class="lead">Have any questions about <strong>UNIFINDER</strong>? Feel free to contact us.</p>
                    
                    <form action="" role="form" class="clearfix">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="contack-name" class="sr-only">Name</label>
                                    <input type="text" name="name" class="form-control input-lg" id="contact-name" placeholder="Your name">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="contack-email" class="sr-only">Email</label>
                                    <input type="email" name="email" class="form-control input-lg" id="contact-email" placeholder="Your email">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="contack-words" class="sr-only">Message</label>
                                    <textarea type="text" name="email" class="form-control input-lg" id="contact-words" placeholder="Your message" cols="30" rows="3"></textarea>
                                </div>
                            </div>
                        </div><!-- row -->
                        <input type="submit" name="submit" class="btn btn-info btn-lg success" value="get in touch">
                    </form>
                    
                </section><!-- main-content -->
            </div><!-- content -->
        </div><!-- row -->
    </div><!-- container -->
 
    
    <!--SIGN UP SECTION -->
    <section id="signup" >
        <div class="container">
            <div class="row">
<!--
                <div class="col-sm-6 col-sm-offset-3">
                    <h2>Are you ready to apply for a <strong>university!</strong></h2>
                    <p><a href="registration.php" class="btn btn-lg btn-block btn-success">Sign me up!</a></p>

                </div><!-- col-end -->
            </div><!-- row -->
        </div><!-- container -->
    </section><!-- signup -->

    

    
        
<?php include "includes/inter_footer.php"; ?>                
