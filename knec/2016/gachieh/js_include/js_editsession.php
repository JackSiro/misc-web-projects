<?php 

	$sessionid = $results['session'];
	$js_db_query = "SELECT * FROM js_session WHERE sessionid = '$sessionid'";
	$database = new Js_Dbconn();
	if( $database->js_num_rows( $js_db_query ) > 0 ) {
	list( $sessionid, $session_code, $session_farmer, $session_slug, $session_title, $session_content, $session_postedby, $session_posted, $session_publisher, $session_subject, $session_img, $session_updated, $session_updatedby) = $database->get_row( $js_db_query );
}
		
?>
<?php include JS_THEME."js_header.php"; ?>
	<div id="site_content">	

	  <div id="content">
        <div class="content_session">
		<br>
		  <h1>Edit an Sessions Session</h1> 
          <br><hr><br>
			<div class="main_content">
				<form role="form" method="post" name="SaveItem" action="index.php?js_pageaction=editsession&&js_sessionid=<?php echo $sessionid ?>" enctype="multipart/form-data" >
                <table style="width:100%;font-size:20px;">
				<tr>
					<td>Choose a Farmer:</td>
					<td><select name="farmer" style="padding-left:20px;">
						<option value="<?php echo $sessionid ?>" > - Choose a Farmer - </option>
			<?php $js_db_query = "SELECT * FROM js_farmer ORDER BY farmer_fullname ASC";
				$database = new Js_Dbconn();			
				$results = $database->get_results( $js_db_query );
				
				foreach( $results as $row ) { ?>
						<option value="<?php echo $row['farmerid'] ?>">  <?php echo $row['farmer_fullname'] ?></option>
				<?php } ?>
						</select>
					</td>
				</tr>
				<tr>
					<td>Title of the Session:</td>
					<td><input type="text" autocomplete="off" name="title" value="<?php echo $session_title ?>"></td>
				</tr>
				<tr>
					<td>Code of the Session:</td>
					<td><input type="text" autocomplete="off" name="code" value="<?php echo $session_code ?>"></td>
				</tr>
				<tr>
					<td>Upload Item Icon:</td>
					<td>
					<input type="hidden" name="sessionimg" value="<?php echo $session_img ?>">	
						<table style="width:100%"><tr><td>
						<img src="<?php echo 'js_media/'.$session_img ?>" style="width:70px;height:70px;" >
						</td><td>
						<input name="filename" autocomplete="off" type="file" accept="image/*" >
						</td></tr></table>
					</td>
				</tr>
                
                <tr>
					<td>Description (500 max):</td>
					<td><textarea style="height:200px" name="content" autocomplete="off" ><?php echo $session_content ?></textarea></td>
				</tr>
				<tr>
					<td>Publisher of the Session:</td>
					<td><input type="text" autocomplete="off" name="publisher" value="<?php echo $session_publisher ?>"></td>
				</tr>
				
				<tr>
					<td>Subject/Topic of the Session:</td>
					<td><input type="text" autocomplete="off" name="subject" value="<?php echo $session_subject ?>"></td>
				</tr>
				
				</table><br>
                        <center><input type="submit" class="submit_this" name="SaveItem" value="Save Changes"></center><br></form>
				
			</div>
		<br>
      <h2><center></center></h2>
		<br>  
		</div><!--close content_session-->
      </div><!--close content-->   
	</div><!--close site_content-->  	
  </div><!--close main-->
<?php include JS_THEME."js_footer.php" ?>
    
