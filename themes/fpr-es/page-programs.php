<?php
/*
Template Name: Programs Page
*/
?>
<?php get_header(); ?>


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

		<?php
		// Set up the objects needed
		$my_wp_query = new WP_Query();
		$all_wp_pages = $my_wp_query->query(array('post_type' => 'page', 'orderby' => 'menu_order'));

		// Filter through all pages and find Portfolio's children
		//$programs = get_page_children( $post->ID, $all_wp_pages );
		$params = array(
		    'post_type'=>'page',
		    'post_parent'=>$post->ID,
		    'depth'=>'1',
		    'orderby'=>'menu_order',
		    'order'=>'ASC'
		);
		$programs = query_posts($params);
		?>

		<?php foreach ( $programs as $program ) : ?>
			<div class="col-6">
				<div class="page_subtitle">
					<h1 class="page_subtitle-inner"><?php echo $program->post_title; ?></h1>
				</div>

				<p><?php echo get_post_meta($program->ID, 'program-summary', true); ?></p>
				
				<div class="image-text">
					<a href="<?php echo get_permalink( $program->ID ); ?>">
						<div class="image-text_inner">
							<?php if (has_post_thumbnail( $program->ID ) ): ?>
								<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $program->ID ), 'single-post-thumbnail' ); ?>
								<img src="<?php echo $image[0]; ?>" alt="" class="image-text_image">
							<?php endif; ?>
							<div class="image-text_content">
								<div class="image-text_title">
									<?php echo $program->post_title; ?>
								</div>
								<div class="image-text_subtitle">
									Read more
								</div>
							</div>
						</div>
					</a>
				</div>	
			</div>
		<?php endforeach;?>

		</div>
	</div>
</div>

<div class="panel panel--primary">
	<div class="panel_inner">
		<div class="row">

		<div class="page_subtitle">
			<h1 class="page_subtitle-inner">Proximos eventos</h1>
		</div>

			<div class="box article">
				<div class="box_inner">

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
										<div class="date_month"><?php echo $miesiac_pl[$event_date->format('m')]; ?></div>
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
						<a href="<?php echo get_permalink( 71 ); ?>" class="btn-primary">Todos los eventos</a>
					</div>

				</div>
			</div>


		</div>
	</div>
</div>



<?php get_sidebar(); ?>

<?php get_footer(); ?>