<?php include "themes/header.php" ?>
	<div id="content">
		<div class="post">
   	  <div style="height:32px"></div>
		<h1>Receive an item</h1> 
		<div style="height:10px"></div>
		
		 
          <form action="index.php?action=<?php echo $results['formAction']?>" method="post">
			<input type="hidden" name="itemId" value="<?php echo $results['item']->itemid ?>"/>
            <table style="width:94%;">
			<tr><td style="text-align:right;">
			<label for="name">Name of the Item</label>
            </td>          
            <td style="width:70%">
			<input type="text" name="name" id="name" placeholder="item name" required autofocus maxldescriptionth="255" value="<?php echo htmlspecialchars( $results['item']->name )?>" />
           </td>
		   </tr>
	
          <tr><td style="text-align:right;">
			<label for="broughtby">Brought by</label>
            </td><td>
			<input type="text" name="broughtby" id="broughtby" placeholder="Full names of deliverer" required autofocus maxldescriptionth="255" value="<?php echo htmlspecialchars( $results['item']->broughtby )?>" />
           </td>
		   </tr>
		   
		   <tr><td style="text-align:right;">
			<label for="description">Description</label>
            </td><td>
			<textarea name="description" id="description" placeholder="Brief description of the item" required maxlength="10000" style="height: 5em;"><?php echo htmlspecialchars( $results['item']->description)?></textarea>
         
           </td>
		   </tr>
		   
		   <tr><td style="text-align:right;">
			<label for="value">Item Category</label>
            </td><td>
			<select title="Item Category" name="catid" required>
	  		<option value=""> - Item Category - </option>			
			<?php foreach ( $results['categorys'] as $category ) { ?>			
			<option value="<?php echo $category->catid ?>" style="margin-left:20px;"><?php echo $category->name ?></option>			
			<?php } ?>
            </select>
           </td>
		   </tr>
		   
		   <tr><td style="text-align:right;">
			<label for="value">Value of item (Optional)</label>
            </td><td>
			<input type="text" name="value" id="value" placeholder="value" maxldescriptionth="255" value="<?php echo htmlspecialchars( $results['item']->value )?>" />
           </td>
		   </tr>
		   
		   <tr><td style="text-align:right;">
			<label for="weight">Weight (Optional)</label>
            </td><td>
			<input type="text" name="weight" id="weight" placeholder="item weight" maxldescriptionth="255" value="<?php echo htmlspecialchars( $results['item']->weight )?>" />
           </td>
		   </tr>
		   
		   <tr><td style="text-align:right;">
			<label for="colour">Colour of the item</label>
            </td><td>
			<input type="text" name="colour" id="colour" placeholder="item colour" required autofocus maxldescriptionth="255" value="<?php echo htmlspecialchars( $results['item']->colour )?>" />
           </td>
		   </tr>
		   
		   <tr><td style="text-align:right;">
			<label for="serial">Serial Number</label>
            </td><td>
			<input type="text" name="serial" id="serial" placeholder="serial no" required autofocus maxldescriptionth="255" value="<?php echo htmlspecialchars( $results['item']->serial )?>" />
           </td>
		   </tr>
		   
		   <tr><td style="text-align:right;">
			<label for="partno">Part No.:</label>
            </td><td>
			<input type="text" name="partno" id="partno" placeholder="part no" required autofocus maxldescriptionth="255" value="<?php echo htmlspecialchars( $results['item']->partno )?>" />
           </td>
		   </tr>
		   
			</table>			
		  <br><br>
			 <input type="hidden" name="state" id="state" required maxldescriptionth="10" value="in" />
			 <input type="hidden" name="receiver" id="receiver" required maxldescriptionth="10" value="<?php echo $_SESSION['fullname'] ?>" />
			 
			 <input type="hidden" name="datein" id="datein" placeholder="YYYY-MM-DD" required maxldescriptionth="20" value="<?php echo date('Y-m-d h:i:s') ?>" />
			
        <div class="buttons">
          <input type="submit" name="receive" value="Receive this Item" />
          <input type="submit" formnovalidate name="cancel" value="Cancel" />
        </div>

      </form>
	
    </div></div>
    <div style="height:5px"></div>
  <?php include "themes/footer.php" ?>