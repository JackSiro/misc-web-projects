	<?php
		
	function song_all() {
		$results = array();
		$results['pageTitle'] = "AP System";
		$results['pageAction'] = "Users";  
		require( AS_INC . "as_song_all.php" );
	}

	function song_new() {
		$results = array();
		$results['pageTitle'] = "AP System";
		$results['pageAction'] = "Newsong"; 
		
		if ( isset( $_POST['AddUser'] ) ) {
			as_add_new_song();
			header( "Location: index.php?action=song_new");						
		}  else if ( isset( $_POST['AddClose'] ) ) {
			as_add_new_song();
			header( "Location: index.php?action=song_all");						
		}  else {
			require( AS_INC . "as_song_new.php" );
		}	
		
	}
	function song_view() {
		$results = array();
		$results['pageTitle'] = "AP System";
		$results['pageAction'] = "Viewsong"; 
		$as_songid = isset( $_GET['as_songid'] ) ? $_GET['as_songid'] : "";
		
		$as_db_query = "SELECT * FROM as_song WHERE songid = '$as_songid'";
		$database = new As_Dbconn();
		if( $database->as_num_rows( $as_db_query ) > 0 ) {
			list( $songid, $song_name) = $database->get_row( $as_db_query );
			$results['song'] = $songid;
		} else  {
			return false;
			header( "Location: index.php?action=song_all");	
		}
		
		require( AS_INC . "as_song_view.php" );
			
	}

	function profile() {
		$results = array();
		$results['pageTitle'] = "AP System";
		$results['pageAction'] = "Profile"; 
		$as_songname = $_SESSION['mysitei_song'];
		
		$as_db_query = "SELECT * FROM as_song WHERE song_name = '$as_songname'";
		$database = new As_Dbconn();
		if( $database->as_num_rows( $as_db_query ) > 0 ) {
			list( $songid, $song_name) = $database->get_row( $as_db_query );
			$results['song'] = $songid;
		} else  {
			return false;
			header( "Location: index.php?action=songs");	
		}
		
		require( AS_INC . "as_viewsong.php" );
			
	}

	?>