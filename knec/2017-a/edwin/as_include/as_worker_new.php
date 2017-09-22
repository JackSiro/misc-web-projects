  <?php include AS_THEME."as_header.php";
	
	$database = new As_Dbconn();
?>
	<div class="container">		
		<div class="row box-5">
            <div style="width:700px;padding:20px;margin:20px;">
				<h2 class="sitename"><?php echo as_get_option('sitename') ?></h2>
				<div class="page_wrap">
				<h1>Add a Worker</h1><br>
				<div>
				<form class='mwangaza-form' method="post" action="index.php?action=worker_new" >
				<fieldset>
				 <table class="form_table">
				<tr>
					<td style="text-align:right; padding:20px;">Worker's Name:</td>
					<td><input type="text" autocomplete="off" name="fullname" required ></td>
				</tr>
				<tr>
					<td style="text-align:right; padding:20px;">Sex:</td>
					<td style="text-align:left;padding-top:20px;">					
						<input type="radio" name="sex" value="1"> Male
						<input type="radio" name="sex" value="2"> Female				
					</td>
				</tr>
                <tr>
					<td style="text-align:right; padding:20px;">Worker's Department:</td>
					<td><input type="text" autocomplete="off" name="department" required ></td>
				</tr>
						
                <tr>
					<td style="text-align:right; padding:20px;">Worker's Role:</td>
					<td><input type="text" autocomplete="off" name="role" required ></td>
				</tr>
				</table>
				</fieldset> <br>
				<center><input type="submit" class="submit_this" name="AddWorker" value="Save & Add">
					<input type="submit" class="submit_this" name="AddClose" value="Save & Close ">
			  </center><br></form>
				</div>
			</div>    
			</div>
		</div>
	</div>
<?php include AS_THEME."as_footer.php" ?>
   