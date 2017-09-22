<?php include JS_THEME."js_header.php";
	$myaccount = isset( $_SESSION['nafaka_account'] ) ? $_SESSION['nafaka_account'] : "";
	?>

	<section id="content">
	  <div class="innerblock pad-2">
        <div class="block-4 col-3">
          <div class="h2">
            <h2 class="h2-line-2">Site Dashboard</h1> 
          <br><hr><br>
			<div class="main_content" align="center">
			
				<div class="td_dashboard">
					<?php 
						$database = new Js_Dbconn();			
						$js_types = "SELECT * FROM js_type ORDER BY typeid DESC LIMIT 5";
						$results_i = $database->get_results( $js_types );
						?>
					<h1><?php echo $database->js_num_rows( $js_types ) ?> Stationery Types</h1><hr>
					<?php foreach( $results_i as $row ) { ?>
					<img class="iconic_small" src="js_media/<?php echo $row['type_icon'] ?>" />
					<span style="font-size: 15px;"><?php echo $row['type_title'] ?></span><br><hr>			
					<?php } ?>
					<a href="index.php?action=type_all"><h4>View All Stationery Types</a> | 
					<a href="index.php?action=type_new">Add a Stationery Type</h4></a>
					</div>
					
					<div class="td_dashboard">
					<?php 
						$database = new Js_Dbconn();			
						$js_suppliers = "SELECT * FROM js_supplier ORDER BY suppid DESC LIMIT 5";
						$results_ii = $database->get_results( $js_suppliers );
						?>
					<h1><?php echo $database->js_num_rows( $js_suppliers ) ?> Suppliers</h1><hr>
					<?php foreach( $results_ii as $row ) { ?>
					<img class="iconic_small" src="js_media/<?php echo $row['supp_avatar'] ?>" />
					<span style="font-size: 15px;"><?php echo $row['supp_fullname'] ?></span><br><hr>			
					<?php } ?>
					<a href="index.php?action=supp_all"><h4>View All Suppliers</a> | 
					<a href="index.php?action=supp_new">Add a Suppliers</h4></a>
					</div>
					
					<div class="td_dashboard">
					<?php 
						$database = new Js_Dbconn();			
						$js_items = "SELECT * FROM js_item ORDER BY itemid DESC LIMIT 5";
						$results_iii = $database->get_results( $js_items );
						?>
					<h1><?php echo $database->js_num_rows( $js_items ) ?> Stationery Items</h1><hr>
					<?php foreach( $results_iii as $row ) { ?>
					<img class="iconic_small" src="js_media/<?php echo $row['item_img'] ?>" />
					<span style="font-size: 15px;"><?php echo $row['item_quantity']." ".$row['item_unit']." of ".js_type_item($row['item_type']).", @ ".$row['item_price']."/= " ?></span><br><hr>			
					<?php } ?>
					<a href="index.php?action=item_all"><h4>View All Items</a> | 
					<a href="index.php?action=item_new">Add a New Item</h4></a>
					</div>
					
					<div class="td_dashboard">
					<?php 
						$database = new Js_Dbconn();			
						$js_orders = "SELECT * FROM js_order ORDER BY orderid DESC LIMIT 5";
						$results_iv = $database->get_results( $js_orders );
						?>
					<h1><?php echo $database->js_num_rows( $js_orders ) ?> Orders</h1><hr>
					<?php foreach( $results_iv as $row ) { ?>
					
					<span style="font-size: 15px;white-space:nowrap; text-overflow:ellipsis; overflow:hidden;"><img class="iconic_small" src="js_media/order_default.jpg" />
					<?php echo $row['order_qty'].' '.$row['order_title'] ?> ordered by <?php echo $row['order_fullname'] ?> [<?php echo $row['order_price'] ?>]</span><br><hr>			
					<?php } ?>
					<a href="index.php?action=order_all"><h4>View All Orders</a> | 
					<a href="index.php?action=order_all">Add A New Orders</h4></a>
					</div>
					
					<div class="td_dashboard">
					<?php 
						$database = new Js_Dbconn();			
						$js_users = "SELECT * FROM js_user ORDER BY userid DESC LIMIT 5";
						$results_v = $database->get_results( $js_users );
						?>
					<h1><?php echo $database->js_num_rows( $js_users ) ?> Site Users</h1><hr>
					<?php foreach( $results_v as $row ) { ?>
					<img class="iconic_small" src="js_media/<?php echo $row['user_avatar'] ?>" />
					<span style="font-size: 15px;"><?php echo $row['user_fname'].' '.$row['user_surname'] ?></span><br><hr>			
					<?php } ?>
					<a href="index.php?action=user_all"><h4>View All Users</a> | 
					<a href="index.php?action=user_new">Add a User</h4></a>
					</div>
				<div class="td_dashboard">
				<h1>Other Links</h1><hr>
					<a href="index.php?action=options"><h2>Go toSite Options</h2></a>
					</div>
					
			</div>
		<br>
      <h2><center></center></h2>
		<br>  
		</div><!--close content_item-->
      </div><!--close content-->   
	</div><!--close site_content-->  	
  </section>
<?php include JS_THEME."js_footer.php" ?>
    
