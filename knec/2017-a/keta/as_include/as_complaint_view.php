<?php 
	$complaintid = $_GET['as_complaintid'];
	$as_db_query = "SELECT * FROM as_complaint
					LEFT JOIN as_client ON as_complaint.complaint_client = as_client.clientid
					WHERE complaintid=$complaintid";
	$database = new As_DbConn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
	list( $complaintid, $complaint_client, $complaint_title, $complaint_content, $complaint_reply, $complaint_createdby, $complaint_created, $clientid, $client_name, $client_fullname, $client_sex, $client_email) = $database->get_row( $as_db_query );
}
		
?>

<?php include AS_THEME."as_header.php"; ?>
	<div id="site_content">	

	  <div id="content"> 
        
        <div class="content_item">
		<br>
		  <h1><?php echo $complaint_title ?> <span style="float:right">Posted <?php echo as_timeago($complaint_created) ?><br>
		  <a href="index.php?action=complaint_delete&&as_complaintid=<?php echo $complaintid ?>" onclick="return confirm('Are you sure you want to delete: this complaint from the system? \nBe careful, this action can not be reversed.')">Delete This Complaint</a>
		  </span></h1> 
          <div class="comp_content">
			 <p><?php echo $complaint_content ?><br>
			 Posted by: <?php echo as_complaint_client($client_fullname, $clientid) ?>
			 </p><br>
			 <?php if (empty($complaint_reply)) { ?><hr><br>
					<form role="form" method="post" name="PostComplaint" action="index.php?action=complaint_view" enctype="multipart/form-data" >
					Reply to this Complaint Now:<br>
					<textarea name="contreply" autocomplete="off" rows="5" required></textarea></td>
					<input type="hidden"name="postid" value="<?php echo $complaintid ?>">
                 <center><input type="submit" class="submit_this" name="SubmitReply" value="Post Reply">
			  </center></form><br>
			 <?php } else {	?>
				<table class="td_dashboard">
					<tr>
						<td valign="top"><h3>Solution:</h3></td>
						<td><p><?php echo $complaint_reply ?></p></td>					
					</tr>
				</table>			 
			 <?php } ?>
		</div>
      <h2><center></center></h2>
		<br>  
		</div><!--close content_item-->
      </div><!--close content-->   
	</div><!--close site_content-->  	
  </div><!--close main-->
<?php include AS_THEME."as_footer.php" ?>
    
