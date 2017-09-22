<?php include AS_THEME."as_header.php";
	$as_db_query = "SELECT * FROM as_client ORDER BY clientid DESC LIMIT 20";
	$database = new As_Dbconn();			
	$results = $database->get_results( $as_db_query );
?>
<div id="site_content">
	<h1>Welcome to <?php echo as_get_option('sitename') ?></h1>
	<img src="as_media/hall.jpg" />
		  
</div>
<?php include AS_THEME."as_footer.php" ?>
    
