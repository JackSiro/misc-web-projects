<?php include AS_THEME."as_header.php"; ?>
	<div id="site_content">	

	  <div id="content">
        <div class="content_item">
		<br>
		  <h1>Add an Elibrary Material</h1> 
          <br><hr><br>
			<div class="main_content">
				<form role="form" method="post" name="PostItem" action="index.php?action=newitem" enctype="multipart/form-data" >
                <table style="width:100%;font-size:20px;">
				<tr>
					<td>Choose a Category:</td>
					<td><select name="category" style="padding-left:20px;">
						<option value="" > - Choose a Category - </option>
			<?php $as_db_query = "SELECT * FROM as_category ORDER BY cat_title ASC";
				$database = new As_Dbconn();			
				$results = $database->get_results( $as_db_query );
				
				foreach( $results as $row ) { ?>
						<option value="<?php echo $row['catid'] ?>">  <?php echo $row['cat_title'] ?></option>
				<?php } ?>
						</select>
					</td>
				</tr>
				<tr>
					<td>Title of the Material:</td>
					<td><input type="text" autocomplete="off" name="title"></td>
				</tr>
				<tr>
					<td>Code of the Material:</td>
					<td><input type="text" autocomplete="off" name="code"></td>
				</tr>
				<tr>
					<td>Upload Item Icon:</td>
					<td><input name="filename" autocomplete="off" type="file" accept="image/*"></td>
				</tr>
                
                <tr>
					<td>Description (500 max):</td>
					<td><textarea style="height:200px" name="content" autocomplete="off" ></textarea></td>
				</tr>
				<tr>
					<td>Publisher of the Material:</td>
					<td><input type="text" autocomplete="off" name="publisher"></td>
				</tr>
				
				<tr>
					<td>Subject/Topic of the Material:</td>
					<td><input type="text" autocomplete="off" name="subject"></td>
				</tr>
				
				</table><br>
                        <center><input type="submit" class="submit_this" name="AddItem" value="Save & Add">
						<input type="submit" class="submit_this" name="AddClose" value="Save & Close">
			  </center><br></form>
				
			</div>
		<br>
      <h2><center></center></h2>
		<br>  
		</div><!--close content_item-->
      </div><!--close content-->   
	</div><!--close site_content-->  	
  </div><!--close main-->
<?php include AS_THEME."as_footer.php" ?>
    
