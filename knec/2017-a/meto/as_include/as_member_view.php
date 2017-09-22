<?php 

	$memberid = $results['member'];
	$as_db_query = "SELECT * FROM as_member WHERE memberid = '$memberid'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
	list( $memberid, $member_name, $member_fullname, $member_status, $member_email, $member_joined, $member_mobile, $member_address, $member_children, $member_avatar) = $database->get_row( $as_db_query );
}
	include AS_THEME."as_header.php"; ?>
				</div>
			</div>

			<div id="main" class="wrapper style2">
				<section class="container">
					<header class="major">
						<h2><?php echo $member_name ?></h2>  
					</header>
						<table>
							<tr>
								<td>Status: <?php echo $member_status ?></td>
								<td>Children: <?php echo $member_children ?></td>
								<td>Joined: <?php echo $member_joined ?></td>
							</tr>
							<tr>
								<td>Email: <?php echo $member_email ?></td>								
								<td>Mobile: <?php echo $member_mobile ?></td>								
								<td>Address: <?php echo $member_address ?></td>								
							</tr>
						</table>
						
						<?php $as_contribution_query = "SELECT * FROM as_contribution
											LEFT JOIN as_member ON as_contribution.contribution_paidby = as_member.memberid
											WHERE as_contribution.contribution_paidby ='".$memberid."'
											ORDER BY as_contribution.contributionid  ASC LIMIT 20";
							$my_results = $database->get_results( $as_contribution_query );
						?>
						<table class="tt_tb">
							<thead><tr class="tt_tr">
							  <th></th>
							  <th>Amount</th>
							  <th>Date</th>
							  <th>Item</th>
							  <th>Paid on</th>
							  <th></th>
							</tr></thead>
							<tbody>
							<?php foreach( $my_results as $row ) { ?>
							<tr onclick="location='index.php?action=contribution_view&amp;as_contributionid=<?php echo $row['contributionid'] ?>'">
								<td></td>
								<td><?php echo $row['contribution_amount'] ?></td>
								<td><?php echo $row['contribution_date'] ?></td>
								<td><?php echo $row['contribution_item'] ?></td>
								<td><?php echo date("j/m/y", strtotime($row['contribution_paid'])); ?></td>
								<td></td>
							</tr>
						
						<?php } ?>			
					  </tbody>
					</table>
						<a href="index.php?action=member_edit&&as_memberid=<?php echo $memberid ?>">Edit This Member</a>
					</section>
						</div>
					</div>
				</section>
			</div>
<?php include AS_THEME."as_footer.php" ?>
    
