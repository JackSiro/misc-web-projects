<?php include AS_THEME."as_header.php"; ?>
	<div id="site_content">	
		
		<?php $as_db_query = "SELECT * FROM as_place ORDER BY place_title DESC LIMIT 20";
			$database = new As_Dbconn();			
			$results = $database->get_results( $as_db_query );
		?>
	  <div id="content"> 
        
	  
        <div class="content_item">
		  <div class="main_content" align="center">
			<h1>Destinations</h1>
			   <table class="tt_tb">
				<thead><tr class="tt_tr">
				  <th style="width:70px;"></th>
				  <th>Place</th>
				  <th></th>
				</tr></thead>
				<tbody>
                <?php foreach( $results as $row ) { ?>
		        <tr onclick="location='index.php?page=place_view&amp;as_placeid=<?php echo $row['placeid'] ?>'">
				   <td></td>
				   <td><?php echo $row['place_title'] ?></td>
		          <td></td>
		        </tr>
			
			<?php } ?>
			
                      </tbody>
                    </table><hr>
				<h1><a href="index.php?page=place_new">New Place</a>
				<span style="float:right;width:300px;text-align:center;"><?php echo $database->as_num_rows( $as_db_query ) ?> Places</span>
		   </h1> 
			</div>
		<br>
      <h2><center></center></h2>
		<br>  
		</div><!--close content_item-->
      </div><!--close content-->   
	</div><!--close site_content-->  	
  </div><!--close main-->
<?php include AS_THEME."as_footer.php" ?>
    
