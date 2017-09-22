<?php include AS_THEME."as_header.php"; ?>
    <div id="site_content">
      <div id="banner"></div>	
		<div id="content">
		  <h1>Add a Stock Item</h1>
			<div class="main_content">
			<?php 
			
			$database = new As_Dbconn();			
			
			$as_drug_query = "SELECT * FROM as_drug ORDER BY drugid ASC";			
			$results = $database->get_results($as_drug_query  ); 
			
			if ($database->as_num_rows( $as_drug_query)<=0) { ?>
				<h2 style="color:#000">You need to fix the following errors before you add a  Drug Item</h2>
				<ul>
				<h3><li><a href="index.php?action=drug_new">No Drug Item found! Add an Drug Item</a></li><h3>
				
				</ul>
			<?php } else { ?>
			<form role="form" method="post" name="Stock" action="index.php?action=stock_new" >
                <div class="form_settings">				
                <p><span>Choose a Drug:</span>
						<select name="drug" style="padding-left:20px;" required >
						<option value="" > - Choose a Drug - </option>			
						<?php
							foreach( $results as $row ) { ?>
								<option value="<?php echo $row['drugid'] ?>">  <?php echo $row['drug_title'] ?></option>
						<?php } ?>
						</select>
					</p>					
				<p><span>Number of Containers:</span><input type="text" autocomplete="off" name="quantity" required ></p>
								
				<p style="padding-top: 15px"><span><input type="submit" class="submit" name="SaveAdd" value="Save & Add"></span><input type="submit" class="submit" name="SaveClose" value="Save & Close"></p>
			  </div>
			  </form>
						<?php } ?>
				
      </div>
    </div>
    </div>
<?php include AS_THEME."as_footer.php" ?>
    
