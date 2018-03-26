<?php include "includes/admin_header.php" ?>
<?php
    
    if(isset($_SESSION['username'])) {
        $username = $_SESSION['username'];
        
        $query = "SELECT * FROM users WHERE username = '{$username}' ";
        
        $select_user_profile_query = mysqli_query($connection, $query);
        
        while($row = mysqli_fetch_array($select_user_profile_query)) {
            $user_id = $row['user_id'];
            $username = $row['username'];
            //$user_password = $row['user_password'];
            $user_firstname = $row['user_firstname'];
            $user_lastname = $row['user_lastname'];
            $user_email = $row['user_email'];
            $user_image = $row['user_image'];
            $user_role = $row['user_role'];
        }
    }

?>

<?php
    if(isset($_POST['update_user'])){
        $user_firstname = $_POST['user_firstname'];
        $user_lastname = $_POST['user_lastname'];
        $user_role = $_POST['user_role'];
        $username = $_POST['username'];
//        $post_image = $_FILES['image']['name'];
//        $post_image_temp = $_FILES['image']['tmp_name'];
        $user_email = $_POST['user_email'];
//        $post_date = date('d-m-y');
//        $post_comment_count =4;
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
        $query .= "user_role = '{$user_role}', ";
        $query .= "username = '{$username}', ";
        $query .= "user_email='{$user_email}' ";
        //$query .= "user_password='{$hashed_password}' ";
        $query .= "WHERE username = '{$username}' ";

        $update_user = mysqli_query($connection, $query);
        confirmQuery($update_user);

    }

?>

<?php 
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


        <div id="wrapper">
            <!-- Navigation -->
            <?php include "includes/admin_navigation.php" ?>

            <div id="page-wrapper">

                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">
                                Welcome Admin
                                <small><?php echo $_SESSION['username'] ?></small>
                            </h1>

                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="post_title">First name</label>
                                    <input type="text" value="<?php echo $user_firstname; ?>" class="form-control" name="user_firstname">
                                </div>

                                <div class="form-group">
                                    <label for="post_title">Last name</label>
                                    <input type="text" value="<?php echo $user_lastname; ?>" class="form-control" name="user_lastname">
                                </div>

                                <div class="form-group">

                                    <select name="user_role" id="">
             <option value="<?php echo $user_role; ?>"><?php echo $user_role; ?></option>  
               <?php
                if($user_role == 'admin') {
                    echo "<option value='suscriber'>suscriber</option>";
                    
                }else {
                    echo "<option value='admin'>admin</option>";
                   // echo "<option value='admin'>admin</option>";
                } 
                ?>
            </select>

                                </div>

                                <div class="form-group">
                                    <label for="post_author">Username</label>
                                    <input type="text" value="<?php echo $username; ?>" class="form-control" name="username">
                                </div>

                                <div class="form-group">
                                    <label for="post_status">Email</label>
                                    <input type="text" value="<?php echo $user_email; ?>" class="form-control" name="user_email">
                                </div>

                                <!--   <div class="form-group">
        <label for="post_image">Post Image</label>
        <input type="file" name="image">
    </div>
 -->


                                <div class="form-group">
                                    <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Reset Password</button>
                                    
                                </div>
                                
                                <div class="row">
                                
                                    <div class="col-sm-2 col-sm-offset-5">
                                        <input class="btn btn-primary" type="submit" class="form-control" name="update_user" value="Update Profile">
                                    </div>
                            </div>
                            </form>

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



                        </div>
                    </div>
                    <!-- /.row -->

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- /#page-wrapper -->

            <?php include "includes/admin_footer.php" ?>
