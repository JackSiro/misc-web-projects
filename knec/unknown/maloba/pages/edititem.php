<?php include "themes/header.php" ?>
	<div id="content">
   	  <div style="height:32px"></div>
		<h1>Item Registration</h1> 
		<div style="height:10px"></div>
		<div class="razd_h"></div>
		<div style="height:5px"></div>
		
		 
          <form action="index.php?action=<?php echo $results['formAction']?>" method="post">
			<input type="hidden" name="itemid" value="<?php echo $results['Item']->itemid ?>"/>
			<input type="hidden" name="code" value="<?php echo $_GET['category'] ?>"/>
            <table style="width:94%;">
			<tr><td>
			<label for="name">First Name</label>
            <input type="text" name="name" id="name" placeholder="First name" required autofocus maxldescriptionth="255" value="<?php echo htmlspecialchars( $results['Item']->name )?>" />
			<br><br></td>          
            <td><label for="partno">Second Name</label>
            <input type="text" name="partno" id="partno" placeholder="Second name" required autofocus maxldescriptionth="255" value="<?php echo htmlspecialchars( $results['Item']->partno )?>" />
           <br><br></td></tr>
            <tr><td>
			<table class="serial_input"><tr><td><label> Sex: </label></td>
			<td><input type="radio" name="serial" required value="male" class="opt_set"></td><td><label>Male </label></td>
			<td><input type="radio" name="serial" required value="female" class="opt_set"></td><td><label>Female </label></td>
			</tr></table>
			<br><br></td>          
            <td><label for="colour">Admission Number</label><input type="text" name="colour" id="colour" placeholder="Admission Number" required autofocus maxldescriptionth="255" value="<?php echo htmlspecialchars( $results['Item']->colour )?>" />
           <br><br></td></tr>
			<tr><td>			
            <label for="size">Current Class</label>
			<select title="Select your Class" name="size" required>
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
            <select title="Select your Term" name="weight" required>
	  		<option value=""> - Current Term - </option>
            <option value="1" style="margin-left:20px;"> TERM 1 </option>
            <option value="2" style="margin-left:20px;"> TERM 2 </option>
            <option value="3" style="margin-left:20px;"> TERM 3 </option>
            </select>
            </td></tr></table>			
		  <br><br>
			
        <div class="buttons">
          <input type="submit" name="editItem" value="Save Changes" />
          <input type="submit" formnovalidate name="cancel" value="Cancel" />
        </div>

      </form>
	
    </div>
    <div style="height:5px"></div>
  <?php include "themes/footer.php" ?>