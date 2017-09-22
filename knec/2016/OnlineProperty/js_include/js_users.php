<?php include JS_THEME."js_header.php"; ?>
<?php $database = new Js_Dbconn();			
		
		$js_db_query = "SELECT * FROM js_user ORDER BY userid DESC LIMIT 20";
		$results = $database->get_results( $js_db_query );
		?>

	<section id="service">
		<div class="container">
			<div class="row">
				<div class="text-center col-md-12 wow fadeInDown" data-wow-delay="2000">
					<h3><?php echo $database->js_num_rows( $js_db_query ) ?> Manager
		  <a class="button_small" style="float:right;width:300px;text-align:center;" href="index.php?action=newuser">Add New Manager</a></h3>
				</div>
				<div class="col-md-2"></div>
				<div class="col-md-8 text-center">
				</div>
				<div class="col-md-2"></div>
				<div class="col-sm-12 col-md-12 wow fadeInLeft" data-wow-delay="2000">
					<div class="media">
						<i class="fa fa-cog pull-left media-object"></i>
							<div class="media-body">
								<table class="tt_tb">
								<thead><tr class="tt_tr">
								  <th style="width:70px;"></th>
								  <th>Full Name</th>
								  <th>Group</th>
								  <th>Mobile</th>
								  <th>Email</th>
								  <th>Registered</th>
								</tr></thead>
								<tbody> 
								<?php foreach( $results as $row ) { ?>
								<tr onclick="location='index.php?action=viewuser&amp;js_userid=<?php echo $row['userid'] ?>'">
								  <td><img style="height:40px; width:40px;" src="js_media/<?php echo $row['user_avatar'] ?>" /></td>
									<td><?php echo $row['user_fname'].' '.$row['user_surname'] ?></td>
									<td><?php echo $row['user_group'] ?></td>
									<td><?php echo $row['user_mobile'] ?></td>
									<td><?php echo $row['user_email'] ?></td>
									<td><?php echo date("j/m/y", strtotime($row['user_joined'])); ?></td>
								</tr>							
							<?php } ?>
			
                      </tbody>
                    </table>
								
							</div>
					</div>
				</div>
				
			</div>
		</div>
	</section>		
<?php include JS_THEME."js_footer.php" ?>
    
