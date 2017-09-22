<?php include JS_THEME."js_header.php"; ?>
	<div id="site_content">	
		
		<?php $js_db_query = "SELECT * FROM js_class ORDER BY classid DESC LIMIT 20";
			$database = new Js_Dbconn();			
			$results = $database->get_results( $js_db_query );
		?>
	  <div id="content"> 
        <?php include JS_THEME."js_sidebar.php" ?>
	  
        <div class="content_item">
		<br>
		  <h1><?php echo $database->js_num_rows( $js_db_query ) ?> Classes
		  <a style="float:right;width:300px;text-align:center;" href="index.php?action=class_new">Add New Class</a> </h1> 
          <br><hr><br>
			<div class="main_content" align="center">
			
			   <table class="tt_tb">
				<thead><tr class="tt_tr">
				  <th style="width:70px;"></th>
				  <th>Class</th>
				  <th>Description</th>
				  <th>No of Items</th>
				</tr></thead>
				<tbody>
                <?php foreach( $results as $row ) { ?>
		        <tr onclick="location='index.php?action=class_view&amp;js_classid=<?php echo $row['classid'] ?>'">
				   <td><img class="iconic" src="js_media/<?php echo $row['class_icon'] ?>" /></td>
				   <td><?php echo $row['class_title'] ?></td>
		          <td style="max-width: 300px;"><?php echo $row['class_content'] ?></td>
		          <td>
				  <?php 
					$classid = $row['classid'];
					$js_db_qry = "SELECT * FROM js_item WHERE item_class = '$classid'";
					echo $database->js_num_rows( $js_db_qry )
					?>
				  </td>
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
    
