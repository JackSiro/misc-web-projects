<?php  include 'header.php'; ?>
			<tr class="main_body">
				<td>
					<table class="main_body_tt">
						<tr>
							<td class="left_panel" valign="top">
<?php	
	include 'config.php'; 
	if ($error_in_connection) echo "Connection to the database was unsuccessful";
	else { ?>

	<?php } ?>
</td>
							<td class="right_panel" valign="top">
								<p>
									<b>About Us</b><br>
									Welcome to our Bakery where we will not only treat you as a King, but we will do you more than what you expected from us. All you need is to simply contact us any time during our working days:</br><br>
									<hr>
									<br>
									<b>Working Hours</b><br>
									Monday - Friday<br>
									* 8:00 am - 5:00pm<br><br>
									Sartuday<br>
									* 9:00 am - 3:00pm<br><br>
									Sundays and Public Holidays<br>
									* Closed<br><br>
								</p>
							</td>
						<tr>
					</table>
				</td>
			</tr>
<?php	include 'footer.php'; ?>