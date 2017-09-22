<?php include JS_THEME."js_header.php"; ?>
	<div id="site_content">	

	  <div id="content"> 
        <?php include JS_THEME."js_sidebar.php" ?>
	  
        <div class="content_item">
		<br>
		  <h1>Add a Item</h1> 
          <br><hr><br>
			<div class="main_content">
			<?php 
			
			$database = new Js_Dbconn();			
			
			$js_class_query = "SELECT * FROM js_class ORDER BY class_title ASC";			
			$results = $database->get_results($js_class_query  ); 
			
			$js_topic_query = "SELECT * FROM js_topic ORDER BY topic_fullname ASC";
			$results_i = $database->get_results( $js_topic_query ); 
							
			if ($database->js_num_rows( $js_class_query)<=0) { ?>
				<h2 style="color:#000">You need to fix the following errors before you add a Item</h2>
				<ul>
				<h3><li><a href="index.php?action=class_new">No Class found! Add a Class</a></li><h3>
				<?php if ($database->js_num_rows( $js_topic_query)<=0) { ?>
				<h3><li><a href="index.php?action=topic_new">No Topic found! Add a Topic</a></li><h3>
				<?php } ?>
				</ul>
			<?php } else if ($database->js_num_rows( $js_topic_query)<=0) { ?>
				<h2 style="color:#000">You need to fix the following errors before you add a Item</h2>
				<ul>
				<h3><li><a href="index.php?action=topic_new">No Topic found! Add a Topic</a></li><h3>
				</ul>
			<?php } else { ?>
			<form role="form" method="post" name="PostItem" action="index.php?action=item_new" 
			encclass="multipart/form-data" >
                <table style="width:100%;font-size:20px;">
				<tr>
					<td>Choose a Class:</td>
					<td>
					
				
						<select name="class" style="padding-left:20px;" required >
						<option value="" > - Choose a Class - </option>
			
						<?php
							foreach( $results as $row ) { ?>
								<option value="<?php echo $row['classid'] ?>">  <?php echo $row['class_title'] ?></option>
						<?php } ?>
						</select>
					</td>
				</tr>	
				<tr>
					<td>Choose a Topic:</td>
					<td>
									
						<select name="topiclier" style="padding-left:20px;" required >
						<option value="" > - Choose a Topic - </option>
			
						<?php
							foreach( $results_i as $row ) { ?>
								<option value="<?php echo $row['topicid'] ?>">  <?php echo $row['topic_fullname'] ?></option>
						<?php } ?>
						</select>
					</td>
				</tr>
						
				<tr>
					<td>Item Image:</td>
					<td><input name="filename" autocomplete="off" class="file" accept="image/*"></td>
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
<?php include JS_THEME."js_footer.php" ?>
    
