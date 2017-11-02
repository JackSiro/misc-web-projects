<?php
/*
	File: as_functions/as_posting.php
	Description: declaration of functions that allow inserting as well as updating records in the database

*/

	function clean($str) {
		$str = @trim($str);
		if(get_magic_quotes_gpc()) {
			$str = stripslashes($str);
		}
		return mysql_real_escape_string($str);
	}

	function as_str_tags($string){
		$slag6 = trim($string);
		$slag5 = strtolower($slag6);
		$slag4 = preg_replace("/[\s-]+/", "-", $slag5);
		$slag3 = preg_replace('/[^,;a-zA-Z0-9_-]|[,;]$/s', '', $slag4);
		$slag2 = preg_replace("/\_/", "-", $slag3);
		$slag1 = preg_replace("/\,-/", ", ", $slag2);
		$slag = preg_replace("/\-,/", ",", $slag1);
		return $slag;
	}
	
	function as_str_text($string) {
        $text4 = str_replace('"', '+', $string);
		$text3 = str_replace('<br />', '$', $text4);
		$text2 = str_replace("'", "^", $text3);
		$text1 = strip_tags($text2);	
		$text = trim($text1);			
		return $text;
	}
	
	function is_english_used($string) {
		if (strlen($str) != strlen(utf8_decode($str))) {
			return false;
			} else {
				return true;
			}
	}
	
	function as_slug_this($content) {
		return preg_replace("/-$/","",preg_replace('/[^a-z0-9]+/i', "-", strtolower($content)));
	}
	
	function as_add_admin($admin_username) {		
		$database = new As_Dbconn();	
		$Update_Admin_Details = array(
			'user_group' => trim($_POST['admin_role']),
		);
		$where_clause = array('user_name' => $admin_username);
		$updated = $database->as_update( 'as_user', $Update_Admin_Details, $where_clause, 1 );
		if( $updated )	{	}
	
	}
 	
	function as_new_category(){
		$database = new As_Dbconn();
		$incategorytitle 		= as_post_text('category_title');
		$incategorycontent 		= as_post_text('category_content');

		$database = new As_Dbconn();			
		$New_Item_Details = array(
			'category_title' 	=> $incategorytitle,
			'category_content'	=> $incategorycontent,
			'category_created' => date('Y-m-d H:i:s'),
		);
		$add_query = $database->as_insert( 'as_category', $New_Item_Details );
	}
			
	function as_edit_category($categoryid) {
		$database = new As_Dbconn();
		$incategorytitle 		= as_post_text('category_title');
		$incategorycontent 		= as_post_text('category_content');
		
		$Update_Item_Details = array(
			'category_title' 	=> $incategorytitle,
			'category_content'	=> $incategorycontent,
		);
		$where_clause = array('categoryid' => $categoryid);
		$updated = $database->as_update( 'as_category', $Update_Item_Details, $where_clause, 1 );
	}
	
	function as_new_item(){
		$database = new As_Dbconn();
		$initemtitle 		= as_post_text('item_title');
		$initemvalue 		= as_post_text('item_value');
		$initemplace 		= as_post_text('item_place');
		$initemdate 		= as_post_text('item_date');
		$initemtime 		= as_post_text('item_time');
		$initemperson 		= as_post_text('item_person');
		$initemidnumber 	= as_post_text('item_idnumber');
		$initemcontent 		= as_post_text('item_content');
		$initemimage		= as_new_upload("item_image", 1, "no_image.jpg");
					
		$New_Item_Details = array(
			'item_title' 	=> $initemtitle,
			'item_value'	=> $initemvalue,
			'item_place'	=> $initemplace,
			'item_date'		=> $initemdate,
			'item_time'		=> $initemtime,
			'item_person'	=> $initemperson,
			'item_idnumber'	=> $initemidnumber,
			'item_content'	=> $initemcontent,
			'item_image'	=> $initemimage,
			'item_reported' => date('Y-m-d H:i:s'),
		);
		$add_query = $database->as_insert( 'as_item', $New_Item_Details );
	}
			
	function as_edit_item($itemid) {
		$database = new As_Dbconn();
		$initemtitle 		= as_post_text('item_title');
		$initemvalue 		= as_post_text('item_value');
		$initemplace 		= as_post_text('item_place');
		$initemdate 		= as_post_text('item_date');
		$initemtime 		= as_post_text('item_time');
		$initemperson 		= as_post_text('item_person');
		$initemidnumber 	= as_post_text('item_idnumber');
		$initemcontent 		= as_post_text('item_content');
		$initemimage		= as_new_upload("item_imaged", 1, as_post_text('item_image'));
					
		$Update_Item_Details = array(
			'item_title' 	=> $initemtitle,
			'item_value'	=> $initemvalue,
			'item_place'	=> $initemplace,
			'item_date'	=> $initemdate,
			'item_time'	=> $initemtime,
			'item_person'	=> $initemperson,
			'item_idnumber'	=> $initemidnumber,
			'item_content'	=> $initemcontent,
			'item_image'	=> $initemimage,
		);
		$where_clause = array('itemid' => $itemid);
		$updated = $database->as_update( 'as_item', $Update_Item_Details, $where_clause, 1 );
	}
	
	function as_new_crime(){
		$database = new As_Dbconn();
		$incrimecategory 	= as_post_text('crime_category');
		$incrimetitle 		= as_post_text('crime_title');
		$incrimedescription = as_post_text('crime_description');
		$incrimedate 		= as_post_text('crime_date');
		$incrimetime 		= as_post_text('crime_time');
		$incrimesuspect 	= as_post_text('crime_suspect');
		$incrimepicture1	= as_new_upload("crime_picture1", 1, "no_image.jpg");
		$incrimepicture2	= as_new_upload("crime_picture2", 2, "");
		$incrimepicture3	= as_new_upload("crime_picture3", 3, "");
		
		$New_Item_Details = array(			
			'crime_category' 	=> $incrimecategory,
			'crime_title' 		=> $incrimetitle,
			'crime_description'	=> $incrimedescription,
			'crime_date' 		=> $incrimedate,
			'crime_time' 		=> $incrimetime,
			'crime_suspect' 	=> $incrimesuspect,
			'crime_picture1' 	=> $incrimepicture1,
			'crime_picture2' 	=> $incrimepicture2,
			'crime_picture3' 	=> $incrimepicture3,
			'crime_posted' 		=> date('Y-m-d H:i:s'),
			'crime_postedby' 	=> 1,
		);
		$add_query = $database->as_insert( 'as_crime', $New_Item_Details );
	}
			
	function as_edit_crime($crimeid) {
		$database = new As_Dbconn();
		$incrimecategory 	= as_post_text('crime_category');
		$incrimetitle 		= as_post_text('crime_title');
		$incrimedescription = as_post_text('crime_description');
		$incrimedate 		= as_post_text('crime_date');
		$incrimetime 		= as_post_text('crime_time');
		$incrimesuspect 	= as_post_text('crime_suspect');
		$incrimepicture1	= as_new_upload("crime_picture1", 1, as_post_text('crime_pictured1'));
		$incrimepicture2	= as_new_upload("crime_picture2", 2, as_post_text('crime_pictured2'));
		$incrimepicture3	= as_new_upload("crime_picture3", 3, as_post_text('crime_pictured3'));
		
		$Update_Item_Details = array(
			'crime_category' 	=> $incrimecategory,
			'crime_title' 		=> $incrimetitle,
			'crime_description'	=> $incrimedescription,
			'crime_date' 		=> $incrimedate,
			'crime_time' 		=> $incrimetime,
			'crime_suspect' 	=> $incrimesuspect,
			'crime_picture1' 	=> $incrimepicture1,
			'crime_picture2' 	=> $incrimepicture2,
			'crime_picture3' 	=> $incrimepicture3,
			'crime_updated' 		=> date('Y-m-d H:i:s'),
			'crime_updatedby' 	=> 1,
		);
		$where_clause = array('crimeid' => $crimeid);
		$updated = $database->as_update( 'as_crime', $Update_Item_Details, $where_clause, 1 );
	}
	
	function as_delete_item($item, $itemidSaveItem) {
		$database = new As_Dbconn();
		$delete = array(
			$item.'id' => $itemid,
		);
		$deleted = $database->delete( 'as_'.$item, $delete, 1 );
		header( "Location: ".as_menu_handler($item."/all"));
	}
	
	function as_new_upload($filename, $i, $default){
		$raw_file_name = basename($_FILES[$filename]["name"]);
		$temp_file_name = $_FILES[$filename]["tmp_name"];		
		$upload_file_ext = explode(".", $raw_file_name);
		$upload_file_name = preg_replace("/-$/","",preg_replace('/[^a-z0-9]+/i', "_", strtolower($upload_file_ext[0])));
		$finalname = 'image'. $i.'_'.time().'.'.$upload_file_ext[1];
		$target_file = "./as_media/posts/" .  $finalname;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		if (copy($temp_file_name, $target_file)) return $finalname;
		else return $default;
	}
	