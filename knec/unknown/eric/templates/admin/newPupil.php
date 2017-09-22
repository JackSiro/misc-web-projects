<?php include "templates/include/header.php" ?>
	<div id="content">
   	  <div style="height:32px"></div>
		<h1>Pupil Registration</h1> 
		<div style="height:10px"></div>
		<div class="razd_h"></div>
		<div style="height:5px"></div>
		
		 
          <form action="admin.php?action=<?php echo $results['formAction']?>" method="post">
			<input type="hidden" name="pupilId" value="<?php echo $results['pupil']->pupilid ?>"/>
			<input type="hidden" name="code" value="<?php echo $_GET['school'] ?>"/>
            <table style="width:94%;">
			<tr><td>
			<label for="firstname">First Name</label>
            <input type="text" name="firstname" id="firstname" placeholder="First name" required autofocus maxlength="255" value="<?php echo htmlspecialchars( $results['pupil']->firstname )?>" />
			<br><br></td>          
            <td><label for="secondname">Second Name</label>
            <input type="text" name="secondname" id="secondname" placeholder="Second name" required autofocus maxlength="255" value="<?php echo htmlspecialchars( $results['pupil']->secondname )?>" />
           <br><br></td></tr>
            <tr><td>
			<table class="sex_input"><tr><td><label> Sex: </label></td>
			<td><input type="radio" name="sex" required value="male" class="opt_set"></td><td><label>Male </label></td>
			<td><input type="radio" name="sex" required value="female" class="opt_set"></td><td><label>Female </label></td>
			</tr></table>
			<br><br></td>          
            <td><label for="admno">Admission Number</label><input type="text" name="admno" id="admno" placeholder="Admission Number" required autofocus maxlength="255" value="<?php echo htmlspecialchars( $results['pupil']->admno )?>" />
           <br><br></td></tr>
			<tr><td>			
            <label for="pclass">Current Class</label>
			<select title="Select your Class" name="pclass" required>
	  		<option value=""> - Current Class - </option>
            <option value="1" style="margin-left:20px;"> CLASS 1 </option>
            <option value="2" style="margin-left:20px;"> CLASS 2 </option>
            <option value="3" style="margin-left:20px;"> CLASS 3 </option>
            <option value="4" style="margin-left:20px;"> CLASS 4 </option>
            <option value="5" style="margin-left:20px;"> CLASS 5 </option>
            <option value="6" style="margin-left:20px;"> CLASS 6 </option>
            <option value="7" style="margin-left:20px;"> CLASS 7 </option>
            <option value="8" style="margin-left:20px;"> CLASS 8 </option>
            </select>
            </td><td><label for="term">Current Term</label>
            <select title="Select your Term" name="pterm" required>
	  		<option value=""> - Current Term - </option>
            <option value="1" style="margin-left:20px;"> TERM 1 </option>
            <option value="2" style="margin-left:20px;"> TERM 2 </option>
            <option value="3" style="margin-left:20px;"> TERM 3 </option>
            </select>
            </td></tr></table>			
		  <br><br>
			
            <input type="hidden" name="joined" id="joined" placeholder="YYYY-MM-DD" required maxlength="10" value="<?php echo date('Y-m-d') ?>" />
         
        <div class="buttons">
          <input type="submit" name="register" value="Register" />
          <input type="submit" formnovalidate name="cancel" value="Cancel" />
        </div>

      </form>
	
    </div>
    <div style="height:5px"></div>
  <?php include "templates/include/footer.php" ?>