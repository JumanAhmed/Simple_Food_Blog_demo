<?php include'inc/header.php'; ?>
<?php include'inc/sidebar.php'; ?>

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

                            $div = explode('.', $file_name); // The explode() function breaks a string into an array.//explode(separator,string,limit) 3 param..
                            $file_ext = strtolower(end($div));
                            $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
                            $uploaded_image = "upload/".$unique_image;

             if (empty($rname) || empty($location) || empty($address) || empty($rtime) || empty($cuisine) || empty($phone) || empty($email) || empty($fb) || empty($parking) || empty($ac) || empty($mapid) ) {
                      echo "<span class = 'error'>Field must not be empty !!</span>";
            
                }elseif ($file_size >1048567) {
                 echo "<span class='error'>Image Size should be less then 1MB!
                 </span>";

                } elseif (in_array($file_ext, $permited) === false) {
                 echo "<span class='error'>You can upload only:-"
                 .implode(', ', $permited)."</span>";


                } else{
                        move_uploaded_file($file_temp, $uploaded_image);

                        $result = $db-> insertrestaurent($rname,$location,$address,$rtime,$cuisine,$phone,$email,$fb,$parking,$ac,$uploaded_image,$mapid);
                        if ($result) {
                         echo "<span class='success'>Data Inserted Successfully.
                         </span>";
                        }else {
                         echo "<span class='error'>Data Not Inserted !</span>";
                        }
           }

            }
                ?>


                <div class="block">               
                 <form action="" method="post" enctype="multipart/form-data">
                    <table class="form">
                       
                        <tr>
                            <td>
                                <label>Restaurent Name</label>
                            </td>
                            <td>
                                <input type="text" name="rname" placeholder="Enter Restaurent Name..." class="medium" />
                            </td>
                        </tr>

                         <tr>
                            <td>
                                <label>Location</label>
                            </td>
                            <td>
                                <input type="text" name="location" placeholder="Enter Location..." class="medium" />
                            </td>
                        </tr>

                         <tr>
                            <td>
                                <label>Address</label>
                            </td>
                            <td>
                                <input type="text" name="address" placeholder="Enter Address..." class="medium" />
                            </td>
                        </tr>

                         <tr>
                            <td>
                                <label>Time</label>
                            </td>
                            <td>
                                <input type="text" name="rtime" placeholder="Enter Restaurent Time..." class="medium" />
                            </td>
                        </tr>

                         <tr>
                            <td>
                                <label>Cusine</label>
                            </td>
                            <td>
                                <input type="text" name="cuisine" placeholder="Enter Restaurent Cusine..." class="medium" />
                            </td>
                        </tr>

                         <tr>
                            <td>
                                <label>Phone</label>
                            </td>
                            <td>
                                <input type="text" name="phone" placeholder="Enter Phone..." class="medium" />
                            </td>
                        </tr>

                         <tr>
                            <td>
                                <label>Email</label>
                            </td>
                            <td>
                                <input type="text" name="email" placeholder="Enter Email..." class="medium" />
                            </td>
                        </tr>

                         <tr>
                            <td>
                                <label>Facebook</label>
                            </td>
                            <td>
                                <input type="text" name="fb" placeholder="Enter Facebook..." class="medium" />
                            </td>
                        </tr>
                        
                         <tr>
                            <td>
                                <label>Parking</label>
                            </td>
                            <td>
                                <input type="text" name="parking" placeholder="Enter Parking..." class="medium" />
                            </td>
                        </tr>

                         <tr>
                            <td>
                                <label>Ac</label>
                            </td>
                            <td>
                                <input type="text" name="ac" placeholder="Enter Ac..." class="medium" />
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label>Upload Image</label>
                            </td>
                            <td>
                                <input type="file" name="image" />
                            </td>
                        </tr>

                         <tr>
                            <td>
                                <label>Mapid</label>
                            </td>
                            <td>
                                <input type="text" name="mapid" placeholder="Enter Mapid..." class="medium" />
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