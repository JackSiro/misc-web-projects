<?php include AS_THEME."as_header.php";
	$database = new As_Dbconn();
	$messageid = isset( $_GET['messageid'] ) ? $_GET['messageid'] : "";
	$results = $database->get_results("SELECT * FROM as_message WHERE message_parentid=$messageid");
	$as_db_query = "SELECT * FROM as_message WHERE messageid=$messageid";
	list( $messageid, $message_parentid, $message_content, $message_sentby, $message_sender, $message_sentto, 
		$message_receiver, $message_sent) = $database->get_row( $as_db_query );
?>
	<div class="content">
    <div class="content_resize">
       <div class="mainbar">
        <div class="article">
			<h2 style="text-transform:uppercase">Doctor-Patient Messages</h2>
		  <?php if ($mytype == 'Doctor') { ?>
			<a href="patients.php"><h3>Start a New Message</h3></a>
		  <?php } else { ?>
			<a href="doctors.php"><h3>Start a New Message</h3></a>
		  <?php } ?>	  
			<br>
				<?php foreach( $results as $row ) {  ?>
				<div class="msg_item">
					<h4><?php echo as_timeago_now($row['message_sent']);?> <?php if ($row['message_sentby'] == $myuserid) echo 'You said: ';
							else echo as_user_code($row['message_sender'], $row['message_sentby']).' said: '; ?></h4>
					<h3><?php echo $row['message_content'] ?></h3>
				</div>
				<?php } ?>
				<div class="msg_item">
					<h4><?php echo as_timeago_now($message_sent);?>, <?php if ($message_sentby == $myuserid) echo 'You said: ';
							else echo as_user_name($message_sender, $message_sentby).' said: '; ?></h4>
					<h3><?php echo $message_content ?> </h3>
				</div>
				<form action="messages.php?action=view&&messageid=<?php echo $messageid ?>" method="post" id="sendemail">
				
				  <input type="hidden" name="senderid" value="<?php echo $myuserid ?>" />
				  <input type="hidden" name="sendergrp" value="<?php echo $mytype ?>" />
				  <input type="hidden" name="messageid" value="<?php echo $messageid ?>" />
				  <table class="msg_item" style="width:99%;">
					<tr><td valign="top">
					<textarea name="content" class="input_form" cols="50" style="border-radius: 5px;" placeholder="Type your Text"></textarea>
				  </td><td valign="top">
					<input type="submit" name="SendMessage" id="imageField" class="submit_form_i" value="Send"
					style="padding: 20px;margin-top:0px;border:solid 2px #000;border-radius: 5px;" />
					</td></tr></table>
			  </form>
        </div>
      </div>
		<?php // include AS_THEME."as_sidebar.php" ?>
      <div class="clr"></div>
    </div>
  </div>
 
<?php include AS_THEME."as_footer.php" ?>
    