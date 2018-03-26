

                    <div class="col-xs-6">
                        <!-- Add Category Section -->

<?php //add function
if(isset($_POST['submit'])){
$city_name = $_POST['city_name'];
$city_state_id = $_POST['city_state_id'];
if($city_name == "" || empty($city_name) || $city_state_id == "" || empty($city_state_id)){
echo "The field should not be empty!";
} else {
$query = "INSERT INTO cities(city_name,city_state_id) ";
$query .="VALUE('$city_name','$city_state_id')";
$create_city_query = mysqli_query($connection, $query);
if(!$create_city_query){
die('Query Failed' . mysqli_error($connection));
}
}
}

?>

                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="city_name">Add City</label>
                                    <input type="text" class="form-control" name="city_name">
                                </div>
                                <div class="form-group">
                                    <label for="state_short_name">Select State Id</label>
                                    <select name="city_state_id" id="">
<?php
$query = "SELECT * FROM states";
$select_states = mysqli_query($connection,$query);

confirmQuery($select_states);

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
                                    <input class="btn btn-primary" type="submit" name="submit" value="Add value">
                                </div>
                            </form>

                            <!-- Edit Category Section -->
                            <?php
                            if(isset($_GET['edit']))
                            {
                                $the_city_id = $_GET['edit'];
                                include "includes/update_cities.php";
                                
                            }
                            
                            
                            ?>
                            
                    </div>

                    <!-- Table Section -->
                    <div class="col-xs-6">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>City</th>
                                    <th>State</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 

$query = "SELECT * FROM cities";
$select_cities = mysqli_query($connection, $query);
while($row = mysqli_fetch_assoc($select_cities)) {
$city_id = $row['city_id'];
$city_name = $row['city_name'];
$city_state_id = $row['city_state_id'];




echo "<tr>";
echo "<td>{$city_id}</td>";
echo "<td>{$city_name}</td>";
echo "<td>{$city_state_id}</td>";
echo "<td><a href ='location.php?source=city&edit={$city_id}'>Edit</a></td>";
echo "<td><a href ='location.php?source=city&delete={$city_id}'>Delete</a></td>";

// echo "<td><a href ='categories.php?delete={$cat_id}'>Delete</a></td>";
//  echo "<td><a href ='categories.php?edit={$cat_id}'>Edit</a></td>";
echo "</tr>";
}


?>
<?php
if(isset($_GET['delete'])){
$the_city_id = $_GET['delete'];
$query = "DELETE FROM cities WHERE ";
$query .="city_id={$the_city_id}";
$delete_query = mysqli_query($connection, $query);
header('Location: location.php?source=city');
}

?>
                            </tbody>
                        </table>
                    </div>
               