<?php include'inc/header.php'; ?>
<?php include'inc/sidebar.php'; ?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>Menu List</h2>

                <?php
                   if (isset($_GET['delid'])) {
                  	 $delid = $_GET['delid'];
                  	 $result = $db-> deleteMenuitem($delid);

                  	  if ($result) {
                           echo "<span class = 'success'>Menu Item Deleted  successfully</span>";
                      }else{
                           echo "<span class = 'error'>Menu Item Not Deleted  successfully</span>";
                      }
                   }
                    
                ?>

                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th width="20%">Serial No.</th>
							<th width="20%" >Restaurent Name</th>
							<th width="20%">Item Name</th>
							<th width="20%">tk</th>
							<th width="20%">Action</th>
						</tr>
					</thead>
					<tbody>
					<?php
						$result = $db-> menulist();
						foreach ($result as $item) {
							if ($result) {
							

					?>
						<tr class="odd gradeX">
							<td><?php echo $item['id']; ?></td>
							<td><?php echo $item['rname']; ?></td>
							<td><?php echo $item['name']; ?></td>
							<td><?php echo $item['tk']; ?></td>
							<td>
							<a href="editmenu.php?editid=<?php echo $item['id']; ?>">Edit</a> 
							|| 
							<a onclick="return confirm('Are You Sure to Delete the food item from table tbl_menu !!');" href="?delid=<?php echo $item['id']; ?>">Delete</a>
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