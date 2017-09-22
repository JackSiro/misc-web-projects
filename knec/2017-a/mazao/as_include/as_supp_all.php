<?php include AS_THEME."as_header.php"; ?>
	<div id="site_content">	
		
		<?php $as_db_query = "SELECT * FROM as_supplier ORDER BY suppid DESC LIMIT 20";
			$database = new As_Dbconn();			
			$results = $database->get_results( $as_db_query );
		?>
	  <div id="content"> 
        <?php include AS_THEME."as_sidebar.php" ?>
	  
        <div class="content_item">
		<br>
		  <h1><?php echo $database->as_num_rows( $as_db_query ) ?> Suppliers
		  <a style="float:right;width:300px;text-align:center;" href="index.php?action=supp_new">New Supplier</a> </h1> 
          <br><hr><br>
			<div class="main_content" align="center">
			
			   <table class="tt_tb">
				<thead><tr class="tt_tr">
				  <th style="width:70px;"></th>
				  <th>Full Name</th>
				  <th>Mobile</th>
				  <th>Email</th>
				  <th>Address</th>
				  <th>Registered</th>
				</tr></thead>
				<tbody>
                <?php foreach( $results as $row ) { ?>
		        <tr onclick="location='index.php?action=supp_view&amp;as_suppid=<?php echo $row['suppid'] ?>'">
				   <td><img class="iconic" src="as_media/<?php echo $row['supp_avatar'] ?>" /></td>
				   <td><?php echo $row['supp_fullname'] ?></td>
		          <td><?php echo $row['supp_mobile'] ?></td>
		          <td><?php echo $row['supp_email'] ?></td>
		          <td><?php echo $row['supp_address'] ?></td>
				  <td><?php echo date("j/m/y", strtotime($row['supp_joined'])); ?></td>
		        </tr>
			
			<?php } ?>
			
                      </tbody>
                    </table>
			</div>
		<br>
      <h2><center></center></h2>
		<br>  
		</div><!--close content_item-->
      </div><!--close content-->   
	</div><!--close site_content-->  	
  </div><!--close main-->
<?php include AS_THEME."as_footer.php" ?>
    
