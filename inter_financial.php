<?php ob_start();?>
<?php session_start() ;?>
<?php include "includes/db.php"; ?>
<?php include "includes/header.php"; ?>
    <!--HEADER -->
<?php include "includes/inter_navigation.php"; ?>
<?php //====ready for mark=======
if(isset($_SESSION['username'])) {
        $username = $_SESSION['username'];
        
        $query = "SELECT * FROM users WHERE username = '{$username}' ";
        
        $select_user_profile_query = mysqli_query($connection, $query);
        
        while($row = mysqli_fetch_array($select_user_profile_query)) {
            $user_id = $row['user_id'];
        }
    
        
    
        
    }
?>
                
    <!--Feature Image -->
    <section class="feature-image feature-image-default" data-type="background" data-speed="2">
        <h1 class="page-title">Ranking System</h1>
    </section><!-- Feature Image  -->
    
 
    
    <!-- Main Content -->
    <div class="container">
        <div class="row" id="primary">
            <div id="content" class="col-sm-12">
                <section class="main-content">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>University Name</th>
                                <th>University Rank</th>
                                <th>University Rank of Computer Science</th>
                                <th>University Rank of Engineering Electrical and Electronic</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                        <?php 

                        $query_find_rank = "SELECT * FROM universities ORDER BY uni_rank";
                        $select_university_rank = mysqli_query($connection, $query_find_rank);
                        while($row = mysqli_fetch_assoc($select_university_rank)) {
                        $uni_id = $row['uni_id'];
                        $uni_name = $row['uni_name'];
                        $uni_rank = $row['uni_rank'];
                        $uni_rank_cs = $row['uni_rank_cs'];
                        $uni_rank_ee = $row['uni_rank_ee'];
                             
                        if($uni_rank != 0) {
                            echo "<tr>";
                            echo "<td>{$uni_id}</td>";
                            echo "<td>{$uni_name}</td>";
                            echo "<td>{$uni_rank}</td>";
                            echo "<td>{$uni_rank_cs}</td>";
                            echo "<td>{$uni_rank_ee}</td>";
                            
                            $query_mark = "SELECT * FROM university_mark WHERE ";
                            $query_mark .="uni_id={$uni_id} AND user_id={$user_id}";
                            $select_university_mark_query = mysqli_query($connection, $query_mark);
                            $row = mysqli_fetch_assoc($select_university_mark_query);
                            if(!$row) {
                                echo "<td><a href ='inter_financial.php?uni_id={$uni_id}&uni_name={$uni_name}'>mark</a></td>";
                            }
                             
                            echo "</tr>";
                        }
                        
                        }

                        if(isset($_GET['uni_id'])){
                            $the_uni_id = $_GET['uni_id'];
                            $the_uni_name = $_GET['uni_name'];
                            $query = "INSERT INTO university_mark (uni_id, uni_name, user_id) ";
                            $query .="VALUE('{$the_uni_id}','{$the_uni_name}','{$user_id}')";
                            $mark_user_query = mysqli_query($connection, $query);
                        
                        header('Location:inter_financial.php');
                        }
                        ?>
                        <?php
                        

                        ?>
                        

                        </tbody>
                    </table>
                    
                  
                    
                </section><!-- main-content -->
                <section class="main-content">
                    
                    
                  
                    
                </section><!-- main-content -->
                <section class="main-content">
                   
                    
                  
                    
                </section><!-- main-content -->
                
            </div><!-- content -->
        </div><!-- row -->
    </div><!-- container -->
 
    

    

    
        
<?php include "includes/inter_footer.php"; ?>                