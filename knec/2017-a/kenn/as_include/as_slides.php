<?php include AS_THEME."as_header.php"; ?>
<div class="page-top" id="templatemo_contact">
</div> <!-- /.page-header -->
		<div class="contact-page">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-6 map-wrapper"></div>
                    <div class="col-md-6 col-sm-6">
						<h3 class="widget-title">Slide Options</h3> 
                        <div class="contact-form">
							<form action="index.php?page=slide" method="post">
							<h3>Slide One</h3>
							<table style="width:100%;font-size:20px;">
							<tr>
								<td>Slide 1 Title:</td>
								<td><input type="text" name="slide1_title" value="<?php echo as_get_option('slide1_title') ?>"></td>
							</tr>
							<tr>
								<td>Slide 1 Url:</td>
								<td><input type="text" name="slide1_url" value="<?php echo as_get_option('slide1_url') ?>"></td>
							</tr>
							<tr>
								<td>Slide 1 Price:</td>
								<td><input type="text" name="slide1_price" value="<?php echo as_get_option('slide1_price') ?>"></td>
							</tr>
							
							<tr>
								<td>Slide 1 Description:</td>
								<td><textarea name="slide1_description"><?php echo as_get_option('slide1_description') ?></textarea></td>
							</tr>
							</table><br>
							<h3>Slide Two</h3>
							<table style="width:100%;font-size:10px;">
							<tr>
								<td>Slide 2 Title:</td>
								<td><input type="text" name="slide2_title" value="<?php echo as_get_option('slide2_title') ?>"></td>
							</tr>
							<tr>
								<td>Slide 2 Url:</td>
								<td><input type="text" name="slide2_url" value="<?php echo as_get_option('slide2_url') ?>"></td>
							</tr>
							<tr>
								<td>Slide 2 Price:</td>
								<td><input type="text" name="slide2_price" value="<?php echo as_get_option('slide2_price') ?>"></td>
							</tr>
							
							<tr>
								<td>Slide 2 Description:</td>
								<td><textarea name="slide2_description"><?php echo as_get_option('slide2_description') ?></textarea></td>
							</tr>
							</table><br>
							<h3>Slide Two</h3>
							<table style="width:100%;font-size:10px;">
							<tr>
								<td>Slide 3 Title:</td>
								<td><input type="text" name="slide3_title" value="<?php echo as_get_option('slide3_title') ?>"></td>
							</tr>
							<tr>
								<td>Slide 3 Url:</td>
								<td><input type="text" name="slide3_url" value="<?php echo as_get_option('slide3_url') ?>"></td>
							</tr>
							<tr>
								<td>Slide 3 Price:</td>
								<td><input type="text" name="slide3_price" value="<?php echo as_get_option('slide3_price') ?>"></td>
							</tr>
							
							<tr>
								<td>Slide 3 Description:</td>
								<td><textarea name="slide3_description"><?php echo as_get_option('slide3_description') ?></textarea></td>
							</tr>
							</table><br>
							<input type="submit"class="mainBtn" id="submit" name="SaveSlide" value="Save Slide Options">
						  </form>
			
                        </div> <!-- /.contact-form -->
                    </div>
					<div class="col-md-3 col-sm-6 map-wrapper"></div>
                </div>
            </div>
        </div>
<?php include AS_THEME."as_footer.php" ?>
    
