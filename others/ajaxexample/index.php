<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>vasPLUS Programming Blog - Facebook style Search People and Products using Ajax, Jquery and PHP</title>

<link href="css/style.css" rel="stylesheet" type="text/css"><!-- CSS File -->

<!-- These are the required JS Files for this Tutorial -->
<script type="text/javascript" src="js/jquery_1.5.2.js"></script>
<script type="text/javascript" src="js/vpb_auto_suggest.js"></script>
<script type="text/javascript" src="js/post_watermarkinput.js"></script>

</head>
<body>
<br clear="all">


<center>
<div id="vasp" style="font-family:Verdana, Geneva, sans-serif; font-size:25px;width:1000px;">Facebook style Search People and Products using Ajax, Jquery and PHP</div><br clear="all" /><br clear="all" />
<font style="font-family:Verdana, Geneva, sans-serif; font-size:12px; color:black;">Please type letter <b>A</b> or any thing as a search term in the text field provided below to demo the system</font><br clear="all"><br clear="all"><br clear="all">




<div style="width:350px;" align="center">








<!-- Search Box Starts Here -->
<div class="vasplus_pb_Search">
<form>
<input type="text" name="vpv_search_box" style="padding:0px; margin:0px;" id="vpv_search_box" placeholder="Search for people or pages" />
<a href="javascript:void(0);" id="vpv_search_button" onClick="vpb_auto_search_people_and_pages();"></a>
</form>
<div class="vpb_search_results">
<ul><div id="response_brought"></div></ul><!-- This line displays the response from the PHP File via ajax and jquery -->
</div>
</div>
<!-- Search Box Ends Here -->












</div>
</center>
<p style="padding-bottom:500px;">&nbsp;</p>




</body>
</html>