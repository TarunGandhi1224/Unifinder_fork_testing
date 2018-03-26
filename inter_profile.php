<?php session_start() ;?>
<?php include "includes/db.php"; ?>
<?php include "includes/header.php"; ?>

<?php //==================Get data from database ================
    
    if(isset($_SESSION['username'])) {
        $username = $_SESSION['username'];
        
        $query = "SELECT * FROM users WHERE username = '{$username}' ";
        
        $select_user_profile_query = mysqli_query($connection, $query);
        
        while($row = mysqli_fetch_array($select_user_profile_query)) {
            $user_id = $row['user_id'];
            $username = $row['username'];
            $user_password = $row['user_password'];
            $user_firstname = $row['user_firstname'];
            $user_lastname = $row['user_lastname'];
            $user_gpa = $row['user_gpa'];
            $user_toefl = $row['user_toefl'];
            $user_city = $row['user_city'];
            $user_state = $row['user_state'];
            $user_email = $row['user_email'];
            $user_image = $row['user_image'];
            $user_role = $row['user_role'];
        }
        
        if($user_city == 0 || $user_state == 0){
            $user_state_short_name="null";
            $user_city_name = "null";
         }else {
            $query = "SELECT * FROM states WHERE state_id = '{$user_state}' ";
            $select_user_state_query = mysqli_query($connection, $query);

            while($row = mysqli_fetch_assoc($select_user_state_query)){
               $user_state_short_name = $row['state_short_name'];
            }
        
            $query = "SELECT * FROM cities WHERE city_id = '{$user_city}' ";
            $select_user_city_query = mysqli_query($connection, $query);

            while($row = mysqli_fetch_assoc($select_user_city_query)){
               $user_city_name = $row['city_name'];
            }
        
        }
        

    }
   
?>

<?php //=============Update Profile==============
    if(isset($_POST['update_user'])){
        $user_firstname = $_POST['user_firstname'];
        $user_lastname = $_POST['user_lastname'];
        $username = $_POST['username'];
        $user_state = $_POST['user_state_id'];
        $user_city = $_POST['user_city_id'];
        $user_gpa = $_POST['user_gpa'];
        $user_toefl = $_POST['user_toefl'];
        $user_email = $_POST['user_email'];
        
//        $post_date = date('d-m-y');
//        $post_image = $_FILES['image']['name'];
//        $post_image_temp = $_FILES['image']['tmp_name'];
//        move_uploaded_file($post_image_temp,"../images/$post_image");

//
//if(empty($post_image)) {
//    $query = "SELECT * FROM posts WHERE post_id = $edit_post_id ";
//    $select_image = mysqli_query($connection, $query);
//    while($row = mysqli_fetch_array($select_image)) {
//        $post_image = $row['post_image'];
//    }
//}
//
        $query = "UPDATE users SET ";
        $query .= "user_firstname = '{$user_firstname}', ";
        $query .= "user_lastname = '{$user_lastname}', ";
        $query .= "username = '{$username}', ";
        $query .= "user_state = '{$user_state}', ";
        $query .= "user_city = '{$user_city}', ";
        $query .= "user_gpa = '{$user_gpa}', ";
        $query .= "user_toefl = '{$user_toefl}', ";
        $query .= "user_email='{$user_email}' ";
        $query .= "WHERE username = '{$username}' ";

        $update_user = mysqli_query($connection, $query);
        confirmQuery($update_user);
        header("Location: inter_profile.php");

}

?>

<?php   //=============Reset Password==============
    if(isset($_POST['reset'])){
        $user_password = $_POST['user_password'];
        $query = "SELECT randSalt FROM users ";
        $select_randsalt_query = mysqli_query($connection, $query);
        if(!$select_randsalt_query) {
        die("QUERY FAILED".mysqli_error($connection));
        }
        $row = mysqli_fetch_array($select_randsalt_query);
        $salt = $row['randSalt'];
        $hashed_password = crypt($user_password, $salt);
        $query = "UPDATE users SET ";
        $query .= "user_password='{$hashed_password}' ";
        $query .= "WHERE username = '{$username}' ";

        $update_user = mysqli_query($connection, $query);
        confirmQuery($update_user);
    }



