<?php
if(isset($_POST['create_university'])){
        

    $uni_name = $_POST['uni_name'];
    $uni_state_id = $_POST['uni_state_id'];
    $uni_city_id = $_POST['uni_city_id'];
    $uni_homepage = $_POST['uni_homepage'];
    $uni_tags = $_POST['uni_tags'];
    $uni_gpa = $_POST['uni_gpa'];
    $uni_toefl = $_POST['uni_toefl'];
    $uni_intro = $_POST['uni_intro'];
    $uni_date = date('d-m-y');
    
    
//======About moving image ======      

$uni_image = $_FILES['image']['name'];
$uni_image_temp = $_FILES['image']['tmp_name'];
move_uploaded_file($uni_image_temp,"../images/$uni_image");
       
//========================================    
$query ="INSERT INTO universities(uni_name, uni_intro, uni_state_id, uni_city_id, uni_homepage, uni_image, uni_tags, uni_gpa, uni_toefl, uni_date) ";
$query .="VALUE('{$uni_name}','{$uni_intro}',{$uni_state_id},{$uni_city_id},'{$uni_homepage}','{$uni_image}','{$uni_tags}',{$uni_gpa},{$uni_toefl},now())";
$create_university_query = mysqli_query($connection, $query);
confirmQuery($create_university_query);
    
    
    
}


?>
    

    
    <form action="" method="post" enctype="multipart/form-data">
     <div class="form-group">
        <label for="university_name">University Name</label>
        <input type="text" class="form-control" name="uni_name">
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
        <input type="text" class="form-control" name="uni_homepage">
    </div>
    
    
    <div class="form-group">
        <label for="uni_image">University Image</label>
        <input type="file" name="image">
    </div>
    
    
     <div class="form-group">
        <label for="university_requied_gpa">University Requied Gpa</label>
        <input type="text" class="form-control" name="uni_gpa">
    </div>
    
    <div class="form-group">
        <label for="university_requied_toefl">University Requied Toefl</label>
        <input type="text" class="form-control" name="uni_toefl">
    </div>
    
    <div class="form-group">
        <label for="university_requied_toefl">University Tags</label>
        <input type="text" class="form-control" name="uni_tags">
    </div>
    
    <div class="form-group">
        <label for="uni_intro">University Introduction</label>
        <textarea class="form-control" name="uni_intro" id="" cols="30" rows="10"></textarea>
    </div>
    
    <div class="form-group">
        
        <input class="btn btn-primary" type="submit" class="form-control" name="create_university" value="Publish Post">
    </div>
</form>