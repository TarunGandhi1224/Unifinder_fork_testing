<?php session_start() ;?>
<?php include "includes/db.php"; ?>
<?php include "includes/header.php"; ?>
<?php include "includes/inter_navigation.php"; ?>

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



<!--HERO -->
<section id="hero" data-type="background" data-speed="10">
    <article>
        <div class="container clearfix">
            <div class="row">

                <div class="col-sm-8 col-sm-offset-2 hero-text">
                    <h1>UniFinder</h1>


                    <form action="" method="post">
                        <div class="form-group">
                            <input name="search" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <button name="search-bar" class="btn btn-lg btn-block btn-success match-button" type="submit">Search</button>
                        </div>
                    </form>
                
                    <!-- price-timelime -->



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
            <div class="col-sm-2 col-sm-offset-5">
                <p class="lead"><strong>Match</strong></p>
            </div>
            <!-- col -->

            <!--
               <div class="col-sm-4">
                   <button class="btn btn-success btn-lg btn-block" data-toggle="modal" data-target="#myModal">Click here to subscribe</button>
               </div> <!-- col -->

        </div>
        <!-- row -->
    </div>
    <!-- container -->
</section>
<!-- optin -->


<!--Match form -->
<section id="boost-income">
    <div class="container">
        <div id="content">
            <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
        <li class="active"><a href="#match1" data-toggle="tab">Match</a></li>
        
        <li><a href="#match2" data-toggle="tab">Match by my profile</a></li>
        <li><a href="#search" data-toggle="tab">Search</a></li>
       
    </ul>
    <div id="my-tab-content" class="tab-content">
       
        <!-- ==================== Match 1 ============================= -->
        <div class="tab-pane active" id="match1">
            <h3>Match Form Primary</h3>
            <p>hint: select by option and input box.</p>
            <div class="row">
<!-- =========================== Match form  ============================== -->
            <div class="col-sm-6">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="university_state_id">University State Id</label>
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
                                echo "<option value='$state_id'>{$state_short_name}</option>";
                            }

                        ?>

                        </select>

                    </div>

                    <div class="form-group">
                        <label for="university_city_id">University City Id</label>
                        <select name="uni_city_id" id="">
                        <option value="null">Select City</option>
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

                    <!--
                    <div class="form-group">
                        <label for="university_homepage">University Homepage</label>
                        <input type="text" class="form-control" name="uni_homepage">
                    </div>
-->

                    <div class="form-group">
                        <label for="university_requied_gpa">University Requied Gpa</label>
                        <input type="text" class="form-control" name="uni_gpa">
                    </div>

                    <div class="form-group">
                        <label for="university_requied_toefl">University Requied Toefl</label>
                        <input type="text" class="form-control" name="uni_toefl">
                    </div>
                    
                    <div class="form-group">

                        <input class="btn btn-primary" type="submit" class="form-control" name="match_university" value="Match">
                    </div>
                </form>
            </div> 
            </div>
        </div>
        <!-- ======== End Match 1 ========== -->
        
        <!-- ======== Match 2 ======   ==== -->
        <div class="tab-pane" id="match2">
            <h3>Match By Profile</h3>
            <p>Match by profile please</p>
            <!--  Match form with data  -->
            <div class="col-sm-6">
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
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="university_state_id">University State Id</label>
                        <select name="uni_state_id" id="">
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

                    <div class="form-group">
                        <label for="university_city_id">University City Id</label>
                        <select name="uni_city_id" id="">
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

                    <!--
                    <div class="form-group">
                        <label for="university_homepage">University Homepage</label>
                        <input type="text" class="form-control" name="uni_homepage">
                    </div>
-->

                   <div class="form-group">
                            <label for="user_gpa">My Gpa</label>
                            <input type="text" value="<?php echo $user_gpa; ?>" class="form-control" name="uni_gpa">
                        </div>

                        <div class="form-group">
                            <label for="user_toefl">My Toefl</label>
                            <input type="text" value="<?php echo $user_toefl; ?>" class="form-control" name="uni_toefl">
                        </div>



                    <div class="form-group">

                        <input class="btn btn-primary" type="submit" class="form-control" name="match_university" value="Match">
                    </div>
                </form>
            </div>
        </div>
        <!-- ======== End Match 2 ========== -->
     <!-- ======== Search ========== -->
           <div class="tab-pane" id="search">
            <h3>Search</h3>
            <p>hint: This is a search bar. Please try it!</p>
                <form action="" method="post">
                    <div class="form-group">
                        <input name="search" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <button name="search-bar" class="btn btn-lg btn-success match-button" type="submit">Search</button>
                    </div>
                </form>
        </div>
     <!-- ===========End Search ========== -->
    </div><!-- tab content --> 
        </div><!-- content -->
       
       
       
       
       

    </div>
    <!-- container -->
</section>
<!-- Introduction -->



<!-- List -->
<section id="who-benefits">
    <div class="container">
        <div class="section-header">
            <img src="assets/img/icon-pad.png" alt="Pad and Pencil">
            <h2>List of Search</h2>
        </div>
        <!-- section-header -->


        <div class="row">
            <div class="col-sm-8 col-sm-offset-2">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>University Name</th>
                            <th>University State Id</th>
                            <th>University City Id</th>
                            <th>University Image</th>
                            <th>University Homepage</th>
                            <th>University Requied Gpa</th>
                            <th>University Requied Toefl</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php  //===================Search for Search bar====================
