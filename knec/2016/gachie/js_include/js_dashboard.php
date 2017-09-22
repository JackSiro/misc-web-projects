<?php include JS_THEME."js_header.php";
	$js_loggedacc = isset( $_SESSION['js_gachieacc'] ) ? $_SESSION['js_gachieacc'] : "";
	 
	$database = new Js_Dbconn();			
	
	$js_session_qry = "SELECT * FROM js_session ORDER BY sessionid DESC LIMIT 20";
	$results_i = $database->get_results( $js_session_qry );
	
	$js_farmer_qry = "SELECT * FROM js_farmer ORDER BY farmerid DESC LIMIT 20";
	$results_ii = $database->get_results( $js_farmer_qry );
	
	$js_employee_qry = "SELECT * FROM js_employee ORDER BY employeeid DESC LIMIT 20";
	$results_iii = $database->get_results( $js_employee_qry );
			
	?>
	<div id="site_content">	

	  <div id="content">
        <div class="content_session">
		<br>
		  <h1>Welcome to <?php echo js_get_option('sitename') ?></h1> 
          <br><hr><br>
			<div class="main_content" align="center">
			
			   <div id="wrapper">
  <div id="tabContainer">
    <div id="tabs" style="padding-bottom:10px;">
      <ul>
        <li id="tabHeader_1" style="padding:10px;font-size:25px;">Latest Sessions</li>
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
		        <tr onclick="location='index.php?js_pageaction=viewsession&amp;js_sessionid=<?php echo $row['sessionid'] ?>'">
				   <td><?php echo $row['session_starttime'] ?></td>
				   <td><?php echo $row['session_endtime'] ?></td>
		          <td><?php echo $row['session_workingperiod'] ?></td>
		        </tr>
			
			<?php } ?>
			
                      </tbody>
                    </table>
      </div>
	       <div class="tabpage" id="tabpage_2">
         <table class="tt_tb">
				<thead><tr class="tt_tr">
				  <th>Farmer</th>
				  <th>Mobile</th>
				  <th>Email</th>
				  <th>Gender</th>
				  <th>Address</th>
				</tr></thead>
				<tbody>
                <?php foreach( $results_ii as $row ) { ?>
		        <tr onclick="location='index.php?js_pageaction=viewfarmer&amp;js_farmerid=<?php echo $row['farmerid'] ?>'">
				   <td><?php echo $row['farmer_fullname'] ?></td>
				   <td><?php echo $row['farmer_mobile'] ?></td>
				   <td><?php echo $row['farmer_email'] ?></td>
				   <td><?php echo $row['farmer_gender'] ?></td>
				   <td><?php echo $row['farmer_address'] ?></td>
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
		        <tr onclick="location='index.php?js_pageaction=employeeview&amp;js_employeeid=<?php echo $row['employeeid'] ?>'">
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
		</div><!--close content_session-->
      </div><!--close content-->   
	</div><!--close site_content-->  	
  </div><!--close main-->
<?php include JS_THEME."js_footer.php" ?>
    
