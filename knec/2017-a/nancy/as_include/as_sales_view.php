<?php 

	$salesid = $results['sales'];
	$as_db_query = "SELECT * FROM as_sales WHERE salesid = '$salesid'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
	list( $salesid, $sales_stockid, $sales_qty, $sales_price, $sales_title, $sales_fullname, $sales_mobile, $sales_email, $sales_address, $sales_content, $sales_createdby, $sales_created) = $database->get_row( $as_db_query );
}
include AS_THEME."as_header.php"; ?>
<div id="tooplate_main_wrapper">
    <div id="tooplate_top"></div>
	
    <div id="tooplate_main">
        <div id="tooplate_content_wrapper">
        	<div id="tc_top"></div>
			
        	<div id="tooplate_content">
				<div id="contact_form">
               	
                <div class="post_box">
					<h2 class="meta">Sale Item: <?php echo $sales_qty.' '.$sales_title ?></h2> 
                    <div class="cleaner"></div>
		 		<h2>Sales Cost: <?php echo $sales_price ?></h2>
				<h2>Buyer's Mobile: <?php echo $sales_mobile ?></h2>
				<h2>Buyer's Email: <?php echo $sales_email ?></h2>
				<h2>Buyer's Address: <?php echo $sales_address ?></h2>
				<h2>Sold on: <?php echo date("j/m/y", strtotime($sales_created)) ?></h2>
				
				<hr>
				<center><h2><a href="index.php?action=sales_edit&&as_salesid=<?php echo $salesid ?>">Edit this Item</a>
				 | <a href="index.php?action=sales_delete&&as_salesid=<?php echo $salesid ?>" onclick="return confirm('Are you sure you want to delete this sales from the system? \nBe careful, this action can not be reversed.')">Delete this Item</a></h2></center>
				</div>
                </div>
            </div>
			
            <div id="tc_bottom"></div>
        </div>         
        <div class="cleaner"></div>
    </div>
<?php include AS_THEME."as_footer.php" ?>
    
