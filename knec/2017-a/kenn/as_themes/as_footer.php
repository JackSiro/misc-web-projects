        <div class="site-footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-4">
                        <div class="footer-logo">
                            <a href="index.html">
                                <img src="as_media/logo.png" alt="">
                            </a>
                        </div>
                    </div> <!-- /.col-md-4 -->
                    <div class="col-md-4 col-sm-4">
					<?php if (!$myaccount){	?>
					<a href="index.php?page=login">Login</a> *
						<a href="index.php?page=register">Register</a> *
						<a href="index.php?page=forgot_password">Forgot Password</a> *
						<a href="index.php?page=forgot_username">Forgot Username</a>  
					<?php } else if ($myaccount){ ?>
					 <a href="#">My Account</a> *
					 <a href="index.php?page=slide">Slide Settings</a> *
					 <a href="index.php?page=options">Site Options</a> *
					 <a href="index.php?page=logout">Logout?</a> *
					<?php } ?>
                        <div class="copyright">
                            <span>Copyright &copy; 2017 <a href="#"><?php echo $sitename ?></a></span>
                        </div>
                    </div> <!-- /.col-md-4 -->
                    <div class="col-md-4 col-sm-4">
                        <ul class="social-icons">
                            <li><a href="#" class="fa fa-facebook"></a></li>
                            <li><a href="#" class="fa fa-twitter"></a></li>
                            <li><a href="#" class="fa fa-linkedin"></a></li>
                            <li><a href="#" class="fa fa-flickr"></a></li>
                            <li><a href="#" class="fa fa-rss"></a></li>
                        </ul>
                    </div> <!-- /.col-md-4 -->
                </div> <!-- /.row -->
            </div> <!-- /.container -->
        </div> <!-- /.site-footer -->

        <script src="as_themes/js/vendor/jquery-1.11.0.min.js"></script>
        <script>window.jQuery || document.write('<script src="as_themes/js/vendor/jquery-1.11.0.min.js"><\/script>')</script>
        <script src="as_themes/js/bootstrap.js"></script>
        <script src="as_themes/js/plugins.js"></script>
        <script src="as_themes/js/main.js"></script>
        <!-- templatemo 409 travel -->  
    </body>
</html>