<?php include AS_THEME."as_header.php";
	$as_db_query = "SELECT * FROM as_member ORDER BY memberid DESC LIMIT 20";
	$database = new As_Dbconn();			
	$results = $database->get_results( $as_db_query );
?>
				</div>
			</div>

			<div id="main" class="wrapper style2">
				<section class="container">
					<header class="major">
						<h2><?php echo $database->as_num_rows( $as_db_query ) ?> members
							<a style="float:right;text-align:center;" href="index.php?action=member_new">New member</a>
						</h2>
					</header>
					<div class="row">
						<div class="12u">
							<section>
							  <table class="tt_tb">
								<thead><tr class="tt_tr">
								  <th style="width:150px;">Name</th>
								  <th>Contacts</th>
								  <th>D.O Birth</th>
								  <th>Occupation</th>
								  <th>Status</th>
								  <th>Children</th>
								  <th>Address</th>
								  <th>Registered</th>
								</tr></thead>
								<tbody>
								<?php foreach( $results as $row ) { ?>
								<tr onclick="location='index.php?action=member_view&amp;as_memberid=<?php echo $row['memberid'] ?>'">
								   <td><?php echo $row['member_fullname'] ?></td>
								  <td><?php echo $row['member_mobile'] ?> <?php echo $row['member_email'] ?></td>
								  <td><?php echo $row['member_dob'] ?></td>
								  <td><?php echo $row['member_occupation'] ?></td>
								  <td><?php echo $row['member_status'] ?></td>
								  <td><?php echo $row['member_children'] ?></td>
								  <td><?php echo $row['member_address'] ?></td>
								  <td><?php echo date("j/m/y", strtotime($row['member_joined'])); ?></td>
								</tr>
							
							<?php } ?>			
						  </tbody>
						</table>
						</section>
						</div>
					</div>
				</section>
			</div>
<?php include AS_THEME."as_footer.php" ?>
    
