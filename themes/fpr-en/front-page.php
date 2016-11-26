<?php get_header(); ?>

					<div class="banner">
						<div class="banner_inner">
							<div class="banner_caption">
								<div class="banner_title">Happy relationships don't grow on trees</div>
								<div class="banner_subtitle">Inspire your Marriage!</div>
							</div>
							<div class="banner_cta">
								<a href="<?php echo get_permalink( 11 ); ?>" class="btn-primary">Donate</a>
								<a href="<?php echo get_permalink( 3777 ); ?>" class="btn-secondary">Get Involved</a>
							</div>
							<div class="banner_language footer_language">
								<a href="http://fpr.pl" class="language-pl">Polski</a>
								<a href="http://loveandlifeprograms.org/" class="language-en">English</a>
							</div>
						</div>
					</div>

					<div class="panel">
						<div class="panel_inner">

							<div class="row">

								<div class="col-4">
									
									<div class="box box--primary">
										<div class="box_inner">
											<div class="box_image">
												<div class="icon fa <?php echo get_post_meta($post->ID, 'box_1_icon', true); ?>"></div>
											</div>
											<div class="box_content">
												<h2 class="alpha"><?php echo get_post_meta($post->ID, 'box_1_title', true); ?></h2>
												<p><?php echo get_post_meta($post->ID, 'box_1_description', true); ?></p>
												<p><a href="<?php echo get_permalink( get_post_meta($post->ID, 'box_1_link', true) ); ?>">Read more</a></p>
											</div>
										</div>
									</div>

								</div>

								<div class="col-4">
									
									<div class="box box--primary">
										<div class="box_inner">
											<div class="box_image">
												<div class="icon fa <?php echo get_post_meta($post->ID, 'box_2_icon', true); ?>"></div>
											</div>
											<div class="box_content">
												<h2 class="alpha"><?php echo get_post_meta($post->ID, 'box_2_title', true); ?></h2>
												<p><?php echo get_post_meta($post->ID, 'box_2_description', true); ?></p>
												<p><a href="<?php echo get_permalink( get_post_meta($post->ID, 'box_2_link', true) ); ?>">Read more</a></p>
											</div>
										</div>
									</div>

								</div>


								<div class="col-4">
									
									<div class="box box--primary">
										<div class="box_inner">
											<div class="box_image">
												<div class="icon fa <?php echo get_post_meta($post->ID, 'box_3_icon', true); ?>"></div>
											</div>
											<div class="box_content">
												<h2 class="alpha"><?php echo get_post_meta($post->ID, 'box_3_title', true); ?></h2>
												<p><?php echo get_post_meta($post->ID, 'box_3_description', true); ?></p>
												<p><a href="<?php echo get_permalink( get_post_meta($post->ID, 'box_3_link', true) ); ?>">Read more</a></p>
											</div>
										</div>
									</div>

								</div>
							</div>
						</div>
					</div>
					
					<div class="panel panel--primary">
						<div class="panel_inner">
							
							
								<div class="row">
									<div class="col-4">

										<div class="box article">
											<div class="box_inner">

												<h2>News & Blog</h2>

												<?php $the_query = new WP_Query( 'showposts=2' ); ?>
												<?php while ($the_query -> have_posts()) : $the_query -> the_post(); ?>
													<div class="media">
														<?php $categories = get_the_category(); ?>
														<a href="<?php the_permalink() ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/blog/<?php echo $categories[0]->cat_ID; ?>.jpg" alt="" class="media_object article_img article_img--small"></a>
														<div class="media_body">
															<h3 class="article_title gamma"><?php the_title(); ?></h3>
															<div class="article_subtitle"><?php the_time('F j, Y'); ?> <?php the_time('g:i a'); ?></div>
															<div class="article_summary">
																<?php the_excerpt(__('(more…)')); ?>
															</div>
															
											
															<div><a href="<?php the_permalink() ?>">Read more</a></div>
														</div>
													</div>
												<?php endwhile;?>
												<div class="article_cta">
													<a href="<?php get_category_link( 3734 ); ?>" class="btn-primary">All News</a>
												</div>

											</div>
										</div>
										
									</div>
									<div class="col-4">
									
										<div class="box article">
											<div class="box_inner">
												<h2>Follow us on YouTube</h2>
												<div id="youtube-channel">

												</div>
												<div class="article_cta">
													<a href="https://www.youtube.com/channel/UC0ek4TRBSJuwmMetApF4UHA" target="_blank" class="btn-primary">Watch More</a>
												</div>

											</div>
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


				
				<div style="background: #d3d3d3;">
					<?php get_sidebar(); ?>
				</div>

<?php get_footer(); ?>