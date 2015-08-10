<?php get_header(); ?>
<?php 
	$cols = new diamondsFlexCol();
	$mainWidth = $cols->_maincol_width;
	$thumbSize = $cols->_size;
	$cols->diamonds_flex( 'left' );
?>
	<div id="main" class="column <?php echo $mainWidth; ?>">
		<?php if (have_posts() ) : while ( have_posts() ) : the_post(); ?>
					<?php get_template_part( 'format', get_post_format() ); ?>
					<section class="clearfix">
						<nav id="pagi" class="clearfix">
							<ul>
								<?php previous_post_link( '<li><span class="previous">%link</span></li>', 'Before' ); ?>
								<?php next_post_link( '<li><span class="next">%link</span></li>', 'After' ); ?>
							</ul>
						</nav><!-- .pagination -->
					</section>
	
			<section class="row clearfix">
				<div class="comments column full no-float">
					<?php comments_template( '', true ); ?>
				</div><!-- comments-->
			</section>
		<?php endwhile; else: ?>
			<p><?php _e( 'Sorry, no posts matched your criteria.', 'diamonds' ); ?></p>
		<?php endif; ?>
	</div>
<?php 
	$cols->diamonds_flex( 'right' );  
?>
<?php get_footer(); ?>