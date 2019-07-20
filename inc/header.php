
<?php include 'lib/DatabasePDO.php';?>
<?php include 'helpers/Format.php';?>

<?php  
     $db = new Database();
     $format = new Format();
     
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Sylhet Foodie</title>
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="style.css">
	
</head>
<body style="padding-top: 30px; ">


	<nav class="navbar navbar-default navbar-fixed-top">
		  <div class="container">
		    <div class="navbar-header">
		      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>                        
		      </button>
		      <a class="navbar-brand" href="index.php">Food!e</a>
		    </div>
		    <div class="collapse navbar-collapse" id="myNavbar">
		      <ul class="nav navbar-nav navbar-left">
		        <li><a href="restaurants.php">Restaurants</a></li>
		        
			      
		      </ul>
		      <form class="form-inline navbar-form navbar-right">
			    <div class="form-group">
			      <input type="email" class="form-control" id="email" placeholder="Restaurants">
			    </div>
			    <div class="form-group">
			      <input type="password" class="form-control" id="pwd" placeholder="Location">
			    </div>
			   
			    <button type="submit" class="btn btn-default">Search</button>
			  </form>
			  
		    </div>
		  </div>
		</nav>
