<?php include JS_THEME."js_header.php"; ?>

	<section id="content">
	  <div class="innerblock pad-2">
        <div class="block-4 col-3">
          <div class="h2">
            <h2 class="h2-line-2">Add an Stationery Item</h1> 
          <br><hr><br>
			<div class="main_content">
			<?php 
			
			$database = new Js_Dbconn();			
			
			$js_type_query = "SELECT * FROM js_type ORDER BY type_title ASC";			
			$results = $database->get_results($js_type_query  ); 
			
			$js_supp_query = "SELECT * FROM js_supplier ORDER BY supp_fullname ASC";
			$results_i = $database->get_results( $js_supp_query ); 
							
			if ($database->js_num_rows( $js_type_query)<=0) { ?>
				<h2 style="color:#000">You need to fix the following errors before you add a Stationery Item</h2>
				<ul>
				<h3><li><a href="index.php?action=type_new">No Type found! Add a Stationery Type</a></li><h3>
				<?php if ($database->js_num_rows( $js_supp_query)<=0) { ?>
				<h3><li><a href="index.php?action=supp_new">No Supplier found! Add a Supplier</a></li><h3>
				<?php } ?>
				</ul>
			<?php } else if ($database->js_num_rows( $js_supp_query)<=0) { ?>
				<h2 style="color:#000">You need to fix the following errors before you add a Stationery Item</h2>
				<ul>
				<h3><li><a href="index.php?action=supp_new">No Supplier found! Add a Supplier</a></li><h3>
				</ul>
			<?php } else { ?>
			<form role="form" method="post" name="PostItem" action="index.php?action=item_new" 
			enctype="multipart/form-data" >
                <table style="width:100%;font-size:20px;">
				<tr>
					<td>Choose a Type:</td>
					<td>
					
				
						<select name="type" style="padding-left:20px;" required >
						<option value="" > - Choose a Type - </option>
			
						<?php
							foreach( $results as $row ) { ?>
								<option value="<?php echo $row['typeid'] ?>">  <?php echo $row['type_title'] ?></option>
						<?php } ?>
						</select>
					</td>
				</tr>	
				<tr>
					<td>Choose a Supplier:</td>
					<td>
									
						<select name="supplier" style="padding-left:20px;" required >
						<option value="" > - Choose a Supplier - </option>
			
						<?php
							foreach( $results_i as $row ) { ?>
								<option value="<?php echo $row['suppid'] ?>">  <?php echo $row['supp_fullname'] ?></option>
						<?php } ?>
						</select>
					</td>
				</tr>
						
				<tr>
					<td>Stationery Item Image:</td>
					<td><input name="filename" autocomplete="off" type="file" accept="image/*"></td>
				</tr>
                <tr>
					<td>Quantity of Items:</td>
					<td><input type="text" autocomplete="off" name="quantity" required ></td>
				</tr>
						
                <tr>
					<td>Price Per Unit:</td>
					<td><input type="text" autocomplete="off" name="price" required ></td>
				</tr>
								
				</table><br>
                        <center><input type="submit" class="submit_this" name="AddItem" value="Save and Add Another">
						<input type="submit" class="submit_this" name="AddClose" value="Save and Close">
			  </center><br></form>
						<?php } ?>
				
			</div>
		<br>
      <h2><center></center></h2>
		<br>  
		</div><!--close content_item-->
      </div><!--close content-->   
	</div><!--close site_content-->  	
  </section>
<?php include JS_THEME."js_footer.php" ?>
    
