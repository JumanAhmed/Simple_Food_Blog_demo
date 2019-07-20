<?php include'inc/header.php'; ?>
<?php include'inc/sidebar.php'; ?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>Restaurents List</h2>
                <div class="block">  
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th width="10%">Name</th>
							<th width="10%">Location</th>
							<th width="10%">Phone</th>
							<th width="10%">email</th>
							<th width="10%">image</th>
							<th width="10%">Cuisine</th>
							<th width="10%">Action</th>
						</tr>
					</thead>
					<tbody>
					<?php   
							$allinfo = $db-> getRestaurantsAllInfo();
							if ($allinfo) {
								foreach ($allinfo as $info) {
									

					 ?>
						<tr class="odd gradeX">
							<td><?php echo $info['rname'];?></td>
							<td><?php echo $info['location'];?></td>
							<td><?php echo $info['phone'];?></td>
							<td><?php echo $info['email'];?></td>
							<td><img src="<?php  echo $info['image']; ?>" height="30px" width="40px"></td>
							<td><?php echo $info['cuisine'];?></td>
							<td>
							<a href="editrestaurent.php?editid=<?php echo $info['id']; ?>">Edit</a> 
							|| 
							<a onclick="return confirm('Are You Sure to Delete the Restaurant from table!!');" href="deleterestaurent.php?delid=<?php echo $info['id']; ?>">Delete</a>
							</td>
						</tr>

						<?php } } ?>

					</tbody>
				</table>
	
               </div>
            </div>
        </div>
        


<script type="text/javascript">
        $(document).ready(function () {
            setupLeftMenu();
            $('.datatable').dataTable();
			setSidebarHeight();
        });
 </script>

 <?php include'inc/footer.php'; ?>     