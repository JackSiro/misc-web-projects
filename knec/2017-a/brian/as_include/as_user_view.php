<?php
	$userid = $results['user'];
	$as_db_query = "SELECT * FROM as_user WHERE userid = '$userid'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
	list( $userid, $user_name, $user_fname, $user_surname, $user_sex, $user_password, $user_email, $user_group, $user_joined, $user_mobile, $user_web, $user_avatar) = $database->get_row( $as_db_query );
}
include AS_THEME."as_header.php"; ?>
    <div id="site_content">
      <div id="banner"></div>	
		<div id="content">
		    <h1>Edit this  User<a style="float:right;width:300px;text-align:center;" href="index.php?action=user_delete&&as_userid=<?php echo $userid ?>" onclick="return confirm('Are you sure you want to delete: This user from the system? \nBe careful, this action can not be reversed.')">Delete User</a> </h1>
			<div class="main_content">
				<form role="form" method="post" name="EditUser" action="index.php?action=user_view&&as_userid=<?php echo $userid ?>">
                <div class="form_settings">
				<p><span>Choose a position:</span><select name="group" style="padding-left:20px;">
						<option value="<?php echo $user_group ?>" ><?php if (empty($user_group)) echo " - Choose a position - "; else echo $user_group; ?></option>
						<option value="super-admin" > Super Admin </option>
						<option value="admin" > Admin </option>
						<option value="manager" > Manager </option>
						<option value="editor" > Editor </option>
						<option value="xplorer" > Explorer </option>		
						</select>
					</p>
				<p><span>First  Name:</span><input type="text" autocomplete="off" name="fname" value="<?php echo $user_fname ?>"></p>
				<p><span>Second Name:</span><input type="text" autocomplete="off" name="surname" value="<?php echo $user_surname ?>"></p>
				<p><span>Email Address:</span><input type="text" autocomplete="off" name="email" value="<?php echo $user_email ?>"></p>				
				<p><span>Mobile (Optional):</span><input type="text" autocomplete="off" name="mobile" value="<?php echo $user_mobile ?>"></p>				
				<p><span>Preferred Username:</span><input type="text" autocomplete="off" name="username" value="<?php echo $user_name ?>"></p>
				<p style="padding-top: 15px"><span><input type="submit" class="submit" name="SaveItem" value="Save Changes"></span>
						<input type="submit" class="submit" name="SaveClose" value="Save & Close"></p>
			  </div>
			</form>
		</div>
    </div>
    </div>
    </div>
<?php include AS_THEME."as_footer.php" ?>