<?php include AS_THEME."as_header.php"; ?>
	<div id="site_content">	

	  <div id="content"> 
       
        <div class="content_item">
		  <h1>Add a Stock Item</h1> 
          <br><hr><br>
			<div class="main_content">
			<?php 
			
			$database = new As_Dbconn();			
			
			$as_item_query = "SELECT * FROM as_item ORDER BY itemid ASC";			
			$results = $database->get_results($as_item_query  ); 
			
			if ($database->as_num_rows( $as_item_query)<=0) { ?>
				<h2 style="color:#000">You need to fix the following errors before you add a  Item Item</h2>
				<ul>
				<h3><li><a href="index.php?action=item_new">No Item Item found! Add an Item Item</a></li><h3>
				
				</ul>
			<?php } else { ?>
			<form role="form" method="post" name="Stock" action="index.php?action=stock_new" >
                <table style="width:100%;font-size:20px;">				
                <tr>
					<td>Choose a Item:</td>
					<td>
						<select name="shopitem" style="padding-left:20px;" required >
						<option value="" > - Choose a Item - </option>			
						<?php
							foreach( $results as $row ) { ?>
								<option value="<?php echo $row['itemid'] ?>">  <?php echo $row['item_title'] ?></option>
						<?php } ?>
						</select>
					</td>
				</tr>					
				<tr>
					<td>Number of Containers:</td>
					<td><input type="text" autocomplete="off" name="quantity" required ></td>
				</tr>
								
				</table><br>
                        <center><input type="submit" class="submit_this" name="SaveAdd" value="Save & Add Another">
						<input type="submit" class="submit_this" name="SaveClose" value="Save & Close">
			  </center><br>
			  </form>
						<?php } ?>
				
			</div>
		<br>
      <h2><center></center></h2>
		<br>  
		</div><!--close content_item-->
      </div><!--close content-->   
	</div><!--close site_content-->  	
  </div><!--close main-->
 <script>
 function mySelectContainer() {
    document.getElementById("myText").select();
} 
 </script>
<?php include AS_THEME."as_footer.php" ?>
    
