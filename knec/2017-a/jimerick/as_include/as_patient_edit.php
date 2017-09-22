  <?php include AS_THEME."as_header.php" ?>
<div id="content">Edit an Nafaka Material</h3><br>
				<div>
				<form method="post" 
				action="index.php?action=editpatient&&as_patientid=<?php echo $patientid ?>" enctype="multipart/form-data" >
				<center><h2><b><u>Site Options</u></b></h2></center><br>
				<table class="form_table">
				
				<tr>
					<td>Choose a Category:</td>
					<td><select name="type" style="padding-left:20px;">
						<option value="<?php echo $patientid ?>" > - Choose a Category - </option>
			<?php $as_db_query = "SELECT * FROM as_type ORDER BY cat_title ASC";
				$database = new As_Dbconn();			
				$results = $database->get_results( $as_db_query );
				
				foreach( $results as $row ) { ?>
						<option value="<?php echo $row['catid'] ?>">  <?php echo $row['cat_title'] ?></option>
				<?php } ?>
						</select>
					</td>
				</tr>
				<tr>
					<td>Title of the Material:</td>
					<td><input type="text" autocomplete="off" name="title" value="<?php echo $patient_name ?>"></td>
				</tr>
				<tr>
					<td>Code of the Material:</td>
					<td><input type="text" autocomplete="off" name="code" value="<?php echo $patient_code ?>"></td>
				</tr>
				<tr>
					<td>Upload patient Icon:</td>
					<td>
					<input type="hidden" name="patientimg" value="<?php echo $patient_img ?>">	
						<table style="width:100%"><tr><td>
						<img src="<?php echo 'as_media/'.$patient_img ?>" style="width:70px;height:70px;" >
						</td><td>
						<input name="filename" autocomplete="off" type="file" accept="image/*" >
						</td></tr></table>
					</td>
				</tr>
                
                <tr>
					<td>Description (500 max):</td>
					<td><textarea style="height:200px" name="content" autocomplete="off" ><?php echo $patient_content ?></textarea></td>
				</tr>
				<tr>
					<td>Publisher of the Material:</td>
					<td><input type="text" autocomplete="off" name="publisher" value="<?php echo $patient_publisher ?>"></td>
				</tr>
				
				<tr>
					<td>Subject/Topic of the Material:</td>
					<td><input type="text" autocomplete="off" name="subject" value="<?php echo $patient_subject ?>"></td>
				</tr>
				</table><br>
						<center><input type="submit" class="submitbtn" name="SaveSite" value="Save Options">
			  </center><br></form>
				</div>    
              </div>
			</div>
        </div>
    </div>
<?php include AS_THEME."as_footer.php" ?>
   