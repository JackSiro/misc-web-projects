<?php include "themes/header.php" ?>
	<div id="content">
   	 <div class="post"> <hr>
		<h1>All Items In Stock</h1>
	<hr>
	</div>
	<div class="post">	
		<table class="it_tb" border='1' style="border:1px solid #DD4C0B;font-size:12px;">
        <tr class="tt_tr">
		  <th>Category</th>
          <th>Item Name</th>
          <th>Datein</th>
          <th>Colour</th>
          <th>Partno</th>
		  <th>Serial</th>
		  <th>Value</th>
		  <th>Brought by</th>
		  <th>Received by</th>
        </tr>
		
<?php foreach ( $results['items'] as $item ) { ?>
 
        <tr onclick="location='index.php?action=viewitem&itemid=<?php echo $item->itemid?>'">
		<td><?php 
		$getcats = array();
		$getcats['category'] = Category::getById( $item->catid );
		echo $getcats['category']->name; ?></td>
        <td><?php echo $item->name ?></td>
		<td><?php echo date('j/m/y', $item->datein) ?></td>
		<td><?php echo $item->colour ?></td>
		<td><?php echo $item->partno ?></td>
		<td><?php echo $item->serial ?></td>
		<td><?php echo $item->value ?></td>
		<td><?php echo $item->broughtby ?></td>
		<td><?php echo $item->receiver ?></td>
	
        </tr>

<?php } ?>

      </table>
		<div style="clear: both; height: 30px;"></div>
   </div>
	<br>
    </div>
    <div style="height:5px"></div>
  <?php include "themes/footer.php" ?>