                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>University Name</th>
                                <th>University State Id</th>
                                <th>University City Id</th>
                                <th>University Image</th>
                                <th>University Homepage</th>
                                <th>University Requied Gpa</th>
                                <th>University Requied Toefl</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 

                        $query = "SELECT * FROM universities";
                        $select_universities = mysqli_query($connection, $query);
                        while($row = mysqli_fetch_assoc($select_universities)) {
                        $uni_id = $row['uni_id'];
                        $uni_name = $row['uni_name'];
                        $uni_state_id = $row['uni_state_id'];
                        $uni_city_id = $row['uni_city_id'];
                        $uni_homepage = $row['uni_homepage'];
                        $uni_image = $row['uni_image'];
                        $uni_gpa = $row['uni_gpa'];
                        $uni_toefl = $row['uni_toefl'];
                        $uni_date = $row['uni_date'];
                            
                            
                       
                        echo "<tr>";
                        echo "<td>{$uni_id}</td>";
                        echo "<td>{$uni_name}</td>";
                        echo "<td>{$uni_state_id}</td>";
                        echo "<td>{$uni_city_id}</td>";
                        echo "<td><img width=100 src='../images/{$uni_image}' alt='image'></td>";
                        echo "<td>{$uni_homepage}</td>";
                        echo "<td>{$uni_gpa}</td>";
                        echo "<td>{$uni_toefl}</td>";
                        echo "<td>{$uni_date}</td>";
                        echo "<td><a href ='universities.php?source=edit_university&p_id={$uni_id}'>Edit</a></td>";
                        echo "<td><a onClick=\"javascript: return confirm('Are you shre you want to delete'); \" href ='universities.php?delete={$uni_id}'>Delete</a></td>";
                        
                       // echo "<td><a href ='categories.php?delete={$cat_id}'>Delete</a></td>";
                      //  echo "<td><a href ='categories.php?edit={$cat_id}'>Edit</a></td>";
                        echo "</tr>";
                        }


                        ?>
                            <?php
                             if(isset($_GET['delete'])){
                            $the_uni_id = $_GET['delete'];
                            $query = "DELETE FROM universities WHERE ";
                            $query .="uni_id={$the_uni_id}";
                            $delete_query = mysqli_query($connection, $query);
                            header('Location: universities.php');
                            }

                            ?>
                             <!--  
                               <tr>
                                <td>10</td>
                                <td>Author</td>
                                <td>Bootstrap</td>
                                <td>Bootstrap2</td>
                                <td>issue</td>
                                <td>Image</td>
                                <td>BooBOo</td>
                                <td>Fuck that</td>
                                <td>Date</td>
                            </tr>
                            -->
                        </tbody>
                    </table>