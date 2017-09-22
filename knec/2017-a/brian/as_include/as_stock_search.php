<?php include AS_THEME."as_header.php"; ?>
	<div id="site_content">	
		
<?php 
	$database = new As_Dbconn();			
	
	$search = $_GET['as_search'];
	$searchcategory = $_GET['as_drugid'];
	if ($searchcategory<=0){
		$search_drug = "All";
		$as_db_query = "SELECT * FROM as_stock
		WHERE stock_title like '%$search%'
		OR stock_content like '%$search%'
		OR stock_publisher like '%$search%'
		OR stock_subject like '%$search%'";
	} else {
		$search_drug = as_drug_drug($searchcategory);
		$as_db_query = "SELECT * FROM as_stock
		WHERE stock_title like '%$search%'
		OR stock_content like '%$search%'
		OR stock_publisher like '%$search%'
		OR stock_subject like '%$search%' 
		OR stock_drugid like '%$searchcategory%'";
	}
	
	$results = $database->get_results( $as_db_query );
	
?>
	  <div id="content"> 
       
        <div class="content_item">
		  <h1><?php echo $database->as_num_rows( $as_db_query ) ?> Materials found
		  <a class="button_small" style="float:right;width:300px;text-align:center;" href="index.php?action=newdrug">Add New Material</a> </h1>
			<div class="main_content" align="center">
			<form method="post" >
			<table style="width:100%;"><tr><td>
			<input type="text" name="as_search" id="as_search" placeholder="Search the library" value="<?php echo $search ?>" />
			</td><td>
				<select name="as_drugid">
				<option  value="<?php echo $searchcategory ?>"><?php echo $search_drug ?></option>
			<?php $as_drug_qry = "SELECT * FROM as_drug ORDER BY drug_title ASC";
				$drug_results = $database->get_results( $as_drug_qry );
				
				foreach( $drug_results as $as_drug ) { ?>
						<option value="<?php echo $as_drug['drugid'] ?>">  <?php echo $as_drug['drug_title'] ?></option>
				<?php } ?>
				</select>
			</td>
			<td><input type="submit" style="width:200px" name="SearchThis" value="Search" /></td></tr>
			</table>
			</form>
			   <table class="tt_tb">
				<thead><tr class="tt_tr">
				  <th style="width:70px;"></th>
				  <th>Drug</th>
				  <th>Title</th>
				  <th>Publisher</th>
				  <th>Subject</th>
				  <th></th>
				</tr></thead>
				<tbody>
                <?php foreach( $results as $row ) { ?>
		        <tr onclick="location='index.php?action=viewdrug&amp;as_stockid=<?php echo $row['stockid'] ?>'">
				   <td><img class="iconic" src="as_media/<?php echo $row['stock_img'] ?>" /></td>
				   <td><?php echo as_drug_drug($row['stock_drugid']) ?></td>
				   <td><?php echo $row['stock_title'] ?></td>
		          <?php //echo substr($row['stock_content'],0,100).'...' ?>
				  <td><?php echo $row['stock_publisher'] ?></td>
				  <td><?php echo $row['stock_subject'] ?></td>
		          <td></td>
		        </tr>
			
			<?php } ?>
			
                      </tbody>
                    </table>
			</div>
		<br>
      <h2><center></center></h2>
		<br>  
		</div><!--close content_item-->
      </div><!--close content-->   
	</div><!--close site_content-->  	
  </div><!--close main-->
<?php include AS_THEME."as_footer.php" ?>
    
