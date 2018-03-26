

                    <div class="col-xs-6">
                        <!-- Add Category Section -->

<?php //add function
if(isset($_POST['submit'])){
$state_name = $_POST['state_name'];
$state_short_name = $_POST['state_short_name'];
if($state_name == "" || empty($state_name) || $state_short_name == "" || empty($state_short_name)){
echo "The field should not be empty!";
} else {
$query = "INSERT INTO states(state_name,state_short_name) ";
$query .="VALUE('$state_name','$state_short_name')";
$create_state_query = mysqli_query($connection, $query);
if(!$create_state_query){
die('Query Failed' . mysqli_error($connection));
}
}
}

?>

                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="state_name">Add State</label>
                                    <input type="text" class="form-control" name="state_name">
                                    <label for="state_short_name">Add Short State</label>
                                    <input type="text" class="form-control" name="state_short_name">
                                </div>
                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" name="submit" value="Add value">
                                </div>
                            </form>

                            <!-- Edit Category Section -->
                            <?php
                            if(isset($_GET['edit']))
                            {
                                $the_state_id = $_GET['edit'];
                                include "includes/update_states.php";
                                
                            }
                            
                            
                            ?>
                            
                    </div>

                    <!-- Table Section -->
                    <div class="col-xs-6">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>State Name</th>
                                    <th>State Short Name</th>
                                </tr>
                            </thead>
                            <tbody>
<?php 

$query = "SELECT * FROM states";
$select_states = mysqli_query($connection, $query);
while($row = mysqli_fetch_assoc($select_states)) {
$state_id = $row['state_id'];
$state_name = $row['state_name'];
$state_short_name = $row['state_short_name'];




echo "<tr>";
echo "<td>{$state_id}</td>";
echo "<td>{$state_name}</td>";
echo "<td>{$state_short_name}</td>";
echo "<td><a href ='location.php?edit={$state_id}'>Edit</a></td>";
echo "<td><a href ='location.php?delete={$state_id}'>Delete</a></td>";

// echo "<td><a href ='categories.php?delete={$cat_id}'>Delete</a></td>";
//  echo "<td><a href ='categories.php?edit={$cat_id}'>Edit</a></td>";
echo "</tr>";
}


?>
<?php
if(isset($_GET['delete'])){
$the_state_id = $_GET['delete'];
$query = "DELETE FROM states WHERE ";
$query .="state_id={$the_state_id}";
$delete_query = mysqli_query($connection, $query);
header('Location: location.php');
}

?>

                            </tbody>
                        </table>
                    </div>

