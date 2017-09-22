<?php include JS_THEME."js_header.php"; ?>
	<div id="site_content">	
		
		<?php $js_db_query = "SELECT * FROM js_doctor ORDER BY doctorid DESC LIMIT 20";
			$database = new Js_Dbconn();			
			$results = $database->get_results( $js_db_query );
		?>
	  <div id="content"> 
        
        <div class="content_item">
		<br>
		  <h1><?php echo $database->js_num_rows( $js_db_query ) ?> Doctors
		  <a style="float:right;width:300px;text-align:center;" href="index.php?action=doctor_new">New Doctor</a> </h1> 
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
		        <tr onclick="location='index.php?action=doctor_view&amp;js_doctorid=<?php echo $row['doctorid'] ?>'">
				   <td><img class="iconic" src="js_media/<?php echo $row['doctor_avatar'] ?>" /></td>
				   <td><?php echo $row['doctor_fullname'] ?></td>
		          <td><?php echo $row['doctor_mobile'] ?></td>
		          <td><?php echo $row['doctor_email'] ?></td>
		          <td><?php echo $row['doctor_address'] ?></td>
				  <td><?php echo date("j/m/y", strtotime($row['doctor_joined'])); ?></td>
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
<?php include JS_THEME."js_footer.php" ?>
    
