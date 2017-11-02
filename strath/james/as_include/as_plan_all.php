<?php 
	$as_db_query = "SELECT * FROM as_plan ORDER BY planid DESC LIMIT 50";
	$database = new As_Dbconn();			
	$results = $database->get_results( $as_db_query );
	include AS_THEME."as_header.php";
?>
	<div id="tooplate_content">	
	  <div id="content">
        <div>
		<br>
		  <h1><?php echo $database->as_num_rows( $as_db_query ) ?> Plans
		  <a class="button_small" style="float:right;text-align:center;" href="index.php?action=plan_new">New Plan</a> </h1> 
         
			<div class="main_content" align="center">
			
			   <table class="tt_tb">
				<thead><tr class="tt_tr">
				  <th></th>
				  <th>Title</th>
				  <th>Price</th>
				  <th>Intrest Rate</th>
				  <th>Installments</th>
				  <th>Benefit</th>
				</tr></thead>
				<tbody>
                <?php foreach( $results as $row ) { ?>
		        <tr onclick="location='index.php?action=plan_view&amp;as_planid=<?php echo $row['planid'] ?>'">
					<td><img src="as_media/<?php echo $row['plan_image'] ?>" height="50" width="50"/></td>
					<td><?php echo $row['plan_title'] ?></td>
					<td><?php echo $row['plan_price'] ?>/=</td>
					<td><?php echo $row['plan_irate'] ?>%</td>
					<td><?php echo $row['plan_instal'] ?>/=</td>
					<td><?php echo $row['plan_benefit'] ?></td>
		        </tr>
			<?php } ?>
			
                      </tbody>
                    </table>
			</div>
		<br>
      <h2><center></center></h2>
		<br>  
		</div><!--close content_client-->
      </div><!--close content-->   
	</div><!--close tooplate_content-->  	
  </div><!--close main-->
<?php include AS_THEME."as_footer.php" ?>
    
