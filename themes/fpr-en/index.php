<?php get_header(); ?>


		<!-- section -->
		<section>
			<div class="banner banner--blog">
				<div class="banner_inner">
					<div class="banner_caption">
					<div class="banner_subtitle">Harbour</div>
						<div class="banner_title">
							Stop, all this passing has sense.
							<div><em>St John Paul II</em></div>
						</div>
					</div>
				</div>
			</div>
			<div class="panel">
				<div class="panel_inner">

					<div class="row">
						<div class="col-8">
							<div class="article-list">
								<?php get_template_part('loop'); ?>
							</div>
							<?php get_template_part('pagination'); ?>
						</div>
						<div class="col-4">
							<?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebar')) ?>
						</div>
					</div>

				</div>
			</div>
		</section>
		<!-- /section -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>