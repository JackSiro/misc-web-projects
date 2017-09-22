<?php include "themes/header.php" ?>
	<div id="content">
   	  <div style="height:32px"></div>
		<h1>Add a Category</h1> 
		<div style="height:10px"></div>
		<div class="razd_h"></div>
		<div style="height:5px"></div>
		 
          <form action="index.php?action=<?php echo $results['formAction']?>" method="post">
			<input type="hidden" name="catId" value="<?php echo $results['category']->catid ?>"/>
			<label for="name">Category Full Name</label><br>
            <input type="text" style="width:90%;" name="name" id="name" placeholder="Category name" required autofocus maxldescriptionth="255" 
			value="<?php echo htmlspecialchars( $results['category']->name )?>" />
			<br><br>
			<label for="description">A little description here</label><br>
            <input type="text" style="width:90%;" name="description" id="description" placeholder="Category description" maxldescriptionth="255" 
			value="<?php echo htmlspecialchars( $results['category']->description )?>" />
			<br><br>
			
            <input type="hidden" name="created" id="created" placeholder="YYYY-MM-DD" required maxldescriptionth="10" value="<?php echo date('Y-m-d') ?>" />
         
        <div class="buttons">
          <input type="submit" name="newcat" value="Add Category" />
          <input type="submit" formnovalidate name="cancel" value="Cancel" />
        </div>

      </form>
	
    </div>
    <div style="height:5px"></div>
  <?php include "themes/footer.php" ?>