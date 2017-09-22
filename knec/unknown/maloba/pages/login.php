<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
    "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
  <title>CMC holdings Ltd</title>
  <link rel="stylesheet" type="text/css" href="style.css" />
  <style>
body {
   background-size: cover;
    font-family: Montserrat;
}

.logo {
    width: 213px;
    height: 36px;
    background: url('http://i.imgur.com/fd8Lcso.png') no-repeat;
    margin: 30px auto;
}

.login-block {
    width: 90%;
    padding: 20px;
    background: #fff;
    border-radius: 5px;
    border-top: 5px solid #f00;
    margin: 0 auto;
}

.login-block h1 {
    text-align: center;
    color: #000;
    font-size: 18px;
    text-transform: uppercase;
    margin-top: 0;
    margin-bottom: 20px;
}

.login-block input {
    width: 100%;
    height: 42px;
    box-sizing: border-box;
    border-radius: 5px;
    border: 1px solid #ccc;
    margin-bottom: 20px;
    font-size: 14px;
    font-family: Montserrat;
    padding: 0 20px 0 50px;
    outline: none;
}

.login-block input#username {
    background: #fff url('http://i.imgur.com/u0XmBmv.png') 20px top no-repeat;
    background-size: 16px 80px;
}

.login-block input#username:focus {
    background: #fff url('http://i.imgur.com/u0XmBmv.png') 20px bottom no-repeat;
    background-size: 16px 80px;
}

.login-block input#password {
    background: #fff url('http://i.imgur.com/Qf83FTt.png') 20px top no-repeat;
    background-size: 16px 80px;
}

.login-block input#password:focus {
    background: #fff url('http://i.imgur.com/Qf83FTt.png') 20px bottom no-repeat;
    background-size: 16px 80px;
}

.login-block input:active, .login-block input:focus {
    border: 1px solid #ff656c;
}

.input[type="submit"] {
    width: 100%;
    height: 40px;
    background: #a46738;
    box-sizing: border-box;
    border-radius: 5px;
    border: 1px solid #fff;
    color: #fff;
    font-weight: bold;
    text-transform: uppercase;
    font-size: 30px;
    font-family: Montserrat;
    outline: none;
    cursor: pointer;
}

.input[type="submit"]:hover {
    background: #fff;
	border: 1px solid #a46738;
	color: #a46738;
}

</style>
</head>
<body>

<div id="wrap">

	<div id="header">
		
		<h1>
		  <a href=".">CMC holdings Ltd</a>
		</h1>
		
		<p>
		  Login here to continue
		</p>
		
		<div class="clear">
		</div>
		
	</div>
	
	
	
	
	<div class="login-block">
    <h1>Login</h1>
	<form action="index.php?action=login" method="post">
        <input type="hidden" name="login" value="true" />

	<?php if ( isset( $results['errorMessage'] ) ) { ?>
			<div class="errorMessage"><?php echo $results['errorMessage'] ?></div>
	<?php } ?>
            <input type="text" name="username" id="username" placeholder="Your admin username" required autofocus maxldescriptionth="20" />
            <input type="password" name="password" id="password" placeholder="Your admin password" required maxldescriptionth="20" />
          <input type="submit" name="login" value="Login" />
      </form>
</div>
	

</div>

</body>
</html>