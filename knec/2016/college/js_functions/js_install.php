<?php 

	include JS_FUNC.'js_dbcheck.php';

	js_check_lecturers();
    
    function js_safi($str) {
		$str = @trim($str);
		if(get_magic_quotes_gpc()) {
			$str = stripslashes($str);
		}
		//return mysql_real_escape_string($str);
		return mysqli::real_escape_string ($str);
	} 

	function js_check_lecturers(){
      		if (!js_check_admin())  {
               	     die(JS_I_TOP.'CREATE AN ADMINISTRATOR'.JS_I_TOP_A.'<form action="'.js_new_admin().'" method="post">
                        <h5>There are no lecturers yet! That means you need to set up an Administrator first...</h5><table>
             <tr><td>First Name:</td><td><input type="text" name="fname" autocomplete="off" required></td></tr>
             <tr><td>Last Name:</td><td><input type="text" name="surname" autocomplete="off" required></td></tr>
             <tr><td>Username:</td><td><input type="text" name="username" autocomplete="off" required></td></tr>
             <tr><td>Email Address:</td><td><input type="text" name="email" autocomplete="off" required></td></tr>
             <tr><td>Password:</td><td><input type="password" name="password" autocomplete="off" min="8" required></td></tr> 
             </table><br>
              <center><input type="submit" class="submit_this" name="SetAdministrator" value="Create An Administrator"></center><br></form>'.JS_I_BOT);
                        
             } else {
                 js_check_functions();
             }
	}
    
    function js_check_functions(){
      if (!js_check_options())  {
               die(JS_I_TOP.'SITE OPTIONS'.JS_I_TOP_A.'<form action="'.js_new_options().'" method="post">
                        <table><tr><td>Site Name:</td><td><input type="text" name="sitename"  value="'.js_get_option('sitename').'"></td></tr>
                        <tr><td>Site Url:</td><td><input type="text" name="siteurl" autocomplete="off" value="'.JS_SITEURL.'"></td></tr>
                        <tr><td>Site slogan</td><td><input type="text" name="slogan" autocomplete="off"  value="'.js_get_option('slogan').'"></td></tr>
                        <tr><td>Descriptions</td><td><textarea name="description">'.js_get_option('description').'</textarea></td></tr></table><br>
                        <center><input type="submit" class="submit_this" name="SaveSite" value="Save Options"></center><br></form>'.JS_I_BOT);
                                
     }
}
	
	
	
	
	