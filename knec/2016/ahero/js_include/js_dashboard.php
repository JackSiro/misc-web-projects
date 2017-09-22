<?php include JS_THEME."js_header.php";
	$js_loggedacc = isset( $_SESSION['js_aheroacc'] ) ? $_SESSION['js_aheroacc'] : "";
	 
	$database = new Js_Dbconn();			
	
	$js_leave_qry = "SELECT * FROM js_leave ORDER BY leaveid DESC LIMIT 20";
	$results_i = $database->get_results( $js_leave_qry );
	
	$js_payslip_qry = "SELECT * FROM js_payslip ORDER BY payslipid DESC LIMIT 20";
	$results_ii = $database->get_results( $js_payslip_qry );
	
	$js_employee_qry = "SELECT * FROM js_employee ORDER BY employeeid DESC LIMIT 20";
	$results_iii = $database->get_results( $js_employee_qry );
			
	?>
	<div id="site_content">	

	  <div id="content">
        <div class="content_leave">
		<br>
		  <h1>Welcome to <?php echo js_get_option('sitename') ?></h1> 
          <br><hr><br>
			<div class="main_content" align="center">
			
			   <div id="wrapper">
  <div id="tabContainer">
    <div id="tabs" style="padding-bottom:10px;">
      <ul>
        <li id="tabHeader_1" style="padding:10px;font-size:25px;">Latest Leaves</li>
        <li id="tabHeader_2" style="padding:10px;font-size:25px;">Latest Famers</li>
        <li id="tabHeader_3" style="padding:10px;font-size:25px;">Latest Employees</li>
      </ul>
    </div>
    <div id="tabscontent">
      <div class="tabpage" id="tabpage_1">
        <table class="tt_tb">
				<thead><tr class="tt_tr">
				  <th>Start Time</th>
				  <th>End Time</th>
				  <th>Working Period</th>
				</tr></thead>
				<tbody>
                <?php foreach( $results_i as $row ) { ?>
		        <tr onclick="location='index.php?page=leave&amp;js_leaveid=<?php echo $row['leaveid'] ?>'">
				   <td><?php echo $row['leave_number'] ?></td>
				   <td><?php echo $row['leave_name'] ?></td>
		          <td><?php echo $row['leave_employee'] ?></td>
		        </tr>
			
			<?php } ?>
			
                      </tbody>
                    </table>
      </div>
	       <div class="tabpage" id="tabpage_2">
         <table class="tt_tb">
				<thead><tr class="tt_tr">
				  <th>PaySlip</th>
				  <th>Mobile</th>
				  <th>Email</th>
				  <th>Gender</th>
				  <th>Address</th>
				</tr></thead>
				<tbody>
                <?php foreach( $results_ii as $row ) { ?>
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
      <div class="tabpage" id="tabpage_3">
        <table class="tt_tb">
				<thead><tr class="tt_tr">
				  <th>Full Name</th>
				  <th>Number</th>
				  <th>Group</th>
				  <th>Mobile</th>
				  <th>Email</th>
				  <th>Registered</th>
				</tr></thead>
				<tbody>
                <?php foreach( $results_iii as $row ) { ?>
		        <tr onclick="location='index.php?page=employee_view&amp;js_employeeid=<?php echo $row['employeeid'] ?>'">
				   <td><?php echo $row['employee_fullname'] ?></td>
				   <td><?php echo $row['employee_number'] ?></td>
		          <td><?php echo $row['employee_group'] ?></td>
		          <td><?php echo $row['employee_mobile'] ?></td>
		          <td><?php echo $row['employee_email'] ?></td>
				  <td><?php echo date("j/m/y", strtotime($row['employee_joined'])); ?></td>
		        </tr>
			
			<?php } ?>
			
                      </tbody>
                    </table>
      </div>
	  </div>
  </div></div>
			</div>
		<br>
      <h2><center></center></h2>
		<br>  
		</div><!--close content_leave-->
      </div><!--close content-->   
	</div><!--close site_content-->  	
  </div><!--close main-->
<?php include JS_THEME."js_footer.php" ?>
    
