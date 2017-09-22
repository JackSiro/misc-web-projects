<?php include JS_THEME."js_header.php"; ?>
	<div id="site_content">	
		
		<?php $js_db_query = "SELECT * FROM js_employee ORDER BY employeeid DESC LIMIT 20";
			$database = new Js_Dbconn();			
			$results = $database->get_results( $js_db_query );
		?>
	  <div id="content"> 
        
	  
        <div class="content_item">
		<br>
		  <h1> Employees</h1> 
          <br><hr><br>
			<div class="main_content" align="center">
			
			   <table class="tt_tb">
				<thead><tr class="tt_tr">
				  <th>Full Name</th>
				  <th>Group</th>
				  <th>Mobile</th>
				  <th>Email</th>
				  <th>Registered</th>
				</tr></thead>
				<tbody>
                <?php foreach( $results as $row ) { ?>
		        <tr onclick="location='index.php?page=employee_view&amp;js_employeeid=<?php echo $row['employeeid'] ?>'">
				   <td><?php echo $row['employee_fname'].' '.$row['employee_surname'] ?></td>
		          <td><?php echo $row['employee_group'] ?></td>
		          <td><?php echo $row['employee_mobile'] ?></td>
		          <td><?php echo $row['employee_email'] ?></td>
				  <td><?php echo date("j/m/y", strtotime($row['employee_joined'])); ?></td>
		        </tr>
			
			<?php } ?>
			
                      </tbody>
                    </table>
					<h1><?php echo $database->js_num_rows( $js_db_query ) ?> Employee
		  <a style="float:right;width:300px;text-align:center;" href="index.php?page=employee_new">Add New Employee</a> </h1>
			</div>
		<br>
      <h2><center></center></h2>
		<br>  
		</div><!--close content_item-->
      </div><!--close content-->   
	</div><!--close site_content-->  	
  </div><!--close main-->
<?php include JS_THEME."js_footer.php" ?>
    
