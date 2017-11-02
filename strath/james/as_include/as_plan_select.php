<?php 
	$database = new As_Dbconn();			
	$as_db_query = "SELECT * FROM as_plan ORDER BY planid DESC LIMIT 30";
	$clientid = $_GET['as_clientid'];
	$results = $database->get_results( $as_db_query );
	include AS_THEME."as_header.php";
?>
<div id="tooplate_content">

	<h2>Our Plans</h2>
    <div id="gallery">
	<?php foreach( $results as $row ) { ?>
       	<div class="g_box">
            <a href="<?php echo $row['plan_title'] ?>" class="pirobox" title="<?php echo $row['plan_title'] ?>">
                <img src="as_media/<?php echo $row['plan_image'] ?>" alt="<?php echo $row['plan_title'] ?>" />
            </a>
            <h4><?php echo $row['plan_title'] ?></h4>
			<p>Kshs. <?php echo $row['plan_price'] ?>; <?php echo $row['plan_irate'] ?>%<br>
			Installments: Kshs. <?php echo $row['plan_instal'] ?>/=<br>
			Benefits: <?php echo $row['plan_benefit'] ?></p>
            <div class="button"><a href="index.php?action=plan_set&&as_clientid=<?php echo $clientid ?>&&as_planid=<?php echo $row['planid'] ?>">Purchase Plan</a></div>
		</div>
	<?php } ?>
    	<div class="cleaner"></div>
    </div>
	
    <div class="cleaner"></div>
</div>  		
    <div class="cleaner"></div>
    <div class="cleaner"></div>

<?php include AS_THEME."as_footer.php" ?>