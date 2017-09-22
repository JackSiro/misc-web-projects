<?php include JS_THEME."js_header.php"; ?>
	<div id="site_content">	
		
<?php 
	$database = new Js_Dbconn();			
	
		$js_db_query = "SELECT * FROM js_department ORDER BY departmentid DESC LIMIT 20";
		$results = $database->get_results( $js_db_query );
	?>
	  <div id="content">
        <div class="content_department">
		<br>
		  <h1><?php echo $database->js_num_rows( $js_db_query ) ?> Departments
		  <a style="float:right;width:300px;text-align:center;" href="index.php?js_pageaction=newdepartment">Add New Department</a> </h1> 
          <br><hr><br>
			<div class="main_content" align="center">
			
			   <table class="tt_tb">
				<thead><tr class="tt_tr">
				  <th>Name</th>
				  <th>Number</th>
				</tr></thead>
				<tbody>
                <?php foreach( $results as $row ) { ?>
		        <tr onclick="location='index.php?js_pageaction=viewdepartment&amp;js_departmentid=<?php echo $row['departmentid'] ?>'">
				   <td><?php echo $row['department_name'] ?></td>
				  <td><?php echo $row['department_number'] ?></td>
		        </tr>
			
			<?php } ?>
			
                      </tbody>
                    </table>
			</div>
		<br>
      <h2><center></center></h2>
		<br>  
		</div><!--close content_department-->
      </div><!--close content-->   
	</div><!--close site_content-->  	
  </div><!--close main-->
<?php include JS_THEME."js_footer.php" ?>
    
