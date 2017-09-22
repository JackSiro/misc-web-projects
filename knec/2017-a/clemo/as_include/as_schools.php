<?php include AS_THEME."as_header.php"; ?>
	<div id="site_content">	
		
<?php 
	$database = new As_Dbconn();			
	
	$search = $_GET['as_search'];
	$searchclass = $_GET['as_classid'];
	if ($searchclass<=0){
		$search_class = "All";
		$as_db_query = "SELECT * FROM as_student
		WHERE student_name like '%$search%'
		OR student_fee like '%$search%'
		OR student_class like '%$search%'
		OR student_gender like '%$search%'";
	} else {
		$search_class = as_class_student($searchclass);
		$as_db_query = "SELECT * FROM as_student
		WHERE student_name like '%$search%'
		OR student_fee like '%$search%'
		OR student_class like '%$search%'
		OR student_gender like '%$search%' 
		OR student_class like '%$searchclass%'";
	}
	
	$results = $database->get_results( $as_db_query );
	
?>
	  <div id="content">
        <div>
		<br>
		  <h1><?php echo $database->as_num_rows( $as_db_query ) ?> Students found
		  <a class="button_small" style="float:right;text-align:center;" href="index.php?action=student_new">Add New Student</a> </h1> 
          
			<div class="main_content" align="center">
			<form method="post" >
			<table style="width:100%;"><tr><td>
			<input type="text" name="as_search" id="as_search" placeholder="Search the college" value="<?php echo $search ?>" />
			</td><td>
				<select name="as_classid">
				<option  value="<?php echo $searchclass ?>"><?php echo $search_class ?></option>
			<?php $as_class_qry = "SELECT * FROM as_class ORDER BY class_title ASC";
				$class_results = $database->get_results( $as_class_qry );
				
				foreach( $class_results as $as_class ) { ?>
						<option value="<?php echo $as_class['classid'] ?>">  <?php echo $as_class['class_title'] ?></option>
				<?php } ?>
				</select>
			</td>
		<input type="submit" style="width:200px" name="SearchThis" value="Search" /></td></tr>
			</table>
			</form>
			   <table class="tt_tb">
				<thead><tr class="tt_tr">
				  <th style="width:70px;"></th>
				  <th>Class</th>
				  <th>Title</th>
				  <th>Publisher</th>
				  <th>Subject</th>
				  <th></th>
				</tr></thead>
				<tbody>
                <?php foreach( $results as $row ) { ?>
		        <tr onclick="location='index.php?action=student_view&amp;as_studentid=<?php echo $row['studentid'] ?>'">
				   <td><img class="iconic" src="as_media/<?php echo $row['student_img'] ?>" /></td>
				   <td><?php echo as_class_student($row['student_class']) ?></td>
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
<?php include AS_THEME."as_footer.php" ?>
    
