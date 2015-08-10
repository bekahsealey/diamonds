	</div>
		</main>
		<footer>
			<section id="footer-sidebar">
				<?php get_sidebar(); ?>
			</section>
			<section id="footer-meta">
				<div class="row clearfix">
					<div class="column half"><?php echo current_copyright(); ?><?php bloginfo( 'name' ); ?></div>
					<div class="column half brand"><?php _e('Designed by ', 'diamonds'); $my_theme = wp_get_theme(); ?> <a href="<?php echo $my_theme->get( 'ThemeURI' ) ?>">Rebekah Sealey</a></div>
					
				</div>
			</section>
		</footer>
	</div>
	<?php wp_footer(); ?>
</body>
</html>