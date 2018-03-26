<form action="" method="post">
    <div class="form-group">
        <label for="state_name">Edit State Name</label>
        <?php //update section 
                           if(isset($_GET['edit'])){
                            $edit_state_id = $_GET['edit'];
                            $query = "SELECT * FROM states WHERE state_id = {$edit_state_id}";
                            $select_state_edit = mysqli_query($connection, $query);
                            while($row = mysqli_fetch_assoc($select_state_edit)) {
                            
                            $state_id = $row['state_id'];
                            $state_name = $row['state_name'];
                            $state_short_name = $row['state_short_name'];
                            
                            ?>
       <input value="<?php if(isset($state_name)){echo $state_name;}?>" type="text" class="form-control" name="state_name">
       <label for="state_short_name">Edit State Name</label>
       <input value="<?php if(isset($state_short_name)){echo $state_short_name;}?>" type="text" class="form-control" name="state_short_name">
        <?php        
                            }
                            }
         
                            ?>
                            
                            
        
                            
                            
                            
                            
                            
                            
                            
        <?php
        if(isset($_POST['update_state'])){
            $state_name_edit = $_POST['state_name'];
            $state_short_name_edit = $_POST['state_short_name'];
            
           $query = "UPDATE states SET state_name = '$state_name_edit',state_short_name = '$state_short_name_edit'  WHERE state_id = $the_state_id";
            $edit_query = mysqli_query($connection,$query);
            if(!$edit_query){
                die("Query Failed" . mysqli_error($connection));
            }
        }
        ?>
    </div>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="update_state" value="Update State">
    </div>
</form>