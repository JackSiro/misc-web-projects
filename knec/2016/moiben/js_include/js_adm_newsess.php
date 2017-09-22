<?php include JS_THEME."js_header.php";
	$myaccount = isset( $_SESSION['account'] ) ? $_SESSION['account'] : "";
	?>
	<div class="content">
    <div class="content_resize">
       <div class="mainbarx">
        <div class="article"><br>
		<?php include JS_THEME."js_sidebar_adm.php";	?>	
          <h2>Add a new Patient</h2>
		  <br>
		  	
          <form action="admin.php?action=newsess" method="post">
		<table style="width:100%;font-size:20px;">
		<tr>
			<td>Doctor:</td>
			<td>
			  <select name="doctor" >
				<option value="" > - Choose a Doctor - </option>
				<?php $js_dt_query = "SELECT * FROM js_user ORDER BY user_fullname ASC";
					$database = new Js_Dbconn();			
					$results = $database->get_results( $js_dt_query );
		
					foreach( $results as $row ) { ?>
					  <option value="Dr <?php echo $row['user_fullname'] ?>">  Doctor <?php echo $row['user_fullname'] ?></option>
					<?php } ?>
			  </select>
			</td>
		</tr>
		<tr> 
			<td>Patient:</td>
			<td>
			<select name="patient" >
				<option value="" > - Choose a Patient - </option>
				<?php $js_dt_query = "SELECT * FROM js_patient ORDER BY pat_fullname ASC";
					$database = new Js_Dbconn();			
					$results = $database->get_results( $js_dt_query );
		
					foreach( $results as $row ) { ?>
					  <option value="<?php echo $row['pat_fullname'] ?>"><?php echo $row['pat_fullname'] ?></option>
					<?php } ?>
			  </select>
			</td>
		</tr>
		<tr> 
			<td>Time In (in Minutes):</td>
			<td><input type="text" class="input_form" name="timein" autocomplete="off" ></td>
		</tr>
		<tr>
			<td>Time Out (in Minutes):</td>
			<td><input type="text" class="input_form" name="timeout" autocomplete="off" ></td>
		</tr>
		<tr>
			<td></td>
			<td>
			<input type="submit" class="submit_form_i" name="AddSession" value="Add New Session">
	 
			</td>
		</tr>
		</table><br>
				<br>
		</form></center>
        </div>
      </div>
		
      <div class="clr"></div>
    </div>
  </div>
 
<?php include JS_THEME."js_footer.php" ?>
    
