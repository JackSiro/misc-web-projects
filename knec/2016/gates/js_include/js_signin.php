<?php include JS_THEME."js_header.php";
	$myaccount = isset( $_SESSION['gates_account'] ) ? $_SESSION['gates_account'] : "";
	?>
  <div class="inner">
    <div class="main">
      <section id="content">
        <div class="slider">
          <ul class="items">
            <li> <img src="js_themes/images/slider-img1.jpg" alt="" />
              <div class="banner"> <strong class="title"> <strong>Before</strong><em>Others</em> </strong>
                <p class="p3">Our site allows you to buy tickets before others when you choose to to book through our site online</p>
                <a class="button-1" href="#">Learn More</a> </div>
            </li>
            <li> <img src="js_themes/images/slider-img2.jpg" alt="" />
              <div class="banner"> <strong class="title"> <strong>Your</strong><em>Highness</em> </strong>
                <p>We have tickets to suit your status or profile you can enjoy watching the match like a King or Queen.</p>
                <a class="button-1" href="#">Learn More</a> </div>
            </li>
            <li> <img src="js_themes/images/slider-img3.jpg" alt="" />
              <div class="banner"> <strong class="title"> <strong>Our</strong><em>Way</em> </strong>
                <p>Returning customers will always get rewarded with great discounts on tickets no matter the type of ticket one is buying.</p>
                <a class="button-1" href="#">Order Now</a> </div>
            </li>
          </ul>
          <a class="banner-2" href="#"></a> </div>
		  
        <ul class="pags">
          <li><a href="#">1</a></li>
          <li><a href="#">2</a></li>
          <li><a href="#">3</a></li>
        </ul>
        
        <div class="padding-2">
          <div class="indent-top">
            <div class="wrapper">
              <article class="col-3">
                <h4><strong>Login</strong> to <em>Your Account to Continue</em></h4><hr>
				<form action="index.php?page=login" method="post" >
			<input type="text" name="username" id="username" placeholder="Enter your username" autocomplete="off" required autofocus maxlength="20" />
			<input type="password" name="password" id="password" placeholder="Enter your password" autocomplete="off" required maxlength="20" />
			<input type="submit" id="aalogin-button" name="SignMeIn" value="Sign In" />
        
      </form>
              </article>
			  <?php include JS_THEME."js_sidebar.php" ?>
              
            </div>
          </div>
        </div>
	<!--
	<div class="bg">
  <div class="padding">
	<div class="wrapper">
	  <article class="col-1">
		<h3>What Drinks are available</h3>
		<p>Cofee made from the finest grounds of Arabic coffee beans, a wide range of teas, and soft drinks, juices, and water are served chilled.</p>
		<div class="relative"> <a class="button-2" href="#">Read More</a> </div>
	  </article>
	  <article class="col-1">
		<h3>Foods that we sell;</h3>
		<p>A variety of homemade chocolates, a delicious range of cakes and biscuits, homemade off course. We provide nice snacks for your picnics, including sandwitches, pastries, salads, and more.</p>
		<div class="relative"> <a class="button-2" href="#">Read More</a> </div>
	  </article>
	  <article class="col-2">
		<h3>Take Aways</h3>
		<p>If you are too busy to either cook or even eat here at our cafe, then you may opt to buy a take away package with you to go with it..</p>
		<div class="relative"> <a class="button-2" href="#">Read More</a> </div>
	  </article>
	</div>
  </div>
</div>
	
	-->
		
      </section>
      <div class="block"></div>
    </div>
  </div>
</div>


<?php include JS_THEME."js_footer.php" ?>