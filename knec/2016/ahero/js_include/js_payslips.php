<?php include JS_THEME."js_header.php"; ?>
	<div id="site_content">	
		
<?php 
	$database = new Js_Dbconn();			
	
		$js_db_query = "SELECT * FROM js_payslip ORDER BY payslipid DESC LIMIT 20";
		$results = $database->get_results( $js_db_query );
	?>
	  <div id="content">
        <div class="content_payslip">
		<br>
		  <h1><?php echo $database->js_num_rows( $js_db_query ) ?> Payslips
		  <a style="float:right;width:300px;text-align:center;" href="index.php?js_pageaction=newpayslip">Add New Payslip</a> </h1> 
          <br><hr><br>
			<div class="main_content" align="center">
			
			   <table class="tt_tb">
				<thead><tr class="tt_tr">
				  <th>Name</th>
				  <th>Number</th>
				</tr></thead>
				<tbody>
                <?php foreach( $results as $row ) { ?>
		        <tr onclick="location='index.php?js_pageaction=viewpayslip&amp;js_payslipid=<?php echo $row['payslipid'] ?>'">
				   <td><?php echo $row['payslip_name'] ?></td>
				  <td><?php echo $row['payslip_number'] ?></td>
		          <td></td>
		        </tr>
			
			<?php } ?>
			
                      </tbody>
                    </table>
			</div>
		<br>
      <h2><center></center></h2>
		<br>  
		</div><!--close content_payslip-->
      </div><!--close content-->   
	</div><!--close site_content-->  	
  </div><!--close main-->
<?php include JS_THEME."js_footer.php" ?>
    
