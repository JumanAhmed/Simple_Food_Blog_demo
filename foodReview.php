<?php 
include'lib/Session.php'; 
  Session::checkSeassionForReview();
  $uid  = $_SESSION['uid'];
?>

<?php include'inc/header.php'; ?>
<?php
 if (!isset($_GET['mid']) || $_GET['mid']==NULL && !isset($_GET['rid']) || $_GET['rid']==NULL) {
      echo "Something is missing !! ";
 }else{
    $mid = $_GET['mid'];
    $rid = $_GET['rid'];
   
 }

?> 





<div class="container-fluid">
	
   <div class="row">

			<div class="col-sm-3">


			</div>




	<div class="col-sm-6">
		<div class="panel panel-default">
			      
			  <?php 
                     $menuitem = $db-> getmenuById($mid);
                     if ($menuitem) {
                       foreach ($menuitem as $sitem) {
                        
                  ?>
                  <?php 
                     $uname = $db-> getRestaurentsById($rid);
                     if ($uname) {
                       foreach ($uname as $val) {
                        
                  ?>

                    <div class="panel-heading">
                    <h4>Menu Item: <?php echo $sitem['name']; ?><span class="pull-right">Restaurent:<?php echo $val['rname']; ?></span></h4>
                    </div>
                   <?php } } } } ?>


			   <div class="panel-body">


  <form action="" method="post" class="form-horizontal">
    <div class="form-group">
      <label class="control-label col-sm-3" for="email" style="font-size: 20px;">Short Title:</label>
      <div class="col-sm-9">
        <input type="text" name="comment_title" class="form-control"  >
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-3" for="pwd" style="font-size: 20px;" >Details:</label>
      <div class="col-sm-9">          
         <textarea class="form-control" name="commetn_details" rows="5" ></textarea>
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-10 col-sm-2">
        <button type="submit" class="btn  btn-info btn-md" style="font-weight: bold;">Post</button>
      </div>
    </div>
  </form>


			   <?php 
			   	if ($_SERVER["REQUEST_METHOD"] == "POST") {
			   		 $sortTitle = $_POST["comment_title"];
			   		 $details = $_POST["commetn_details"];

			   		 $result = $db-> insertFoodItemReview($rid,$mid,$uid,$sortTitle,$details);
			   		 if ($result) {
			   		 	echo "<span style='margin-left: 120px;color: Green;font-size: 15px; text-transform:capitalize;  font-weight: bold;'>thanks for your your feedback !</span>";
			   		 		 header("refresh:1;url=restaurantDetails.php?restid=$rid.php");
			   		 }

			   		}


			   ?>
			      
			   </div>

		</div>
	</div>




			<div class="col-sm-3">
				
			</div>



		
	</div>
</div>