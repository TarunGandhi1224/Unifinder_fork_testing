<?php include "includes/db.php"; ?>
<?php include "includes/header.php"; ?>
    <!--HEADER -->
<!--HEADER -->
 <?php include "includes/navigation.php"; ?>
<?php

if(isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email    = $_POST['email'];
    $password = $_POST['password'];
    
    if(!empty($username) && !empty($email) && !empty($password)) {
        
        
        $username = mysqli_real_escape_string($connection, $username);
        $email    = mysqli_real_escape_string($connection, $email);
        $password = mysqli_real_escape_string($connection, $password);

        $query = "SELECT randSalt FROM users ";
        $select_randsalt_query = mysqli_query($connection, $query);
        if(!$select_randsalt_query) {
            die("QUERY FAILED".mysqli_error($connection));
        }

        $row = mysqli_fetch_array($select_randsalt_query);
        
        $salt = $row['randSalt'];
        
        $password = crypt($password, $salt);
        

        $query = "INSERT INTO users (username, user_email, user_password, user_role) ";
        $query .="VALUE('{$username}','{$email}','{$password}','subscriber' )";
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
                <img src="assets/img/icon-pad.png" alt="Pad and Pencil">
                <h2>Registration</h2>
            </div><!-- section-header -->
            <div class="row">
              <div class="col-sm-6 col-sm-offset-3">
                <div class="form-wrap">
                    <form role="form" action="registration.php" method="post" id="login-form" autocomplete="off">
                        <h6 class="text-center"><?php echo $message; ?></h6>
                        <div class="form-group">
                            <label for="username" class="sr-only">username</label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Enter Desired Username&#42;">
                        </div>
                         <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com&#42;">
                        </div>
                         <div class="form-group">
                            <label for="password" class="sr-only">Password</label>
                            <input type="password" name="password" id="key" class="form-control" placeholder="Password&#42;">
                        </div>
                
                        <input type="submit" name="submit" id="btn-login" class="btn btn-lg btn-block btn-success" value="Register">
                    </form>
                 
                </div>
              </div><!-- col-end --> 
            </div><!-- row -->

        </div><!-- container -->
    </section><!-- Login-Form -->
    
    <section>
        
    </section>

    
<?php include "includes/footer.php"; ?>