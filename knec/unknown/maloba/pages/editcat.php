<?php include "themes/header.php" ?>
	<div id="content">
   	  <div style="height:32px"></div>
		<h1><?php echo htmlspecialchars( $results['category']->categoryname )?></h1> 
		<div style="height:10px"></div>
		<div class="razd_h"></div>
		<div style="height:5px"></div>
		 
          <form action="index.php?action=<?php echo $results['formAction']?>" method="post">
			<input type="hidden" name="categoryId" value="<?php echo $results['category']->categoryid ?>"/>
			<label for="categoryname">Category Full Name</label><br>
            <input type="text" style="width:90%;" name="categoryname" id="categoryname" placeholder="Category name" required autofocus maxldescriptionth="255" 
			value="<?php echo htmlspecialchars( $results['category']->categoryname )?>" />
			<br><br>
			<label for="county">County where category is found</label><br>
            <input type="text" style="width:90%;" name="county" id="county" placeholder="Category county" required autofocus maxldescriptionth="255" 
			value="<?php echo htmlspecialchars( $results['category']->county )?>" />
			<br><br>
			<label for="subcounty">Sub-County where category is found</label><br>
            <input type="text" style="width:90%;" name="subcounty" id="subcounty" placeholder="Category sub-county" required autofocus maxldescriptionth="255" 
			value="<?php echo htmlspecialchars( $results['category']->subcounty )?>" />
			<br><br>
			<label for="location">Physical Location where category is found</label><br>
            <input type="text" style="width:90%;" name="location" id="location" placeholder="Category physical location" required autofocus 
			maxldescriptionth="255" value="<?php echo htmlspecialchars( $results['category']->location )?>" />
			<br><br>
			<label for="code">Category Code</label><br>
            <input type="text" style="width:90%;" name="code" id="code" placeholder="Category code" required autofocus maxldescriptionth="10" 
			value="<?php echo htmlspecialchars( $results['category']->code )?>" />
			<br>
		  <br><br>
			        
        <div class="buttons">
          <input type="submit" name="editCategory" value="Save Changes" />
          <input type="submit" formnovalidate name="cancel" value="Cancel" />
        </div>

      </form>
	
    </div>
    <div style="height:5px"></div>
  <?php include "themes/footer.php" ?>