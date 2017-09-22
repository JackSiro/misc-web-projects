<?php include "themes/header.php" ?>
	<div id="content">
   	  <hr>
		<h1>Items Brought in - Timeline</h1>
	<hr>	
		
	<?php foreach ( $results['items'] as $item ) { ?>
		<div class="post">
		
		On <?php echo date('j/m/y', $item->datein) ?> at <?php echo date('h:i', $item->datein) ?>, <?php echo $item->broughtby?> brought a <?php echo $item->name ?> which was received by
		<?php echo $item->receiver ?> 
		<p class="info">
			  Part no: <?php echo $item->partno?> | Serial no: <?php echo $item->serial?> | <a href="index.php?action=viewitem&itemid=<?php echo $item->itemid ?>">More Details</a>
			</p>
		</div>
	<?php } ?>
<hr>    
    </div>
	
	<div id="content">
   	  <hr>
		<h1>Items Taken Out - Timeline</h1>
	<hr>	
		
	<?php foreach ( $results1['outitems'] as $item ) { ?>
		<div class="post">
		
		On <?php echo date('j/m/y', $item->dateout) ?> at <?php echo date('h:i', $item->dateout) ?>, <?php echo $item->takenby?> took a <?php echo $item->name ?> which was issued by
		<?php echo $item->givenby ?> 
		<p class="info">
			  Part no: <?php echo $item->partno?> | Serial no: <?php echo $item->serial?> | <a href="index.php?action=viewitem&itemid=<?php echo $item->itemid ?>">More Details</a>
			</p>
		</div>
	<?php } ?>
<hr>    
    </div>
  <?php include "themes/footer.php" ?>