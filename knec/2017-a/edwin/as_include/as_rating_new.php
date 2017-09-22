  <?php include AS_THEME."as_header.php" ?>
	<div class="container">		
		<div class="row box-5">
			<div>
				<h2 class="sitename"><?php echo as_get_option('sitename') ?></h2>
				<div class="page_wrap">
				<h3>Rate a Worker Now</h3><br>
				<div>
				<center><h2><b><u>Workers Perfomance</u></b></h2></center><br>
				<?php
					$database = new As_Dbconn();			
					$as_db_query = "SELECT * FROM as_worker ORDER BY workerid DESC LIMIT 20";
					$results = $database->get_results( $as_db_query ); 
					if ($database->as_num_rows( $as_db_query)<=0) { ?>
				<h2 style="color:#000">You need to fix the following errors before you add a Item</h2>
				<ul>
				<h3><li><a href="index.php?action=worker_new">No Workers found! Add a Worker</a></li><h3>
				
				</ul>
			<?php } else { ?>
				<form class='mwangaza-form' action="index.php?action=homepage" method="post">
				<table class="form_table">
				
				<tr>
					<td style="text-align:right;padding-top:20px;">Choose a worker</td>
					<td style="text-align:left;padding-top:20px;">
						<select name="worker" style="font-size:30px;">
							<option value=""> Choose a Worker </option>
							<?php foreach( $results as $row ) { ?>
							<option value="<?php echo $row['workerid'] ?>"><?php echo $row['worker_name'] ?></option>
							<?php } ?>
						</select>
					</td>
				</tr>
				<tr>
					<td style="text-align:right;padding-top:20px;">Rating:</td>
					<td style="text-align:left;padding-top:20px;">					
						<input type="radio" name="rating" value="1"> 1 - Very Poor
						<input type="radio" name="rating" value="2"> 2 - Poor
						<input type="radio" name="rating" value="3"> 3 - Average
						<input type="radio" name="rating" value="4"> 4 - Good
						<input type="radio" name="rating" value="5"> 5 - Very Good					
					</td>
				</tr>
				
				<tr>
					<td style="text-align:right;padding-top:20px;">Comment:</td>
					<td style="text-align:left;padding-top:20px;"><textarea name="description"><?php echo as_get_option('description') ?></textarea></td>
				</tr>
				</table><br>
						<center><input type="submit" class="submit_this" name="SubmitRates" value="Submit Rates">
			  </center><br></form>
			  <?php } ?>
				</div>
			</div>    
			</div>
		</div>
	</div>
<?php include AS_THEME."as_footer.php" ?>
   