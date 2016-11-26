<?php get_header(); ?>

	
<div class="panel">
	<div class="panel_inner">
		<div class="row">
			<div class="col-8">
				

		<?php if (have_posts()): while (have_posts()) : the_post(); ?>

			<!-- article -->
			<article id="post-<?php the_ID(); ?>" class="article">

				<div class="media">
					<?php $categories = get_the_category(); ?>
					<a href="<?php the_permalink() ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/blog/<?php echo $categories[0]->cat_ID; ?>.jpg" alt="" class="media_object article_img article_img--small"></a>
					<div class="media_body">
						<!-- post title -->
						<h1 class="article_title">
							<?php the_title(); ?>
						</h1>
						<!-- /post title -->

						<!-- post details -->
						<div class="article_subtitle"><?php the_time('F j, Y'); ?> <?php the_time('g:i a'); ?></div>
						<!-- /post details -->
					</div>
				</div>
				
				<!-- post thumbnail -->
				<?php if ( has_post_thumbnail()) : // Check if Thumbnail exists ?>
					<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
						<?php the_post_thumbnail(); // Fullsize image for the single post ?>
					</a>
				<?php endif; ?>
				<!-- /post thumbnail -->

				<div class="article_content">
					<?php the_content(); // Dynamic Content ?>

					<div class="article_footer">
						<a href="https://twitter.com/intent/tweet?url=<?php the_permalink() ?>&text=<?php the_title(); ?>" class="btn-twitter share-twitter" target="_blank" id="twitterShare"><span class="fa fa-twitter-square fa-2x"></span> <span>Share on Twitter</span></a>
						<a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink() ?>" class="btn-facebook share-facebook" target="_blank"><span class="fa fa-facebook-square fa-2x" id="facebookShare"></span> <span>Share on Facebook</span></a>
					</div>
				</div>
				<?php the_tags( __( 'Tags: ', 'html5blank' ), ', ', '<br>'); // Separated by commas with a line break at the end ?>

				<p><?php _e( 'Categorised in: ', 'html5blank' ); the_category(', '); // Separated by commas ?></p>

				<?php edit_post_link(); // Always handy to have Edit Post Links available ?>


			</article>
			<!-- /article -->

		<?php endwhile; ?>

		<?php else: ?>

			<!-- article -->
			<article class="article">
				<h1 class="article_title"><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h1>
			</article>
			<!-- /article -->

		<?php endif; ?>

			</div>
			<div class="col-4">
				<?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebar')) ?>
			</div>
		</div>
	</div>
</div>
<?php get_sidebar(); ?>

<?php get_footer(); ?>
