<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>

		<link href="//www.google-analytics.com" rel="dns-prefetch">
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon.ico" rel="shortcut icon">
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/touch.png" rel="apple-touch-icon-precomposed">

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?php bloginfo('description'); ?>">

		<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,700' rel='stylesheet' type='text/css'>
		<link href="<?php echo get_template_directory_uri(); ?>/style.css" rel="stylesheet" type="text/css">
		<?php wp_head(); ?>

	</head>
	<body <?php body_class(); ?>>
		<div class="fpr-page">
			<div class="page_inner">
				<div class="header">
					<div class="header_inner">

						<a href="/" class="header_logo"><img src="<?php echo get_template_directory_uri(); ?>/build/img/fpr-logo.png" alt="FPR - Centros de Apoyo a la familia"></a>

						<div class="header_nav">
							<div class="nav">
								<a href="#menu" class="nav_mobile js-mobile-nav-trigger"><span class="fa fa-reorder"></span> Menu</a>
								<div class="nav_inner">
									<?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>
								</div>
							</div>
						</div>

					</div>
				</div>

				<div class="page_content">