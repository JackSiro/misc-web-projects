<?php
	$memberid = $results['member'];
	$as_db_query = "SELECT * FROM as_member WHERE memberid = '$memberid'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
	list( $memberid, $member_name, $member_fullname, $member_status, $member_occupation, $member_children, $member_dob, $member_email, $member_joined, $member_mobile, $member_address, $member_avatar) = $database->get_row( $as_db_query );
}
?>
				</div>
			</div>

			<div id="main" class="wrapper style2">
				<section class="container">
					<header class="major">
						<h2>Edit this member</h2>
					</header>
					<div class="row">
						<div class="12u">
							<section>
						<form role="form" method="post" name="Postmember" action="index.php?action=member_new">
							<div class="form_settings">				
								<p><span>Full Name</span><input type="text" autocomplete="off" name="fullname" value="<?php echo $member_fullname ?>"></p>	
								<p><span>Date of Birth</span><input type="text" autocomplete="off" name="birthdate" value="<?php echo $member_dob ?>"></p>			
								<p><span>Occupation</span><input type="text" autocomplete="off" name="occupation" value="<?php echo $member_occupation ?>"></p>			
								<p><span>Number of Children</span><input type="text" autocomplete="off" name="children" value="<?php echo $member_children ?>"></p>
								<p><span>Marital Status</span>
									<select name="status" required>
										<option value="<?php echo $member_status ?>"></option>
										<option value="Single">Single</option>										
										<option value="Married">Married</option>										
									</select>
								</p>			
								<p><span>Email Address</span><input type="text" autocomplete="off" name="email" value="<?php echo $member_email ?>"></p>				
								<p><span>Mobile (Optional)</span><input type="text" autocomplete="off" name="mobile" value="<?php echo $member_mobile ?>"></p>				
								<p><span>Physical Address</span><input type="text" autocomplete="off" name="address" value="<?php echo $member_address ?>"></p>
													
								<br><p><input class="submit" type="submit" name="UpdateMember" value="Update Member"><span>
								<input class="submit" type="submit" name="DeleteMember" value="Delete Member" onclick="return confirm('Are you sure you want to delete this patron from the system? \nBe careful, this page can not be reversed.')">
								</p></div></form>
					</section>
						</div>
					</div>
				</section>
			</div>
<?php include AS_THEME."as_footer.php" ?>
    
