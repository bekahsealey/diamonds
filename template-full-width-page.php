<?php
/*
 * Template Name: Full Width - No Sidebars
 */
 get_header(); ?>
		<main class="col-1-1">
			<?php if (have_posts() ) : while ( have_posts() ) : the_post(); ?>
					<?php if ( has_post_thumbnail() ) { ?><figure><?php the_post_thumbnail( 'page' ); ?><figcaption><?php the_post_thumbnail_caption(); ?></figcaption></figure><?php } ?>
			<?php get_template_part( 'content', 'page' ); ?>
			<?php $open = comments_open(); if ($open == true) { ?>
				<section class="grid clearfix">
					<div class="comments col-1-1 no-float">
						 <?php comments_template( '', true ); ?>
					</div><!-- comments-->
				</section>
			<?php } ?>
			<?php endwhile; else: ?>
				<p><?php _e( 'Sorry, no posts matched your criteria.', 'diamonds' ); ?></p>
			<?php endif; ?>
		</main>	
<?php get_footer(); ?>