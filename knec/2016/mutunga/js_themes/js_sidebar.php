 <br>
		  <script class="slide" type="text/javascript">
			<!--
				var image1=new Image()
				image1.src="js_images/1.jpg"
				var image2=new Image()
				image2.src="js_images/2.jpg"
				var image3=new Image()
				image3.src="js_images/3.jpg"
				var image4=new Image()
				image4.src="js_images/4.jpg"
				var image5=new Image()
				image5.src="js_images/5.jpg"

				//-->
			</script>

			<img style="border: 0px ridge rgb(255, 0, 0);border-radius:10px;" name="slide" height="100%" width="960"> 
			<script><!--
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
		  <br>