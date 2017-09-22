<?php include AS_THEME."as_header.php"; ?>
	<div id="site_content">	

	  <div id="content"> 
        
        <div class="content_item">
		<br>
		  <h1>Submit a Complaint</h1> 
          <br><hr><br>
			<div class="main_content">
				<form role="form" method="post" name="PostComplaint" action="index.php?action=complaint_new" enctype="multipart/form-data" >
                <table style="width:100%;font-size:20px;">
				<tr>
					<td>Complaint Title:<br>
					<input type="text" autocomplete="off" name="title" required></td>
				</tr>
                <tr>
					<td>Description (500 max):<br>
					<textarea name="content" autocomplete="off" rows="5" required></textarea></td>
				</tr>
				</table><br>
				<input type="hidden" name="clientid" value="<?php echo $userid ?>">
                 <center><input type="submit" class="submit_this" name="SubmitComplaint" value="Submit Your Complaint">
			  </center><br></form>
				
			</div>
		<br>
      <h2><center></center></h2>
		<br>  
		</div><!--close content_item-->
      </div><!--close content-->   
	</div><!--close site_content-->  	
  </div><!--close main-->
<?php include AS_THEME."as_footer.php" ?>
    
