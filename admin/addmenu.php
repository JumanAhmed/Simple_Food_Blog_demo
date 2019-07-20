<?php include'inc/header.php'; ?>
<?php include'inc/sidebar.php'; ?>      
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Add New Menu</h2>

                <?php 

                    if ($_SERVER["REQUEST_METHOD"] == "POST"){
                          $r_id  = $_POST['r_id'];
                          $name    = $_POST['name'];
                          $taka    = $_POST['tk'];
                       if (empty($r_id) || empty($name) || empty($taka)) {
                            echo "<span  style='color:red'>Field must not be empty !!</span>";
                         } else{

                              $result =$db->insertMenu($r_id,$name,$taka);
                              if ($result) {
                                  echo "<span style = 'color: green'></span>Menu item inserted successfully !";
                              }else {
                                     echo "<span style='color:red'>Menu item Not Inserted !</span>";
                                    }
                         } 
                          

                     }


                ?>
               <div class="block "> 
                 <form action="" method="post">
                    <table class="form">					
                         <tr>
                            <td>
                                <label>Restaurant</label>
                            </td>
                                <td>
                                    <select id="select" name="r_id">
                                        <OPTION>Select Restaurent</OPTION>

                                        <?php
                                            $result = $db-> getRestaurantsAllInfo();
                                            if ($result) {
                                            foreach ($result as $item) {

                                        ?>
                                        <option value="<?php  echo $item['id']; ?>"><?php  echo $item['rname']; ?></option>
                                        
                                        <?php } } ?>
                                    </select>
                                </td>
                        </tr>
                         <tr>
                            <td>
                                <label>Item Name</label>
                            </td>
                            <td>
                                <input type="text" placeholder="Enter Item Name..." name="name" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Tk</label>
                            </td>
                            <td>
                                <input type="text" placeholder="Enter Tk..." name="tk" class="medium" />
                            </td>
                        </tr>
                         
                        
                         <tr>
                            <td>
                            </td>
                            <td>
                                <input type="submit" name="submit" Value="Add Menu" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
        
<?php include'inc/footer.php'; ?>