<?php include "themes/header.php" ?>
	<div id="content">
   	  <hr>
		<h1>All Item Categories</h1>
	<hr>
		
		<table class="tt_tb" border='1' style="border:1px solid #DD4C0B;">
        <tr class="tt_tr">
          <th>Category Name</th>
          <th>Description</th>
          <th>Created</th>
        </tr>
		
<?php foreach ( $results['categorys'] as $category ) { ?>
 
        <tr onclick="location='index.php?category=<?php echo $category->catid?>'">
          <td><?php echo $category->name ?></td>
		  <td><?php echo $category->description?></td>
		  <td><?php echo date('j/m/Y', $category->created)?></td>		  
        </tr>

<?php } ?>

      </table>
		<div style="clear: both; height: 30px;"></div>
    <a href="index.php?action=newcat"><h1>Add a new Category</h1></a>
	<br>
    </div>
    <div style="height:5px"></div>
  <?php include "themes/footer.php" ?>