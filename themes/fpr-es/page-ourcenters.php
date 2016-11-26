<?php
/*
Template Name: Our Centers Page
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
			<div class="rich-text">
			<?php if (have_posts()): while (have_posts()) : the_post(); ?>



								<?php the_content(); ?>

				<?php endwhile; ?>
				<?php endif; ?>
			</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	var familyCareCenters = [
		<?php $the_query = new WP_Query( array('post_type' => 'familycare', 'orderby' => 'menu_order') ); ?>
		<?php while ($the_query -> have_posts()) : $the_query -> the_post(); ?>
			<?php $location = get_post_meta($post->ID, 'familycare-location', true); ?>
		{
			location: '<?php echo get_post_meta($post->ID, 'familycare-name', true); ?>',
			people: '<?php echo get_post_meta($post->ID, 'familycare-contacts', true); ?>',
			description: '',
			email: '<?php echo get_post_meta($post->ID, 'familycare-email', true); ?>',
			web: '<?php echo get_post_meta($post->ID, 'familycare-website', true); ?>',
			lat: '<?php echo $location['lat']; ?>',
			lng: '<?php echo $location['lng']; ?>'
		},
		<?php endwhile;?>
    	];
</script>


<div class="panel panel--primary">
	<div class="panel_inner">

		<div class="row">
			<div class="col-4">
			<div class="article-list article-list--short">
			<?php while ($the_query -> have_posts()) : $the_query -> the_post(); ?>
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
						<div>
							<a href="<?php the_permalink() ?>">More</a>
						</div>
						
					</div>
				</div>
			<?php endwhile;?>
			</div>

			</div>
			<div class="col-8">
				<div id="map-canvas" class="map" style="height: 400px;"></div>
			</div>
		</div>

	</div>
</div>





<?php //TODO: workout how to pull it to footer ?>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCWrfPMggfLjUnyd5Jljm5311t-T8npOtE"></script>

<?php get_sidebar(); ?>

<?php get_footer(); ?>