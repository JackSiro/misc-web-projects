  <?php include AS_THEME."as_header.php" ?>
    <div id="content">
		<div>
			<h1>Add a patient</h1>
			<div id="account">
				<div>
					<form method="post" action="index.php?action=patient_new" >
						<table class="form_table">
							<tr>
								<td>FullName:</td>
								<td><input type="text" autocomplete="off" name="fullname" required ></td>
							</tr>
							<tr>
								<td>Sex:</td>
								<td>					
									<table><tr><td><input type="radio" name="sex" value="1"></td><td>Male</td><td><input type="radio" name="sex" value="2"> <td>Female</td></tr></table>			
								</td>
							</tr>
							<tr>
								<td>Sickness:</td>
								<td><input type="text" autocomplete="off" name="sickness" required ></td>
							</tr>
									
							<tr>
								<td>Comment:</td>
								<td><textarea name="comment"></textarea></td>
							</tr>
									
							<tr>
								<td>Location:</td>
								<td><input type="text" autocomplete="off" name="location" required ></td>
							</tr>
							
							<tr>
								<td>Type:</td>
								<td>
									<select name="type">
										<option value="In-Patient">In-Patient</option>
										<option value="Out-Patient">Out-Patient</option>
									</select>
								</td>
							</tr>
						</table>

						<table>
							<tr>
								<td><input type="submit" class="submitbtn" name="Addpatient" value="Save & Add"></td>
								<td><input type="submit" class="submitbtn" name="AddClose" value="Save & Close "></td>
							</tr>
						</table>
					</form>
				</div>
				</div>
			</div>
		</div>
	</div>
    <?php include AS_THEME."as_footer.php" ?>
   