<?php
	// PAGES FUNCTIONS
	// Begin Pages Functions 
	
	function my_stock_cart($cartno) {
		$my_db_query = "SELECT * FROM my_drug WHERE catid = '$cartno'";
		$database = new As_Dbconn();
		if( $database->my_num_rows( $my_db_query ) > 0 ) {
                    list( $catid, $drug_slug, $drug_title) = $database->get_row( $my_db_query );
		    return $drug_title;
		} else  {
		    return false;
		}
		
	}
	

	function my_stock_seller($userid, $infor) {
		$my_db_query = "SELECT * FROM my_user_account WHERE userid = '$userid'";
		$database = new As_Dbconn();
		if( $database->my_num_rows( $my_db_query ) > 0 ) {
                    list( $userid, $user_name, $user_fname, $user_surname, $user_sex, $user_password, $user_email, $user_group, $user_points, $user_bio, $user_mailcon, $user_joined, $user_mobile, $user_web, $user_location, $user_security_quiz, $user_security_ans, $user_avatar) = $database->get_row( $my_db_query );
		    return $infor;
		} else  {
		    return false;
		}
		
	}
	
		
    function my_drug_drugs(){
		$my_db_query = "SELECT * FROM my_drug";
		$database = new As_Dbconn();
		
		$results = $database->get_results( $my_db_query );
		foreach( $results as $row )
		{
		    	return '<option value="'.$row['catid'].'">'.$row['drug_title'].'</option>';		                            
		}			
	}

	function my_latest_catdrugs($catid){
		$my_db_query = "SELECT * FROM my_drug WHERE stock_drugid = '$catid' LIMIT 4";
		$database = new As_Dbconn();
		
		$results = $database->get_results( $my_db_query );
		foreach( $results as $row )
		{
		    echo '';
		}

				
	}
	
	function my_latest_drug_drugs_home(){
		$my_db_query = "SELECT * FROM my_drug";
		$database = new As_Dbconn();
		
		$stock_drugids = $database->get_results( $my_db_query );
		foreach( $stock_drugids as $cat )
		{
		    $stock_drugid = $cat['catid'];
			
			$my_drug_drugs_query = "SELECT * FROM my_drug WHERE stock_drugid = '$stock_drugid' LIMIT 4";
			
			if ($my_drug_drugs_query) {
				echo '<hr><h3>'.$cat['drug_title'].'</h3>
				   <div class="row">
					<div class="productsrow">';
			}	
				$database = new As_Dbconn();
				
				$drug_drugs = $database->get_results( $my_drug_drugs_query );
				foreach( $drug_drugs as $row )
				{
					echo '<div class="product menu-category">
									
					<a href="'.my_siteLynk().$row['stock_slug'].'"><div class="product-image">
						<img class="product-image menu-item list-group-item" src="'.my_siteLynk_img().$row['stock_img'].'">
					</div></a> <a href="'.my_siteLynk().$row['stock_slug'].'" class="menu-item list-group-item">'.substr($row['stock_title'],0,20).'<span class="badge">KSh '.$row['stock_quantity'].'</span></a></div>';
				}
		   
				echo '</div></div>';
				
		}				
	}
	
	function my_latest_drug_drugs(){
	$my_db_query = "SELECT * FROM my_drug LIMIT 4";
	$database = new As_Dbconn();
	
	$results = $database->get_results( $my_db_query );
	foreach( $results as $row )
	{
		echo '<div class="product menu-category">
				<a href="'.my_siteLynk().$row['stock_slug'].'"><div class="menu-category-name list-group-item active">'.my_stock_cart($row['stock_drugid']).'</div></a>
				<a href="'.my_siteLynk().$row['stock_slug'].'"><div class="product-image">
					<img class="product-image menu-item list-group-item" src="'.my_siteLynk_img().$row['stock_img'].'" />
				</div></a> <a href="'.my_siteLynk().$row['stock_slug'].'" class="menu-item list-group-item">'.substr($row['stock_title'],0,20).'<span class="badge">KSh '.$row['stock_quantity'].'</span></a>

			</div>';
	}

			
	}

	function my_home_categories(){
		$my_db_query = "SELECT * FROM my_drug LIMIT 9";
		$database = new As_Dbconn();		
		$results = $database->get_results( $my_db_query );
		foreach( $results as $row ) {
			echo '<a href="'.my_siteLynk().$row['drug_slug'].'" >
			<div class="drug_lynk"><img class="drug_icon" src="'.my_siteLynk_icon().$row['drug_icon'].'"/>
			'.$row['drug_title'].'</div></a>';
	   }				
	}

	function my_lookup_cat($request){
		$my_db_query = "SELECT * FROM my_drug WHERE drug_slug = '$request'";
		$database = new As_Dbconn();
		if( $database->my_num_rows( $my_db_query ) > 0 ) { return true; } 
		else  { return false; }
	}
	
	function my_lookup_user($request){
		$my_db_query = "SELECT * FROM my_user_account WHERE user_name = '$request'";
		$database = new As_Dbconn();
		if( $database->my_num_rows( $my_db_query ) > 0 ) { return true; } 
		else  { return false; }
	}
	
	function my_lookup_loc($request){
		$my_db_query = "SELECT * FROM my_location WHERE slug = '$request'";
		$database = new As_Dbconn();
		if( $database->my_num_rows( $my_db_query ) > 0 ) { return true; } 
		else  { return false; }
	}
	
	function my_lookup_drug($request){
		$my_db_query = "SELECT * FROM my_drug WHERE stock_slug = '$request'";
		$database = new As_Dbconn();
		if( $database->my_num_rows( $my_db_query ) > 0 ) { return true; } 
		else  { return false; }
	}
	
	
	function as_feedback_message()
	{
		if( isset($_SESSION['AS_SUCCMSG_ARR']) && is_array($_SESSION['AS_SUCCMSG_ARR']) && count($_SESSION['AS_SUCCMSG_ARR']) >0 ) 
		{ ?>
		<div class="success_log">
			<ul>									
			<?php foreach($_SESSION['AS_SUCCMSG_ARR'] as $as_succ_msg) { ?>
				<li><?php echo $as_succ_msg ?></li> 
			<?php } ?>
			</ul>
		</div>
		<?php unset($_SESSION['AS_SUCCMSG_ARR']); 
		}
		
		if( isset($_SESSION['AS_ERRMSG_ARR']) && is_array($_SESSION['AS_ERRMSG_ARR']) && count($_SESSION['AS_ERRMSG_ARR']) >0 ) 
		{ ?>
		<div class="error_log">
			<ul>									
			<?php foreach($_SESSION['AS_ERRMSG_ARR'] as $as_error_msg) { ?>
				<li><?php echo $as_error_msg ?></li> 
			<?php } ?>
			</ul>
		</div>
			
		<?php } unset($_SESSION['AS_ERRMSG_ARR']); 
	}
	