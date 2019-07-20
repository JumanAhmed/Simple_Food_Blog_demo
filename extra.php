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
          	$firstNameErr = "Only letters and white space allowed"; 
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
          	$lastNameErr = "Only letters and white space allowed"; 
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
	          	 	$unameErr = "Only allow a-z , A-Z, 0-9";
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
          	 $emailErr = "Invalid email format"; 
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
				$msg = "<span style='color:green'>Registetion done <a href ='login.php'>Click  here </a>for login.</span>";
		      }else{
		        $msg = "<span style='color:red'>Error.....Username OR email already exists.</spam>";
		         }
           }else{
        	$msg = "<span style='color:red'>Fill the required field with proper format !</span>";
        }


      }

      
  ?>


  <form action="" method="post" class="form-horizontal">
                <div class="form-group">
                 
                  <div class="col-sm-6">
                    <input type="text" name="first_name" class="form-control" placeholder="First Name" required>
                  </div>

                  <div class="col-sm-6">
                    <input type="text" name="last_name" class="form-control" placeholder="Last Name" required >
                  </div>

                </div>

                 <div class="form-group">
                  <div class="col-sm-12">          
                    <input type="text" name="uname" class="form-control" placeholder="Enter Username" required>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-sm-12">          
                    <input type="text" name="email" class="form-control" placeholder="Enter Email" required>
                  </div>
                </div>
               
                <div class="form-group">
                  <div class="col-sm-12">          
                    <input type="password" name="pwd" class="form-control" placeholder="Enter password" required>
                  </div>
                </div>

                <div class="form-group">        
                  <div class="col-sm-12">
                    <button type="submit" class="btn btn-default">Sign Up</button>
                  </div>
                </div>

            </form>

