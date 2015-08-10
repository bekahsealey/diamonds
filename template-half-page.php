<?php
/*
 * Template Name: Half Width - No Sidebars
 */
 get_header(); ?>
	<div class="column half no-float">
		<?php if (have_posts() ) : while ( have_posts() ) : the_post(); ?>
					<?php if ( has_post_thumbnail() ) { ?><figure><?php the_post_thumbnail( 'half-page' ); ?><figcaption><?php the_post_thumbnail_caption(); ?></figcaption></figure><?php } ?>
			<section class="row clearfix">
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<?php diamonds_page_icon(); ?>
					<header>
						<h2><a href="<?php the_permalink(); ?>" title="<?php esc_attr_e( 'For More Info on ' ); the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
					</header>
					<ul class="meta column fourth">
						<li><?php _e( 'Written by ', 'diamonds' ); the_author_posts_link(); ?></li>
						<?php $open = comments_open(); if ( $open == true ) { ?><li><a href="<?php comments_link(); ?>"><?php $nocomment = __( 'Be the first to comment', 'diamonds'  ); $onecomment = __( 'Only one comment', 'diamonds'  ); $manycomments = __( '% comments', 'diamonds'  ); comments_number( $nocomment, $onecomment, $manycomments ); ?></a></li><?php } ?>
						<li><?php $edit = __( 'Edit this post', 'diamonds'  ); edit_post_link( $edit ); ?></li>
					</ul>
					<div class="column three-quarters reverse">
						<?php the_content(); ?>
						<?php wp_link_pages( array(
							'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'diamonds' ) . '</span>',
							'after'       => '</div>',
							'link_before' => '<span>',
							'link_after'  => '</span>',
							) );
						?>
					</div>
					<footer class="column fourth"></footer>
				</article>
			</section><!-- /row -->
	
			<section class="row clearfix">
				<div class="comments column full no-float">
					<?php $open = comments_open(); if ($open == true) { comments_template( '', true ); } ?>
				</div><!-- comments-->
			</section>
		<?php endwhile; else: ?>
			<p><?php _e( 'Sorry, no posts matched your criteria.', 'diamonds' ); ?></p>
		<?php endif; ?>
		
	</div>
<?php get_footer(); ?>