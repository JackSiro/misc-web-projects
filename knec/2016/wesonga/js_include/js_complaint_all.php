<?php include JS_THEME."js_header.php"; ?>
	<div id="site_content">	
		
<?php 
	$database = new Js_Dbconn();			
	
		$js_db_query = "SELECT * FROM js_complaint ORDER BY complaintid DESC LIMIT 20";
		$results = $database->get_results( $js_db_query );
	?>
	  <div id="content"> 
        
	  
        <div class="content_complaint">
		<br>
		  <h1><?php echo $database->js_num_rows( $js_db_query ) ?> Complaints
		  <a style="float:right;width:300px;text-align:center;" href="index.php?action=complaint_new">New Complaint</a> </h1> 
          <br><hr><br>
			<div class="main_content" align="center">
			<!--<form method="post" >
			<table style="width:100%;"><tr><td>
			<input type="text" name="js_search" id="js_search" placeholder="Search the warehouse" />
			</td><td>
				<select name="js_catid">
				<option  value=""  > All </option>
			<?php /* $js_type_qry = "SELECT * FROM js_type ORDER BY type_title ASC";
				$type_results = $database->get_results( $js_type_qry );
				
				foreach( $type_results as $js_type ) { ?>
						<option value="<?php echo $js_type['typeid'] ?>">  <?php echo $js_type['type_title'] ?></option>
				<?php } */?>
				</select>
			</td>
			<td><input type="submit" style="width:200px" name="SearchThis" value="Search" /></td></tr>
			</table>
			</form> -->
			   <table class="tt_tb">
				<thead><tr class="tt_tr">
				  <th></th>
				  <th>Complaint</th>
				  <th>Farmer</th>
				  <th></th>
				</tr></thead>
				<tbody>
                <?php foreach( $results as $row ) { ?>
		        <tr onclick="location='index.php?action=complaint_view&amp;js_complaintid=<?php echo $row['complaintid'] ?>'">
				   <td></td>
				   <td><?php echo $row['complaint_title'] ?></td>
				   <td><?php echo $row['complaint_farmer'] ?></td>
		          <td></td>
		        </tr>
			
			<?php } ?>
			
                      </tbody>
                    </table>
			</div>
		<br>
      <h2><center></center></h2>
		<br>  
		</div><!--close content_complaint-->
      </div><!--close content-->   
	</div><!--close site_content-->  	
  </div><!--close main-->
<?php include JS_THEME."js_footer.php" ?>
    
