<?php include AS_THEME."as_header.php";
	$recipient = isset( $_GET['recipient'] ) ? $_GET['recipient'] : "";
	$group = isset( $_GET['group'] ) ? $_GET['group'] : "";
	$database = new As_Dbconn();
	
	if ($group == 'Doctor') {
		$as_db_query = "SELECT * FROM as_doctor WHERE doctorid=$recipient";
		list( $doctorid, $doctor_code, $doctor_name) = $database->get_row( $as_db_query );
		$recipient_name = $doctor_name;
		$recipient_code = $doctor_code;
		$recipient_title = 'Dr';
	} else {
		$as_db_query = "SELECT * FROM as_patient WHERE patientid=$recipient";
		list( $patientid, $patient_code, $patient_name) = $database->get_row( $as_db_query );
		$recipient_name = $patient_name;
		$recipient_code = $patient_code;
		$recipient_title = '';
	}
?>
	<div class="content">
    <div class="content_resize">
      <div class="mainbar">
        <div class="article">
          <h2 style="text-transform:uppercase">Start a Conversation with a <?php echo $group ?></h2>
        </div>
        <div class="article">
          <form action="messages.php?action=new&&group=<?php echo $group ?>&&recipient=<?php echo $recipient ?>" method="post" id="sendemail">
            <ol>
              <input type="hidden" name="senderid" value="<?php echo $myuserid ?>" />
              <input type="hidden" name="sendergrp" value="<?php echo $mytype ?>" />
              <input type="hidden" name="recipient" value="<?php echo $recipient ?>" />
              <input type="hidden" name="group" value="<?php echo $group ?>" />
               <li>
                <label for="content">What do you want to tell <?php echo $recipient_title.' '.$recipient_name ?>?</label>
                <textarea name="content" class="input_form" rows="8" cols="50"></textarea>
              </li><br>
              <li>
                <input type="submit" name="SendMessage" id="imageField" class="submit_form_i" value="Send <?php echo $recipient_code ?> Message"/>
                <div class="clr"></div>
              </li>
            </ol>
          </form>
        </div>
      </div>
		<?php// include AS_THEME."as_sidebar.php" ?>
      <div class="clr"></div>
    </div>
  </div>
 
<?php include AS_THEME."as_footer.php" ?>
    
