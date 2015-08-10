<?php
if ( is_active_sidebar( 'header-sidebar' ) ) { ?>
<div class="clearfix header-sidebar">
	<div>
		<?php dynamic_sidebar( 'Header' ); ?>
	</div>
</div><!-- /row -->
<?php } ?>