<?php 

	$memberid = $results['member'];
	$as_db_query = "SELECT * FROM as_member WHERE memberid = '$memberid'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
	list( $memberid, $member_name, $member_fullname, $member_sex, $member_bike, $member_dob, $member_email, $member_joined, $member_mobile, $member_address) = $database->get_row( $as_db_query );
}
include AS_THEME."as_header.php"; ?>
<div id="site_content">
	<h1>Update a member</h1> 
    <form role="form" method="post" name="Postmember" action="index.php?action=member_view&&as_memberid=<?php echo $memberid ?>" >
         <div class="form_settings">		
			<p><span>Full Name</span><input type="text" autocomplete="off" name="fullname" value="<?php echo $member_fullname ?>"></p>	
			<p><span>Date of Birth</span><input type="text" autocomplete="off" name="birthdate" value="<?php echo $member_dob ?>"></p>			
			<p><span>Bike Reg. No</span><input type="text" autocomplete="off" name="regno" value="<?php echo $member_bike ?>"></p>			
			<p><span>Email Address</span><input type="text" autocomplete="off" name="email" value="<?php echo $member_email ?>"></p>				
			<p><span>Mobile (Optional)</span><input type="text" autocomplete="off" name="mobile" value="<?php echo $member_mobile ?>"></p>			
			<p><span>Physical Address</span><input type="text" autocomplete="off" name="address" value="<?php echo $member_address ?>"></p>								
			<br><p>
				<input class="submit" type="submit" name="UpdateItem" value="Update member">
				<input class="submit" type="submit" name="DeleteItem" value="Delete member" onclick="return confirm('Are you sure you want to delete: <?php echo $member_fullname ?> from the system? \nBe careful, this action can not be reversed.')">
			</p></div>
	</form>
</div>
<?php include AS_THEME."as_footer.php" ?>
    
