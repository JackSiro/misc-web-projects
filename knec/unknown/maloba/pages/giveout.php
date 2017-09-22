<?php include "themes/header.php" ?>
	<div id="content">
		<div class="post">
		
		 <h2>Giveout an item:</h2></div>
		 <div class="post">
		 <h3>Item: <?php echo htmlspecialchars( $results['item']->name )?> (<?php 
		$getcats = array();
		$getcats['category'] = Category::getById( $results['item']->catid );
		echo $getcats['category']->name; ?>)</h3>
		<b>Serial no:</b> <?php echo htmlspecialchars( $results['item']->serial )?> | <b>Part no:</b> <?php echo htmlspecialchars( $results['item']->partno )?> | 
		<b>Colour</b>: <?php echo htmlspecialchars( $results['item']->colour )?>
		</div>
		 <div class="post">
          <form action="index.php?action=<?php echo $results['formAction']?>" method="post">
			<input type="hidden" name="itemid" value="<?php echo $results['item']->itemid ?>"/>
            <label for="takenby">Giving this item to: </label>
			<input type="text" name="takenby" id="takenby" placeholder="Taken by" required maxldescriptionth="255" value="" />		
		  <br><br>
			 <input type="hidden" name="state" id="state" required maxldescriptionth="10" value="out" />
			 <input type="hidden" name="givenby" id="givenby" required maxldescriptionth="10" value="<?php echo $_SESSION['fullname'] ?>" />
			 
			 <input type="hidden" name="dateout" id="dateout" placeholder="YYYY-MM-DD" required maxldescriptionth="20" value="<?php echo date('Y-m-d h:i:s') ?>" />
         
        <div class="buttons">
          <input type="submit" name="giveout" value="Give out this Item" />
          <input type="submit" formnovalidate name="cancel" value="Cancel" />
        </div>

      </form>
	
    </div></div>
    <div style="height:5px"></div>
  <?php include "themes/footer.php" ?>