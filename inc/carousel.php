

<div class="container-fluid" style="padding-top: 5px;">
	<div class="row">
		
		<div class="col-sm-12" >
			<div id="myCarousel" class="carousel slide text-center" data-ride="carousel" style=" background-color: #004D40">
	    <!-- Indicators -->
	    <ol class="carousel-indicators">
	      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
	      <li data-target="#myCarousel" data-slide-to="1"></li>
	      <li data-target="#myCarousel" data-slide-to="2"></li>
	    </ol>

	    <!-- Wrapper for slides -->
	    <div class="carousel-inner" role="listbox">
	    	<?php
	    			$result = $db-> selectAllFromCarousel();
	    			if ($result) {
	    				foreach ($result as $val) {
	    					

	    	?>
	    	<?php if($val['id'] == 1){ ?>
		      <div class="item active">
		        <div class="row">
		        <div class="col-sm-1">
		        	
		        </div>
		        	<div class="col-sm-4" style="margin: 25px 0px 25px 35px">
		        		<img src="admin/<?php echo $val['image']; ?>" class="img-responsive img-circle" alt="New York" width="250" height="170">
		     
		        	</div>
		        	<div class="col-sm-5" style="margin: 10px 0px 10px 0px; text-align: left;">
		        	  <br>
		        	  <br>
		        		<h3 style="color: white;"><?php echo $val['title']; ?></h3>
		        		<p style="color: white;"><?php echo $val['cription']; ?></p>
		        	</div>
		        	<div class="col-sm-2">
		        	
		        </div>
		        </div>
		      </div>
		   
		      	<?php }elseif($val['id'] == 2){?>
		      <div class="item">
		      		<div class="row">
		        <div class="col-sm-1">
		        	
		        </div>
		        	<div class="col-sm-4" style="margin: 25px 0px 25px 35px">
		        		<img src="admin/<?php echo $val['image']; ?>" class="img-responsive img-circle" alt="New York" width="250" height="170">
		     
		        	</div>
		        	<div class="col-sm-5" style="margin: 10px 0px 10px 0px; text-align: left;">
		        	  <br>
		        	  <br>
		        		<h3 style="color: white;"><?php echo $val['title']; ?></h3>
		        		<p style="color: white;"><?php echo $val['cription']; ?></p>
		        	</div>
		        	<div class="col-sm-2">
		        	
		        </div>
		        </div>
		      </div>
	     <?php }elseif($val['id'] == 3){ ?>
		      <div class="item">
		      	
		      		<div class="row">
		        <div class="col-sm-1">
		        	
		        </div>
		        	<div class="col-sm-4" style="margin: 25px 0px 25px 35px">
		        		<img src="admin/<?php echo $val['image']; ?>" class="img-responsive img-circle" alt="New York" width="250" height="170">
		     
		        	</div>
		        	<div class="col-sm-5" style="margin: 10px 0px 10px 0px; text-align: left;">
		        	  <br>
		        	  <br>
		        		<h3 style="color: white;"><?php echo $val['title']; ?></h3>
		        		<p style="color: white;"><?php echo $val['cription']; ?></p>
		        	</div>
		        	<div class="col-sm-2">
		        	
		        </div>
		        </div>

		      </div>
		 <?php } } } ?>

		    <!-- Left and right controls -->
		    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
		      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
		      <span class="sr-only">Previous</span>
		    </a>
		    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
		      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
		      <span class="sr-only">Next</span>
		    </a>
	  </div>
	</div>		


</div>

	
	
</div>

</div>