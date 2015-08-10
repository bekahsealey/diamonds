<?php 
/*
 * Template Name: No Author Info
 */
 get_header(); ?>
<?php 
	$cols = new diamondsFlexCol();
	$mainWidth = $cols->_maincol_width;
	$thumbSize = $cols->_size;
	$cols->diamonds_flex( 'left' );
?>
	<div id="main" class="column <?php echo $mainWidth; ?>">
		<?php if (have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<section class="row clearfix">
					<?php if ( has_post_thumbnail() ) { ?><figure><?php the_post_thumbnail( $thumbSize ); ?></figure><?php } ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<?php diamonds_page_icon(); ?>
					<header>
						<h2><a href="<?php the_permalink(); ?>" title="<?php esc_attr_e( 'For More Info on ' ); the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
					</header>
					<ul class="meta column fourth">
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
	
			
			<?php $open = comments_open(); if ($open == true) { ?>
				<section class="row clearfix">
					<div class="comments column full no-float">
						 <?php comments_template( '', true ); ?>
					</div><!-- comments-->
				</section>
			<?php } ?>
		<?php endwhile; else: ?>
			<p><?php _e( 'Sorry, no posts matched your criteria.', 'diamonds' ); ?></p>
		<?php endif; ?>
		
	</div>
<?php 
	$cols->diamonds_flex( 'right' );  
?>
<?php get_footer(); ?>