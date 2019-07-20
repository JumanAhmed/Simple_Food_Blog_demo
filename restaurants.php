<?php include'inc/header.php'; ?>

<div class="container-fluid " style="background: url(images/table-71380.jpg);">
	<div class="row">
		<div class="col-sm-3">
			  
		</div>
		
		<div class="col-sm-6">
		<h2 class="text-center" style="color: #ffffff">Restaurants of Sylhet</h2>

		<?php 

				$allresult = $db-> getRestaurantsAllInfo();
				if ($allresult) {
					foreach ($allresult as $item) {		
					
		?>
			  <div class="panel panel-info">
			    <div class="panel-heading">
			    	<p><strong style="font-size: 25px"><?php echo $item['rname']; ?></strong> <span class="pull-right"><?php echo $item['location']; ?></span></p>
			    </div>
			    <div class="panel-body">
			         <div class="row">
			         	 <div class="col-xs-4">
			         	 	<img src="admin/<?php echo $item['image']; ?>"  alt="name" width="150" height="150">
			         	 </div>
			         	  <div class="col-xs-8">
			         	 	<p>Cuisine: <?php echo $item['cuisine']; ?></p>
			         	 	<p>Time: <?php echo $item['rtime']; ?></p>
			         	 	<p>Address: <?php echo $item['address']; ?></p>
			         	 	<p>Average Rating:</p>
			         	 </div>
			         	<a href="restaurantDetails.php?restid=<?php echo $item['id']; ?>"> <button class="btn btn-default pull-right" type="submit" style="margin-top:20px; margin-right: 10px" >More</button></a>
			         </div>
			    </div>
			  </div>

		<?php }  } ?>  

		</div>

		<div class="col-sm-3">
			  
		</div>
	</div>
</div>



<?php include'inc/footer.php'; ?>