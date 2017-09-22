<?php 
	$database = mysql_connect("localhost","root","");
	
	if ( isset( $_POST['SubmitThis'] ) ) {
		$r_species = $_POST['species'];
		$r_numbers = $_POST['numbers'];
		//$query="SELECT * FROM records";
		$query="INSERT INTO `records` (`number`, `species`) VALUES ('$r_numbers', '$r_species')";
		
		mysql_select_db("kasembeli")or die (" die could not connect to database");

		if(!($result=mysql_query($query, $database)))
		{
			die(mysql_error()."Could not execute query!");
			exit();
		}
		header( "Location: records.php");
	
	} else {
	
	include ("theme/header.php"); 

?>

	<!-- CONTENT -->
	<!-- TODO: Change content in the rows/columns below 
	     Please note, 24-columns grid is used in the template, so you can reorder the blocks 
	     to make, for example, 2-columns layout (use a pair of col span_12) or 4-column one
	     (use 4 copies of col span_6) -->
	<div id="Content" class="container">
		<br><h1 class="align-center margin">NEW RECORD</h1>
		
		<hr class="divider">

		<div class="row padding">
			<div class="col span_24">
			  <form name="Login" action="#" method="post" />
				<div id="Offer">
					<div class="row padding">
						<div class="col span_12">
							1. The species of cows?
						</div>

						<div class="col span_12">
							<select name="species">
								<option value="AYSHIRE">AYSHIRE</option>
								<option value="HOLSTEIN">HOLSTEIN</option>
								<option value="JERSEY">JERSEY</option>
								<option value="INDIAN COW">INDIAN COW</option> 
							</select>
						</div>
					</div> 
					<div class="row padding">
						<div class="col span_12">
							2. The number of cows in that species?
						</div>
						<div class="col span_12">
							<select name="numbers">
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>
							</select>
						</div>
					</div> 
					 
					</div> 
					
					
					<div class="row">
						<div class="col span_24 align-center">
							<input class="btn btn-large" type="submit" name="SubmitThis" value="Submit Record" /> <br><br>
						</div>
					</div>
				</div> 
			</form>
			<!-- end of offer form -->
				<!-- Result Messages -->
				<div class="row" id="error_msg">
					<div class="col span_24">
						<b>Sorry, but there were error(s) found with the form you submitted:
						<i></i></b> 
						<br><a href="javascript:void(0);" id="new_try">Got it, retry.</a>
					</div>
				</div>
				<div class="row" id="msg">
					<div class="col span_24">
						<b>Offer sent!</b> 
						<br><a href="javascript:void(0);" id="new_offer">Make another one?</a>
					</div>
				</div>
				<!-- End of Result Messages -->

			</div> <!-- end of col span_16 -->
		</div> <!-- end of row -->
	</div>
	<!-- END OF CONTENT -->

	<div id="Content-end" class="container"></div>

	<?php  include ("theme/footer.php");  } ?>
