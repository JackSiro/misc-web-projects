<?php
	require ( 'as_config.php' );
	include ( 'as_functions/as_dbconn.php' );
	include ( 'as_functions/as_posting.php' );
	
	switch ($action) {
		case 'timetable_step1':
			timetableStep1();
			break;
		case 'timetable_step2':
			timetableStep2();
			break;
		default:		
			echo '<h4>Oops! Your Request could not be understood!</h4>';
	}
	
?>