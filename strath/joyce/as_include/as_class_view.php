<?php 

	$classid = $results['class'];
	$as_db_query = "SELECT * FROM as_class WHERE classid = '$classid'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
	list( $classid, $class_term, $class_year, $class_title) = $database->get_row( $as_db_query );
}
		
?>

<?php include AS_THEME."as_header.php"; ?>
	<div id="site_content">	

	  <div id="content">
        <div>
		<br>
		  <h1>Edit class</h1> 
          
			<div class="main_content">
				<form role="form" method="post" name="PostClass" action="index.php?action=class_view&&as_classid=<?php echo $classid ?>">
					<p><span>Class Title</span><input type="text" autocomplete="off" name="title" value="<?php echo $class_title ?>"></p>
					<p><span>Class Year</span><input type="text" autocomplete="off" name="year" value="<?php echo $class_year ?>"></p>
					<p><span>Class Term</span><input type="text" autocomplete="off" name="term" value="<?php echo $class_term ?>"></p>
				
				<p style="padding-top: 15px"><span>&nbsp;</span><input type="submit" id="submitBtn" name="SaveClass" value="Save Changes"></p>		
			</form>
			</div>
      </div> 
	</div> 	
  </div>
<?php include AS_THEME."as_footer.php" ?>
    
