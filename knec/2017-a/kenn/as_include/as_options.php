<?php include AS_THEME."as_header.php"; ?>
<div class="page-top" id="templatemo_contact">
</div> <!-- /.page-header -->
		<div class="contact-page">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-6 map-wrapper"></div>
                    <div class="col-md-6 col-sm-6">
						<h3 class="widget-title">Site Options</h3> 
                        <div class="contact-form">
							<form action="index.php?page=options" method="post">
							<table style="width:100%;font-size:20px;">
							<tr>
								<td>Site Name:</td>
								<td><input type="text" name="sitename" value="<?php echo as_get_option('sitename') ?>"></td>
							</tr>
							<tr>
								<td>Site Url:</td>
								<td><input type="text" name="siteurl" autocomplete="off" value="<?php echo as_get_option('siteurl') ?>"></td>
							</tr>
							<tr>
								<td>Keywords:</td>
								<td><input type="text" name="keywords" autocomplete="off" value="<?php echo as_get_option('keywords') ?>"></td>
							</tr>
							<tr>
								<td>Descriptions:</td>
								<td><textarea name="description"><?php echo as_get_option('description') ?></textarea></td>
							</tr>
							</table><br>
									<input type="submit"class="mainBtn" id="submit" name="SaveSite" value="Save Options">
						  </form>
			
                        </div> <!-- /.contact-form -->
                    </div>
					<div class="col-md-3 col-sm-6 map-wrapper"></div>
                </div>
            </div>
        </div>
<?php include AS_THEME."as_footer.php" ?>
    
