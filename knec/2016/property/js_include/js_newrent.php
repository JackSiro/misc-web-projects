<?php include JS_THEME."js_header.php"; ?>

	<section id="service">
		<div class="container">
			<div class="row">
				<div class="text-center col-md-12 wow fadeInDown" data-wow-delay="2000">
					<h3>Receive Rent</h3>
				</div>
				<div class="col-md-2"></div>
				<div class="col-md-8 text-center">
				</div>
				<div class="col-md-2"></div>
				<div class="col-sm-12 col-md-12 wow fadeInLeft" data-wow-delay="2000">
					<div class="media">
						<i class="fa fa-cog pull-left media-object"></i>
							<div class="media-body">
								<form role="form" method="post" name="PostRent" action="index.php?action=newrent" enctype="multipart/form-data" >
							<table style="width:100%;font-size:20px;">
							<tr>
								<td>Tenant:</td>
								<td>
									<select name="tenant" style="padding-left:20px;font-size: 30px;width:100%">
						<option style="font-size: 30px;" value="" > - Choose a Tenant - </option>
						<?php $js_db_query = "SELECT * FROM js_tenant ORDER BY tenantid ASC";
							$database = new Js_Dbconn();			
							$results = $database->get_results( $js_db_query );							
							foreach( $results as $row ) { ?>
								<option style="font-size: 30px;" value="<?php echo $row['tenant_name'] ?>"><?php echo $row['tenant_name'] ?></option>
							<?php } ?>
						</select>
								</td>
							</tr><tr>
								<td>Rent Amount:</td>
								<td><input type="text" autocomplete="off" name="size"></td>
							</tr><tr>
								<td>Payment Mode:</td>
								<td>
								<select name="payment" style="padding-left:20px;font-size: 30px;width:100%;">
									<option value="Cash">Cash</option>
									<option value="MPESA">MPESA</option>
									<option value="AirtelMoney">AirtelMoney</option>
									<option value="Cheque">Cheque</option>
								</select>
								</td>
							</tr>
							</table><br>
                        <center><input type="submit" class="submit_this" name="AddRent" value="Save & Add">
						<input type="submit" class="submit_this" name="AddClose" value="Save & Close">
			  </center><br></form>
							</div>
					</div>
				</div>
				
			</div>
		</div>
	</section>		
<?php include JS_THEME."js_footer.php" ?>
    
