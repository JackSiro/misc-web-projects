<?php 

	$ticketid = $results['item'];
	$js_db_query = "SELECT * FROM js_elibrary WHERE ticketid = '$ticketid'";
	$database = new Js_Dbconn();
	if( $database->js_num_rows( $js_db_query ) > 0 ) {
	list( $ticketid, $ticket_code, $ticket_cat, $ticket_slug, $ticket_title, $ticket_content, $ticket_postedby, $ticket_posted, $ticket_publisher, $ticket_subject, $ticket_img, $ticket_updated, $ticket_updatedby) = $database->get_row( $js_db_query );
}
		
?>
<?php include JS_THEME."js_header.php"; ?>
	<div id="site_content">	

	  <div id="content"> 
        
	  
        <div class="content_item">
		<br>
		  <h1>Edit an Company Material</h1> 
          <br><hr><br>
			<div class="main_content">
				<form role="form" method="post" name="SaveItem" action="index.php?page=edititem&&js_ticketid=<?php echo $ticketid ?>" enctype="multipart/form-data" >
                <table style="width:100%;font-size:20px;">
				<tr>
					<td>Choose a Category:</td>
					<td><select name="bus" style="padding-left:20px;">
						<option value="<?php echo $ticketid ?>" > - Choose a Category - </option>
			<?php $js_db_query = "SELECT * FROM js_bus ORDER BY cat_title ASC";
				$database = new Js_Dbconn();			
				$results = $database->get_results( $js_db_query );
				
				foreach( $results as $row ) { ?>
						<option value="<?php echo $row['catid'] ?>">  <?php echo $row['cat_title'] ?></option>
				<?php } ?>
						</select>
					</td>
				</tr>
				<tr>
					<td>Title of the Material:</td>
					<td><input type="text" autocomplete="off" name="title" value="<?php echo $ticket_title ?>"></td>
				</tr>
				<tr>
					<td>Code of the Material:</td>
					<td><input type="text" autocomplete="off" name="code" value="<?php echo $ticket_code ?>"></td>
				</tr>
				<tr>
					<td>Upload Item Icon:</td>
					<td>
					<input type="hidden" name="itemimg" value="<?php echo $ticket_img ?>">	
						<table style="width:100%"><tr><td>
						<img src="<?php echo 'js_media/'.$ticket_img ?>" style="width:70px;height:70px;" >
						</td><td>
						<input name="filename" autocomplete="off" type="file" accept="image/*" >
						</td></tr></table>
					</td>
				</tr>
                
                <tr>
					<td>Description (500 max):</td>
					<td><textarea style="height:200px" name="content" autocomplete="off" ><?php echo $ticket_content ?></textarea></td>
				</tr>
				<tr>
					<td>Publisher of the Material:</td>
					<td><input type="text" autocomplete="off" name="publisher" value="<?php echo $ticket_publisher ?>"></td>
				</tr>
				
				<tr>
					<td>Subject/Topic of the Material:</td>
					<td><input type="text" autocomplete="off" name="subject" value="<?php echo $ticket_subject ?>"></td>
				</tr>
				
				</table><br>
                        <center><input type="submit" class="submit_this" name="SaveItem" value="Save Changes">
						<input type="submit" class="submit_this" name="SaveClose" value="Save & Close">
			  </center><br></form>
				
			</div>
		<br>
      <h2><center></center></h2>
		<br>  
		</div><!--close content_item-->
      </div><!--close content-->   
	</div><!--close site_content-->  	
  </div><!--close main-->
<?php include JS_THEME."js_footer.php" ?>
    
