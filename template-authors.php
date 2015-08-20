<?php
/*
 * Template Name: Authors
 */
 get_header(); ?>
		<main class="col-1-1">
			<?php if (have_posts() ) : while ( have_posts() ) : the_post(); ?>
					<?php if ( has_post_thumbnail() ) { ?><figure><?php the_post_thumbnail( 'page' ); ?><figcaption><?php the_post_thumbnail_caption(); ?></figcaption></figure><?php } ?>
			<?php get_template_part( 'content', 'page' ); ?>
			<?php endwhile; else: ?>
				<p><?php _e( 'Sorry, no posts matched your criteria.', 'diamonds' ); ?></p>
			<?php endif; ?>
		<?php if ( get_users() ) { ?>
			<?php $author_query = new WP_User_Query(array ( 'orderby' => 'post_count', 'order' => 'DESC' ) );
				if ( ! empty( $author_query->results ) ) {
		foreach ( $author_query->results as $author ) { ?>
					
					<hr>
						<aside id="author-<?php echo $author->ID; ?>" class="grid author author-<?php echo $author->ID; ?>">
						
							<header>
								<a href="<?php echo get_author_posts_url( $author->ID ); ?>" title="<?php esc_attr_e( 'For More Posts by ' ); echo $author->display_name; ?>"><h2><?php echo $author->first_name && $author->last_name ? $author->first_name.' '.$author->last_name: $author->display_name; ?></h2></a>
								<h5 class="subheading"><?php echo $author->user_title; ?></h5>
							</header>
							<div class="col-3-4 reverse">
							<div class="diamond-box-wrap">
								<div class="diamond-box">
								<div class="diamond-box-inner">
								<?php if ( $author->user_picture ) { ?><img src="<?php echo $author->user_picture.'-250x250.jpg'; ?>"><?php } else { echo get_avatar( $author->user_email, '250', 'mm', 'Avatar of '.$author->first_name.' '.$author->last_name ); } ?>
								</div>
								</div>
								</div>
					<div class="row0"></div>
					<div class="row1"></div>
					<div class="row0"></div>
					<div class="row2"></div>
					<div class="row0"></div>
					<div class="row3"></div>
					<div class="row0"></div>
					<div class="row4"></div>
					<div class="row0"></div>
					<div class="row5"></div>
					<div class="row0"></div>
					<div class="row5"></div>
					<div class="row0"></div>
					<div class="row6"></div>
					<div class="row0"></div>
					<div class="row7"></div>
					<div class="row0"></div>
					<div class="row8"></div>
					<div class="row0"></div>
					<div class="row9"></div>
					<div class="row0"></div>
					<div class="row10"></div>
					<div class="row0"></div>
					<div class="row11"></div>
								<?php $description = apply_filters( 'the_content', $author->description );
								$description = str_replace( ']]>', ']]&gt;', $description ); ?>
								<?php echo $description; ?>
							</div>
							<footer class="col-1-4">
								
								<ul class="meta">
									<li>Email: <a href="mailto:<?php echo $author->user_email; ?>"><?php echo $author->display_name; ?></a></li>
									<li>Homepage: <?php $url = $author->user_url ? $author->user_url : get_author_posts_url( $author->ID ); ?><a href="<?php echo $url; ?>"><?php echo $url; ?></a></li>
									<li>Follow <?php echo $author->display_name; ?> On:
										<ul>
									<?php $contacts = wp_get_user_contact_methods(); 
									foreach ( $contacts as $contact => $value ) {
										if ( $author->$contact ) {
									?>
										<li><a class="icon icon-<?php echo strtolower( $value ); ?>" $href="<?php echo $author->$contact; ?>"><?php echo $value; ?></a></li>
										
										<?php } ?>
									<?php } ?>
										</ul>
									<li><?php $edit = __( 'Edit user profile', 'diamonds'  ); ?><a href="<?php echo get_edit_user_link( $author->ID ); ?>"><?php echo $edit; ?></a></li>
								</ul>
							</footer>
						</aside><!-- /row -->	
			<?php } ?>
		<?php } else { ?>
			<p><?php _e( 'Sorry, there are no users.', 'diamonds' ); ?></p>
		<?php } ?>
	<?php } ?>
		</main>	
<?php get_footer(); ?>