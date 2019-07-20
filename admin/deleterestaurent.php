<?php include '../lib/DatabasePDO.php';?>

<?php  
     $db = new Database();
 ?>


<?php 
	if (!isset($_GET['delid']) || $_GET['delid']== NULL) {
      echo "<script>window.location='restaurantlist.php';</script>";
      //header("Location: restaurantlist.php");
   }else{
      $restid = $_GET['delid'];

      $result = $db->getRestaurentsById($restid);
      if ($result) {
      	 foreach ($result as $item) {
      	 	$dellink = $item['image'];
      	 	unlink($dellink);
      	 }
      }

      $delrestto= $db-> deleterestoById($restid);
       if ($delrestto) {
          echo "<script>alert('Data Deleted Successfully !!');</script>";
          echo "<script>window.location = 'restaurantlist.php';</script>";
       }else{
       	 echo "<script>alert('Data Not Deleted Successfully !!');</script>";
          echo "<script>window.location = 'restaurantlist.php';</script>";
       }
  
   }

?>