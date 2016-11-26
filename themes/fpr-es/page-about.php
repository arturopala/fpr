<?php
/*
Template Name: About Page
*/
?>
<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<div class="panel panel--primary">
	<div class="panel_inner">
		<div class="page_title">
			<h1 class="page_title-inner"><?php the_title() ?></h1>
		</div>
	</div>
</div>

<div class="panel">
	<div class="panel_inner">
		<div class="row">
			<div class="col-5">
				<img src="<?php echo get_template_directory_uri(); ?>/build/img/fpr-team.jpg" class="icon-img">
			</div>
			<div class="col-7">
				<?php the_content(); ?>
				<p>
					<a href="<?php echo get_permalink( 3774 ); ?>" class="btn-primary">Our History</a>
				</p>
			</div>
		</div>
	</div>
</div>

<?php endwhile; ?>
<?php endif; ?>

<div class="panel panel--primary">
	<div class="panel_inner">
		<div class="page_subtitle">
			<h1 class="page_subtitle-inner">Our Mission</h1>
		</div>

		<div class="row">
			<div class="col-6">
				<div class="image-text">
					<a href=<?php echo get_permalink( 29 ); ?>>
						<div class="image-text_inner">
							<img src="<?php echo get_template_directory_uri(); ?>/build/img/loveandlife.jpg" class="image-text_image">
							<div class="image-text_content">
								<div class="image-text_subtitle">
									Programs
								</div>
								<div class="image-text_title">
									For married couples
								</div>
							</div>
						</div>
					</a>
				</div>
			</div>
			<div class="col-6">
				<div class="image-text">
					<a href="<?php echo get_permalink( 31 ); ?>">
						<div class="image-text_inner">
							<img src="<?php echo get_template_directory_uri(); ?>/build/img/joyandhope.jpg" class="image-text_image">
							<div class="image-text_content">
								<div class="image-text_subtitle">
									Programs
								</div>
								<div class="image-text_title">
									For Fiancés
								</div>
							</div>
						</div>
					</a>
				</div>									
			</div>
		</div>

		<div class="row">
			<div class="col-4">
				
				<?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('widget-area-1')) ?>

			</div>
			<div class="col-4">

				<?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('widget-area-2')) ?>

			</div>
			<div class="col-4">
				
				<?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('widget-area-3')) ?>

			</div>
		</div>
	</div>
</div>

<div class="panel">
	<div class="panel_inner">
		<div class="page_subtitle">
			<h1 class="page_subtitle-inner">Meet the Team</h1>
		</div>

		<div class="row">
			<?php $the_query = new WP_Query( array('post_type' => 'team', 'orderby' => 'menu_order') ); ?>
			<?php while ($the_query -> have_posts()) : $the_query -> the_post(); ?>
			
				<div class="col-6">
					<div class="media article">
						<div class="media_object">
							<img src="<?php echo wp_get_attachment_url(get_post_meta($post->ID, 'person-photo', true)); ?>" alt="" class="article_img">
						</div>
						<div class="media_body">
							<h3 class="article_title"><?php echo get_post_meta($post->ID, 'person-name', true); ?></h3>
							<h4 class="article_position"><?php echo get_post_meta($post->ID, 'person-title', true); ?></h4>
							<div class="article_content read-more">
								<?php the_content(); // Dynamic Content ?>
							</div>
						</div>
					</div>
				</div>
			<?php endwhile;?>
		</div>

	</div>
</div>

<div class="panel panel--primary">
	<div class="panel_inner">
		<div class="page_subtitle">
			<h1 class="page_subtitle-inner">Priests who cooperate with Love and Life Programs</h1>
		</div>

		<div class="row">
			<div class="col-6">
				<div class="video-wrapper">
					<iframe width="560" height="315" src="https://www.youtube.com/embed/0HiLZVgOGd4" frameborder="0" allowfullscreen></iframe>
				</div>
			</div>
			<div class="col-6">
				<div class="video-wrapper">
					<iframe width="560" height="315" src="https://www.youtube.com/embed/ATolW0PUvC8" frameborder="0" allowfullscreen></iframe>
				</div>
			</div>
		</div>
	</div>

</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>