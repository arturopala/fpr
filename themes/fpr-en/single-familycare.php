<?php
/*
Template Name: Full Page
*/
?>
<?php get_header(); ?>

<div class="panel panel--primary">
	<div class="panel_inner">
		<div class="page_title">
			<h1 class="page_title-inner"><?php the_title(); ?></h1>
		</div>
	</div>
</div>

<div class="panel">
	<div class="panel_inner">
		<div class="row">
			<div class="col-12">
			<div class="article-list article-list--short">
			
				<div class="article">
					<h3 class="article_title"><?php echo get_post_meta($post->ID, 'familycare-name', true); ?></h3>
					<div class="article_subtitle"><?php echo get_post_meta($post->ID, 'familycare-contacts', true); ?></div>
					<div class="article_summary">
						<?php the_content(); ?>
						<?php if (get_post_meta($post->ID, 'familycare-website', true) != '') : // Check if Thumbnail exists ?>
							<a href="<?php echo get_post_meta($post->ID, 'familycare-website', true); ?>"><?php echo get_post_meta($post->ID, 'familycare-website', true); ?></a>
						<?php endif; ?>
						<?php if ( get_post_meta($post->ID, 'familycare-email', true) != '') : // Check if Thumbnail exists ?>
							<a href="mailto:<?php echo get_post_meta($post->ID, 'familycare-email', true); ?>"><?php echo get_post_meta($post->ID, 'familycare-email', true); ?></a>
						<?php endif; ?>
						
						
					</div>
				</div>
			
			</div>
			</div>
			<div class="col-12">
				<div class="rich-text">
					<?php if (have_posts()): while (have_posts()) : the_post(); ?>

						<!-- article -->
						<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

							<?php the_content(); ?>


							<br class="clear">

							<?php edit_post_link(); ?>

						</article>
						<!-- /article -->
						<?php
						if( function_exists( 'ninja_forms_display_form' ) ){ ninja_forms_display_form( 2 ); }
						?>

					<?php endwhile; ?>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
