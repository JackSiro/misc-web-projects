<?php include AS_THEME."as_header.php"; ?>
<div id="site_content">        <h1>Add a visitor</h1> 
    <form role="form" method="post" name="Postvisitor" action="index.php?action=visitor_new" enctype="multipart/form-data" >
                <div class="form_settings">
				
			<p><span>Full Name</span><input type="text" autocomplete="off" name="fullname"></p>
				
			<p><span>Email Address</span><input type="text" autocomplete="off" name="email"></p>
				
			<p><span>Mobile (Optional)</span><input type="text" autocomplete="off" name="mobile"></p>
				
			<p><span>Physical Address</span><input type="text" autocomplete="off" name="address"></p>
								
			<br><p><input type="submit" class="readmore" name="Addvisitor" value="Save and Add Another visitor">
						<input type="submit" class="readmore" name="AddClose" value="Save and Close">
			</p></div></form>
			</div>
<?php include AS_THEME."as_footer.php" ?>
    
