<?php include JS_THEME."js_header.php"; ?>
	<div id="site_content">	
		
		<?php $js_db_query = "SELECT * FROM js_farmer ORDER BY farmerid DESC LIMIT 20";
			$database = new Js_Dbconn();			
			$results = $database->get_results( $js_db_query );
		?>
	  <div id="content">
        <div class="content_session">
		<br>
		 <h1><?php echo $database->js_num_rows( $js_db_query ) ?> Farmers
		  <a style="float:right;width:300px;text-align:center;" href="index.php?js_pageaction=newfarmer">Add New Farmer</a> </h1> 
          <br><hr><br>
			<div class="main_content" align="center">
			
			   <table class="tt_tb">
				<thead><tr class="tt_tr">
				  <th>Farmer</th>
				  <th>Mobile</th>
				  <th>Email</th>
				  <th>Gender</th>
				  <th>Address</th>
				</tr></thead>
				<tbody>
                <?php foreach( $results as $row ) { ?>
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
		<br>
      <h2><center></center></h2>
		<br>  
		</div><!--close content_session-->
      </div><!--close content-->   
	</div><!--close site_content-->  	
  </div><!--close main-->
<?php include JS_THEME."js_footer.php" ?>
    
