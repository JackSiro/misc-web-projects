<?php include JS_THEME."js_header.php"; ?>
	<div id="site_content">	
		
<?php 
	$database = new Js_Dbconn();			
	
		$js_db_query = "SELECT * FROM js_session ORDER BY sessionid DESC LIMIT 20";
		$results = $database->get_results( $js_db_query );
	?>
	  <div id="content">
        <div class="content_session">
		<br>
		  <h1><?php echo $database->js_num_rows( $js_db_query ) ?> Sessions
		  <a style="float:right;width:300px;text-align:center;" href="index.php?js_pageaction=newsession">Add New Session</a> </h1> 
          <br><hr><br>
			<div class="main_content" align="center">
			
			   <table class="tt_tb">
				<thead><tr class="tt_tr">
				  <th style="width:70px;"></th>
				  <th>Farmer</th>
				  <th>Title</th>
				  <th>Publisher</th>
				  <th>Subject</th>
				  <th></th>
				</tr></thead>
				<tbody>
                <?php foreach( $results as $row ) { ?>
		        <tr onclick="location='index.php?js_pageaction=viewsession&amp;js_sessionid=<?php echo $row['sessionid'] ?>'">
				   <td><img class="iconic" src="js_media/<?php echo $row['session_img'] ?>" /></td>
				   <td><?php echo js_farmer_session($row['session_farmer']) ?></td>
				   <td><?php echo $row['session_title'] ?></td>
		          <?php //echo substr($row['session_content'],0,100).'...' ?>
				  <td><?php echo $row['session_publisher'] ?></td>
				  <td><?php echo $row['session_subject'] ?></td>
		          <td></td>
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
    
