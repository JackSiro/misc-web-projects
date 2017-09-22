<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_bookcon = "localhost";
$database_bookcon = "motunga";
$username_bookcon = "root";
$password_bookcon = "";
$bookcon = mysql_pconnect($hostname_bookcon, $username_bookcon, $password_bookcon) or trigger_error(mysql_error(),E_USER_ERROR); 
?>