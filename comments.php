<?php
/**
 * @package WordPress
 * @subpackage Theme_Compat
 * @deprecated 3.0
 *
 * This file is here for Backwards compatibility with old themes and will be removed in a future version
 *
 */
_deprecated_file( sprintf( __( 'Theme without %1$s', 'diamonds' ), basename(__FILE__) ), '3.0', null, sprintf( __('Please include a %1$s template in your theme.', 'diamonds'), basename(__FILE__) ) );

// Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if ( post_password_required() ) { ?>
		<p class="nocomments"><?php _e('This post is password protected. Enter the password to view comments.', 'diamonds'); ?></p>
	<?php
		return;
	}
?>

<!-- You can start editing here. -->
<?php if ( is_singular() ) wp_enqueue_script( "comment-reply" ); ?>
<?php if ( have_comments() ) : ?>
	<h3 id="comments"><?php	printf( _n( 'One Response to %2$s', '%1$s Responses to %2$s', get_comments_number() ),
									number_format_i18n( get_comments_number() ), '&#8220;' . get_the_title() . '&#8221;' ); ?></h3>

	<section class="navigation row clearfix">
		<div class="alignleft"><?php previous_comments_link() ?></div>
		<div class="alignright"><?php next_comments_link() ?></div>
	</section>

	<ol class="commentlist">
	<?php wp_list_comments( array( 'avatar_size' => '60' ) );?>
	</ol>

	<section class="navigation row clearfix">
		<div class="alignleft"><?php previous_comments_link() ?></div>
		<div class="alignright"><?php next_comments_link() ?></div>
	</section>
 <?php else : // this is displayed if there are no comments so far ?>

	<?php if ( comments_open() ) : ?>
		<!-- If comments are open, but there are no comments. -->

	 <?php else : // comments are closed ?>
		<!-- If comments are closed. -->
		<p class="nocomments"><?php _e('Comments are closed.', 'diamonds'); ?></p>

	<?php endif; ?>
<?php endif; ?>

<?php if ( comments_open() ) : ?>

<section class="row clearfix respond">

<?php comment_form(); ?>
</section>

<?php endif; // if you delete this the sky will fall on your head ?>
