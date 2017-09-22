<?php 
	
	$database = mysql_connect("localhost","root","");	
	$query="SELECT * FROM `records`";
	
	mysql_select_db("kasembeli")or die (" die could not connect to database");

	$results = mysql_query($query, $database);
	$num = mysql_num_rows($results);
	//mysql_close();

	include ("theme/header.php"); 

?>

	<!-- CONTENT -->
	<!-- TODO: Change content in the rows/columns below 
	     Please note, 24-columns grid is used in the template, so you can reorder the blocks 
	     to make, for example, 2-columns layout (use a pair of col span_12) or 4-column one
	     (use 4 copies of col span_6) -->
	<div id="Content" class="container">
		<br><h1 class="align-center margin">OUR RECORDS</h1>
		
		<hr class="divider">

		<div class="row padding">
			<div class="col span_24">
			  <div id="Offer">
					
				<?php if ($num > 1) { ?>
						<table class="mytable span_24" border="1" style="font-size:20px;line-height:30px;">
						  <tr>
							<th><b> SPECIES </b></th><th> <b>NUMBER OF COWS</b></th>
						  </tr>
					<?php while ($row = mysql_fetch_assoc($results)) { ?>
						<tr>
							<td>
								<?php echo $row['species'] ?>
							</td>
							<td>
								<?php echo $row['number'] ?>
							</td>
						</tr> 
					<?php  } ?>
						</table>
					<?php  } else { ?>
							<div class="row padding">
								<div class="col span_24">
									<p><b>No Records Found</b></p>
								</div>
							</div> 
				<?php	}
				?>
															 
					</div> 
					
					
				<!-- Result Messages -->
				<div class="row" id="error_msg">
					<div class="col span_24">
						<b>Sorry, but there were error(s) found with the form you submitted:
						<i></i></b> 
						<br><a href="javascript:void(0);" id="new_try">Got it, retry.</a>
					</div>
				</div>
				<div class="row" id="msg">
					<div class="col span_24">
						<b>Offer sent!</b> 
						<br><a href="javascript:void(0);" id="new_offer">Make another one?</a>
					</div>
				</div>
				<!-- End of Result Messages -->

			</div> <!-- end of col span_16 -->
		</div> <!-- end of row -->
	</div>
	<!-- END OF CONTENT -->

	<div id="Content-end" class="container"></div>

	<?php  include ("theme/footer.php");  ?>
