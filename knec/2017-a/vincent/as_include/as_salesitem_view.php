<?php 

	$salesitemid = $results['class'];
	$as_db_query = "SELECT * FROM as_salesitem WHERE salesitemid = '$salesitemid'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
	list( $salesitemid, $salesitem_title, $salesitem_price, $salesitem_content) = $database->get_row( $as_db_query );
}
include AS_THEME."as_header.php"; ?>
	<div id="tooplate_main">    	        
        <div class="content_box">
            <h2>Edit a Class</h2>
            <div class="col_w340 float_l">
                <div id="contact_form">
				<form role="form" method="post" name="PostClass" action="index.php?action=salesitem_view&&as_salesitemid=<?php echo $salesitemid ?>">
					<label for="text">Class Title</label> <input type="text" class="required input_field" autocomplete="off" name="title" value="<?php echo $salesitem_content ?>"/>
						<div class="cleaner h10"></div>  
					<label for="text">Class Year</label> <input type="text" class="required input_field" autocomplete="off" name="year" value="<?php echo $salesitem_price ?>"/>
						<div class="cleaner h10"></div>  
					<label for="text">Class Term</label> <input type="text" class="required input_field" autocomplete="off" name="term" value="<?php echo $salesitem_title ?>"/>
						<div class="cleaner h10"></div>  
				
				<p style="padding-top: 15px"><span>&nbsp;</label> <input type="submit" class="submit_btn float_l" id="submitBtn" name="SaveClass" value="Save Changes"/>
						<div class="cleaner h10"></div>  		
				</form>
                </div> 
            </div>
            <div class="cleaner h30"></div>
            <a class="gototop" href="#top"></a>
            <div class="cleaner"></div>
            <div class="cleaner"></div>
        </div>
	</div>
<?php include AS_THEME."as_footer.php" ?>