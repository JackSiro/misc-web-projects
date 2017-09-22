<?php
	ini_set( "display_errors", true );
	date_default_timezone_set( "Africa/Nairobi" ); 
	$js_site_url = $_SERVER['HTTP_HOST'].strtr(dirname($_SERVER['SCRIPT_NAME']), '\\', '/');

	define( "JS_HOST", "localhost" );
	define( "JS_DB", "college" );
	define( "JS_USER", "root" );
	define( "JS_PASS", ""  );
	define( "JS_ACC", "js_account/" );
	define( "JS_INC", "js_include/" );
	define( "JS_THEME", "js_themes/" );
	define( "JS_CONT", "js_content/" );
	define( "JS_APP", "js_apps/" );
    define( "JS_FUNC", "js_functions/" );
	define( "JS_SITEURL", 'http://'.$js_site_url.'/'); 
	define( "SEND_ERRORS_TO", "johndoe@example.com" );
	define( "DISPLAY_DEBUG", true );



	define( "JS_E_TOP", '<html><head><title>Something is not Right</title><style>
		body { font-family: arial,sans-serif; font-size:0px;margin: 50px 10px;	padding: 0; text-align: center;background: #000;	} h1{font-size:30px;}
		input,textarea{font-size:20px;padding:5px;width:100%; color:#fff; border:1px solid #000; border-radius: 5px; background:#E88017;} table{width:80%;margin:10px;}
		input[type="submit"]{padding:10px;font-size:30px;}
		img { border: 0; }
		.rounded {	-webkit-border-radius: 5px;	-moz-border-radius: 5px; border-radius: 5px;}
		#content { margin: 0 auto;	width: 750px; }
		#error-section { background-color: #F88017;	border: 1px solid #eee; color: #fff; font-weight: bold; padding: 12px ;}				
		#debug { margin-top: 50px; text-align:left;	}
		#lower-section { border: 1px solid #eee; margin: 10px 0;padding:10px;  font-size:20px;}
		</style></head><body text="#000000" bgcolor="#ffffff" dir="ltr"><div id="content"><div id="error-section" class="rounded">
		<h1>Something is not Right!</h1></div><div id="lower-section" class="rounded">');

	define( "JS_I_TOP", '<html><head><title>A Few Fixes</title><style>
		body { font-family: arial,sans-serif; font-size:0px;margin: 50px 10px;	padding: 0; text-align: center;background:#000;	} h1{font-size:30px;}
		input,textarea{font-size:20px;padding:5px;width:100%; color:#fff; border:1px solid #000; border-radius: 5px; background:#E88017;} table{width:80%;margin:10px;}
		input[type="submit"]{padding:10px;font-size:30px;}
		img { border: 0; }.submit_this{width:50%;}
		.rounded {	-webkit-border-radius: 5px;	-moz-border-radius: 5px; border-radius: 5px;}
		#content { margin: 0 auto;	width: 750px; }
		#error-section { background-color: #F88017;	border: 1px solid #eee; color: #fff; font-weight: bold; padding: 12px ;}				
		#debug { margin-top: 50px; text-align:left;	}
		#lower-section { border: 1px solid #eee; margin: 10px 0;padding:10px;  font-size:20px; background:#fff;}
		</style></head><body text="#000000" bgcolor="#ffffff" dir="ltr"><div id="content"><div id="error-section" class="rounded"><h1>');
	define( "JS_I_TOP_A", '</h1></div><div id="lower-section" class="rounded">');

	define( "JS_E_BOT", 'Thank you for noticing this.<br>We\'re working to fix this as quickly as possible. <br>Please check back again soon.
		</div></div></div></body></html>');


	define( "JS_I_BOT", '</div></div></div></body></html>');

	define( "JS_I_BOT_A", '</div></div></div></body></html>');

	define( "JS_I_BOT_B", '</div></div></div></body></html>');

	define( "JS_I_BOT_C", '</div></div></div></body></html>');


	?>