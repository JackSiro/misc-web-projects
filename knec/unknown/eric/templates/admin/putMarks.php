<?php include "templates/include/header.php" ?>
	<div id="content">
   	  <div style="height:32px"></div>
		<h1>Students Marklist</h1> 
		<div style="height:10px"></div>
		<div class="razd_h"></div>
		<div style="height:5px"></div>
		<br>
		 <h1><?php echo $results['pupil']->firstname.' '.$results['pupil']->secondname.' - Adm no. '.$results['pupil']->admno.' / Class '.$results['pupil']->pclass.' / Term '.$results['pupil']->pterm ?> </h1>
		 <br>
		 <a href="admin.php?action=editPupil&amp;admno=<?php echo $results['pupil']->admno?>&amp;school=<?php echo $_GET['school']?>" ><h1>Edit <?php echo $results['pupil']->firstname.' '.$results['pupil']->secondname ?>'s Profile</h1></a>
		 <br>
          <form action="admin.php?action=<?php echo $results['formAction']?>" method="post">
			<input type="hidden" name="pupilid" value="<?php echo $results['pupil']->pupilid ?>"/>
			<input type="hidden" name="admno" value="<?php echo $results['pupil']->admno ?>"/>
			<input type="hidden" name="code" value="<?php echo $_GET['school'] ?>"/>
            <table style="width:94%;">
			<tr><td>
			<label for="math">Mathematics</label></td><td>
            <input type="text" name="math" id="math" placeholder="Maths" required autofocus maxlength="2" />
			<br><br></td>          
            <td><label for="eng">English</label></td><td>
            <input type="text" name="eng" id="eng" placeholder="Eng" required autofocus maxlength="2" />
           <br><br></td></tr>
		   
		   <tr><td>
			<label for="kisw">Kiswahili</label></td><td>
            <input type="text" name="kisw" id="kisw" placeholder="Kisw" required autofocus maxlength="2" />
			<br><br></td>          
            <td><label for="sci">Science</label></td><td>
            <input type="text" name="sci" id="sci" placeholder="Sci" required autofocus maxlength="2" />
           <br><br></td></tr>
		   
		   <tr><td>
			<label for="sos">Social Studies</label></td><td>
            <input type="text" name="sos" id="sos" placeholder="S/S" required autofocus maxlength="2" />
			<br><br></td>          
            <td><label for="cre">CRE</label></td><td>
            <input type="text" name="cre" id="cre" placeholder="CRE" required autofocus maxlength="2" />
           <br><br></td></tr>
            </table>			
		  <br><br>
			         
        <div class="buttons">
          <input type="submit" name="putMarks" value="Add Marks" />
          <input type="submit" formnovalidate name="cancel" value="Cancel" />
        </div>
<br><br>
      </form>
	
    </div>
    <div style="height:5px"></div>
  <?php include "templates/include/footer.php" ?>