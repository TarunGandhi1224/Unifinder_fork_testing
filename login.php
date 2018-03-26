<?php session_start(); ?>
<?php include "includes/db.php"; ?>
<?php include "includes/header.php"; ?>
    <!--HEADER -->
 <?php include "includes/navigation.php"; ?>
    
<?php

if(isset($_POST['login'])) {
    
$username = $_POST['username'];
$password = $_POST['password'];

$username = mysqli_real_escape_string($connection, $username);
$password = mysqli_real_escape_string($connection, $password);
    
$query = "SELECT * FROM users WHERE username = '{$username}' ";
$select_user_query = mysqli_query($connection, $query);
if(!$select_user_query){
    die("Query Falied".mysqli_error($connection));
}


while($row = mysqli_fetch_array($select_user_query)) {
    
    $db_id = $row['user_id'];
    $db_username = $row['username'];
    $db_user_password = $row['user_password'];
    $db_user_firstname = $row['user_firstname'];
    $db_user_lastname = $row['user_lastname'];
    $db_user_role = $row['user_role'];
    
}
    
$password = crypt($password, $db_user_password);
    
if($username === $db_username && $password === $db_user_password ){
    $_SESSION['username'] = $db_username;
    $_SESSION['firstname'] = $db_user_firstname;
    $_SESSION['lastname'] = $db_user_lastname;
    $_SESSION['user_role'] = $db_user_role;

    header("Location: admin/index.php");

} else {
    header("Location: index.php");
}
    
}


?>


    <!--Login-Form -->

    <section id="LoginForm">
        <div class="container">
            <div class="section-header">
                <img src="assets/img/icon-pad.png" alt="Pad and Pencil">
                <h2>Login</h2>
            </div><!-- section-header -->
            <div class="row">
              <div class="col-sm-6 col-sm-offset-3">
                <div class="form-wrap">
                
                    <form role="form" action="login.php" method="post" id="login-form" autocomplete="off">
                        <div class="form-group">
                            <label for="username" class="sr-only">username</label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Enter Desired Username">
                        </div>
                        <div class="form-group">
                            <label for="password" class="sr-only">Password</label>
                            <input type="password" name="password" id="key" class="form-control" placeholder="Password">
                        </div>
                
                        <input type="submit" name="login" id="btn-login" class="btn btn-lg btn-block btn-success" value="Login">
                        <div class="form-group">
                        <p> </p>   
                        <p><a href="registration.php" class="btn btn-lg btn-block btn-success">Registration</a></p>
                        </div>
                        
                    </form>
                 
                </div>
              </div><!-- col-end --> 
            </div><!-- row -->

        </div><!-- container -->
    </section><!-- Login-Form -->
    
    <section>
        
    </section>

    
<?php include "includes/footer.php"; ?>