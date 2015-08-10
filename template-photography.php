<?php 
/*
 * Template Name: Photography Category page
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
					<?php if ( has_post_thumbnail() ) { ?><figure><?php the_post_thumbnail( $thumbSize ); ?><figcaption><?php the_post_thumbnail_caption(); ?></figcaption></figure><?php } ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<?php diamonds_page_icon(); ?>
					<header>
						<h2><a href="<?php the_permalink(); ?>" title="<?php esc_attr_e( 'For More Info on ' ); the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
					</header>
					<div class="column full no-float">
						<?php the_content(); ?>
						<?php wp_link_pages( array(
							'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'diamonds' ) . '</span>',
							'after'       => '</div>',
							'link_before' => '<span>',
							'link_after'  => '</span>',
							) );
						?>
					</div>
					<footer class="column fourth">
						<p><?php $edit = __( 'Edit this post', 'diamonds'  ); edit_post_link( $edit ); ?></p>
					</footer>
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