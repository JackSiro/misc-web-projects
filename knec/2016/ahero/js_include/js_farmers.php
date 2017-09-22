<?php include JS_THEME."js_header.php"; ?>
	<div id="site_content">	
		
		<?php $js_db_query = "SELECT * FROM js_payslip ORDER BY payslipid DESC LIMIT 20";
			$database = new Js_Dbconn();			
			$results = $database->get_results( $js_db_query );
		?>
	  <div id="content">
        <div class="content_leave">
		<br>
		 <h1><?php echo $database->js_num_rows( $js_db_query ) ?> PaySlips
		  <a style="float:right;width:300px;text-align:center;" href="index.php?js_pageaction=newpayslip">Add New PaySlip</a> </h1> 
          <br><hr><br>
			<div class="main_content" align="center">
			
			   <table class="tt_tb">
				<thead><tr class="tt_tr">
				  <th>PaySlip</th>
				  <th>Mobile</th>
				  <th>Email</th>
				  <th>Gender</th>
				  <th>Address</th>
				</tr></thead>
				<tbody>
                <?php foreach( $results as $row ) { ?>
		        <tr onclick="location='index.php?js_pageaction=viewpayslip&amp;js_payslipid=<?php echo $row['payslipid'] ?>'">
				   <td><?php echo $row['payslip_fullname'] ?></td>
				   <td><?php echo $row['payslip_mobile'] ?></td>
				   <td><?php echo $row['payslip_email'] ?></td>
				   <td><?php echo $row['payslip_gender'] ?></td>
				   <td><?php echo $row['payslip_address'] ?></td>
		        </tr>
			
			<?php } ?>
			
                      </tbody>
                    </table>
			</div>
		<br>
      <h2><center></center></h2>
		<br>  
		</div><!--close content_leave-->
      </div><!--close content-->   
	</div><!--close site_content-->  	
  </div><!--close main-->
<?php include JS_THEME."js_footer.php" ?>
    
