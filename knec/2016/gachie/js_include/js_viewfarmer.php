<?php 

	$farmerid = $results['farmer'];
	$js_db_query = "SELECT * FROM js_farmer WHERE farmerid = '$farmerid'";
	$database = new Js_Dbconn();
	if( $database->js_num_rows( $js_db_query ) > 0 ) {
	list( $farmerid, $farmer_fullname, $farmer_mobile, $farmer_email, $farmer_gender, $farmer_address) = $database->get_row( $js_db_query );
}
		
?>

<?php include JS_THEME."js_header.php"; ?>
	<div id="site_content">	

	  <div id="content">
        <div class="content_farmer">
		<br>
		  <h1>Edit farmer</h1> 
          <br><hr><br>
			<div class="main_content">
				<form role="form" method="post" name="PostFarmer" action="index.php?js_pageaction=viewfarmer&&js_farmerid=<?php echo $farmerid ?>" enctype="multipart/form-data" >
                <table style="width:100%;font-size:20px;">
				<tr>
					<td>Full Name:</td>
					<td><input type="text" autocomplete="off" name="fullname" value="<?php echo $farmer_fullname ?>"></td>
				</tr>
                <tr>
					<td>Mobile Number:</td>
					<td><input type="text" autocomplete="off" name="mobile" value="<?php echo $farmer_mobile ?>"></td>
				</tr>
                
				<tr>
					<td>Email Address:</td>
					<td><input type="text" autocomplete="off" name="email" value="<?php echo $farmer_email ?>"></td>
				</tr>
                
                <tr>
					<td>Physical Address:</td>
					<td><input type="text" autocomplete="off" name="address"  value="<?php echo $farmer_address ?>"></td>
				</tr>
                
				</table><br>
                        <center><input type="submit" class="submit_this" name="Save Changes" value="Save Changes">
			  </center><br></form>
				<br>
				<center><a href="index.php?js_pageaction=deletefarmer&&js_farmerid=<?php echo $farmerid ?>" onclick="return confirm('Are you sure you want to delete this farmer from the system? \nBe careful, this action can not be reversed.')"><h1>Delete This Farmer</h1></a></center><br>
			</div>
		<br>
      <h2><center></center></h2>
		<br>  
		</div><!--close content_farmer-->
      </div><!--close content-->   
	</div><!--close site_content-->  	
  </div><!--close main-->
<?php include JS_THEME."js_footer.php" ?>
    
