<?php
	// PAGES FUNCTIONS
	// Begin Pages Functions 
	
	function my_book_cart($cartno) {
		$my_db_query = "SELECT * FROM my_section WHERE sectionid = '$cartno'";
		$database = new Js_Dbconn();
		if( $database->my_num_rows( $my_db_query ) > 0 ) {
                    list( $sectionid, $section_slug, $section_title) = $database->get_row( $my_db_query );
		    return $section_title;
		} else  {
		    return false;
		}
		
	}
	

	function my_book_seller($studentid, $infor) {
		$my_db_query = "SELECT * FROM my_student_account WHERE studentid = '$studentid'";
		$database = new Js_Dbconn();
		if( $database->my_num_rows( $my_db_query ) > 0 ) {
                    list( $studentid, $student_name, $student_fname, $student_surname, $student_sex, $student_password, $student_email, $student_group, $student_points, $student_bio, $student_mailcon, $student_joined, $student_mobile, $student_web, $student_location, $student_security_quiz, $student_security_ans, $student_avatar) = $database->get_row( $my_db_query );
		    return $infor;
		} else  {
		    return false;
		}
		
	}
	
		
    function my_section_books(){
		$my_db_query = "SELECT * FROM my_section";
		$database = new Js_Dbconn();
		
		$results = $database->get_results( $my_db_query );
		foreach( $results as $row )
		{
		    	return '<option value="'.$row['sectionid'].'">'.$row['section_title'].'</option>';		                            
		}			
	}

	function my_latest_sectionbooks($sectionid){
		$my_db_query = "SELECT * FROM my_book WHERE book_section = '$sectionid' LIMIT 4";
		$database = new Js_Dbconn();
		
		$results = $database->get_results( $my_db_query );
		foreach( $results as $row )
		{
		    echo '';
		}

				
	}
	
	function my_latest_section_books_home(){
		$my_db_query = "SELECT * FROM my_section";
		$database = new Js_Dbconn();
		
		$book_sections = $database->get_results( $my_db_query );
		foreach( $book_sections as $section )
		{
		    $book_section = $section['sectionid'];
			
			$my_section_books_query = "SELECT * FROM my_book WHERE book_section = '$book_section' LIMIT 4";
			
			if ($my_section_books_query) {
				echo '<hr><h3>'.$section['section_title'].'</h3>
				   <div class="row">
					<div class="productsrow">';
			}	
				$database = new Js_Dbconn();
				
				$section_books = $database->get_results( $my_section_books_query );
				foreach( $section_books as $row )
				{
					echo '<div class="product menu-section">
									
					<a href="'.my_siteLynk().$row['book_slug'].'"><div class="product-image">
						<img class="product-image menu-book list-group-book" src="'.my_siteLynk_img().$row['book_img'].'">
					</div></a> <a href="'.my_siteLynk().$row['book_slug'].'" class="menu-book list-group-book">'.substr($row['book_title'],0,20).'<span class="badge">KSh '.$row['book_price'].'</span></a></div>';
				}
		   
				echo '</div></div>';
				
		}				
	}
	
	function my_latest_section_books(){
	$my_db_query = "SELECT * FROM my_book LIMIT 4";
	$database = new Js_Dbconn();
	
	$results = $database->get_results( $my_db_query );
	foreach( $results as $row )
	{
		echo '<div class="product menu-section">
				<a href="'.my_siteLynk().$row['book_slug'].'"><div class="menu-section-name list-group-book active">'.my_book_cart($row['book_section']).'</div></a>
				<a href="'.my_siteLynk().$row['book_slug'].'"><div class="product-image">
					<img class="product-image menu-book list-group-book" src="'.my_siteLynk_img().$row['book_img'].'" />
				</div></a> <a href="'.my_siteLynk().$row['book_slug'].'" class="menu-book list-group-book">'.substr($row['book_title'],0,20).'<span class="badge">KSh '.$row['book_price'].'</span></a>

			</div>';
	}

			
	}

	function my_home_sections(){
		$my_db_query = "SELECT * FROM my_section LIMIT 9";
		$database = new Js_Dbconn();		
		$results = $database->get_results( $my_db_query );
		foreach( $results as $row ) {
			echo '<a href="'.my_siteLynk().$row['section_slug'].'" >
			<div class="section_lynk"><img class="section_icon" src="'.my_siteLynk_icon().$row['section_icon'].'"/>
			'.$row['section_title'].'</div></a>';
	   }				
	}

	function my_lookup_section($request){
		$my_db_query = "SELECT * FROM my_section WHERE section_slug = '$request'";
		$database = new Js_Dbconn();
		if( $database->my_num_rows( $my_db_query ) > 0 ) { return true; } 
		else  { return false; }
	}
	
	function my_lookup_user($request){
		$my_db_query = "SELECT * FROM my_student_account WHERE student_name = '$request'";
		$database = new Js_Dbconn();
		if( $database->my_num_rows( $my_db_query ) > 0 ) { return true; } 
		else  { return false; }
	}
	
	function my_lookup_loc($request){
		$my_db_query = "SELECT * FROM my_location WHERE slug = '$request'";
		$database = new Js_Dbconn();
		if( $database->my_num_rows( $my_db_query ) > 0 ) { return true; } 
		else  { return false; }
	}
	
	function my_lookup_book($request){
		$my_db_query = "SELECT * FROM my_book WHERE book_slug = '$request'";
		$database = new Js_Dbconn();
		if( $database->my_num_rows( $my_db_query ) > 0 ) { return true; } 
		else  { return false; }
	}
