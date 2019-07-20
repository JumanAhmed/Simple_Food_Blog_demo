<?php include 'lib/Session.php'; 
  Session::init();
?>
<?php include 'inc/header.php';?>


<?php

      // define variables and set to empty values
      $unameErr = $pwdErr =  $firstNameErr = $lastNameErr = $emailErr = "";
      $uname = $pwd = $firstName = $lastName = $email = "";
 	  $msg= "";
 		
  
      
      if ($_SERVER["REQUEST_METHOD"] == "POST") {

      	/* First Name*/
        if (!empty($_POST["first_name"])) {
        	$test =  $format->test_input($_POST["first_name"]);
          // check if name only contains letters and whitespace
          if (preg_match("/^[a-zA-Z ]*$/", $test)) {
          	$firstName = $test;
            
          }else{
          	$firstNameErr = "Only allowed letters and white space !"; 
          }
          
        } else {
        	$firstNameErr = "Name is required";
          
        }


        /* last Name*/
        if (!empty($_POST["last_name"])) {
        	$test = $format->test_input($_POST["last_name"]);
          // check if name only contains letters and whitespace
          if (preg_match("/^[a-zA-Z ]*$/", $test)) {
          	$lastName = $test;
            
          }else{
          	$lastNameErr = "Only allowed letters and white space !"; 
          }
          
        } else {
        	$lastNameErr = "Name is required";
          
        }
        
      	// UserName
        if (!empty($_POST["uname"])) {

			$test = $format->test_input($_POST["uname"]);
			// check if name only contains letters and  and number 
          		if (preg_match("/^[a-zA-Z0-9]+$/", $test)) {
          	 		$uname = $test;
          	 	  } 
          	 	  else{
	          	 	$unameErr = "Only allowed a-z , A-Z, 0-9";
	          	 }     
	          
          } else{
                $unameErr = "UserName is required";
            }


           /*Email*/
        if (!empty($_POST["email"])) {
        	$test = $format->test_input($_POST["email"]);
          // check if e-mail address is well-formed
          if (filter_var($test , FILTER_VALIDATE_EMAIL)) {
          	$email = $test;
           
          }else{
          	 $emailErr = "Invalid email format !"; 
          }
          
        } else {
          $emailErr = "Email is required";
        }
          

        /*Password*/

        if (!empty($_POST["pwd"])) {
        	 $pwd = $format->test_input($_POST["pwd"]);
        	 $pwd = md5($pwd);
        	
         
        } else {
           $pwdErr = "Password is required";
          
        }


        /*Insert to Database*/
        if (!empty($firstName) and !empty($lastName) and  !empty($uname) and !empty($email) and  !empty($pwd) ) {

           $register = $db-> becomeAfoodie($firstName, $lastName, $uname, $email, $pwd);
		   if ($register) {
				$msg = "<span style='margin-left: 80px; color: green;font-size: 20px; text-transform:capitalize;  font-weight: bold;'>Registetion done <a href ='loginRegistation.php?val=login'>Click  here </a>for login.</span>";
		      }else{
		        $msg = "<span style='margin-left: 80px; color: red;font-size: 20px; text-transform:capitalize;  font-weight: bold;'>Error.....Username OR email already exists.</spam>";
		         }
           }else{
        	$msg = "<span style='margin-left: 80px;color: red;font-size: 15px; text-transform:capitalize;  font-weight: bold;'>Fill the required field with proper format !</span>";
        }


      }

      
  ?>

















    <!--Tab Button  Start! -->

  <div class="container-fluid" style=" margin: 70px 270px 30px 270px; padding: 0px; ">
 	
 	<ul class="nav nav-tabs nav-justified" style="background: powderblue; ">
 		 <?php
		 if (isset($_GET['val']) && $_GET['val'] == "login") {
		
		?>
		     <li class="active"><a data-toggle="tab" href="#home" style="font-size: 30px;">Login</a></li>
		     <li style="font-size: 30px"><a data-toggle="tab" href="#menu1">Sign Up</a></li>

		 <?php }else{ ?>  
		 <li ><a data-toggle="tab" href="#home" style="font-size: 30px;">Login</a></li>  
		 <li class="active" style="font-size: 30px"><a data-toggle="tab" href="#menu1">Sign Up</a></li>
		    
		    <?php }?>
		    
		    
    </ul>
    <br>
    <br>

   <!--Tab Button  End ! -->

  





    <!--Tab content  Start ! -->

  <div class="tab-content">
  	
  <!-- Loin-active ! -->



    <?php
		 if (isset($_GET['val']) && $_GET['val'] == "login") {
		
		?>
	 <div id="home" class="tab-pane fade in active">

  <?php
           $logMsg ="";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if (!empty($_POST["email"]) && !empty($_POST["pwd"]) ) {
          $test = $format->test_input($_POST["email"]);
           $pwd = $_POST["pwd"];
          // check if e-mail address is well-formed
          if (filter_var($test , FILTER_VALIDATE_EMAIL)) {
            $email = $test;
            $pwd = md5($pwd);

            $query = $db-> userlogin($email,$pwd);
            $allinfo = $query->fetch();
            $num = $query->rowCount();

            if ($num == 1) {
               Session::set("login", true);
               Session::set("uname", $allinfo['uname']);
               Session::set("uid", $allinfo['id']);

               header("Location: index.php");


            }else{
              $logMsg ="<span style= 'color: red;'>Username and Password are not matched</span>";
            }
           
          }else{
             $logMsg = "Invalid email format !"; 
          }
          
        } else {
           $logMsg = "<span style='margin-left: 80px; color: red;font-size: 20px; text-transform:capitalize;  font-weight: bold;'>Field must not be empty !</span>";
        }
}

    ?>

	    <form  action="" method="post" class="form-horizontal">

        <div class="form-group">
          <label class="control-label col-sm-2" for="email">Email:</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="email" placeholder="Enter email" required>
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-2" for="pwd">Password:</label>
          <div class="col-sm-10">          
            <input type="password" class="form-control" name="pwd" placeholder="Enter password" required>
          </div>

        </div>
        <div class="form-group">        
          <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default">Log In</button>
          </div>
        </div>
        <?php echo $logMsg;?>
  </form>  



    </div>


     <div id="menu1" class="tab-pane fade">
      <form action="" method="post" class="form-horizontal">
                <div class="form-group">
                 
                  <div class="col-sm-6">
                    <input type="text" name="first_name" class="form-control" placeholder="First Name" required value="<?php echo $firstName;?>"><span style="margin-left: 20px;color: red;font-size: 15px; text-transform:capitalize;  font-weight: bold;" ><?php echo $firstNameErr;?></span>
                  </div>

                  <div class="col-sm-6">
                    <input type="text" name="last_name" class="form-control" placeholder="Last Name" required value="<?php echo $lastName;?>"><span style="margin-left: 20px;color: red;font-size: 15px; text-transform:capitalize;font-weight: bold;" ><?php echo $lastNameErr;?></span>
                  </div>

                </div>

                 <div class="form-group">
                  <div class="col-sm-12">          
                    <input type="text" name="uname" class="form-control" placeholder="Enter Username" required value="<?php echo $uname;?>"><span style="margin-left: 20px;color: red;font-size: 15px; text-transform:capitalize;font-weight: bold;" ><?php echo $unameErr;?></span>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-sm-12">          
                    <input type="text" name="email" class="form-control" placeholder="Enter Email" required value="<?php echo $email;?>"><span style="margin-left: 20px;color: red;font-size: 15px; text-transform:capitalize;font-weight: bold;" ><?php echo $emailErr;?></span>
                  </div>
                </div>
               
                <div class="form-group">
                  <div class="col-sm-12">          
                    <input type="password" name="pwd" class="form-control" placeholder="Enter password" required>
                  </div>
                </div>

                <div class="form-group">        
                  <div class="col-sm-12 text-center" >
                    <button type="submit" class="btn btn-default">Sign Up</button>
                  </div>
                </div>

            </form>
             <?php echo $msg; ?>

    </div>
		    








		 <?php }else{ ?>  
 <!-- Registation -active ! -->





		 <div id="home" class="tab-pane fade">

	      <?php
           $logMsg ="";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if (!empty($_POST["email"]) && !empty($_POST["pwd"]) ) {
          $test = $format->test_input($_POST["email"]);
           $pwd = $_POST["pwd"];
          // check if e-mail address is well-formed
          if (filter_var($test , FILTER_VALIDATE_EMAIL)) {
            $email = $test;
            $pwd = md5($pwd);

            $query = $db-> userlogin($email,$pwd);
            $allinfo = $query->fetch();
            $num = $query->rowCount();

            if ($num == 1) {
               Session::set("login", true);
               Session::set("uname", $allinfo['uname']);
               Session::set("uid", $allinfo['id']);

               header("Location: index.php");


            }else{
              $logMsg ="<span style= 'color: red;'>Username and Password are not matched</span>";
            }
           
          }else{
             $logMsg = "Invalid email format !"; 
          }
          
        } else {
           $logMsg = "<span style='margin-left: 80px; color: red;font-size: 20px; text-transform:capitalize;  font-weight: bold;'>Field must not be empty !</span>";
        }
}

    ?>

      <form  action="" method="post" class="form-horizontal">

        <div class="form-group">
          <label class="control-label col-sm-2" for="email">Email:</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="email" placeholder="Enter email" required>
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-2" for="pwd">Password:</label>
          <div class="col-sm-10">          
            <input type="password" class="form-control" name="pwd" placeholder="Enter password" required>
          </div>

        </div>
        <div class="form-group">        
          <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default">Log In</button>
          </div>
        </div>
        <?php echo $logMsg;?>
  </form>     
  	  </div>





		 <div id="menu1" class="tab-pane fade in active">
       <form action="" method="post" class="form-horizontal">
                <div class="form-group">
                 
                  <div class="col-sm-6">
                    <input type="text" name="first_name" class="form-control" placeholder="First Name" required value="<?php echo $firstName;?>"><span style="margin-left: 20px;color: red;font-size: 15px; text-transform:capitalize;  font-weight: bold;" ><?php echo $firstNameErr;?></span>
                  </div>

                  <div class="col-sm-6">
                    <input type="text" name="last_name" class="form-control" placeholder="Last Name" required value="<?php echo $lastName;?>"><span style="margin-left: 20px;color: red;font-size: 15px; text-transform:capitalize;font-weight: bold;" ><?php echo $lastNameErr;?></span>
                  </div>

                </div>

                 <div class="form-group">
                  <div class="col-sm-12">          
                    <input type="text" name="uname" class="form-control" placeholder="Enter Username" required value="<?php echo $uname;?>"><span style="margin-left: 20px;color: red;font-size: 15px; text-transform:capitalize;font-weight: bold;" ><?php echo $unameErr;?></span>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-sm-12">          
                    <input type="text" name="email" class="form-control" placeholder="Enter Email" required value="<?php echo $email;?>"><span style="margin-left: 20px;color: red;font-size: 15px; text-transform:capitalize;font-weight: bold;" ><?php echo $emailErr;?></span>
                  </div>
                </div>
               
                <div class="form-group">
                  <div class="col-sm-12">          
                    <input type="password" name="pwd" class="form-control" placeholder="Enter password" required>
                  </div>
                </div>

                <div class="form-group">        
                  <div class="col-sm-12 text-center">
                    <button type="submit" class="btn btn-default">Sign Up</button>
                  </div>
                </div>

            </form>
             <?php echo $msg; ?>

    </div>
		    
		    <?php }?>
  	
  </div>
</div>