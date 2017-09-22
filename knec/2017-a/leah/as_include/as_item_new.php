<?php include AS_THEME."as_header.php"; ?>
		<div id="featured">
			<div class="container">
				<div class="row">
					<section class="12u">
						<div class="box">	
							<h3>Add an item</h3> 
							<form role="form" method="post" name="Postitem" action="index.php?action=item_new" enctype="multipart/form-data" >
								<p><span>Item Name</span><input type="text" autocomplete="off" name="name"></p>										
								<p><span>Item Code</span><input type="text" autocomplete="off" name="code"></p>										
								<p><span>Item Description</span><input type="text" autocomplete="off" name="description"></p>													
								<p><span>Item Unit</span><input type="text" autocomplete="off" name="unit"></p>													
								<br><p><input type="submit" class="button" name="Additem" value="Save and Add Another item">
									<input type="submit" class="button" name="AddClose" value="Save and Close">
								</p>
							</form>
					</section>
				</div>
				<div class="divider"></div>
			</div>
		</div>
<?php include AS_THEME."as_footer.php" ?>
    
