				</div>
				<!-- /page_content -->

				<div class="footer">
					<div class="footer_inner">
						<div class="footer_links">
							<?php wp_nav_menu( array( 'theme_location' => 'footer-menu' ) ); ?>
						</div>

						<div class="footer_social">
							Follow us
							<a target="_blank" href="https://www.facebook.com/pages/Fundacja-Pomoc-Rodzinie-The-Family-Support-Foundation/315114575359907" class="btn-facebook btn-large"><span class="fa fa-facebook-square"></span></a>
							<a target="_blank" href="https://www.youtube.com/user/fprpl" class="btn-youtube btn-large"><span class="fa fa-youtube-square"></span></a>
						</div>

						<div class="footer_language">
							<a href="http://fpr.pl" class="language-pl">Polski</a>
							<a href="http://loveandlifeprograms.org/" class="language-en">English</a>
						</div>
					</div>
					<div class="footer_inner">
						<p>&copy; <?php echo date('Y'); ?> Copyright <?php bloginfo('name'); ?>.</p>

						<?php wp_footer(); ?>

					</div>
				</div>

			</div>
		</div>

        <script src="<?php echo get_template_directory_uri(); ?>/build/js/app.min.js"></script>

        <script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		  ga('create', 'UA-56081224-1', 'auto');
		  ga('send', 'pageview');

		</script>
    </body>
</html>
