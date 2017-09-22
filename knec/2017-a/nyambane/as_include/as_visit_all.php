<?php include AS_THEME."as_header.php";
	$database = new As_Dbconn();			
	$as_db_query = "SELECT * FROM as_visit
					LEFT JOIN as_visitor ON as_visit.visit_paidby = as_visitor.visitorid
					ORDER BY as_visit.visitid  ASC LIMIT 20";
	$results = $database->get_results( $as_db_query );
?>
<div id="site_content">
	<h1>visit 
		<a style="float:right;width:300px;text-align:center;" href="index.php?action=visit_new">New visit</a> </h1>          	<table class="tt_tb">
				<thead><tr class="tt_tr">
				  <th></th>
				  <th>Visitor</th>
				  <th>Amount</th>
				  <th>Date</th>
				  <th>Session</th>
				  <th>Paid on</th>
				  <th></th>
				</tr></thead>
				<tbody>
                <?php foreach( $results as $row ) { ?>
		        <tr onclick="location='index.php?action=visit_view&amp;as_visitid=<?php echo $row['visitid'] ?>'">
					<td></td>
					<td><?php echo $row['visitor_fullname'] ?></td>
					<td><?php echo $row['visit_amount'] ?></td>
					<td><?php echo $row['visit_date'] ?></td>
					<td><?php echo $row['visit_session'] ?></td>
					<td><?php echo date("j/m/y", strtotime($row['visit_paid'])); ?></td>
					<td></td>
		        </tr>
			
			<?php } ?>			
	  </tbody>
	</table>
</div>
<?php include AS_THEME."as_footer.php" ?>
    
