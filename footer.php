		</div>
	</div> <!-- @end wrapper grid -->
	<footer id="page-footer">
		<div id="footer-sidebar">
			<?php get_sidebar(); ?>
		</div>
		<div id="footer-meta">
			<div class="grid clearfix">
				<div class="col-2-3"><?php echo current_copyright(); ?><?php bloginfo( 'name' ); ?></div>
				<div class="col-1-3 reverse brand"><?php _e('Designed by ', 'diamonds'); $my_theme = wp_get_theme(); ?> <a href="<?php echo $my_theme->get( 'ThemeURI' ) ?>">Rebekah Sealey</a></div>
				
			</div>
		</div>
	</footer>
	<?php wp_footer(); ?>
</body>
</html>
		