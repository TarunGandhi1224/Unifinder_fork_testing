<?php
if(isset($_GET['p_id'])){
    $edit_university_id = $_GET['p_id'];
}
$query = "SELECT * FROM universities WHERE uni_id={$edit_university_id}";
$select_universities_by_id = mysqli_query($connection, $query);
while($row = mysqli_fetch_assoc($select_universities_by_id)) {
$uni_id = $row['uni_id'];
$uni_name = $row['uni_name'];
$uni_state_id = $row['uni_state_id'];
$uni_city_id = $row['uni_city_id'];
$uni_image = $row['uni_image'];
$uni_homepage = $row['uni_homepage'];
$uni_gpa = $row['uni_gpa'];
$uni_toefl = $row['uni_toefl'];
$uni_date = $row['uni_date'];
$uni_intro = $row['uni_intro'];
$uni_tags = $row['uni_tags'];
}

if(isset($_POST['update_university'])) {
 $uni_name = $_POST['uni_name'];
    $uni_state_id = $_POST['uni_state_id'];
    $uni_city_id = $_POST['uni_city_id'];
    $uni_homepage = $_POST['uni_homepage'];
    $uni_tags = $_POST['uni_tags'];
    $uni_gpa = $_POST['uni_gpa'];
    $uni_toefl = $_POST['uni_toefl'];
    $uni_intro = $_POST['uni_intro'];
    $uni_date = date('d-m-y');
    $uni_image = $_FILES['image']['name'];
    $uni_image_temp = $_FILES['image']['tmp_name'];
    move_uploaded_file($uni_image_temp,"../images/$uni_image");
}

if(empty($uni_image)) {
    $query = "SELECT * FROM universities WHERE uni_id = $edit_university_id ";
    $select_image = mysqli_query($connection, $query);
    while($row = mysqli_fetch_array($select_image)) {
        $uni_image = $row['uni_image'];
    }
}

$query = "UPDATE universities SET ";
$query .= "uni_name = '{$uni_name}', ";
$query .= "uni_state_id = '{$uni_state_id}', ";
$query .= "uni_city_id = '{$uni_city_id}', ";
$query .= "uni_image = '{$uni_image}', ";
$query .= "uni_homepage = '{$uni_homepage}', ";
$query .= "uni_toefl = '{$uni_toefl}', ";
$query .= "uni_tags = '{$uni_tags}', ";
$query .= "uni_intro = '{$uni_intro}', ";
$query .= "uni_date = now() ";
$query .= "WHERE uni_id = {$edit_university_id}";

$edit_university_query = mysqli_query($connection, $query);
confirmQuery($edit_university_query);
?>
    

    
   <form action="" method="post" enctype="multipart/form-data">
     <div class="form-group">
        <label for="university_name">University Name</label>
        <input type="text" value = "<?php echo $uni_name; ?>" class="form-control" name="uni_name">
    </div>
    
    <div class="form-group">
        <label for="university_state_id">University State Id</label>
        <select name="uni_state_id" id="">
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
        <label for="university_city_id">University City Id</label>
        <select name="uni_city_id" id="">
        <?php
            $query = "SELECT * FROM cities";
            $select_cities = mysqli_query($connection,$query);

            confirmQuery($select_cities);

            while($row = mysqli_fetch_assoc($select_cities)) {
                $city_id = $row['city_id'];
                $city_name = $row['city_name'];
                echo "<option value='$city_id'>{$city_name}</option>";
            }

        ?>

        </select>        

    </div>
    
    <div class="form-group">
        <label for="university_homepage">University Homepage</label>
        <input type="text" value = "<?php echo $uni_homepage; ?>" class="form-control" name="uni_homepage">
    </div>
    
    
    <div class="form-group">
        <img width="100" src="../images/<?php echo $uni_image;?>" alt="">
        <input type="file" name="image">
    </div>
    
    
     <div class="form-group">
        <label for="university_requied_gpa">University Requied Gpa</label>
        <input type="text" value = "<?php echo $uni_gpa; ?>" class="form-control" name="uni_gpa">
    </div>
    
    <div class="form-group">
        <label for="university_requied_toefl">University Requied Toefl</label>
        <input type="text" value = "<?php echo $uni_toefl; ?>" class="form-control" name="uni_toefl">
    </div>
    
    <div class="form-group">
        <label for="university_requied_toefl">University Tags</label>
        <input type="text" value = "<?php echo $uni_tags; ?>"class="form-control" name="uni_tags">
    </div>
    
    <div class="form-group">
        <label for="uni_intro">University Introduction</label>
        <textarea class="form-control" name="uni_intro" id="" cols="30" rows="10"><?php echo $uni_intro; ?></textarea>
    </div>
    
    <div class="form-group">
        
        <input class="btn btn-primary" type="submit" class="form-control" name="update_university" value="Update University">
    </div>
</form>