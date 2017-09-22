<?php include JS_THEME."js_header.php";
	$myaccount = isset( $_SESSION['mutunga_account'] ) ? $_SESSION['mutunga_account'] : "";
	?>
	<div id="site_content">	

	  <div id="content"> 
       
        <div class="content_item">

		  <br> 
         <?php include JS_THEME."js_slide.php" ?>
		  <h1>Site Dashboard</h1> 
          <br><hr><br>
			<div class="main_content" >
			
			   <div id="wrapper">
		  <div id="tabContainer">
			<div id="tabs" style="padding-bottom:10px;">
			  <ul>
				<li id="tabHeader_1" style="padding:10px;font-size:25px;">Latest Items</li>
				<li id="tabHeader_2" style="padding:10px;font-size:25px;">Latest Orders</li>
				<li id="tabHeader_3" style="padding:10px;font-size:25px;">Latest Users</li>
			  </ul>
			</div>
			<div id="tabscontent">
      <div class="tabpage" id="tabpage_1">
        <?php 
			$database = new Js_Dbconn();			
			$js_items = "SELECT * FROM js_item ORDER BY itemid DESC LIMIT 20";
			$results_iii = $database->get_results( $js_items );
			?>
		<h2><?php echo $database->js_num_rows( $js_items ) ?> Electronics Items | <a href="index.php?action=item_all">View All Items</a></h2><hr>
		<?php foreach( $results_iii as $row ) { ?>
		<img class="iconic_small" src="js_media/<?php echo $row['item_img'] ?>" />
		<span style="font-size: 15px;"><?php echo $row['item_quantity']." ".$row['item_unit']." of ".js_type_item($row['item_type']).", @ ".$row['item_price']."/= " ?></span><hr>			
		<?php } ?>
      </div>
	  
      <div class="tabpage" id="tabpage_2">
        <?php 
			$database = new Js_Dbconn();			
			$js_orders = "SELECT * FROM js_order ORDER BY orderid DESC LIMIT 20";
			$results_iv = $database->get_results( $js_orders );
			?>
		<h2><?php echo $database->js_num_rows( $js_orders ) ?> Orders | <a href="index.php?action=order_all">View All Orders</a></h2><hr>
		<?php foreach( $results_iv as $row ) { ?>
		
		<span style="font-size: 15px;white-space:nowrap; text-overflow:ellipsis; overflow:hidden;"><img class="iconic_small" src="js_media/order_default.jpg" />
		<?php echo $row['order_qty'].' '.$row['order_title'] ?> ordered by <?php echo $row['order_fullname'] ?> [<?php echo $row['order_price'] ?>]</span><hr>			
		<?php } ?>
		
      </div>
      <div class="tabpage" id="tabpage_3">
        <?php 
			$database = new Js_Dbconn();			
			$js_users = "SELECT * FROM js_user ORDER BY userid DESC LIMIT 20";
			$results_v = $database->get_results( $js_users );
			?>
		<h2><?php echo $database->js_num_rows( $js_users ) ?> Site Users | <a href="index.php?action=user_all">View All Users</a></h2><hr>
		<?php foreach( $results_v as $row ) { ?>
		<img class="iconic_small" src="js_media/<?php echo $row['user_avatar'] ?>" />
		<span style="font-size: 15px;"><?php echo $row['user_fname'].' '.$row['user_surname'] ?></span><br>			
		<?php } ?>
		<hr>
		
      </div>
    </div>
	</div>
	</div>
			
			
			</div>
		<br>
      <h2><center></center></h2>
		<br>  
		</div><!--close content_item-->
      </div><!--close content-->   
	</div><!--close site_content-->  	
  </div><!--close main-->
<?php include JS_THEME."js_footer.php" ?>
    
