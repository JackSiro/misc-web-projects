<?php include ("theme/header.php"); ?>

	<!-- CONTENT -->
	<!-- TODO: Change content in the rows/columns below 
	     Please note, 24-columns grid is used in the template, so you can reorder the blocks 
	     to make, for example, 2-columns layout (use a pair of col span_12) or 4-column one
	     (use 4 copies of col span_6) -->
	<div id="Content" class="container">
	
		<div class="row special">
			<div class="col span_24">
				<h3><marquee><h1>KIMILILI DAIRY MANAGEMENT SYSTEM</h1></marquee></h3>
				<div class="row padding">				
					<div class="col span_12">
						<img src="images/cow.jpg" style="width:100%;"/>
					</div>
					<div class="col span_12">
						<h3 class="align-center">Welcome to Kimilili Dairy Management System. We are glad to be associated with you.</h3>
						<marquee direction="up">Kimilili Dairy farm was established in  2012 to manage&nbsp; dairy cows. The objective of the system is to enable efficient services to the customer and to give accurate report for better decision making.The farm is situated in Western province, Bungoma County. It located on Kimilili--Bungoma road</marquee>
					</div>
				</div>
			</div>
		</div>

		<hr class="divider">
		<h2 class="align-center margin">Kimilili Dairy Management System</h2>
		<div class="row padding">
			<div class="col span_8">
				<div class="circle"><i class="icon icon-support"></i></div>
				<h3 class="align-center">We value you</h3>
				<p class="align-center">We always put your intrests first before anything. We always put your intrests first before anything. We always put your intrests first before anything.</p>
			</div>

			<div class="col span_8">
				<div class="circle"><i class="icon icon-stockup"></i></div>
				<h3 class="align-center">We Care for You</h3>
				<p class="align-center">We always put your intrests first before anything. We always put your intrests first before anything. We always put your intrests first before anything.</p>
			</div>

			<div class="col span_8">
				<div class="circle"><i class="icon icon-briefcase"></i></div>
				<h3 class="align-center">We Listen to you</h3>
				<p class="align-center">We always put your intrests first before anything. We always put your intrests first before anything. We always put your intrests first before anything.</p>
			</div>
		</div> <!-- end of row -->

		<hr class="divider">

		<div class="row padding">
			<div class="col span_8">

				<!-- "About seller" text block. Feel free to replace it by any other text or advertisement -->
				<h2>About Us</h2>
				<p>Kimilili Dairy farm was established in  2012 to manage&nbsp; dairy cows. The objective of the system is to enable efficient services to the customer and to give accurate report for better decision making.</p><p>The farm is situated in Western province, Bungoma County. It located on Kimilili--Bungoma road</p>
				<p><img src="images/tour.png" alt=""></p>

			</div>
			<div class="col span_16">
				
				<!-- Offer submission form. Please don't change inputs' IDs and names. -->
				<h2>Contact Us</h2>
				<div id="Offer">
					<div class="row">
						<div class="col span_12">
							<input type="text" placeholder="Your Name" id="f_name" name="f_name" >
						</div>
						<div class="col span_12">
							<input type="text" placeholder="Your email address" id="f_email" name="f_email" >
						</div>
					</div>
					<div class="row">
						<div class="col span_24">
							<textarea id="f_offer" name="f_offer" rows="10">I would like to offer ask about</textarea>
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
