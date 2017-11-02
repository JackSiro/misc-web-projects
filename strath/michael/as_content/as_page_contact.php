<?php 
/*
	File: as_content/as_page_contact.php
	Description: page for contact us page

*/

	$as_pageinfo = array();	 
	$as_pageinfo['pageTitle'] = 'Contact us';
	
	require_once AS_FUNC."as_paging.php";	
	include AS_THEME."as_header.php";
?>
<div id="main_content">
<?php include AS_THEME."as_sidebar.php"; ?>   
    <div class="column4">
      <div class="title">Contact Us</div>
      <div class="contact_tab">
        <div class="form_contact">
          <div class="form_row_contact">
            <label class="left">Name: </label>
            <input type="text" class="form_input_contact"/>
          </div>
          <div class="form_row_contact">
            <label class="left">Email: </label>
            <input type="text" class="form_input_contact"/>
          </div>
          <div class="form_row_contact">
            <label class="left">Phone: </label>
            <input type="text" class="form_input_contact"/>
          </div>
          <div class="form_row_contact">
            <label class="left">Country: </label>
            <input type="text" class="form_input_contact"/>
          </div>
          <div class="form_row_contact">
            <label class="left">Message: </label>
            <textarea name="message" rows="4" cols="" ></textarea>
          </div>
          <div style="float:right; padding:10px 25px 0 0;">
            <input type="image" src="as_themes/images/send.gif"/>
          </div>
        </div>
        <div class="location_contact"> <img src="as_themes/images/map.gif" width="159" height="157" border="0" alt="" /> </div>
      </div>
    </div>
  </div>
<?php include AS_THEME."as_footer.php" ?>