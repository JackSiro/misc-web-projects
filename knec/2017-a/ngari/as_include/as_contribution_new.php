<?php include AS_THEME."as_header.php";
	$database = new As_Dbconn();			
	$as_db_query = "SELECT * FROM as_member ORDER BY memberid  ASC LIMIT 20";
		$results = $database->get_results( $as_db_query );
	?><div id="site_content">        <h1>Add a member contribution</h1> 
			<?php
				if ($database->as_num_rows( $as_db_query)<=0) { ?>
				<h2 style="color:#000">Fix the following errors first</h2>
				<ul>
				<h3><li><a href="index.php?action=member_new">Add a member</a></li><h3>
				
				</ul>
			<?php } else { ?>
				<form role="form" method="post" name="Postcontribution" action="index.php?action=contribution_new" >
                <div class="form_settings">
				
			<p><span>Choose a member</span>
					<select name="memberid" style="padding-left:20px;" required >
						<option value="" > - Choose a member - </option>			
						<?php
							foreach( $results as $row ) { ?>
								<option value="<?php echo $row['memberid'] ?>">  <?php echo $row['member_fullname'] ?></option>
						<?php } ?>
						</select>
					</p>
				
			<p><span>Session</span><input type="text" autocomplete="off" name="session"></p>
			<p><span>Date</span><input type="text" autocomplete="off" name="date"></p>
					
			<p><span>Amount Paid</span><input type="text" autocomplete="off" name="amount"></p>
							
			<br><p><input class="submit" type="submit" name="Addcontribution" value="Save and Add Another contribution">
						<input class="submit" type="submit" name="AddClose" value="Save and Close">
			</p></div></form>		<?php } ?>
			
			</div>
<?php include AS_THEME."as_footer.php" ?>
    
