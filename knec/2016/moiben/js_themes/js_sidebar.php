 <div class="sidebar">
 <div class="gadget">
        <h2>My Account</h2>
		  	
		  	<?php
			if ($myaccount == 'Doctor') { ?>
				<h3>You are logged in as:</h3>
				<h3>Dr <?php echo js_full_name() ?></h3>
				<a href="index.php?action=logout" ><h4>Logout?</h4></a>
			<?php } else { ?>
			
			<center>
			<form action="index.php?action=login" method="post" >
			<input type="text" name="username" class="input_form" placeholder="Enter your username" autocomplete="off" required autofocus maxlength="20" /><br>
			<input type="password" name="password" class="input_form" placeholder="Enter your password" autocomplete="off" required maxlength="20" /><br><br>
			<input type="submit" class="submit_form_i" name="SignMeIn" value="Sign In" />
			
			<?php } ?>
      </form></center>
	  </div><hr>
		<div class="gadget">
          <h2 class="star">PARTNERS AND AGENCY WEBSITES</h2>
          <ul class="sb_menu">
            <li><a href="http://www.usaid.un.com">USAID</a></li>
            <li><a href="http://www.cdc.org">CDC GLOBAL HEALTH</a></li>
            <li><a href="http://www.uoe.go.ke">UNIVERSITY OF ELDORET</a></li>
            <li><a href="http://www.kemri.go.ke">KEMRI</a></li>
            <li><a href="http://www.kemsa.go.ke">KEMSA</a></li>
            <li><a href="http://www.nhif.go.ke">NHIF</a></li>
          </ul>
        </div><hr>
        <div class="gadget">
          <h2 class="star">Services and specialties</h2>
          <ul class="ex_menu">
            <li><a href="#">Moiben against cancer</a><br />
              </li>
            <li><a href="#">Donate</a><br />
              kindly donate to help the needy</li>
            <li><a href="#">volunteering</a><br />
              community voluntary services</li>
            <li><a href="http://www.UGHealth.com ">UG County ministry of health</a><br />
              ministry of health-Uasin Gishu county</li>
          </ul>
        </div>
      </div>