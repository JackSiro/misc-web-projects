<?php include "templates/include/header.php" ?>
	<div id="content">
   	  <div style="height:32px"></div>
		<h1>School Registration</h1> 
		<div style="height:10px"></div>
		<div class="razd_h"></div>
		<div style="height:5px"></div>
		 
          <form action="admin.php?action=<?php echo $results['formAction']?>" method="post">
			<input type="hidden" name="schoolId" value="<?php echo $results['school']->schoolid ?>"/>
			<label for="schoolname">School Full Name</label><br>
            <input type="text" style="width:90%;" name="schoolname" id="schoolname" placeholder="School name" required autofocus maxlength="255" 
			value="<?php echo htmlspecialchars( $results['school']->schoolname )?>" />
			<br><br>
			<label for="county">County where school is found</label><br>
            <input type="text" style="width:90%;" name="county" id="county" placeholder="School county" required autofocus maxlength="255" 
			value="<?php echo htmlspecialchars( $results['school']->county )?>" />
			<br><br>
			<label for="subcounty">Sub-County where school is found</label><br>
            <input type="text" style="width:90%;" name="subcounty" id="subcounty" placeholder="School sub-county" required autofocus maxlength="255" 
			value="<?php echo htmlspecialchars( $results['school']->subcounty )?>" />
			<br><br>
			<label for="location">Physical Location where school is found</label><br>
            <input type="text" style="width:90%;" name="location" id="location" placeholder="School physical location" required autofocus 
			maxlength="255" value="<?php echo htmlspecialchars( $results['school']->location )?>" />
			<br><br>
			<label for="code">School Code</label><br>
            <input type="text" style="width:90%;" name="code" id="code" placeholder="School code" required autofocus maxlength="10" 
			value="<?php echo htmlspecialchars( $results['school']->code )?>" />
			<br>
		  <br><br>
			
            <input type="hidden" name="created" id="created" placeholder="YYYY-MM-DD" required maxlength="10" value="<?php echo date('Y-m-d') ?>" />
         
        <div class="buttons">
          <input type="submit" name="newSchool" value="Add School" />
          <input type="submit" formnovalidate name="cancel" value="Cancel" />
        </div>

      </form>
	
    </div>
    <div style="height:5px"></div>
  <?php include "templates/include/footer.php" ?>