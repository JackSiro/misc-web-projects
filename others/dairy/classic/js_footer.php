<?php if (js_is_logged()) { ?>
<!-- very fresh -->
<div id="SomethingFresh" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" style="width: 900px!important;">
  <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h2 class="text-center">Write a New Post</h2>
      </div>
      <div class="modal-body">
          <form class="form col-md-12 center-block" action="<?php echo js_siteUrl() ?>post" method="post" name="fresh">
            <div class="form-group">
              <input type="text" required class="form-control input-lg" name="title" placeholder="The Title of your Post">
            </div>
			<div class="form-group"><span class="form-label">Select your Post's Category: </span>
			
			<select class="form-select" name="storycat" title="Select your Category" required>
						<option value=""> - select your Category - </option>
			<?php $js_db_query = "SELECT * FROM js_category ORDER BY cat_title ASC";
				$database = new Js_Dbconn();			
				$results = $database->get_results( $js_db_query );
				
				foreach( $results as $row ) { ?>
						<option value="<?php echo $row['catid'] ?>" style="margin-left:20px;">  <?php echo $row['cat_title'] ?></option>
				<?php } ?>
						</select>
			</div>                
			
            <div class="form-group">
			  <textarea class='form-control input-lg' name='content' id='full_post'></textarea>
            </div>
			<div class="form-group">
              <input type="text" required class="form-control input-lg" name="posttags" id="posttags" 
			  placeholder="tags separated by commas">
            </div>
            <div class="form-group">
              <input type="submit" name="freshStory" class="btn btn-primary btn-lg btn-inline" value="Post the Story" style="width:48%;"/>
              <button class="btn btn-lg btn-inline" data-dismiss="modal" aria-hidden="true" >Cancel</button>
		  
            </div>
          </form>
      </div>
      <div class="modal-footer">
          <div class="col-md-12"></div>	
      </div>
  </div>
  </div>
</div>

<?php } ?>
<!--login modal-->
<div id="loginModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
  <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h2 class="text-center">Login</h2>
      </div>
      <div class="modal-body">
          <form class="form col-md-12 center-block" action="<?php echo js_siteUrl() ?>login" method="post" name="login">
            <div class="form-group">
              <input type="text" required class="form-control input-lg" name="loginname" placeholder="Email or Username">
            </div>
            <div class="form-group">
              <input type="password" required class="form-control input-lg" name="loginkey" placeholder="Password">
            </div>
            <div class="form-group">
              <input type="submit" name="LetMeIn" class="btn btn-primary btn-lg btn-block" value="Sign In" />
              
            </div>
          </form>
      </div>
      <div class="modal-footer">
          <div class="col-md-12">
          <button class="btn btn-lg btn-block" data-dismiss="modal" aria-hidden="true">Cancel</button>
		  </div>	
      </div>
  </div>
  </div>
</div>


<!--about modal-->
<div id="aboutModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
  <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h2 class="text-center">About NewsHolla</h2>
      </div>
      <div class="modal-body">
          <div class="col-md-12 text-center">
            
          </div>
      </div>
      <div class="modal-footer">
          <button class="btn" data-dismiss="modal" aria-hidden="true">OK</button>
      </div>
  </div>
  </div>
</div>
	<!-- script references -->
		<script src="<?php echo js_siteUrl() ?>js_themes/js/jquery.min.js"></script>
		<script src="<?php echo js_siteUrl() ?>js_themes/js/bootstrap.min.js"></script>
		<script src="<?php echo js_siteUrl() ?>js_themes/js/scripts.js"></script>
		
		<script type="text/javascript" src="js_apps/js_tinymce/tinymce.min.js"></script>
	    <script type="text/javascript">
	        tinymce.init({
	            selector: "#full_post", height : 200,
	            plugins: "image wordcount resize autolink imagetools contextmenu media table spellchecker textcolor emoticons", 
	            image_advtab: true,
                    imagetools_toolbar: "rotateleft rotateright | flipv fliph | editimage imageoptions",
                    contextmenu: "link image inserttable | cell row column deletetable",
                    tools: "inserttable spellchecker",
	        });
	    </script>
	</body>
</html>