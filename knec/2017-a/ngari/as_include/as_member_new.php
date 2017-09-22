<?php include AS_THEME."as_header.php"; ?>
<div id="site_content">        <h1>Add a member</h1> 
    <form role="form" method="post" name="Postmember" action="index.php?action=member_new" enctype="multipart/form-data" >
        <div class="form_settings">				
			<p><span>Full Name</span><input type="text" autocomplete="off" name="fullname"></p>	
			<p><span>Date of Birth</span><input type="text" autocomplete="off" name="birthdate"></p>			
			<p><span>Bike Reg. No</span><input type="text" autocomplete="off" name="regno"></p>			
			<p><span>Email Address</span><input type="text" autocomplete="off" name="email"></p>				
			<p><span>Mobile (Optional)</span><input type="text" autocomplete="off" name="mobile"></p>				
			<p><span>Physical Address</span><input type="text" autocomplete="off" name="address"></p>
								
			<br><p><input class="submit" type="submit" name="Addmember" value="Save & Add"><span>
						<input class="submit" type="submit" name="AddClose" value="Save & Close">
			</p></div></form>
	</div>
<?php include AS_THEME."as_footer.php" ?>
    
