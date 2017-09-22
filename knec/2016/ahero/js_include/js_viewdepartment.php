<?php 

	$departmentid = $results['department'];
	$js_db_query = "SELECT * FROM js_department WHERE departmentid = '$departmentid'";
	$database = new Js_Dbconn();
	if( $database->js_num_rows( $js_db_query ) > 0 ) {
	list( $departmentid, $department_code, $department_payslip, ) = $database->get_row( $js_db_query );
}
		
?>

<?php include JS_THEME."js_header.php"; ?>
	<div id="site_content">	

	  <div id="content">
        <div class="content_department">
		<br>
		  <h1>Departments: <?php echo $department_title.' | '.$department_code ?></h1> 
          <br><br>
			<div class="main_content">
				
				<div class="detail_info">
					<h2>Name: <?php echo $department_name ?></h2>
					<h2>Number: <?php echo $department_number ?></h2>
					<center><a href="index.php?js_pageaction=deletedepartment&&js_departmentid=<?php echo $departmentid ?>" onclick="return confirm('Are you sure you want to delete: <?php echo $department_title ?> from the system? \nBe careful, this action can not be reversed.')"><h1>Delete Department</h1></a></center>
				</div>
				
			</div>
		<br>
      <h2><center></center></h2>
		<br>  
		</div><!--close content_department-->
      </div><!--close content-->   
	</div><!--close site_content-->  	
  </div><!--close main-->
<?php include JS_THEME."js_footer.php" ?>
    