if(isset($_POST['search-bar'])) {
    $search = $_POST['search'];
    
    if($search == "") {
        $search = "empty";
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
        $uni_id = $row['uni_id'];
        $uni_name = $row['uni_name'];
        $uni_state_id = $row['uni_state_id'];
        $uni_city_id = $row['uni_city_id'];
        $uni_homepage = $row['uni_homepage'];
        $uni_image = $row['uni_image'];
        $uni_gpa = $row['uni_gpa'];
        $uni_toefl = $row['uni_toefl'];
        $uni_date = $row['uni_date'];



        echo "<tr>";
        echo "<td>{$uni_id}</td>";
        echo "<td>{$uni_name}</td>";
        echo "<td>{$uni_state_id}</td>";
        echo "<td>{$uni_city_id}</td>";
        echo "<td><img width=100 src='images/{$uni_image}' alt='image'></td>";
        echo "<td>{$uni_homepage}</td>";
        echo "<td>{$uni_gpa}</td>";
        echo "<td>{$uni_toefl}</td>";
        echo "</tr>";
        }
    }
}

?>



                        <?php  //================Search For Match===============

if(isset($_POST['match_university'])){
    $match_uni_gpa = $_POST['uni_gpa'];
    $match_uni_toefl = $_POST['uni_toefl'];
    $match_uni_city_id = $_POST['uni_city_id'];
    $match_uni_state_id = $_POST['uni_state_id'];

    if($match_uni_city_id !="null" && $match_uni_state_id !="null"){
        $filter1 = "AND";
        $filter2 = "AND";
    } else if($match_uni_city_id =="null" && $match_uni_state_id =="null"){
            $filter1 = "OR";
            $filter2 = "OR";
      } else{
            $filter1 = "OR";
            $filter2 = "AND";
        }

    if($match_uni_gpa =="" || empty($match_uni_gpa)){
        $match_uni_gpa = 5;
    }
    
    if($match_uni_toefl =="" || empty($match_uni_toefl)){
        $match_uni_toefl = 120;
    }

    if($match_uni_gpa == 5 && $match_uni_toefl == 120){
        $filter2 = "AND";
    }



    $query = "SELECT * FROM universities WHERE uni_gpa <= $match_uni_gpa AND uni_toefl <= $match_uni_toefl $filter2 (uni_city_id = $match_uni_city_id $filter1 uni_state_id = $match_uni_state_id)";

    $select_universities = mysqli_query($connection, $query);

    if(!$select_universities) {
        die("Query Failed".mysqli_error($connection));
    }

    $count = mysqli_num_rows($select_universities);

    if($count == 0){
        echo "<h1>No Result!!!</h1>";
    } else {
        while($row = mysqli_fetch_assoc($select_universities)) {
        $uni_id = $row['uni_id'];
        $uni_name = $row['uni_name'];
        $uni_state_id = $row['uni_state_id'];
        $uni_city_id = $row['uni_city_id'];
        $uni_homepage = $row['uni_homepage'];
        $uni_image = $row['uni_image'];
        $uni_gpa = $row['uni_gpa'];
        $uni_toefl = $row['uni_toefl'];
        $uni_date = $row['uni_date'];



        echo "<tr>";
        echo "<td>{$uni_id}</td>";
        echo "<td>{$uni_name}</td>";
        echo "<td>{$uni_state_id}</td>";
        echo "<td>{$uni_city_id}</td>";
        echo "<td><img width=100 src='images/{$uni_image}' alt='image'></td>";
        echo "<td>{$uni_homepage}</td>";
        echo "<td>{$uni_gpa}</td>";
        echo "<td>{$uni_toefl}</td>";
        echo "</tr>";
        }
    }    
//    if($count != 0){
//        echo "For you, You Gpa is $match_uni_gpa, Toefl is $match_uni_toefl, State is $match_uni_state_id and City is $match_uni_city_id"; 
//    }
}

?>
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
            $uni_id = $row['uni_id'];
            $uni_name = $row['uni_name'];
            $uni_state_id = $row['uni_state_id'];
            $uni_city_id = $row['uni_city_id'];
            $uni_homepage = $row['uni_homepage'];
            $uni_image = $row['uni_image'];
            $uni_gpa = $row['uni_gpa'];
            $uni_toefl = $row['uni_toefl'];
            $uni_date = $row['uni_date'];



            echo "<tr>";
            echo "<td>{$uni_id}</td>";
            echo "<td>{$uni_name}</td>";
            echo "<td>{$uni_state_id}</td>";
            echo "<td>{$uni_city_id}</td>";
            echo "<td><img width=100 src='images/{$uni_image}' alt='image'></td>";
            echo "<td>{$uni_homepage}</td>";
            echo "<td>{$uni_gpa}</td>";
            echo "<td>{$uni_toefl}</td>";
            echo "</tr>";
            
        

    }


    }         
} 
?>
                        <!--
                               <tr>
                                <td>10</td>
                                <td>Author</td>
                                <td>Bootstrap</td>
                                <td>Bootstrap2</td>
                                <td>issue</td>
                                <td>Image</td>
                                <td>BooBOo</td>
                                <td>Fuck that</td>
                                <td>Date</td>
                            </tr>
-->

                    </tbody>
                </table>

            </div>
            <!-- col -->
        </div>
        <!-- row -->
    </div>
    <!-- container -->

</section>
<!-- who-benefits -->



<?php include "includes/inter_footer.php"; ?>
