  <?php include AS_THEME."as_header.php" ?>
<div id="content">
		<div>
			<h1><?php echo as_get_option('sitename') ?></h1>
			<ul>
				<li>
					<div>
						<div>
							<h2><a href="index.html">Hospital In-Patients</a></h2>
							<p>Patients currently in In-Patient Section</p>
							<a href="index.php?action=inpatient_all" class="view">View All</a>
						</div>
						<a href="index.php?action=inpatient_all"><img src="as_media/bg-sweets.png" alt="Image" /></a>
					</div>
				</li>
				<li>
					<div>
						<div>
							<h2><a href="index.html">Hospital Out-Patients</a></h2>
							<p>Patients currently in Out-Patient Section</p>
							<a href="index.php?action=outpatient_all" class="view">View All</a>
						</div>
						<a href="index.php?action=outpatient_all"><img src="as_media/bg-sweets.png" alt="Image" /></a>
					</div>
				</li>
				<li>
					<div>
						<div>
							<h2><a href="index.html">Hospital Billing</a></h2>
							<p>View current billing of patients</p>
							<a href="index.php?action=billing_all" class="view">View All</a>
						</div>
						<a href="index.php?action=billing_all"><img src="as_media/bg-sweets.png" alt="Image" /></a>
					</div>
				</li>
				<li>
					<div>
						<div>
							<h2><a href="index.html">Hospital Users</a></h2>
							<p>View all users of this site</p>
							<a href="index.php?action=user_all" class="view">View All</a>
						</div>
						<a href="index.php?action=user_all"><img src="as_media/bg-sweets.png" alt="Image" /></a>
					</div>
				</li>
			</ul>
		</div>
	</div>
<?php include AS_THEME."as_footer.php" ?>
   