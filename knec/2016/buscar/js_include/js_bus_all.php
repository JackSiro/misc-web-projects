<?php include JS_THEME."js_header.php"; ?>
	<div id="site_content">	
		
		<?php $js_db_query = "SELECT * FROM js_bus ORDER BY busid DESC LIMIT 20";
			$database = new Js_Dbconn();			
			$results = $database->get_results( $js_db_query );
		?>
	  <div id="content"> 
        
	  
        <div class="content_item">
		  <div class="main_content" align="center">
			<h1>Company Buses</h1>
			   <table class="tt_tb">
				<thead><tr class="tt_tr">
				  <th style="width:70px;"></th>
				  <th>Company Bus</th>
				  <th>Bus No.</th>
				  <th>Driver</th>
				  <th>No of Seats</th>
				  <th></th>
				</tr></thead>
				<tbody>
                <?php foreach( $results as $row ) { ?>
		        <tr onclick="location='index.php?page=bus_view&amp;js_busid=<?php echo $row['busid'] ?>'">
				   <td></td>
				   <td><?php echo $row['bus_regno'] ?></td>
		          <td><?php echo $row['bus_busno'] ?></td>
		          <td><?php echo $row['bus_driver'] ?></td>
		          <td><?php echo $row['bus_seats'] ?></td>
		          <td></td>
		        </tr>
			
			<?php } ?>
			
                      </tbody>
                    </table><hr>
				<h1><a href="index.php?page=bus_new">New Company Bus</a>
				<span style="float:right;width:300px;text-align:center;"><?php echo $database->js_num_rows( $js_db_query ) ?> Company Bus </span>
		   </h1> 
			</div>
		<br>
      <h2><center></center></h2>
		<br>  
		</div><!--close content_item-->
      </div><!--close content-->   
	</div><!--close site_content-->  	
  </div><!--close main-->
<?php include JS_THEME."js_footer.php" ?>
    
