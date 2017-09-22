<?php include JS_THEME."js_header.php"; ?>
	<div id="site_content">	
		
<?php 
	$database = new Js_Dbconn();			
	
		$js_db_query = "SELECT * FROM js_user ORDER BY userid DESC LIMIT 20";
		$results = $database->get_results( $js_db_query );
	?>
	  <div id="content"> 
       
        <div class="content_user">
		<br>
		  <h1><?php echo $database->js_num_rows( $js_db_query ) ?> Farmers
		  <a style="float:right;width:300px;text-align:center;" href="index.php?action=user_new">New farmer</a> </h1> 
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
				  <th style="width:70px;"></th>
				  <th>Farmer</th>
				  <th>ID Number</th>
				  <th>Location</th>
				  <th>Sex</th>
				  <th>Group</th>
				  <th>Mobile</th>
				  <th>Email</th>
				  <th>Registered</th>
				</tr></thead>
				<tbody>
                <?php foreach( $results as $row ) { ?>
		        <tr onclick="location='index.php?action=user_view&amp;js_userid=<?php echo $row['userid'] ?>'">
					<td><img class="iconic" src="js_media/<?php echo $row['user_avatar'] ?>" /></td>
					<td><?php echo $row['user_fname'].' '.$row['user_surname']?></td>
					<td><?php echo $row['user_idno'] ?></td>
					<td><?php echo $row['user_location'] ?></td>
					<td><?php echo $row['user_sex'] ?></td>
					<td><?php echo $row['user_group'] ?></td>
					<td><?php echo $row['user_mobile'] ?></td>
					<td><?php echo $row['user_email'] ?></td>
					<td><?php echo date("j/m/y", strtotime($row['user_joined'])) ?></td>
		        </tr>
			
			<?php } ?>
			
                      </tbody>
                    </table>
			</div>
		<br>
      <h2><center></center></h2>
		<br>  
		</div><!--close content_user-->
      </div><!--close content-->   
	</div><!--close site_content-->  	
  </div><!--close main-->
<?php include JS_THEME."js_footer.php" ?>
    
