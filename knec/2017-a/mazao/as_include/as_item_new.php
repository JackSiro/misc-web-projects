<?php include AS_THEME."as_header.php"; ?>
	<div id="site_content">	

	  <div id="content"> 
        <?php include AS_THEME."as_sidebar.php" ?>
	  
        <div class="content_item">
		<br>
		  <h1>Add an Cereal Item</h1> 
          <br><hr><br>
			<div class="main_content">
			<?php 
			
			$database = new As_Dbconn();			
			
			$as_type_query = "SELECT * FROM as_type ORDER BY type_title ASC";			
			$results = $database->get_results($as_type_query  ); 
			
			$as_supp_query = "SELECT * FROM as_supplier ORDER BY supp_fullname ASC";
			$results_i = $database->get_results( $as_supp_query ); 
							
			if ($database->as_num_rows( $as_type_query)<=0) { ?>
				<h2 style="color:#000">You need to fix the following errors before you add a Cereal Item</h2>
				<ul>
				<h3><li><a href="index.php?action=type_new">No Type found! Add a Cereal Type</a></li><h3>
				<?php if ($database->as_num_rows( $as_supp_query)<=0) { ?>
				<h3><li><a href="index.php?action=supp_new">No Supplier found! Add a Supplier</a></li><h3>
				<?php } ?>
				</ul>
			<?php } else if ($database->as_num_rows( $as_supp_query)<=0) { ?>
				<h2 style="color:#000">You need to fix the following errors before you add a Cereal Item</h2>
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
					<td>Cereal Item Image:</td>
					<td><input name="filename" autocomplete="off" type="file" accept="image/*"></td>
				</tr>
				<tr>
					<td>Unit of Item:</td>
					<td><input type="text" autocomplete="off" name="unit" required ></td>
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
  </div><!--close main-->
<?php include AS_THEME."as_footer.php" ?>
    
