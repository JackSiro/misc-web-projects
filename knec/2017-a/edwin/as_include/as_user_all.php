<?php include AS_THEME."as_header.php"; 
	$database = new As_Dbconn();			
	 $as_db_query = "SELECT * FROM as_user ORDER BY userid DESC LIMIT 20";
			$database = new As_Dbcon();			
			$results = $database->get_results( $as_db_query );
?>
	<div class="container">                
		<div class="row box-5">
			<h2 class="sitename"><?php echo as_get_option('sitename') ?></h2>
			<div class="page_wrap">
				<h3><?php echo $database->as_num_rows( $as_db_query ) ?> Nafaka Users
		  <a style="float:right;width:300px;text-align:center;" href="index.php?action=newuser">Add New User</a></h3><br>
				<table class="tb_dashboard">
				<thead><tr class="tt_tr">
				  <th>Full Name</th>
				  <th>Group</th>
				  <th>Mobile</th>
				  <th>Email</th>
				  <th>Registered</th>
				</tr></thead>
				<tbody>
                <?php foreach( $results as $row ) { ?>
		        <tr onclick="location='index.php?action=type_view&amp;as_typeid=<?php echo $row['typeid'] ?>'">
				   <td><?php echo $row['user_fname'].' '.$row['user_surname'] ?></td>
		          <td><?php echo $row['user_group'] ?></td>
		          <td><?php echo $row['user_mobile'] ?></td>
		          <td><?php echo $row['user_email'] ?></td>
				  <td><?php echo date("j/m/y", strtotime($row['user_joined'])); ?></td>
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
   