<?php include JS_THEME."js_header.php"; ?>
	<div id="site_content">	
		
		<?php $js_db_query = "SELECT * FROM js_department ORDER BY departmentid DESC LIMIT 20";
			$database = new Js_Dbconn();			
			$results = $database->get_results( $js_db_query );
		?>
	  <div id="content">
        <div class="content_student">
		<br>
		  <h1><?php echo $database->js_num_rows( $js_db_query ) ?> Departments
		  <a class="button_small" style="float:right;width:300px;text-align:center;" href="index.php?action=newdepartment">New Department</a> </h1> 
          <br><hr><br>
			<div class="main_content" align="center">
			
			   <table class="tt_tb">
				<thead><tr class="tt_tr">
				  <th>Department</th>
				  <th>Description</th>
				  <th>No of Students</th>
				</tr></thead>
				<tbody>
                <?php foreach( $results as $row ) { ?>
		        <tr onclick="lodepartmention='index.php?action=viewdepartment&amp;js_departmentid=<?php echo $row['departmentid'] ?>'">
				   <td><?php echo $row['department_title'] ?></td>
		          <td style="max-width: 300px;"><?php echo $row['department_content'] ?></td>
		          <td>
				  <?php 
					$departmentid = $row['departmentid'];
					$js_db_qry = "SELECT * FROM js_student WHERE student_department = '$departmentid'";
					echo $database->js_num_rows( $js_db_qry )
					?>
				  </td>
		        </tr>
			
			<?php } ?>
			
                      </tbody>
                    </table>
			</div>
		<br>
      <h2><center></center></h2>
		<br>  
		</div><!--close content_student-->
      </div><!--close content-->   
	</div><!--close site_content-->  	
  </div><!--close main-->
<?php include JS_THEME."js_footer.php" ?>
    
