<?php include "includes/db.php"; ?>
<?php include "includes/header.php"; ?>
<!--HEADER -->
<!--HEADER -->
<?php include "includes/navigation.php"; ?>
<?php

if(isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email    = $_POST['email'];
    $address = $_POST['address'];
    $credit_card = $_POST['credit_card'];
    $user_role = $_POST['user_role'];
    
    
    if(!empty($username) && !empty($password) && !empty($firstname) && !empty($lastname) && !empty($email) && !empty($address) && !empty($credit_card)) {
        
        
        $username = mysqli_real_escape_string($connection, $username);
        $password = mysqli_real_escape_string($connection, $password);
        $firstname = mysqli_real_escape_string($connection, $firstname);
        $lastname = mysqli_real_escape_string($connection, $lastname);
        $email    = mysqli_real_escape_string($connection, $email);
        $address = mysqli_real_escape_string($connection, $address);
        $credit_card = mysqli_real_escape_string($connection, $credit_card);
        

        $query = "SELECT randSalt FROM users_ad ";
        $select_randsalt_query = mysqli_query($connection, $query);
        if(!$select_randsalt_query) {
            die("QUERY FAILED".mysqli_error($connection));
        }

        $row = mysqli_fetch_array($select_randsalt_query);
        
        $salt = $row['randSalt'];
        
        $password = crypt($password, $salt);
        

        $query = "INSERT INTO users_ad (username, user_password, user_firstname, user_lastname, user_email, user_address, user_credit_card, user_role) ";
        $query .="VALUE('{$username}','{$password}','{$firstname}','{$lastname}','{$email}','{$address}','{$credit_card}','{$user_role}' )";
        $register_user_query = mysqli_query($connection, $query);
        if(!$register_user_query) {
            die("QUERY FAILED". mysqli_error($connection) . ' ' . mysqli_errno($connection));
        }  
        
        $message = "Your Registeration has been submitted";
        
    } else {
        
        $message = "Fields cannot be empty!";
    }
    
    

    
} else {
    
    $message="";
}








?>



    <!--Login-Form -->
    <section id="LoginForm">
        <div class="container">
            <div class="section-header">
                <h2 class="text-center"><i class="fa fa-lock"></i> Advertiser / Advisor</h2>
            </div>
            <!-- section-header -->
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3">
                    <div class="form-wrap">
                        <form role="form" action="registration_Advertise_Advisor.php" method="post" id="login-form" autocomplete="off">
                            <h6 class="text-center">
                                <?php echo $message; ?>
                            </h6>

                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                                    <input type="text" name="username" class="form-control" placeholder="Username" />
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                                    <input type="password" name="password" class="form-control" placeholder="Password" />
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span>
                                    </span>
                                    <input type="text" name="firstname" class="form-control" placeholder="First Name" />
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                                    <input type="text" name="lastname" class="form-control" placeholder="Last Name" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
                                    <input type="text" name="email" class="form-control" placeholder="Email" />
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-home"></span></span>
                                    <input type="text" name="address" class="form-control" placeholder="Address" />
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-credit-card"></span></span>
                                    <input type="text" name="credit_card" class="form-control" placeholder="Credit card" />
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="input-group">
                                    <select name="user_role" id="">
                                      <option value="advisor">advisor</option>
                                      <option value="advertiser">advertiser</option>
                                     </select>
                                </div>
                            </div>

                            <input type="submit" name="submit" id="btn-login" class="btn btn-lg btn-block btn-success" value="Register">
                        </form>

                    </div>
                </div>
                <!-- col-end -->
            </div>
            <!-- row -->

        </div>
        <!-- container -->
    </section>
    <!-- Login-Form -->

    <section>

    </section>


    <?php include "includes/footer.php"; ?>
