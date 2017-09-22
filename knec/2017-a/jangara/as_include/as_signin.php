<?php include AS_THEME."as_header.php" ?>
			<div id="content"> 
				<div id="featured">
				<h2><span>Sign In to Your Account to Continue</span></h2>
					<table>
					 <tr>
					 <td>
						<form action="index.php?action=login" method="post" >
						<input type="text" name="username" id="username" placeholder="Enter your username" autocomplete="off" required autofocus maxlength="20" />
						<input type="password" name="password" id="password" placeholder="Enter your password" autocomplete="off" required maxlength="20" />
						<input type="submit" id="aalogin-button" class="readmore" name="SignMeIn" value="Sign In" />
					
					</form>
				 </td>
				 <td>
					<a href="index.html"><img src="as_media/businessman-2.jpg" width="390" height="280" alt=""></a>
				 </td>
				 </tr>
				 </table>
					
				 </div>
				<!-- start of articles-->
				<div class="articles">
					<div>
						<h2><?php echo as_get_option('sitename') ?></h2>
						<p><?php echo as_get_option('description') ?></p>
					</div>
				</div>
				
			</div>

<?php include AS_THEME."as_footer.php" ?>
    
