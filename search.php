<?php include "includes/db.php"; ?>
<?php include "includes/header.php"; ?>
    <!--HEADER -->
 <?php include "includes/navigation.php"; ?>
 <!--Video Section-->


<video poster="localhost:8080/unifinder/assets/video/Pink_Mood_NYC.jpg" id="bgvid" playsinline autoplay muted loop>
  <!-- WCAG general accessibility recommendation is that media such as background video play through only once. Loop turned on for the purposes of illustration; if removed, the end of the video will fade in the same way created by pressing the "Pause" button  -->
<source src="localhost:8080/unifinder/assets/video/london.webm" type="video/webm">
<source src="assets/video/Pink_Mood_NYC.mp4" type="video/mp4">
</video>


<!--Video Section Ends Here-->   
    <!--HERO -->
    <section id="hero" data-type="background" data-speed="10">
        <article>
            <div class="container clearfix">
                <div class="row">
                    <div class="col-sm-5">
                        <img src="assets/img/logo-badge2.png" alt="UniFinder" class="logo">
                    </div><!-- col -->
                    <div class="col-sm-7 hero-text">
                        <h1>UniFinder</h1>            
                        
                        
                        <form action="search.php" method="post">
                            <div class="input-group search-bar">
                                <input  name="search" type="text" class="form-control">
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
 
                        
                        
                    </div><!-- col -->
                </div><!--row -->
            </div><!-- container  -->
        </article>
    </section><!-- HERO  -->
    
    <!-- OPT IN SECTION -->
    <section id="optin">
       <div class="container">
           <div class="row">
               <div class="col-sm-2 col-sm-offset-5">
                   <p class="lead"><strong>University List</strong></p>
               </div><!-- col -->
               
<!--
               <div class="col-sm-4">
                   <button class="btn btn-success btn-lg btn-block" data-toggle="modal" data-target="#myModal">Click here to subscribe</button>
               </div> <!-- col --> 

           </div><!-- row -->
       </div><!-- container -->
    </section><!-- optin -->
    
    <!--Introduction -->
    <section id="list-in-search">
        <div class="container">
            <div class="row">
                        <?php 
                            if(isset($_POST['submit'])) {
                                
                                if(($_POST['uni_state_id'] != "null" && $_POST['uni_city_id']!="null")||$_POST['uni_city_id']!="null"){
                                    $search=$_POST['uni_city_id'];
                                }else if($_POST['uni_state_id'] != "null"){
                                    $search=$_POST['uni_state_id'];
                                }else if($_POST['search']==""||empty($_POST['search'])){
                                    $search ="NULL";
                                    
                                }else{
                                    $search = $_POST['search'];
                                }
                                
                                
                                
                                
                                    
                                
                                $query = "SELECT * FROM universities WHERE uni_tags LIKE '%$search%' ";
                                $search_query = mysqli_query($connection, $query);
                            
                                
                                if(!$search_query) {
                                    die("Query Failed".mysqli_error($connection));
                                }
                                
                                $count = mysqli_num_rows($search_query);
                     
                                if($count == 0){
                                     echo "<h1>No Result!!!</h1>";
                                } else {
                                    
                           while($row = mysqli_fetch_assoc($search_query)) {
                                $uni_name = $row['uni_name'];
                                $uni_intro = $row['uni_intro'];
                                $uni_homepage = $row['uni_homepage'];
                                $uni_date = $row['uni_date'];
                                
                    
            ?>
                <h1 class="page-header">
                    <?php echo $uni_name; ?>
                    <small><?php echo $uni_name; ?></small>
                </h1>

                <!-- First Blog Post -->
                <h2>
                    <a href="#"><?php echo $uni_name; ?></a>
                </h2>
                <p>Website: <?php echo $uni_homepage?></p>
                <p><span class="glyphicon glyphicon-time"></span><?php echo $uni_date?></p>
                <hr>
<!--                <img class="img-responsive" src="images/<?php echo $post_image; ?>" alt="">-->
                <hr>
                <p><?php echo $uni_intro?></p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>
                     
<?php         
                            }
                   
                     
                        }         
                      }      
                       ?>
                 
            </div><!-- row  -->
        </div><!-- container -->
    </section><!-- Introduction -->
    
 
    
        
<?php include "includes/footer.php"; ?>                
