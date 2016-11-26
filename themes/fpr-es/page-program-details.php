<?php
/*
Template Name: Program Details Page
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

<?php if (have_posts()): while (have_posts()) : the_post(); ?>

<div class="panel">
	<div class="panel_inner">
		<div class="row">
			<div class="col-4">
				<?php if (has_post_thumbnail( $post->ID ) ): ?>
					<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
					<img src="<?php echo $image[0]; ?>" alt="" class="icon-img">
				<?php endif; ?>
				<?php echo get_post_meta($post->ID, 'program-extras', true); ?>
			</div>

			<div class="col-8">

				<h2><?php echo get_post_meta($post->ID, 'program-heading', true); ?></h2>
				<?php the_content(); ?>

			</div>
		</div>
	</div>
</div>

<div class="panel panel--primary">
	<div class="panel_inner">
		
		<div class="testimonial">
			<div class="testimonial_inner">
				<div class="testimonial_content">
					<?php echo get_post_meta($post->ID, 'program-testimonial-text', true); ?>
				</div>

				<div class="testimonial_author">
					<?php echo get_post_meta($post->ID, 'program-testimonial-author', true); ?>
				</div>
			</div>
		</div>

	</div>
</div>

<?php endwhile; ?>
<?php endif; ?>


<?php get_sidebar(); ?>

<?php get_footer(); ?>