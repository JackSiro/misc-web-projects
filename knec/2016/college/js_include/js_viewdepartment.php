<?php 

	$departmentid = $results['department'];
	$js_db_query = "SELECT * FROM js_department WHERE departmentid = '$departmentid'";
	$database = new Js_Dbconn();
	if( $database->js_num_rows( $js_db_query ) > 0 ) {
	list( $departmentid, $department_slug, $department_title, $department_icon, $department_content) = $database->get_row( $js_db_query );
}
		
?>

<?php include JS_THEME."js_header.php"; ?>
	<div id="site_content">	

	  <div id="content">
        <div class="content_student">
		<br>
		  <h1>Edit department</h1> 
          <br><hr><br>
			<div class="main_content">
				<form role="form" method="post" name="PostDepartment" action="index.php?action=viewdepartment&&js_departmentid=<?php echo $departmentid ?>" enctype="multipart/form-data" >
                <table style="width:100%;font-size:20px;">
				<tr>
					<td>Department Title: </td>
					<td><input type="text" autocomplete="off" name="title" value="<?php echo $department_title ?>"></td>
				</tr>
				<tr>
					<td>Department Icon:</td>
					<td>		
						<input type="hidden" name="departmenticon" value="<?php echo $department_icon ?>">	
						<table style="width:100%"><tr><td>
						<img src="<?php echo 'js_media/'.$department_icon ?>" style="width:70px;height:70px;" >
						</td><td>
						<input name="filename" autocomplete="off" type="file" accept="image/*" >
						</td></tr></table>
						</td>
				</tr>
                
                <tr>
					<td>Description (500 max):</td>
					<td><textarea name="content" autocomplete="off" ><?php echo $department_content?></textarea></td>
				</tr>
				</table><br>
                        <center><input type="submit" class="submit_this" name="SaveClass" value="Save Changes">
						<input type="submit" class="submit_this" name="SaveClose" value="Save & Close">
			  </center><br></form>
				
			</div>
		<br>
      <h2><center></center></h2>
		<br>  
		</div><!--close content_student-->
      </div><!--close content-->   
	</div><!--close site_content-->  	
  </div><!--close main-->
<?php include JS_THEME."js_footer.php" ?>
    
