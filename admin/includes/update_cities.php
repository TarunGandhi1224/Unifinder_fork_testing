<form action="" method="post">
    <div class="form-group">
        <label for="city_name">Edit City Name</label>
        <?php //update section 
                           if(isset($_GET['edit'])){
                            $edit_city_id = $_GET['edit'];
                            $query = "SELECT * FROM cities WHERE city_id = {$edit_city_id}";
                            $select_city_edit = mysqli_query($connection, $query);
                            while($row = mysqli_fetch_assoc($select_city_edit)) {
                            
                            $city_id = $row['city_id'];
                            $city_name = $row['city_name'];
                            $city_state_id = $row['city_state_id'];
                            
                            ?>
       <input value="<?php if(isset($city_name)){echo $city_name;}?>" type="text" class="form-control" name="city_name">
        <?php        
                            }
                            }
         
                            ?>

    </div>
    <div class="form-group">
        <label for="city_state_id">Select State Id</label>
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
            <?php
        if(isset($_POST['update_city'])){
            $city_name_edit = $_POST['city_name'];
            $city_state_id_edit = $_POST['city_state_id'];
            
           $query = "UPDATE cities SET city_name = '$city_name_edit',city_state_id = $city_state_id_edit  WHERE city_id = $the_city_id";
            $edit_query = mysqli_query($connection,$query);
            if(!$edit_query){
                die("Query Failed" . mysqli_error($connection));
            }
        }
        ?>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="update_city" value="Update City">
    </div>
</form>