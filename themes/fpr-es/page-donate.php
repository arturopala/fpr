<?php
/*
Template Name: Donate Page
*/
?>
<?php get_header(); ?>

<?php if (have_posts()): while (have_posts()) : the_post(); ?>
	<div class="panel panel--primary">
		<div class="panel_inner">
			<div class="page_title">
				<h1 class="page_title-inner"><?php the_title(); // Dynamic Content ?></h1>
			</div>
		</div>
	</div>

	<div class="panel">
		<div class="panel_inner">
			<div class="row">
				<div class="col-4">
					<?php if (has_post_thumbnail( $post->ID ) ): ?>
					<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
						<img src="<?php echo $image[0]; ?>" alt="" class="icon-img">
					<?php endif; ?>
					
				</div>

				<div class="col-8">
					<?php the_content(); // Dynamic Content ?>
				</div>
			</div>
		</div>
	</div>
<?php endwhile; ?>
<?php endif; ?>
<div class="panel panel--primary">
	<div class="panel_inner">

		<div class="donate">
			<div>
				<img src="<?php echo get_template_directory_uri(); ?>/build/img/paypal-logo.png" alt="Payments by PayPal">
			</div>	
			<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
				<input type="hidden" name="cmd" value="_s-xclick">
				<input type="hidden" name="hosted_button_id" value="LUJUCNXNTFBZS">
				<button class="btn-primary btn--large" name="submit" title="PayPal - The safer, easier way to pay online!">Donate USD</button>
				<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
			</form>

			<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
				<input type="hidden" name="cmd" value="_s-xclick">
				<input type="hidden" name="hosted_button_id" value="WVSL2J24RLWWE">
				<button class="btn-primary btn--large" name="submit" title="PayPal - The safer, easier way to pay online!">Donate GBP</button>
				<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
			</form>
		</div>
				
	</div>
</div>


<?php get_sidebar(); ?>

<?php get_footer(); ?>