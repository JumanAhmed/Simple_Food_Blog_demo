<?php include'inc/header.php'; ?>


<?php
 if (!isset($_GET['restid']) || $_GET['restid']==NULL) {
      echo "No Menu Available !! ";
 }else{
    $restid = $_GET['restid'];
 }

?> 


<div class="container-fluid" >
	<div class="jumbotron"  style="background: url(images/table-71380.jpg);" >
	  <div class="row" >
	  		<div class="col-xs-6 thumbnail" >
	  			<img src="images/foodie-public-l.jpg" alt="New York" width="400" height="200" >
	  		</div>
	  		<div class="col-xs-6">
	  			<h2 style="font-style: bold; color: white; text-align: center;">Food!e</h2>
          <?php 
                  $ret = $db-> getRestaurentsById($restid);
                  if ($ret) {
                    foreach ($ret as $itm) {
              
                   
          ?>
          <h1 style="font-style: italic; color: white; text-align: center;"><?php echo $itm['rname']; ?></h1>

          <?php } }?>
	  		</div>

	  </div>
	 

	</div>

</div>

 <div class="container-fluid" style=" margin: 0px 30px 0px 30px; padding: 0px;">
 	 <ul class="nav nav-tabs nav-justified">
    <li class="active"><a data-toggle="tab" href="#home"  style="font-size: 20px;">Restaurent Review</a></li>
    <li><a data-toggle="tab" href="#menu1" style="font-size: 20px;">Food Review</a></li>
    <li><a data-toggle="tab" href="#menu2" style="font-size: 20px;">Menu</a></li>
    <li><a data-toggle="tab" href="#menu3" style="font-size: 20px;">Photos</a></li>
  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active text-center">
      <h1>Restaurent Review</h1>
       <h3>Work Remaining !</h3>
    </div>



    <div id="menu1" class="tab-pane fade">
       <div class="container-fluid">
              <div class="row">
                <div class="col-sm-2">
                
                  
                </div>
                <div class="col-sm-8">
                <?php
                      $result = $db-> getAllReviewByRestID($restid);
                      if ($result) {
                        foreach ($result as $item) {
                          $menuId = $item['m_id'];
                          $uid = $item['u_id'];
                    ?>
                  <div class="panel panel-info" >
                  <?php 
                     $menuitem = $db-> getmenuById($menuId);
                     if ($menuitem) {
                       foreach ($menuitem as $sitem) {
                        
                  ?>
                  <?php 
                     $uname = $db-> getUserNameByID($uid);
                     if ($uname) {
                       foreach ($uname as $val) {
                        
                  ?>

                    <div class="panel-heading">
                    <h4>Menu Item: <?php echo $sitem['name']; ?><span class="pull-right">ReviewBy :<?php echo $val['uname']; ?></span></h4>
                    </div>
                   <?php } } } } ?>
                    <div class="panel-body" >
                     <p><strong style="font-size: 18px;">TITLE  :</strong><strong>  <?php echo $item['comment_title']; ?></strong></p>
                     <p><strong style="font-size: 18px;">DETAILS:</strong> <?php echo $item['commetn_details']; ?> </p>
                    </div>

                  
                  </div>
                    <?php } } ?>
                </div>

                <div class="col-sm-2">
              
                </div>
              </div>
              </div>
    </div>




    <div id="menu2" class="tab-pane fade">

            <div class="container-fluid">
              <div class="row">
                <div class="col-sm-2">
                
                  
                </div>
                <div class="col-sm-8">
                  <div class="table-responsive">
                    <table class="table table table-bordered">
                      <thead>
                        <tr class="danger">
                          <th>#</th>
                          <th>Menu Item</th>
                          <th>Tk</th>
                           <th>Rating</th>
                           <th class="text-center">#</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php 
                        $result = $db-> getmenuByRestId($restid);
                        if ($result) {
                          foreach ($result as $item) {
                          
                      ?>
                        <tr>
                          <td>#</td>
                          <td><?php echo $item['name']; ?></td>
                          <td><?php echo $item['tk']; ?></td>
                          <td>#</td>
                    <td class="text-center"><a href="foodReview.php?mid=<?php echo $item['id'];?>&amp;rid=<?php echo $item['r_id'];?>" >Give Review</a></td>
                        </tr>

                        <?php } } ?>

                      </tbody>
                    </table>
                    </div>


                </div>

                <div class="col-sm-2">
              
                </div>
              </div>
              </div>


    </div>

    <div id="menu3" class="tab-pane fade text-center">
      <h1>Photo</h1>
      <h3>Work Remaining !</h3>
    </div>
    
  </div>
</div>


<?php include'inc/footer.php'; ?>