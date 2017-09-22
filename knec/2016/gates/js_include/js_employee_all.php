<?php include JS_THEME."js_header.php";
	$myaccount = isset( $_SESSION['gates_account'] ) ? $_SESSION['gates_account'] : "";
	$database = new Js_Dbconn();			
	$js_db_query = "SELECT * FROM js_employee ORDER BY employeeid DESC LIMIT 20";
	$results = $database->get_results( $js_db_query );
?>
  <div class="inner">
    <div class="main">
      <section id="content">        
        <div class="padding-2">
          <div class="indent-top">
            <div class="wrapper">
              <article class="col-3">
                <h4><strong><?php echo $database->js_num_rows( $js_db_query ) ?> Employees</strong></h4><hr>
				<table class="tt_tb">
				<thead><tr class="tt_tr">
				  <th>Full Name</th>
				  <th>Group</th>
				  <th>Mobile</th>
				  <th>Email</th>
				  <th>Registered</th>
				</tr></thead>
				<tbody>
                <?php foreach( $results as $row ) { ?>
		        <tr onclick="location='index.php?page=employee_view&amp;js_employeeid=<?php echo $row['employeeid'] ?>'">
				   <td><?php echo $row['employee_fname'].' '.$row['employee_surname'] ?></td>
		          <td><?php echo $row['employee_group'] ?></td>
		          <td><?php echo $row['employee_mobile'] ?></td>
		          <td><?php echo $row['employee_email'] ?></td>
				  <td><?php echo date("j/m/y", strtotime($row['employee_joined'])); ?></td>
		        </tr>
			
			<?php } ?>
			
                      </tbody>
                    </table>
              </article>
			  <?php include JS_THEME."js_sidebar.php" ?>
              
            </div>
          </div>
        </div>
	
      </section>
      <div class="block"></div>
    </div>
  </div>
</div>


<?php include JS_THEME."js_footer.php" ?>