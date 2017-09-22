<?php include AS_THEME."as_header.php"; ?>
<div id="tooplate_main">
	<div class="col_w900 col_w900_last">
          	<h3>Add a  Student</h3>
          	<div id="cp_contact_form">
				<form role="form" method="post" action="index.php?action=student_new" >
                <input type="hidden" name="loginid" value="<?php echo $_SESSION['siteuser_user'] ?>"/>
				<label for="text">Student Name:</label><input type="text" autocomplete="off" name="student_name" required>
                    <div class="cleaner h10"></div>
				<label for="text">Admission Number:</label><input type="text" autocomplete="off" name="student_admno" required>
                <div class="cleaner h10"></div>
				
				<label for="text">Student Class:</label><input type="text" autocomplete="off" name="student_class" required>
                <div class="cleaner h10"></div>
				
				<label for="text">Student Sex:</label><input type="radio" name="student_sex" value="1" required> Male 
					<input type="radio" name="student_sex" value="2" required> Female
                    <div class="cleaner h10"></div>
				
				<label for="text">Password:</label><input type="password" autocomplete="off" name="student_password">
                    <div class="cleaner h10"></div>
					
                <input type="submit" id="submit" name="AddItem" value="Save and Add" class="submit_btn float_l" />
                <input type="submit" id="submit" name="AddClose" value="Save and Close" class="submit_btn float_l" />
				
			</form>
    </div>
</div>
        <div class="cleaner"></div>
    </div>
</div>
<?php include AS_THEME."as_footer.php" ?>
    
