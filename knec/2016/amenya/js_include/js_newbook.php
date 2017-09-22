<?php include JS_THEME."js_header.php"; ?>
	<div id="site_content">	

	  <div id="content">
        <div class="content_book">
		<br>
		  <h1>Add an Books Book</h1> 
          <br><hr><br>
			<div class="main_content">
				<form role="form" method="post" name="PostItem" action="index.php?js_page=newbook" enctype="multipart/form-data" >
                <table style="width:100%;font-size:20px;">
				<tr>
					<td>Choose a Section:</td>
					<td><select name="section" style="padding-left:20px;">
						<option value="" > - Choose a Section - </option>
			<?php $js_db_query = "SELECT * FROM js_section ORDER BY section_title ASC";
				$database = new Js_Dbconn();			
				$results = $database->get_results( $js_db_query );
				
				foreach( $results as $row ) { ?>
						<option value="<?php echo $row['sectionid'] ?>">  <?php echo $row['section_title'] ?></option>
				<?php } ?>
						</select>
					</td>
				</tr>
				<tr>
					<td>Title of the Book:</td>
					<td><input type="text" autocomplete="off" name="title"></td>
				</tr>
				<tr>
					<td>Code of the Book:</td>
					<td><input type="text" autocomplete="off" name="code"></td>
				</tr>
				<tr>
					<td>Book Icon:</td>
					<td><input name="fileicon" autocomplete="off" type="file" accept="image/*"></td>
				</tr>
				<tr>
					<td>Book Document (DOC, PDF, PPT etc):</td>
					<td><input name="filename" autocomplete="off" type="file" ></td>
				</tr>
                
                <tr>
					<td>Description (500 max):</td>
					<td><textarea style="height:200px" name="content" autocomplete="off" ></textarea></td>
				</tr>
				<tr>
					<td>Publisher of the Book:</td>
					<td><input type="text" autocomplete="off" name="publisher"></td>
				</tr>
				
				<tr>
					<td>Subject/Topic of the Book:</td>
					<td><input type="text" autocomplete="off" name="subject"></td>
				</tr>
				
				</table><br>
                        <center><input type="submit" class="submit_this" name="AddBook" value="Upload Book"></center><br></form>
				
			</div>
		<br>
      <h2><center></center></h2>
		<br>  
		</div><!--close content_book-->
      </div><!--close content-->   
	</div><!--close site_content-->  	
  </div><!--close main-->
<?php include JS_THEME."js_footer.php" ?>
    
