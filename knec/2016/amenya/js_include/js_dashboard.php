<?php include JS_THEME."js_header.php";
	$myaccount = isset( $_SESSION['digilibacc'] ) ? $_SESSION['digilibacc'] : "";
	 
	$database = new Js_Dbconn();			
	
	$js_book_qry = "SELECT * FROM js_book ORDER BY bookid DESC LIMIT 20";
	$results_i = $database->get_results( $js_book_qry );
	
	$js_student_qry = "SELECT * FROM js_student ORDER BY studentid DESC LIMIT 20";
	$results_ii = $database->get_results( $js_student_qry );
			
	?>
	<div id="site_content">	

	  <div id="content">
        <div class="content_book">
		<br>
		  <h1>Welcome to <?php echo js_get_option('sitename') ?></h1> 
          <br><hr><br>
			<div class="main_content" align="center">
			
			   <div id="wrapper">
  <div id="tabContainer">
    <div id="tabs" style="padding-bottom:10px;">
      <ul>
        <li id="tabHeader_1" style="padding:10px;font-size:25px;">Latest Books</li>
        <li id="tabHeader_2" style="padding:10px;font-size:25px;">Latest Students</li>
      </ul>
    </div>
    <div id="tabscontent">
      <div class="tabpage" id="tabpage_1">
        <table class="tt_tb">
				<thead><tr class="tt_tr">
				  <th style="width:70px;"></th>
				  <th>Section</th>
				  <th>Title</th>
				  <th>Publisher</th>
				  <th>Subject</th>
				  <th></th>
				</tr></thead>
				<tbody>
                <?php foreach( $results_i as $row ) { ?>
		        <tr onclick="location='index.php?js_page=viewbook&amp;js_bookid=<?php echo $row['bookid'] ?>'">
				   <td><img class="iconic" src="js_media/<?php echo $row['book_img'] ?>" /></td>
				   <td><?php echo js_section_book($row['book_section']) ?></td>
				   <td><?php echo $row['book_title'] ?></td>
		          <?php //echo substr($row['book_content'],0,100).'...' ?>
				  <td><?php echo $row['book_publisher'] ?></td>
				  <td><?php echo $row['book_subject'] ?></td>
		          <td></td>
		        </tr>
			
			<?php } ?>
			
                      </tbody>
                    </table>
      </div>
	  
      <div class="tabpage" id="tabpage_2">
        <table class="tt_tb">
				<thead><tr class="tt_tr">
				  <th style="width:70px;"></th>
				  <th>Full Name</th>
				  <th>Group</th>
				  <th>Mobile</th>
				  <th>Email</th>
				  <th>Registered</th>
				</tr></thead>
				<tbody>
                <?php foreach( $results_ii as $row ) { ?>
		        <tr onclick="location='index.php?js_page=viewuser&amp;js_studentid=<?php echo $row['studentid'] ?>'">
				   <td><img class="iconic" src="js_media/<?php echo $row['student_avatar'] ?>" /></td>
				   <td><?php echo $row['student_fname'].' '.$row['student_surname'] ?></td>
		          <td><?php echo $row['student_group'] ?></td>
		          <td><?php echo $row['student_mobile'] ?></td>
		          <td><?php echo $row['student_email'] ?></td>
				  <td><?php echo date("j/m/y", strtotime($row['student_joined'])); ?></td>
		        </tr>
			
			<?php } ?>
			
                      </tbody>
                    </table>
      </div>
	  </div>
  </div></div>
			</div>
		<br>
      <h2><center></center></h2>
		<br>  
		</div><!--close content_book-->
      </div><!--close content-->   
	</div><!--close site_content-->  	
  </div><!--close main-->
<?php include JS_THEME."js_footer.php" ?>
    
