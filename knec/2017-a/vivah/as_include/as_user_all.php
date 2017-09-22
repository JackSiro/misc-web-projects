<?php include AS_THEME."as_header.php";
	$as_db_query = "SELECT * FROM as_facilitator ORDER BY facilitatorid DESC LIMIT 20";
	$database = new As_Dbconn();			
	$results = $database->get_results( $as_db_query );
?>
	<div id="content">
          <div class="scroll">
            <div class="scrollContainer">
			
              <div class="panel">
		  <h1><?php echo $database->as_num_rows( $as_db_query ) ?> Users
		  <a style="float:right;text-align:center;" href="index.php?action=new_facilitator">Add New User</a> </h1> 
          <br><hr><br>
			<div class="main_content" align="center">
			
			   <table class="tt_tb">
				<thead><tr class="tt_tr">
				  <th style="width:70px;"></th>
				  <th>Full Name</th>
				  <th>Group</th>
				  <th>Mobile</th>
				  <th>Email</th>
				  <th>Sign Uped</th>
				</tr></thead>
				<tbody>
                <?php foreach( $results as $row ) { ?>
		        <tr onclick="location='index.php?action=facilitator_view&amp;as_facilitatorid=<?php echo $row['facilitatorid'] ?>'">
				   <td><img class="iconic" src="as_media/<?php echo $row['facilitator_organization'] ?>" /></td>
				   <td><?php echo $row['facilitator_fname'].' '.$row['facilitator_surname'] ?></td>
		          <td><?php echo $row['facilitator_group'] ?></td>
		          <td><?php echo $row['facilitator_mobile'] ?></td>
		          <td><?php echo $row['facilitator_email'] ?></td>
				  <td><?php echo date("j/m/y", strtotime($row['facilitator_joined'])); ?></td>
		        </tr>
			
			<?php } ?>
			
                      </tbody>
                    </table>
			</div>
		<br>
      <h2><center></center></h2>
		<br>  
		</div>
              </div>			  
            </div>
          </div>
		</div>
<?php include AS_THEME."as_footer.php" ?>
    