?>



<!--HEADER -->
<?php include "includes/inter_navigation.php"; ?>

<!--Feature Image -->
<section class="feature-image feature-image-default" data-type="background" data-speed="2">
    <h1 class="page-title">Profile</h1>
</section>
<!-- Feature Image  -->



<!-- Main Content -->
<div class="container">
    <!-------->
    <div id="content">
        <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
            <li class="active"><a href="#view_profile" data-toggle="tab">My Profile</a></li>
            <li><a href="#change_profile" data-toggle="tab">Change Profile</a></li>

        </ul>
        <div id="my-tab-content" class="tab-content">
            <div class="tab-pane active" id="view_profile">
                <h1>My Profile</h1>
                <p>Please Check Your Profile</p>
                <!-- Image  -->
                <div class='col-sm-4 col-xs-6 col-md-3 col-lg-3'>
                    <a class="thumbnail fancybox" rel="ligthbox" href="images/image-sample.jpg">
                    <img width="256" height="256" class="img-responsive" alt="" src="images/image-sample.jpg" />
                    <div class='text-right'>
                        <small class='text-muted'>Image Title</small>
                    </div> <!-- text-right / end -->
                </a>
                </div>
                <!-- col-6 / end -->
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Your FirstName</th>
                            <th>Your LastName</th>
                            <th>Your State</th>
                            <th>Your City</th>
                            <th>Your Gpa</th>
                            <th>Your Toefl</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            echo "<tr>";
                            echo "<td>{$user_firstname}</td>";
                            echo "<td>{$user_lastname}</td>";
                            echo "<td>{$user_state_short_name}</td>";
                            echo "<td>{$user_city_name}</td>";
                            echo "<td>{$user_gpa}</td>";
                            echo "<td>{$user_toefl}</td>";

                            echo "</tr>";


                            ?>
                    </tbody>
                </table>
                
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>My favorite unicersity</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        //====Find university mark for user=====
                        $query_mark = "SELECT * FROM university_mark WHERE user_id = '{$user_id}' ";
                        $select_university_mark_query = mysqli_query($connection, $query_mark);
                        while($row = mysqli_fetch_array($select_university_mark_query)) {
                            $uni_id = $row['uni_id'];
                            $uni_name = $row['uni_name'];
                            $user_id = $row['user_id'];
                            echo "<tr>";
                            echo "<td>{$uni_name}</td>";
                            echo "<td><a href ='inter_profile.php?delete={$uni_id}'>Delete</a></td>";
                            echo "</tr>";
                        }
                        
                        if(isset($_GET['delete'])){
                            $the_uni_id = $_GET['delete'];
                            $query = "DELETE FROM university_mark WHERE ";
                            $query .="uni_id={$the_uni_id} AND user_id={$user_id}";
                            $delete_query = mysqli_query($connection, $query);
                            header('Location: inter_profile.php');
                        }



                            ?>
                    </tbody>
                </table>
            </div>
            <div class="tab-pane" id="change_profile">

                <div class="row">
                    <section>
                        <div class="wizard">
                            <div class="wizard-inner">
                                <div class="connecting-line"></div>
                                <ul class="nav nav-tabs" role="tablist">

                                    <li role="presentation" class="active">
                                        <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="Step 1">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-folder-open"></i>
                            </span>
                        </a>
                                    </li>

                                    <li role="presentation" class="disabled">
                                        <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="Step 2">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-pencil"></i>
                            </span>
                        </a>
                                    </li>
                                    <li role="presentation" class="disabled">
                                        <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab" title="Step 3">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-picture"></i>
                            </span>
                        </a>
                                    </li>

                                    <li role="presentation" class="disabled">
                                        <a href="#complete" data-toggle="tab" aria-controls="complete" role="tab" title="Complete">
                            <span class="round-tab">
                                <i class="glyphicon glyphicon-ok"></i>
                            </span>
                        </a>
                                    </li>
                                </ul>
                            </div>

                            <form action="" method="post" role="form" enctype="multipart/form-data">
                                <div class="tab-content">
                                    <div class="tab-pane active" role="tabpanel" id="step1">
                                        <h3>Step 1</h3>
                                        <p>Please tap your name</p>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="user_firstname">First Name</label>
                                                <input type="text" value="<?php echo $user_firstname; ?>" class="form-control" name="user_firstname">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="user_lastname">Last Name</label>
                                                <input type="text" value="<?php echo $user_lastname; ?>" class="form-control" name="user_lastname">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="post_author">Username</label>
                                                <input type="text" value="<?php echo $username; ?>" class="form-control" name="username">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="post_status">Email</label>
                                                <input type="text" value="<?php echo $user_email; ?>" class="form-control" name="user_email">
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="form-group">
                                            <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Reset Password</button>

                                        </div>
                                        <hr>
                                        <div class="col-sm-12">
                                            <ul class="list-inline pull-right">
                                                <li><button type="button" class="btn btn-primary next-step">Save and continue</button></li>
                                            </ul>
                                        </div>



                                    </div>
                                    <div class="tab-pane" role="tabpanel" id="step2">
                                        <h3>Step 2</h3>
                                        <p>Basic Information</p>
                                        <div class="row mar_ned">

                                        </div>
                                        <div class="row mar_ned">
                                            <div class="col-md-4 col-xs-3">
                                                <p align="right">
                                                    <stong>Your State</stong>
                                                </p>
                                            </div>
                                            <div class="col-md-8 col-xs-9">
                                                <div class="row">
                                                    <div class="col-md-4 col-xs-4 wdth">
                                                        <select name="user_state_id" id="">
                        
                                            <?php echo "<option value='$user_state'>{$user_state_short_name}</option>;" ?>
                                            <?php
                                            $query = "SELECT * FROM states";
                                            $select_states = mysqli_query($connection,$query);

                                            //confirmQuery($select_states);

                                            while($row = mysqli_fetch_assoc($select_states)) {
                                            $state_id = $row['state_id'];
                                            $state_name = $row['state_name'];
                                            $state_short_name = $row['state_short_name'];
                                            echo "<option value='$state_id'>{$state_short_name}</option>";
                                            }

                                            ?>

                                            </select>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mar_ned">
                                            <div class="col-md-4 col-xs-3">
                                                <p align="right">
                                                    <stong>Your City</stong>
                                                </p>
                                            </div>
                                            <div class="col-md-8 col-xs-9">
                                                <div class="row">
                                                    <div class="col-md-4 col-xs-4 wdth">
                                                        <select name="user_city_id" id="">
                                            <?php echo "<option value='$user_city'>{$user_city_name}</option>;" ?>
                                            <?php
                                                $query = "SELECT * FROM cities";
                                                $select_cities = mysqli_query($connection,$query);

                                                //confirmQuery($select_cities);

                                                while($row = mysqli_fetch_assoc($select_cities)) {
                                                    $city_id = $row['city_id'];
                                                    $city_name = $row['city_name'];
                                                    echo "<option value='$city_id'>{$city_name}</option>";
                                                }

                                            ?>

                                            </select>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mar_ned">
                                            <div class="col-md-4 col-xs-3">
                                                <p align="right">
                                                    <stong>Major</stong>
                                                </p>
                                            </div>
                                            <div class="col-md-8 col-xs-9">
                                                <select name="Major" id="" class="dropselectsec">
                                        <option value="">Select Your Major</option>
                                        <option value="1">Computer Science</option>
                                        <option value="2">Information System</option>
                                        <option value="3">Child Education</option>
                                        <option value="4">Finace-Invesment Manager</option>
                                    </select>
                                            </div>
                                        </div>
                                        <div class="row mar_ned">
                                            <div class="col-md-4 col-xs-3">
                                                <p align="right">
                                                    <stong>Education</stong>
                                                </p>
                                            </div>
                                            <div class="col-md-8 col-xs-9">
                                                <select name="Major" id="" class="dropselectsec">
                                        <option value=""> Select Education</option>
                                        <option value="1">Ph.D</option>
                                        <option value="2">Masters Degree</option>
                                        <option value="3">PG Diploma</option>
                                        <option value="4">Bachelors Degree</option>
                                        <option value="5">Diploma</option>
                                        <option value="6">Intermediate / (10+2)</option>
                                        <option value="7">Secondary</option>
                                        <option value="8">Others</option>
                                    </select>
                                            </div>
                                        </div>
                                        <div class="row mar_ned">
                                            <div class="col-md-4 col-xs-3">
                                                <p align="right">
                                                    <stong>GPA</stong>
                                                </p>
                                            </div>
                                            <div class="col-md-8 col-xs-9">
                                                <select name="user_gpa" id="" class="GPAdrop">
                                        <?php echo "<option value='$user_gpa'>{$user_gpa}</option>;" ?>
                                        <option value="3.0">3.0</option>
                                        <option value="3.1">3.1</option>
                                        <option value="3.2">3.2</option>
                                        <option value="3.3">3.3</option>
                                        <option value="3.4">3.4</option>
                                        <option value="3.5">3.5</option>
                                        <option value="3.6">3.6</option>
                                        <option value="3.7">3.7</option>
                                        <option value="3.8">3.8</option>
                                        <option value="3.9">3.9</option>
                                        <option value="4.0">4.0</option>
                                        
                                    </select>
                                            </div>
                                        </div>
                                        <div class="row mar_ned">
                                            <div class="col-md-4 col-xs-3">
                                                <p align="right">
                                                    <stong>Toefl</stong>
                                                </p>
                                            </div>
                                            <div class="col-md-8 col-xs-9">
                                                <div class="row">
                                                    <div class="col-md-6 col-xs-6 wdth">
                                                        <input type="text" value="<?php echo $user_toefl; ?>" class="form-control" name="user_toefl">
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        <ul class="list-inline pull-right">
                                            <li><button type="button" class="btn btn-default prev-step">Previous</button></li>
                                            <li><button type="button" class="btn btn-primary next-step">Save and continue</button></li>
                                        </ul>
                                    </div>
                                    <div class="tab-pane" role="tabpanel" id="step3">
                                        <h3>Image</h3>
                                        <p><strong>Upload Your Personal Image</strong></p>
                                            <div class="form-group">
                                                <input type="file" name="image">
                                            </div>
                                        <ul class="list-inline pull-right">
                                            <li><button type="button" class="btn btn-default prev-step">Previous</button></li>
                                            <li><button type="button" class="btn btn-default next-step">Skip</button></li>
                                            <li><button type="button" class="btn btn-primary btn-info-full next-step">Save and continue</button></li>
                                        </ul>
                                    </div>
                                    <div class="tab-pane" role="tabpanel" id="complete">
                                        <h3>Complete</h3>
                                        <p>You have successfully completed all steps.</p>
                                        <ul class="list-inline pull-right">
                                            <li><button name="update_user" type="submit" class="btn btn-primary btn-info-full next-step">Update My Profile</button></li>
                                        </ul>
                                    </div>

                                    <div class="clearfix"></div>
                                </div>
                            </form>
                        </div>
                    </section>
                </div>
            </div>
            <!-- Orange -->

        </div>
        <!-- tab-contant -->
    </div>
    <!-- Content -->

</div>
<!-- container -->

<!-- ===============================Reset Password =============================== -->


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">Reset Password</h4>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="post_tags">Password</label>
                        <input type="password" value="" class="form-control" name="user_password">
                    </div>
                    <button name="reset" type="submit" class="btn btn-primary">Reset</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- ===============================Reset Password =============================== -->


<!--SIGN UP SECTION -->
<section id="signup">
    <div class="container">
        <div class="row">
            <!--
                <div class="col-sm-6 col-sm-offset-3">
                    <h2>Are you ready to apply for a <strong>university!</strong></h2>
                    <p><a href="registration.php" class="btn btn-lg btn-block btn-success">Sign me up!</a></p>

                </div><!-- col-end -->
        </div>
        <!-- row -->
    </div>
    <!-- container -->
</section>
<!-- signup -->





<?php include "includes/inter_footer.php"; ?>
