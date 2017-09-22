<?php include AS_THEME."as_header.php";
	$database = new As_Dbconn();
	$as_db_query = "SELECT * FROM as_group ORDER BY groupid DESC LIMIT 20";
	$results = $database->get_results( $as_db_query );
?>
				</div>
			</div>

			<div id="main" class="wrapper style1">
				<section class="container">
					<header class="major">
						<h2><?php echo $database->as_num_rows( $as_db_query ) ?> Groups
		  <a class="button_small" style="float:right;text-align:center;" href="index.php?action=group_new">New Group</a> </h2> 
          
			<div class="main_content" align="center">
			   <table class="tt_tb">
				<thead><tr class="tt_tr">
				  <th>Full Name</th>
				  <th>Adm No.</th>
				  <th>Gender</th>
				  <th>Class</th>
				</tr></thead>
				<tbody>
                <?php foreach( $results as $row ) { ?>
		        <tr onclick="location='index.php?action=group_view&amp;as_groupid=<?php echo $row['groupid'] ?>'">
					<td><?php echo $row['group_name'] ?></td>
					<td><?php echo $row['group_title'] ?></td>
					<td><?php echo $row['group_gender'] ?></td>
					<td><?php echo $row['group_content'] ?></td>
		        </tr>
			
			<?php } ?>
			
				  </tbody>
				</table>
			</div>
		<br>
      <h2><center></center></h2>
		<br>  
		</div><!--close content_group-->
      </div><!--close content-->   
	</div><!--close site_content-->  	
  </div><!--close main-->
<?php include AS_THEME."as_footer.php" ?>
    
