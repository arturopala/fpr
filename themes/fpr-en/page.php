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
			<div class="col-8">
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
			<div class="col-4">

				<div class="box article">
					<div class="box_inner">
						
						<h2>Upcomming events</h2>

						<?php 
						$today = date('Y-m-d');
						$args=array(
						   'post_type' => 'event',
						   'posts_per_page' => 3,
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
						<?php endwhile;?>

						<div class="article_cta">
							<a href="<?php echo get_permalink( 71 ); ?>" class="btn-primary">All Events</a>
						</div>

					</div>
				</div>

			</div>
		</div>
	</div>
</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
