<?php

	$success = '';
	$errorhtml = '';
	$suggest = '';
	$buttons = array();
	$fields = array();
	$fielderrors = array();
	$hidden = array();

	require_once AS_FUNC.'as_users.php';
	if ( isset( $_POST['DatabaseSetup'])) {
		$database = trim($_POST['database']);
		$username = trim($_POST['username']);
		$password = trim($_POST['password']);
		$emailto = trim($_POST['emailto']);
		$emailfrom = trim($_POST['emailfrom']);
		$fielderrors = array_merge($database, $username,$password, $emailto, $emailfrom);
		if (empty($fielderrors)) {
			$filename = "as_config.php";
			$lines = file($filename, FILE_IGNORE_NEW_LINES );
			$lines[6] = '	define( "AS_DB", "'.$database.'" );';
			$lines[7] = '	define( "AS_USER", "'.$username.'" );';
			$lines[8] = '	define( "AS_PASS", "'.$password.'"  );';
			file_put_contents($filename, implode("\n", $lines));
			header("location: ".AS_SITEURL);
		}
	}
	else if ( isset( $_POST['SuperAdmin'])) {
		$firstname = trim($_POST['firstname']);
		$surname = trim($_POST['surname']);
		$username = trim($_POST['username']);
		$email = trim($_POST['email']);
		$password = trim($_POST['password']);
		$fielderrors = array_merge($firstname, $surname, $username, $email, $password);
		if (empty($fielderrors)) {
			$database = new As_Dbconn();
			$New_Item_Details = array(
				'official_name' => $username,
				'official_fname' => $firstname,
				'official_surname' => $surname,
				'official_password' => md5($password),
				'official_email' => $email,
				'official_group' => 'super-admin',
				'official_joined' => date('Y-m-d H:i:s'),
			);			
			$add_query = $database->as_insert( 'as_official', $New_Item_Details );
			header("location: ".AS_SITEURL);
		}
	}
	
	else if ( isset( $_POST['SiteSetup'])) {
		$database = new As_Dbconn();
		$sitename = trim($_POST['sitename']);
		$siteurl = trim($_POST['siteurl']);
		$slogan = trim($_POST['slogan']);
		$fielderrors = array_merge($sitename, $siteurl, $slogan);
		if (empty($fielderrors)) {
			as_new_option('as_sitename', $sitename, 1);
			as_new_option('as_siteurl', $siteurl, 1);	
			as_new_option('as_slogan', $slogan, 0);	
			as_new_option('as_elecpost', $database->get_count('as_elecpost'), '1');	
			header("location: ".AS_SITEURL);
		}
	}	
	?>
<!DOCTYPE html>
<html>
	<head>
		<title><?php echo $as_err['errtitle'] ?></title>
		<style>
			body { font-family: arial,sans-serif; font-size:0px;margin: 50px 10px;	padding: 0; text-align: center;background: url(as_media/voting.jpg); color: #eee;	} h1{font-size:30px;} input[type="text"],input[type="email"],input[type="password"],textarea{font-size:20px;padding:5px;width:100%; color:#000; border:1px solid #eee; border-radius: 0px; background: #ccc;} table{width:80%;margin:10px;} input[type="submit"]{background:#eee; color:#000; padding:10px 20px; border:1px solid #FFF; font-size:25px; border-radius: 0px; } img { border: 0; } .rounded {	-webkit-border-radius: 12px;	-moz-border-radius: 0px; border-radius: 0px;} .rounded_i {	-webkit-border-radius: 10px 10px 0px 0px;	-moz-border-radius: 0px 0px 0px 0px; border-radius: 0px 0px 0px 0px;} .rounded_ii { border: 1px solid #eee; margin-top:10px; padding:20px; -webkit-border-radius: 0px 0px 10px 10px;	-moz-border-radius: 0px 0px 0px 0px; border-radius: 0px 0px 0px 0px;} #content { margin: 0 auto;	width: 800px; } .top-section { border: 1px solid #eee; color: #eee; font-weight: bold; padding: 12px ;}#debug { margin-top: 50px; text-align:left;	}.main-section { border: 1px solid #eee; margin: 5px;padding:10px; padding-bottom:10px; font-size:20px;} .mid-section { border: 1px solid #eee; margin-top: 10px; font-size:20px;}
		</style>
	</head>
	<body>
		<div id="content">
		  <div class="main-section rounded">
			<div class="top-section rounded_i">	
				<h1><?php echo $as_err['errtitle'] ?></h1>
				<p><?php echo $as_err['errsumm'] ?></p>
			</div>	
			<form method="post" action="<?php //echo AS_SITEURL ?>" class="rounded_ii">						
<?php 
		if ($as_err['errno']==1){ 
			$fields = array(
				'database' => array('label' => 'Database Name:', 'type' => 'text', 'value' => AS_DB),
				'username' => array('label' => 'Database Username:', 'type' => 'text', 'value' => AS_USER),
				'password' => array('label' => 'Database Password:', 'type' => 'password', 'value' => ''),
			);
			$buttons = array('DatabaseSetup' => 'Connect to the Database');
		} 
		else if ($as_err['errno']==2){ 
			$fields = array(
				'firstname' => array('label' => 'First Name:', 'type' => 'text', 'value' => ''),
				'surname' => array('label' => 'Last Name:', 'type' => 'text', 'value' => ''),
				'email' => array('label' => 'Email Address:', 'type' => 'email', 'value' => ''),
				'username' => array('label' => 'Username:', 'type' => 'text', 'value' => ''),
				'password' => array('label' => 'Password:', 'type' => 'password', 'value' => ''),
			);
			$buttons = array('SuperAdmin' => 'Create An Administrator');
		} 
		else if ($as_err['errno']==3){ 
			$fields = array(
				'sitename' => array('label' => 'Site Name:', 'type' => 'text', 'value' => ""),
				'siteurl' => array('label' => 'Site Url:', 'type' => 'text', 'value' => AS_SITEURL()),
				'slogan' => array('label' => 'Slogan:', 'type' => 'text', 'value' => ""),
			);
			$buttons = array('SiteSetup' => 'Save Options');
		} 
		?>
	<?php if (count($fields)) { ?>
			<table>
	<?php foreach($fields as $name => $field) { ?>
				<tr>	
						<th><?php echo $field['label'] ?></th>	
						<td><?php echo'<input type="'.$field['type'].'" size="24" name="'.$name.'" value="'.$field['value'].'" autocomplete="off" />'; ?></td>
		<?php if (isset($fielderrors[$name])) 
			echo '<td class="msg-error"><small>'.$fielderrors[$name].'<small></td>';
		else ?>
				<td></td>
					</tr>			
	<?php } ?>
			</table>
				<?php } 
		foreach ($buttons as $name => $value)
			echo '<input type="submit" name="'.$name.'" value="'.$value.'" />';
		foreach ($hidden as $name => $value)
			echo '<input type="hidden" name="'.$name.'" value="'.$value.'" />';
	?>	
<?php ?><br>
			</form>
		  </div>
		</div>
	</body>
</html>	