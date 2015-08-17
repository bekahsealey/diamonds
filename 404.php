<?php get_header(); ?>
		<?php $cols->diamonds_flex( 'left' ); ?>
		<main class="col-<?php echo $mainWidth; ?>">
			<figure><img src="<?php echo get_template_directory_uri() . '/images/404.jpg' ?>"><figcaption>Not Found</figcaption></figure>
			<section class="post-wrap clearfix">
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<?php diamonds_page_icon(); ?>
					<header>
						<h2>Well, this is unexpected!</h2>
					</header>
					<div>
						<p>You've stumbled on something that doesn't exist!</p>
						<p>You could:</p>
						<ul>
							<li>Return <a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a>.</li>
							<li>Try a search.</li>
							<li>Or, use the links below to find other content.</li>
						</ul>
						<?php get_search_form(); ?>
					</div>
					<?php if ( is_active_sidebar( 'search-sidebar' )) {?>
					<hr>
					<section class="sidebar clearfix">
						<?php get_sidebar( 'search'); ?>
					</section>
					<?php } ?>
				</article>
			</section><!-- /row -->
		</main>	
		<?php $cols->diamonds_flex( 'right' ); ?>	
<?php get_footer(); ?>