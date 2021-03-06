<?php get_header(); ?>
		<?php $cols->diamonds_flex( 'left' ); ?>
		<main class="col-<?php echo $mainWidth; ?>">
	<div class="grid clearfix">
		<section class="grid clearfix archive-header">
		<header>
			<h2 class="subheading">
			<?php _e( 'You are searching for: "' . get_search_query() . '"' ); ?>
			</h2>
		</header>
		</section>
	</div>
		<?php if (have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'content', 'archive' ); ?>
		<?php endwhile; else: ?>
			<p><?php _e( 'Sorry, no posts matched your criteria.', 'diamonds' ); ?></p>
		<?php endif; ?>
				<div class="grid clearfix">
					<div class="paginate col-1-1">
					<?php if( $wp_query->max_num_pages > 1 ) { ?>
						<div id="pagination">
							<?php diamonds_paginate(); ?>
						</div><!-- .pagination -->
					<?php } ?>
					</div>
				</div><!-- /row -->
		</main>	
		<?php $cols->diamonds_flex( 'right' ); ?>	
<?php get_footer(); ?>