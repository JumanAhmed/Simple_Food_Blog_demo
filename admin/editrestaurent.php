<?php include'inc/header.php'; ?>
<?php include'inc/sidebar.php'; ?>

<?php 
        if (!isset($_GET['editid']) || $_GET['editid'] == NULL){
            echo "<script>window.location='restaurantlist.php';</script>";
             //header("Location: restaurantlist.php");
         }else{
            $editId = $_GET['editid'];
         }
?>

        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Add New Restaurent</h2>

                  <?php
                        if ($_SERVER["REQUEST_METHOD"] == "POST"){
                          $rname    = $_POST['rname'];
                          $location    = $_POST['location'];
                          $address    = $_POST['address'];
                          $rtime    = $_POST['rtime'];
                          $cuisine    = $_POST['cuisine'];
                          $phone    = $_POST['phone'];
                          $email    = $_POST['email'];
                          $fb     = $_POST['fb'];
                          $parking   = $_POST['parking'];
                          $ac     = $_POST['ac'];
                          $mapid     = $_POST['mapid'];

                          $permited  = array('jpg', 'jpeg', 'png', 'gif');
                            $file_name = $_FILES['image']['name'];
                             $file_size = $_FILES['image']['size'];
                            $file_temp = $_FILES['image']['tmp_name'];

                            $div = explode('.', $file_name);
                            $file_ext = strtolower(end($div));
                            $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
                            $uploaded_image = "upload/".$unique_image;

             if (empty($rname) || empty($location) || empty($address) || empty($rtime) || empty($cuisine) || empty($phone) || empty($email) || empty($fb) || empty($parking) || empty($ac) || empty($mapid) ) {
                      echo "<span class = 'error'>Field must not be empty !!</span>";
             }else{
                if (!empty($file_name)) {   
                  if ($file_size >1048567) {
                 echo "<span class='error'>Image Size should be less then 1MB!
                 </span>";

                } elseif (in_array($file_ext, $permited) === false) {
                 echo "<span class='error'>You can upload only:-"
                 .implode(', ', $permited)."</span>";

                } else{
                        move_uploaded_file($file_temp, $uploaded_image);

                        $result = $db-> upRestWitNewImg($rname,$location,$address,$rtime,$cuisine,$phone,$email,$fb,$parking,$ac,$uploaded_image,$mapid,$editId);
                        if ($result) {
                         echo "<span class='success'>Information Updated Successfully.
                         </span>";
                        }else {
                         echo "<span class='error'>Information Not Updated Successfully!</span>";
                        }
                      }
                  }else{
                     $result = $db-> upRestWitOldImg($rname,$location,$address,$rtime,$cuisine,$phone,$email,$fb,$parking,$ac,$mapid,$editId);
                        if ($result) {
                         echo "<span class='success'>Information Updated Successfully.
                         </span>";
                        }else {
                         echo "<span class='error'>Information Not Updated Successfully!</span>";
                        }
                 } 

            }
          }
        ?>


                <div class="block">               
                  <?php 
                        $singleRestu = $db-> getRestaurentsById($editId);
                        if ($singleRestu){
                          foreach($singleRestu as $restValue){ 
                          
                ?>




                 <form action="" method="post" enctype="multipart/form-data">
                    <table class="form">
                       
                        <tr>
                            <td>
                                <label>Restaurent Name</label>
                            </td>
                            <td>
                                <input type="text" name="rname" value="<?php echo $restValue['rname'];?>" class="medium" />
                            </td>
                        </tr>

                         <tr>
                            <td>
                                <label>Location</label>
                            </td>
                            <td>
                                <input type="text" name="location" value="<?php echo $restValue['location'];?>" class="medium" />
                            </td>
                        </tr>

                         <tr>
                            <td>
                                <label>Address</label>
                            </td>
                            <td>
                                <input type="text" name="address" value="<?php echo $restValue['address'];?>" class="medium" />
                            </td>
                        </tr>

                         <tr>
                            <td>
                                <label>Time</label>
                            </td>
                            <td>
                                <input type="text" name="rtime" value="<?php echo $restValue['rtime'];?>" class="medium" />
                            </td>
                        </tr>

                         <tr>
                            <td>
                                <label>Cusine</label>
                            </td>
                            <td>
                                <input type="text" name="cuisine" value="<?php echo $restValue['cuisine'];?>" class="medium" />
                            </td>
                        </tr>

                         <tr>
                            <td>
                                <label>Phone</label>
                            </td>
                            <td>
                                <input type="text" name="phone" value="<?php echo $restValue['phone'];?>" class="medium"/>
                            </td>
                        </tr>

                         <tr>
                            <td>
                                <label>Email</label>
                            </td>
                            <td>
                                <input type="text" name="email" value="<?php echo $restValue['email'];?>" class="medium" />
                            </td>
                        </tr>

                         <tr>
                            <td>
                                <label>Facebook</label>
                            </td>
                            <td>
                                <input type="text" name="fb" value="<?php echo $restValue['fb'];?>" class="medium" />
                            </td>
                        </tr>
                        
                         <tr>
                            <td>
                                <label>Parking</label>
                            </td>
                            <td>
                                <input type="text" name="parking" value="<?php echo $restValue['parking'];?>" class="medium" />
                            </td>
                        </tr>

                         <tr>
                            <td>
                                <label>Ac</label>
                            </td>
                            <td>
                                <input type="text" name="ac" value="<?php echo $restValue['ac'];?>" class="medium" />
                            </td>
                        </tr>
 
                        <tr>
                            <td>
                                <label>Upload Image</label>
                            </td>
                            <td>
                            <img src="<?php  echo $restValue['image'];?>" height="70px" width="100px">
                                <input type="file" name="image" />
                            </td>
                        </tr>

                         <tr>
                            <td>
                                <label>Mapid</label>
                            </td>
                            <td>
                                <input type="text" name="mapid" value="<?php echo $restValue['mapid'];?>" class="medium" />
                            </td>
                        </tr>
                       
                      <tr>
                            
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>

                    <?php } } ?>
                </div>
            </div>
        </div>

<!--Load TinyMCE-->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            setupTinyMCE();
            setDatePicker('date-picker');
            $('input[type="checkbox"]').fancybutton();
            $('input[type="radio"]').fancybutton();
        });
    </script>
<!--Load TinyMCE-->      

<?php include'inc/footer.php'; ?>