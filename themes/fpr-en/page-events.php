<?php
/*
Template Name: Events Page
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
		<div class="article-list">
		
		<?php 
		$today = date('Y-m-d');
		$args=array(
		   'post_type' => 'event',
		   'posts_per_page' => 25,
		   'meta_key' => 'event-date',
		   'meta_compare' => '>',
		   'meta_value' => $today,
		   'orderby' => 'event-date',
		   'order' => 'ASC',
		   'paged' => $paged
		);
		$the_query = new WP_Query($args);
		?>

		<?php while ($the_query -> have_posts()) : $the_query -> the_post(); ?>
			<div class="article">
				<div class="media">
					<a href="<?php the_permalink() ?>">
						<div class="media_object">
							<div class="date">
								<?php 
									$event_date = new DateTime(get_post_meta($post->ID, 'event-date', true));
								?>
								<div class="date_day"><?php echo $event_date->format('d'); ?></div>
								<div class="date_month"><?php echo $event_date->format('M'); ?></div>
								<div class="date_year"><?php echo $event_date->format('Y'); ?></div>
							</div>
						</div>
						
						<div class="media_body">
							<h3 class="article_title  gamma"><?php the_title(); ?></h3>
							<div class="article_subtitle"><?php echo get_post_meta($post->ID, 'event-date-text', true); ?></div>
							<p class="article_summary">
								<?php the_excerpt(__('(more…)')); ?>
							</p>
						</div>
					</a>
				</div>
			</div>
		<?php endwhile;?>
		</div>
		<?php get_template_part('pagination'); ?>
	</div>
</div>

<div class="panel panel--primary">
	<div class="panel_inner">
		<div class="page_subtitle">
			<h1 class="page_subtitle-inner">Past events</h1>
		</div>

		<div class="article-list">
		<?php 
		$today = date('Y-m-d');
		$args=array(
		   'post_type' => 'event',
		   'posts_per_page' => 5,
		   'meta_key' => 'event-date',
		   'meta_compare' => '<',
		   'meta_value' => $today,
		   'orderby' => 'event-date',
		   'paged' => $paged
		);
		$the_query = new WP_Query($args);
		?>
		<?php while ($the_query -> have_posts()) : $the_query -> the_post(); ?>
			<div class="article">
				<div class="media">
					<a href="<?php the_permalink() ?>">
						<div class="media_object">
							<div class="date">
								<?php 
									$event_date = new DateTime(get_post_meta($post->ID, 'event-date', true));
								?>
								<div class="date_day"><?php echo $event_date->format('d'); ?></div>
								<div class="date_month"><?php echo $event_date->format('M'); ?></div>
								<div class="date_year"><?php echo $event_date->format('Y'); ?></div>
							</div>
						</div>
						
						<div class="media_body">
							<h3 class="article_title  gamma"><?php the_title(); ?></h3>
							<div class="article_subtitle"><?php echo get_post_meta($post->ID, 'event-date-text', true); ?></div>
							<p class="article_summary">
								<?php the_excerpt(__('(more…)')); ?>
							</p>
						</div>
					</a>
				</div>
			</div>
		<?php endwhile;?>
		</div>
		<?php get_template_part('pagination'); ?>
	</div>
</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>