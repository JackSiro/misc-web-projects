<?php include AS_THEME."as_header.php"; ?>
<div id="tooplate_main_wrapper">
    <div id="tooplate_top"></div>
	
    <div id="tooplate_main">
        <div id="tooplate_content_wrapper">
        	<div id="tc_top"></div>
			
        	<div id="tooplate_content">
				<div id="contact_form">
               	
                <div class="post_box">
					<h2 class="meta">Add a Stock Item</h2> 
          
			<?php 
			
			$database = new As_Dbconn();			
			
			$as_item_query = "SELECT * FROM as_item ORDER BY itemid ASC";			
			$results = $database->get_results($as_item_query  ); 
			
			if ($database->as_num_rows( $as_item_query)<=0) { ?>
				<h2 style="color:#000">You need to fix the following errors before you add an Item</h2>
				<ul>
				<h3><li><a href="index.php?action=item_new">No Item found! Add an Item</a></li><h3>
                    <div class="cleaner"></div>
				
				</ul>
			<?php } else { ?>
                    <div class="cleaner"></div>
			<form role="form" method="post" name="Stock" action="index.php?action=stock_new" >
                <table style="width:100%;font-size:20px;">				
                <tr>
					<td>Choose a Item:</td>
					<td>
						<select name="item" style="padding-left:20px;" required  class="required input_field">
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
					<td><input type="text" autocomplete="off" name="quantity" required  class="required input_field"></td>
				</tr>
								
				</table><br>
                        <center><input type="submit" class="submit_this" name="SaveAdd" value="Save & Add">
						<input type="submit" class="submit_this" name="SaveClose" value="Save & Close">
			  </center><br>
			  </form>
						<?php } ?>
			</div>
                </div>
            </div>
			
            <div id="tc_bottom"></div>
        </div>         
        <div class="cleaner"></div>
    </div>
<?php include AS_THEME."as_footer.php" ?>
    
