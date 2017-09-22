<?php include JS_THEME."js_header.php";
	$myaccount = isset( $_SESSION['buscar_account'] ) ? $_SESSION['buscar_account'] : "";
	?>
	<div id="site_content">	

	  <div id="content"> 
        <?php 
			
			 $js_db_query = "SELECT * FROM js_place ORDER BY place_title ASC LIMIT 20";
			$database = new Js_Dbconn();			
			$results = $database->get_results( $js_db_query );
			
			?>
	  
        <div class="content_item">
		<br>
		  <h1>Your Jounery starts here with a click</h1> 
          <br><hr><br>
			<div class="main_content" align="center">
                     <script class="slide" type="text/javascript">
					<!--
						var image1=new Image()
						image1.src="js_images/slide_1.jpg"
						var image2=new Image()
						image2.src="js_images/slide_2.jpg"
						var image3=new Image()
						image3.src="js_images/slide_3.jpg"
						var image4=new Image()
						image4.src="js_images/slide_4.jpg"
						//-->
					</script>

					<img name="slide" height="100%" width="900"> 
					<script>
							var step=1
							function slideit(){
							if (!document.images)
							return
							document.images.slide.src=eval("image"+step+".src")
						if (step<3)
						step++
						else
						step=1
						setTimeout("slideit()",2500)
						}
						slideit()
					</script>
					
					
				<br><h2>Book a Ticket Online Now!!!</h2><br>
				<form role="form" method="post" name="Start_Booking" action="index.php?page=booking">
				
				<table style="font-style: 30px;">
					
					<tr>
					  <td>
						<select name="placefrom" style="width:250px" required >
						<option value="" > - Tavelling From - </option>
			
						<?php
							foreach( $results as $row ) { ?>
								<option value="<?php echo $row['place_title'] ?>">  <?php echo $row['place_title'] ?></option>
						<?php } ?>
						</select>
					  </td>
					  <td>
					  <select name="placeto" style="width:250px" required >
						<option value="" > - Tavelling To - </option>
			
						<?php
							foreach( $results as $row ) { ?>
								<option value="<?php echo $row['place_title'] ?>">  <?php echo $row['place_title'] ?></option>
						<?php } ?>
						</select>
					  </td>
					</tr>
					<tr>
					  <td style="text-align:center;"><h2>Set the Date</h2></td>
					  <td><input type="text" placeholder="<?php echo date('d-m-Y') ?>" style="width:230px" name="date" required ></td>
					</tr>
				</table>
				<br>
				<center><input type="submit" class="submit_this" name="StartBooking" value=" >> Start Booking >> " style="width:500px;"></center>
				</form>
			</div>
		<br>
      <h2><center></center></h2>
		<br>  
		</div><!--close content_item-->
      </div><!--close content-->   
	</div><!--close site_content-->  	
  </div><!--close main-->
<?php include JS_THEME."js_footer.php" ?>
    
