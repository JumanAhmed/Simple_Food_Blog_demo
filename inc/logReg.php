<?php include 'lib/Session.php'; 
  Session::init();
?>


<div class="container-fluid text-center" style="padding: 10px 5px 5px 25px;">
 <?php

			if (isset($_GET['action']) && $_GET['action']== "logout") {
				session_destroy();
				header("Location: index.php");
			}

	?>
	<div class="row">
	 
	   <div class="col-sm-3">
	  	
	  </div>
	  <?php 
		     if (!Session::checkLoginOrNot()) {
		     	
		  
		?>
	  <div class="col-sm-6">
	  <div class="row">
	  	<a href="loginRegistation.php?val=signup" class="btn btn-info btn-lg" style="margin:15px 5px 5px 5px;background: #004D40;">Become A Food!e</a>
	 
	  
	  	<a href="loginRegistation.php?val=login" class="btn btn-info btn-lg " style="margin:15px 5px 5px 5px; background: #004D40;">Login</a>
	  
	   <?php   }else{ 
	   		    $id    = $_SESSION['uid'];
		     	$uname = $_SESSION['uname'];

	   	?>


	  	<h3 style="font-size: 25px;text-transform:capitalize; "><span class="glyphicon glyphicon-user"> <?php echo $uname; ?></span></h3>
	
	  	<a href="?action=logout" class="btn btn-info btn-lg"  >
          <span class="glyphicon glyphicon-log-out"></span> Log out
        </a>
	  </div>
	  	
	  </div>
	   <?php } ?>
	 
	  <div class="col-sm-3">
	  	
	  </div>
	 
		
	</div>

</div>



		