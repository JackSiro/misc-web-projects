<?php include AS_THEME."as_header.php"; ?>
				</div>
			</div>

			<div id="main" class="wrapper style2">
				<section class="container">
					<header class="major">
						<h2>Add a new member</h2>
					</header>
					<div class="row">
						<div class="12u">
							<section>
						<form role="form" method="post" name="Postmember" action="index.php?action=member_new">
							<div class="form_settings">				
								<p><span>Full Name</span><input type="text" autocomplete="off" name="fullname"></p>	
								<p><span>Date of Birth</span><input type="text" autocomplete="off" name="birthdate"></p>			
								<p><span>Occupation</span><input type="text" autocomplete="off" name="occupation"></p>			
								<p><span>Number of Children</span><input type="text" autocomplete="off" name="children"></p>
								<p><span>Marital Status</span>
									<select name="status" required>
										<option value=""></option>
										<option value="Single">Single</option>										
										<option value="Married">Married</option>										
									</select>
								</p>			
								<p><span>Email Address</span><input type="text" autocomplete="off" name="email"></p>				
								<p><span>Mobile (Optional)</span><input type="text" autocomplete="off" name="mobile"></p>				
								<p><span>Physical Address</span><input type="text" autocomplete="off" name="address"></p>
													
								<br><p><input class="submit" type="submit" name="Addmember" value="Save & Add"><span>
											<input class="submit" type="submit" name="AddClose" value="Save & Close">
								</p></div></form>
					</section>
						</div>
					</div>
				</section>
			</div>
<?php include AS_THEME."as_footer.php" ?>
    
