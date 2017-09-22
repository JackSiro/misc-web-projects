<?php include AS_THEME."as_header.php"; 
	$database = new As_Dbconn();			
	$as_db_query = "SELECT * FROM as_worker ORDER BY workerid DESC LIMIT 20";
	$results = $database->get_results( $as_db_query );
?>
	<div class="container">                
		<div class="row box-5">
			<h2 class="sitename"><?php echo as_get_option('sitename') ?></h2>
			<div class="page_wrap">
				<h2><?php echo $database->as_num_rows( $as_db_query ) ?> Workers | <a href="index.php?action=worker_new">New Worker</a></h2><br>
				<!--<table class="tb_dashboard">-->
				<table class="tt_tb">
				<thead><tr class="tt_tr">
				  <th>Worker</th>
				  <th>Sex</th>
				  <th>Department</th>
				  <th>Role</th>
				</tr></thead>
				<tbody>
                <?php foreach( $results as $row ) { ?>
		        <tr onclick="location='index.php?action=worker_view&amp;as_workerid=<?php echo $row['workerid'] ?>'">
				   <td><?php echo $row['worker_name'] ?></td>
				  <td><?php echo as_show_sex($row['worker_sex']) ?></td>
				  <td><?php echo $row['worker_dept'] ?></td>
				  <td><?php echo $row['worker_role'] ?></td>
		        </tr>
			
			<?php } ?>
			
                      </tbody>
                    </table>
			</div>    
              </div>
			</div>
        </div>
    </div>
<?php include AS_THEME."as_footer.php" ?>
   