<?php include AS_THEME."as_header.php"; ?>
	<div id="site_content">	

	  <div id="content"> 
       
        <div class="content_item">
		  <h1>Add a Stock Item</h1> 
          <br><hr><br>
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
                <table style="width:100%;font-size:20px;">				
                <tr>
					<td>Choose a Drug:</td>
					<td>
						<select name="drug" style="padding-left:20px;" required >
						<option value="" > - Choose a Drug - </option>			
						<?php
							foreach( $results as $row ) { ?>
								<option value="<?php echo $row['drugid'] ?>">  <?php echo $row['drug_title'] ?></option>
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
    
