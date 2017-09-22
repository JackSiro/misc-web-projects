  <?php include JS_THEME."js_header.php" ?>
	<div class="container">		
		<div class="row box-5">
			<div>
				<h2><?php echo js_get_option('sitename') ?></h2>
				<div class="page_wrap">
				<h3>Edit an Nafaka Material</h3><br>
				<div>
				<form class='mkangara-form' method="post" 
				action="index.php?action=editproduct&&js_productid=<?php echo $productid ?>" enctype="multipart/form-data" >
				<center><h2><b><u>Site Options</u></b></h2></center><br>
				<table class="form_table">
				
				<tr>
					<td>Choose a Category:</td>
					<td><select name="type" style="padding-left:20px;">
						<option value="<?php echo $productid ?>" > - Choose a Category - </option>
			<?php $js_db_query = "SELECT * FROM js_type ORDER BY cat_title ASC";
				$database = new Js_Dbconn();			
				$results = $database->get_results( $js_db_query );
				
				foreach( $results as $row ) { ?>
						<option value="<?php echo $row['catid'] ?>">  <?php echo $row['cat_title'] ?></option>
				<?php } ?>
						</select>
					</td>
				</tr>
				<tr>
					<td>Title of the Material:</td>
					<td><input type="text" autocomplete="off" name="title" value="<?php echo $product_title ?>"></td>
				</tr>
				<tr>
					<td>Code of the Material:</td>
					<td><input type="text" autocomplete="off" name="code" value="<?php echo $product_code ?>"></td>
				</tr>
				<tr>
					<td>Upload Product Icon:</td>
					<td>
					<input type="hidden" name="productimg" value="<?php echo $product_img ?>">	
						<table style="width:100%"><tr><td>
						<img src="<?php echo 'js_media/'.$product_img ?>" style="width:70px;height:70px;" >
						</td><td>
						<input name="filename" autocomplete="off" type="file" accept="image/*" >
						</td></tr></table>
					</td>
				</tr>
                
                <tr>
					<td>Description (500 max):</td>
					<td><textarea style="height:200px" name="content" autocomplete="off" ><?php echo $product_content ?></textarea></td>
				</tr>
				<tr>
					<td>Publisher of the Material:</td>
					<td><input type="text" autocomplete="off" name="publisher" value="<?php echo $product_publisher ?>"></td>
				</tr>
				
				<tr>
					<td>Subject/Topic of the Material:</td>
					<td><input type="text" autocomplete="off" name="subject" value="<?php echo $product_subject ?>"></td>
				</tr>
				</table><br>
						<center><input type="submit" class="submit_this" name="SaveSite" value="Save Options">
			  </center><br></form>
				</div>    
              </div>
			</div>
        </div>
    </div>
<?php include JS_THEME."js_footer.php" ?>
   