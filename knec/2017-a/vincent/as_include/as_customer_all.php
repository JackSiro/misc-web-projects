<?php include AS_THEME."as_header.php";
	$database = new As_Dbconn();
	$as_db_query = "SELECT * FROM as_customer ORDER BY customerid DESC LIMIT 20";
	$results = $database->get_results( $as_db_query );
?>
	<div id="tooplate_main">    	        
        <div class="content_box">
            <h2>Customers List <div class="button_small" style="float:right;text-align:center;">
			<a href="#"><?php echo $database->as_num_rows( $as_db_query ) ?> Customers</a>
			<a href="index.php?action=customer_new">New Customer</a></div> </h2> 
			    <table class="tt_tb">
				  <thead><tr class="tt_tr">
				  <th>Full Name</th>
				  <th>Adm No.</th>
				  <th>Gender</th>
				  <th>Class</th>
				 </tr></thead>
				<tbody>
                <?php foreach( $results as $row ) { ?>
					<tr onclick="location='index.php?action=customer_view&amp;as_customerid=<?php echo $row['customerid'] ?>'">
						<td><?php echo $row['customer_address'] ?></td>
						<td><?php echo $row['customer_name'] ?></td>
						<td><?php echo $row['customer_mobile'] ?></td>
						<td><?php echo $row['customer_sex'] ?></td>
					</tr>			
				<?php } ?>			
				  </tbody>
				</table>   
            <div class="cleaner h30"></div>
            <a class="gototop" href="#top"></a>
            <div class="cleaner"></div>
            <div class="cleaner"></div>
        </div>
	</div>
<?php include AS_THEME."as_footer.php" ?>
