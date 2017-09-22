<?php include AS_THEME."as_header.php";
	$myaccount = isset( $_SESSION['account'] ) ? $_SESSION['account'] : "";
	?>
	<div class="content">
    <div class="content_resize">
      <div class="mainbar">
        <div class="article">
          <h2 style="text-transform:uppercase">Register Your Account as a Patient</h2>
        </div>
        <div class="article">
          <form action="account.php?action=register" method="post" id="sendemail">
            <ol>
              <li>
                <label for="fullname">Full Name (required)</label>
                <input type="text" name="fullname" class="input_form" required/>
              </li>
              <li>
                <label for="username">Username (required)</label>
                <input type="text" name="username" class="input_form" required/>
              </li>
              <li>
                <label for="address">Physical Address</label>
                <input type="text" name="address" class="input_form" required/>
              </li>
			  <li>
                <label for="mobile">Sex (required)
                <input type="radio" name="sex" value="Male" required/> Male
                <input type="radio" name="sex" value="Female" required/> Female</label>
              </li>
              <li>
                <label for="mobile">Mobile Phone (required)</label>
                <input type="text" name="mobile" class="input_form" required/>
              </li>
              <li>
                <label for="email">Email Address (required)</label>
                <input type="email" name="email" class="input_form" required/>
              </li>
			  <li>
                <label for="email">Password (required)</label>
                <input type="password" name="password" class="input_form"required />
              </li><br>
             <!-- <li>
                <label for="condition">Your Condition</label>
                <textarea name="condition" class="input_form" rows="8" cols="50"></textarea>
              </li><br>-->
              <li>
                <input type="submit" name="Register" id="imageField" class="submit_form_i" value="Register Now"/>
                <div class="clr"></div>
              </li>
            </ol>
          </form>
        </div>
      </div>
		<?php// include AS_THEME."as_sidebar.php" ?>
      <div class="clr"></div>
    </div>
  </div>
 
<?php include AS_THEME."as_footer.php" ?>
    
