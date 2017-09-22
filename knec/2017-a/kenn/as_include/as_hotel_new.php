<?php include AS_THEME."as_header.php"; ?>
<div class="page-top" id="templatemo_contact">
</div> <!-- /.page-header -->
		<div class="contact-page">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-6 map-wrapper"></div>
                    <div class="col-md-6 col-sm-6">
						<h3 class="widget-title">Add a Hotel</h3> 
                        <div class="contact-form">
							<form role="form" method="post" name="PostCompanyHotel" action="index.php?page=hotel_new">
							<table style="width:100%;font-size:20px;">
							<tr>
								<td>Hotel Name:</td>
								<td><input type="text" autocomplete="off" name="title"></td>
							</tr>
							<tr>
								<td>Hotel Price:</td>
								<td><input type="text" autocomplete="off" name="price"></td>
							</tr>
							<tr>
								<td>Hotel Details:</td>
								<td><textarea name="details" ></textarea></td>
							</tr>
							<tr>
							<td></td>
							<td><input type="submit"  class="mainBtn" id="submit" name="AddSave" value="Add Hotel"></td></tr>
							</table><br>
									
						  </form>
				
                        </div> <!-- /.contact-form -->
                    </div>
					<div class="col-md-3 col-sm-6 map-wrapper"></div>
                </div>
            </div>
        </div>
<?php include AS_THEME."as_footer.php" ?>
    
