<?php 

	$planid = $results['class'];
	$as_db_query = "SELECT * FROM as_plan WHERE planid = '$planid'";
	$database = new As_Dbconn();
	if( $database->as_num_rows( $as_db_query ) > 0 ) {
		list( $planid, $plan_title, $plan_price, $plan_instal, $plan_irate, $plan_benefit, $plan_image) = $database->get_row( $as_db_query );
	}
	include AS_THEME."as_header.php";
?>
<div id="tooplate_content">	
	<div class="col_w460">
       	<div id="contact_form">
        	<h4>Edit a new Plan</h4>
			<form action="index.php?action=plan_new" method="post" >
				<label for="plan_price">Plan Title:</label> <input type="text" id="plan_price" name="plan_title" class="required input_field" />
				<div class="cleaner_h10"></div>
				<label for="plan_price">Plan Price (kshs):</label> <input type="text" id="plan_price" name="plan_price" class="required input_field" />
				<div class="cleaner_h10"></div>
				<label for="plan_irate">Interest Rate (%):</label> <input type="text" id="plan_irate" name="plan_irate" class="required input_field" />
				<div class="cleaner_h10"></div>
				<label for="plan_benefit">Benefits:</label> <input type="text" id="plan_benefit" name="plan_benefit" class="required input_field" />
				<div class="cleaner_h10"></div>
				<label for="plan_benefit">Image Impression:</label> <input type="file" id="plan_benefit" name="plan_benefit" class="required input_field" />
				<div class="cleaner_h10"></div>
				<div class="cleaner_h10"></div>
				<input type="submit" value="Save Only" id="submit" name="EditItem" class="submit_btn float_l" />
				<input type="submit" value="Save & Close" id="submit" name="EditClose" class="submit_btn float_r" />
			</form>
        </div>
   	</div>
    <div class="cleaner"></div>
</div>     		
    <div class="cleaner"></div>
    <div class="cleaner"></div>

<?php include AS_THEME."as_footer.php" ?>
    