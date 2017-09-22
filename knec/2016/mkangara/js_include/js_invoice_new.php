  <?php include JS_THEME."js_header.php";
	
	$database = new Js_Dbconn();
?>
	<div class="container">		
		<div class="row box-5">
			<div>
				<h2><?php echo js_get_option('sitename') ?></h2>
				<div class="page_wrap">
				<h1>Add an Invoice</h1><br>
				<div>
				<form class='mkangara-form' method="post" action="index.php?action=request_new" 
			enctype="multipart/form-data">
				<fieldset>
				 <table class="form_table">
				<tr>
					<td>Invoice Title:</td>
					<td><input type="text" autocomplete="off" name="title" required ></td>
				</tr>
                <tr>
					<td>Quantity of Invoice:</td>
					<td><input type="text" autocomplete="off" name="quantity" required ></td>
				</tr>
						
                <tr>
					<td>Price Per Unit:</td>
					<td><input type="text" autocomplete="off" name="price" required ></td>
				</tr>
				</table>
				</fieldset> <br>
						<center><input type="submit" class="submit_this" name="AddInvoice" value="Save Invoice">
			  </center><br></form>
				</div>
			</div>    
			</div>
		</div>
	</div>
<?php include JS_THEME."js_footer.php" ?>
   