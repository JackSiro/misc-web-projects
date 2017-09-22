<?php include JS_THEME."js_header.php"; ?>
	<div id="site_content">	
		
<?php 
	$database = new Js_Dbconn();			
	
	$search = $_GET['js_search'];
	$searchdepartment = $_GET['js_departmentid'];
	if ($searchdepartment<=0){
		$search_department = "All";
		$js_db_query = "SELECT * FROM js_student
		WHERE student_name like '%$search%'
		OR student_fee like '%$search%'
		OR student_class like '%$search%'
		OR student_gender like '%$search%'";
	} else {
		$search_department = js_department_student($searchdepartment);
		$js_db_query = "SELECT * FROM js_student
		WHERE student_name like '%$search%'
		OR student_fee like '%$search%'
		OR student_class like '%$search%'
		OR student_gender like '%$search%' 
		OR student_department like '%$searchdepartment%'";
	}
	
	$results = $database->get_results( $js_db_query );
	
?>
	  <div id="content">
        <div class="content_student">
		<br>
		  <h1><?php echo $database->js_num_rows( $js_db_query ) ?> Students found
		  <a class="button_small" style="float:right;width:300px;text-align:center;" href="index.php?action=newstudent">Add New Student</a> </h1> 
          <br><hr><br>
			<div class="main_content" align="center">
			<form method="post" >
			<table style="width:100%;"><tr><td>
			<input type="text" name="js_search" id="js_search" placeholder="Search the college" value="<?php echo $search ?>" />
			</td><td>
				<select name="js_departmentid">
				<option  value="<?php echo $searchdepartment ?>"><?php echo $search_department ?></option>
			<?php $js_department_qry = "SELECT * FROM js_department ORDER BY department_title ASC";
				$department_results = $database->get_results( $js_department_qry );
				
				foreach( $department_results as $js_department ) { ?>
						<option value="<?php echo $js_department['departmentid'] ?>">  <?php echo $js_department['department_title'] ?></option>
				<?php } ?>
				</select>
			</td>
			<td><input type="submit" style="width:200px" name="SearchThis" value="Search" /></td></tr>
			</table>
			</form>
			   <table class="tt_tb">
				<thead><tr class="tt_tr">
				  <th style="width:70px;"></th>
				  <th>Department</th>
				  <th>Title</th>
				  <th>Publisher</th>
				  <th>Subject</th>
				  <th></th>
				</tr></thead>
				<tbody>
                <?php foreach( $results as $row ) { ?>
		        <tr onclick="lodepartmention='index.php?action=viewstudent&amp;js_studentid=<?php echo $row['studentid'] ?>'">
				   <td><img class="iconic" src="js_media/<?php echo $row['student_img'] ?>" /></td>
				   <td><?php echo js_department_student($row['student_department']) ?></td>
				   <td><?php echo $row['student_name'] ?></td>
		          <?php //echo substr($row['student_fee'],0,100).'...' ?>
				  <td><?php echo $row['student_class'] ?></td>
				  <td><?php echo $row['student_gender'] ?></td>
		          <td></td>
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
    
