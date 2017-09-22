<?php include AS_THEME."as_header.php";
	$database = new As_Dbconn();			
	$as_db_query = "SELECT * FROM as_contribution
					LEFT JOIN as_member ON as_contribution.contribution_paidby = as_member.memberid
					ORDER BY as_contribution.contributionid  ASC LIMIT 20";
	$results = $database->get_results( $as_db_query );
?>
				</div>
			</div>

			<div id="main" class="wrapper style2">
				<section class="container">
					<header class="major">
						<h2>contribution 
		<a style="float:right;text-align:center;" href="index.php?action=contribution_new">New contribution</a> </h2>
					</header>
					<div class="row">
						<div class="12u">
							<section>						<table class="tt_tb">
							<thead><tr class="tt_tr">
							  <th></th>
							  <th>member</th>
							  <th>Amount</th>
							  <th>Date</th>
							  <th>Item</th>
							  <th>Paid on</th>
							  <th></th>
							</tr></thead>
							<tbody>
							<?php foreach( $results as $row ) { ?>
							<tr onclick="location='index.php?action=contribution_view&amp;as_contributionid=<?php echo $row['contributionid'] ?>'">
								<td></td>
								<td><?php echo $row['member_fullname'] ?></td>
								<td><?php echo $row['contribution_amount'] ?></td>
								<td><?php echo $row['contribution_date'] ?></td>
								<td><?php echo $row['contribution_item'] ?></td>
								<td><?php echo date("j/m/y", strtotime($row['contribution_paid'])); ?></td>
								<td></td>
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
    
