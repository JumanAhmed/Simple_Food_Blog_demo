<?php include'inc/header.php'; ?>
<?php include'inc/sidebar.php'; ?>    

<?php
 if (!isset($_GET['editid']) || $_GET['editid']==NULL) {
     header("Location: menulist.php");
 }else{
    $editid = $_GET['editid'];
 }

?>  
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

                              $result =$db-> updateMenu($r_id,$name,$taka,$editid);
                              if ($result) {
                                  echo "<span style = 'color: green'></span>Menu item Update successfully !";
                              }else {
                                     echo "<span style='color:red'>Menu item Not Update successfully !</span>";
                                    }
                         } 
                          

                     }


                ?>
               <div class="block "> 

               <?php
                      $value = $db-> getmenuById($editid);
                      if ($value) {
                        foreach ($value as $sv) {

               ?>
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
                                        <option 
                                        <?php  if($sv['r_id'] == $item['id']) { ?> 
                                           selected = "selected";
                                         <?php } ?> 
                                        value="<?php  echo $item['id']; ?>"><?php  echo $item['rname']; ?></option>
                                        
                                        <?php } } ?>
                                    </select>
                                </td>
                        </tr>
                         <tr>
                            <td>
                                <label>Item Name</label>
                            </td>
                            <td>
                                <input type="text" value="<?php echo $sv['name']; ?>" name="name" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Tk</label>
                            </td>
                            <td>
                                <input type="text" value="<?php echo $sv['tk']; ?>" name="tk" class="medium" />
                            </td>
                        </tr>
                         
                        
                         <tr>
                            <td>
                            </td>
                            <td>
                                <input type="submit" name="submit" Value="Update Menu" />
                            </td>
                        </tr>
                    </table>
                    </form>

                    <?php } } ?>

                </div>
            </div>
        </div>
        
<?php include'inc/footer.php'; ?>