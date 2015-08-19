<!doctype html>
<!--[if lte IE 9 ]>    <html class="old-ie no-js" lang="en"> <![endif]-->
<!--[if gt IE 9 ]> <html class="no-js" lang="en"> <![endif]-->
<!--[if !IE]>-->   <html <?php language_attributes(); ?> class="no-js"> <!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<title><?php wp_title( ' | ' ); ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="<?php echo bloginfo( 'stylesheet_url' ); ?>" rel="stylesheet" media="screen">
<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" />
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<header id="page-header" <?php $header_image = get_header_image(); if ( !empty( $header_image ) ) { ?> style="min-height: <?php echo get_custom_header()->height; ?>px;" <?php } ?>>
		<div class="grid">
			<a class="col-1-2" href="<?php echo esc_url( home_url( '/' ) ); ?>" 
				<?php if ( !empty( $header_image ) ) { ?>
					style="background:url('<?php header_image(); ?>') no-repeat;height: <?php echo get_custom_header()->height; ?>px;width: <?php echo get_custom_header()->width; ?>px;max-width: 1080px;" 
				<?php } ?>>
				<h1 <?php if ( !empty( $header_image ) && !display_header_text() ) { ?>style="position: absolute;left:-3000em;"<?php } elseif ( header_textcolor() ) { ?> style="color:#<?php header_textcolor();?>;" 
				<?php } ?>>
					<?php bloginfo( 'name' ); ?>&nbsp;<em><?php bloginfo( 'description' ); ?></em>
				</h1>
			</a>
			<div class="col-1-2 reverse">
			<?php 
			$main_menu_header = array(
				'theme_location' => 'main-nav',
				'container' => 'nav',
				'container_class' => 'reverse',
				'items_wrap' => '<ul id="menu-main" class="%2$s horiz clearfix reverse">%3$s</ul>',
				'depth' => 1
				);
			?>
			<?php wp_nav_menu( $main_menu_header ); ?>
			
			<?php $social_media = array(
				'theme_location'  => 'social-media',
				'container'       => 'div',
				'container_id'    => 'social',
				'container_class' => 'reverse',
				'menu_class'      => 'sm',
				'fallback_cb'     => false,
				'items_wrap'      => '<ul id="%1$s" class="%2$s clearfix horiz">%3$s</ul>',
				'depth'           => 1,
			);
			wp_nav_menu( $social_media );
			?>
			</div>
		</div>
	</header>
	<div class="wrapper grid">
		<div id="top" class="grid">
			<?php if ( the_breadcrumb() ) { ?><div class="col-2-3 breadcrumbs"><?php the_breadcrumb(); ?></div><?php } ?>
			<div class="col-1-3 reverse search"><?php get_search_form(); ?></div>
		</div>
		<div class="grid clearfix">
		<?php diamonds_front_page_gallery(); ?>
		<?php if ( diamonds_submenu() ) { get_sidebar( 'header' ); } ?>
		<?php global $cols; global $mainWidth; global $thumbSize; global $page_icon;			
			$cols = new diamondsFlexCol();
			$mainWidth = $cols->_maincol_width;
			$thumbSize = $cols->_size;
		?>