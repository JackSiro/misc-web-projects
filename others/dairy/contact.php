<?php include ("theme/header.php"); ?>

	<!-- CONTENT -->
	<!-- TODO: Change content in the rows/columns below 
	     Please note, 24-columns grid is used in the template, so you can reorder the blocks 
	     to make, for example, 2-columns layout (use a pair of col span_12) or 4-column one
	     (use 4 copies of col span_6) -->
	<div id="Content" class="container">
		<br><h1 class="align-center margin">CONTACT US TODAY</h1>
		<div class="row padding">
			<div class="col span_8">
				<div class="circle"><i class="icon icon-support"></i></div>
				<h3 class="align-center">Email:</h3>
				<p class="align-center">customercare@gmail.com</p>
			</div>

			<div class="col span_8">
				<div class="circle"><i class="icon icon-stockup"></i></div>
				<h3 class="align-center">Website:</h3>
				<p class="align-center">www.kimililidairy.ac.ke</p>
			</div>

			<div class="col span_8">
				<div class="circle"><i class="icon icon-briefcase"></i></div>
				<h3 class="align-center">Mobile:</h3>
				<p class="align-center">0712858416</p>
			</div>
		</div> 
		
		<!-- end of row -->

		<hr class="divider">

		<div class="row padding">
			<div class="col span_24">
				
				<!-- Offer submission form. Please don't change inputs' IDs and names. -->
				<h1 class="align-center margin">Contact Us</h1>
				<div id="Offer">
					<div class="row">
						<div class="col span_24">
							<input type="text" placeholder="Your Name" id="f_name" name="f_name" >
						</div>
					</div>
					<div class="row">
						<div class="col span_24">
							<input type="text" placeholder="Your email address" id="f_email" name="f_email" >
						</div>
					</div>
					<div class="row">
						<div class="col span_24">
							<textarea id="f_offer" name="f_offer" rows="10">I would like to ask about</textarea>
						</div>
					</div>
					<div class="row">
						<div class="col span_24 align-right">
							<button class="btn btn-large" type="button">Submit Form</button>
							<div class="subscribe">
								<input type="checkbox" name="f_subscribe" id="f_subscribe" value="yes"><label for="f_subscribe"> <i></i>Subscribe to our newsletter</label>
							</div>
						</div>
					</div>
				</div> <!-- end of offer form -->
				
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

<?php  include ("theme/footer.php");  ?>
