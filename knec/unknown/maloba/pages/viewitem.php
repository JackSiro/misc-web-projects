<?php include "themes/header.php" ?>
	<div id="content">
   	 <div class="post"> 
		<h3><?php echo $results['item']->name ?> Details <span style="float:right;"><a href="index.php?action=giveout&itemid=<?php echo $results['item']->itemid ?>">Issue this item</a> | <a href="index.php?action=deleteitem&amp;itemid=<?php echo $results['item']->itemid ?>" onclick="return confirm('Delete This Item?')">Delete This Item</a></span></h3>
	</div>
	<div class="post">
	<h5>Category: <?php 
		$getcats = array();
		$getcats['category'] = Category::getById( $results['item']->catid );
		echo $getcats['category']->name; ?></h5>
		<h5>Colour: <?php echo $results['item']->colour ?>; Weight: <?php echo $results['item']->weight ?>; Size: <?php echo $results['item']->size ?> </h5>
		<h5>Part no: <?php echo $results['item']->partno ?> Serial number: <?php echo $results['item']->serial ?></h5>
		<h5>Item value: <?php echo $results['item']->value ?></h5>
	</div>
	
    <div class="post">
	<h5>Date brought in: <?php echo date('j/m/y', $results['item']->datein) ?>; Time brought in: <?php echo date('h:i', $results['item']->datein) ?></h5>
		<h5>Delivered by: <?php echo $results['item']->broughtby ?></h5>
		<h5>Received by: <?php echo $results['item']->receiver ?></h5>	
   
    </div>
	
	</div>
    <div style="height:5px"></div>
  <?php include "themes/footer.php" ?>