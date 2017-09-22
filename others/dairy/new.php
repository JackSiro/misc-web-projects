<?php include ("theme/header.php"); ?>

	<!--  STATS LINE  -->
	<!--  TODO: enter your domain's stats below -->
	<!--  If you need a different number of columns here, please use:
	         - <div class="col span_24"> for 1 column
	         - <div class="col span_12"> for 2 columns
	         - <div class="col span_8"> for 3 columns
	         - <div class="col span_6"> for 4 columns
	         - <div class="col span_3"> for 8 columns
	-->
	<!--  
	      If you don't have such data or want to use this area as a text block, feel free to replace 
	      all <div class="col span_4">...</div> by a single <div class="col span_24"> - your text message - </div> 
	-->
	
	<div id="Stats" class="container">
		<div class="row">
			<a href="startpage.html"><div class="col span_4"><i class="info">HOME</i></div></a>
			<a href="startpage.html"><div class="col span_4"><i class="info">RECORDS</i></div></a>
			<a href="records.html"><div class="col span_4"><i class="info">SEARCH</i></div></a>
			<a href="update.html"><div class="col span_4"><i class="info">ABOUT US</i></div></a>
			<a href="contact.html"><div class="col span_4"><i class="info">CONTACT US</i></div></a>
			
		</div>
	</div>
	<!-- END OF STATS LINE  -->

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

		<h2 class="align-center margin">Kimilili Dairy Management System</h2>
		<div class="row padding">
			<div class="col span_8">
				<div class="circle"><i class="icon icon-support"></i></div>
				<h3 class="align-center">Easy to remember domain</h3>
				<p class="align-center">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh 
					euismod tincidunt ut laoreet dolore magna.</p>
			</div>

			<div class="col span_8">
				<div class="circle"><i class="icon icon-stockup"></i></div>
				<h3 class="align-center">Awesome stats</h3>
				<p class="align-center">Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, 
					vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio.</p>
			</div>

			<div class="col span_8">
				<div class="circle"><i class="icon icon-briefcase"></i></div>
				<h3 class="align-center">Popularity</h3>
				<p class="align-center">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod 
					tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam.</p>
			</div>
		</div> <!-- end of row -->

		<hr class="divider">

		<div class="row padding">
			<div class="col span_4">
				 <p class="align-center"><a class="sample-banner" style="width:125px; height:125px; line-height:125px;" href="#">Banner</a></p>
			</div>
			<div class="col span_4">
				 <p class="align-center"><a class="sample-banner" style="width:125px; height:125px; line-height:125px;" href="#">Banner</a></p>
			</div>
			<div class="col span_4">
				 <p class="align-center"><a class="sample-banner" style="width:125px; height:125px; line-height:125px;" href="#">Banner</a></p>
			</div>
			
		</div> <!-- end of row -->
		
		<hr class="divider">

		<div class="row padding">
			<div class="col span_8">

				<!-- "About seller" text block. Feel free to replace it by any other text or advertisement -->
				<h2>About Seller</h2>
				<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh 
				euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. </p>
				<p>AZ Domains has a variety of domain in many niches. So, if you like one of the domaint listed below, 
					feel free to make an offer for that domain too. 
				</p>
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
							<textarea id="f_offer" name="f_offer" rows="10">I would like to offer $100 000 for megadomain.com</textarea>
						</div>
					</div>
					<div class="row">
						<div class="col span_24 align-right">
							<button class="btn btn-large" type="button">Submit offer</button>
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

	<div id="Add" class="container">
		<div class="padding">
			<h2 id="Add-caption">More domains <i></i></h2>
			<div class="row" id="Add-domains">
				<div class="col span_24">
					<ul>
						<li><a href="#" class="title">Anotherdomain.com</a><span class="action"><i></i><a href="" class="btn btn-small">Make offer</a></span></li>
						<li><a href="#" class="title">Domain.com</a><span class="action"><i></i><a href="" class="btn btn-small">Make offer</a></span></li>
						<li><a href="#" class="title">Hotpromo.com</a><span class="action"><i></i><a href="" class="btn btn-small">Make offer</a></span></li>
					</ul>
					<ul id="More-domains">
						<li><a href="#" class="title">Newdigitimes.net</a><span class="action"><i></i><a href="" class="btn btn-small">Make offer</a></span></li>
						<li><a href="#" class="title">Somethingspecial.org</a><span class="action"><i></i><a href="" class="btn btn-small">Make offer</a></span></li>
						<li><a href="#" class="title">Sample.com</a><span class="action"><i></i><a href="" class="btn btn-small">Make offer</a></span></li>
						<li><a href="#" class="title">Anothersample.com</a><span class="action"><i></i><a href="" class="btn btn-small">Make offer</a></span></li>
					</ul>
					<p class="more">...</p>
				</div>
			</div>
		</div>
		<hr>
	</div>
 

<?php  include ("theme/footer.php");  ?>
