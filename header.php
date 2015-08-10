<!doctype html>
<!--[if lte IE 9 ]>    <html class="old-ie no-js" lang="en"> <![endif]-->
<!--[if gt IE 9 ]> <html class="no-js" lang="en"> <![endif]-->
<!--[if !IE]>-->   <html <?php language_attributes(); ?> class="no-js"> <!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<title><?php wp_title( '|' ); ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="<?php echo bloginfo( 'stylesheet_url' ); ?>" rel="stylesheet" media="screen">
<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" />
<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
	<div class="wrapper">
		<header<?php $header_image = get_header_image(); if ( !empty( $header_image) ) { ?> style="min-height: <?php echo get_custom_header()->height; ?>px;" <?php } ?>>
			<div>
				
				<a class="column half" href="<?php echo esc_url( home_url( '/' ) ); ?>" 
					<?php if ( ! empty( $header_image ) ) { ?>
						style="background:url('<?php header_image(); ?>') no-repeat;height: <?php echo get_custom_header()->height; ?>px;width: <?php echo get_custom_header()->width; ?>px;max-width: 1080px;" 
					<?php } ?>>
					<h1 <?php if ( ! empty( $header_image ) && ! display_header_text() ) { ?>style="position: absolute;left:-3000em;"<?php } elseif (header_textcolor()) { ?> style="color:#<?php header_textcolor();?>;" 
					<?php } ?>>
						<?php bloginfo( 'name' ); ?>&nbsp;<em><?php bloginfo( 'description' ); ?></em>
					</h1>
				</a>
				<div class="column half reverse">
				<?php 
				$main_menu_header = array(
					'theme_location' => 'main-nav',
					'container' => 'nav',
					'container_class' => 'column reverse',
					'items_wrap' => '<ul id="menu-main" class="%2$s horiz column reverse">%3$s</ul>',
					'depth' => 1
					);
				?>
				<?php wp_nav_menu( $main_menu_header ); ?>
				
				<?php $social_media = array(
					'theme_location'  => 'social-media',
					'menu' 			  => 'links',
					'container'       => 'div',
					'container_id'    => 'social',
					'container_class' => 'column reverse',
					'menu_class'      => 'sm',
					'fallback_cb'     => false,
					'items_wrap'      => '<ul id="%1$s" class="%2$s horiz column">%3$s</ul>',
					'depth'           => 1,
				);
				wp_nav_menu( $social_media );
				?>
				</div>
			</div>
		</header>
		<main>
			<div id="top" class="row clearfix">
				<div class="column two-thirds breadcrumbs"><?php the_breadcrumb(); ?></div>
				<div class="column third reverse search"><?php get_search_form(); ?></div>
			</div>
			<div class="row clearfix">
			
			<?php diamonds_front_page_gallery(); ?>
				<?php if ( diamonds_submenu() ) { get_sidebar( 'header' ); } ?>