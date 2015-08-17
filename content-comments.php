
			<?php $open = comments_open(); if ($open == true) { ?>
				<section class="clearfix">
					<div class="comments col-1-1 center">
						 <?php comments_template( '', true ); ?>
					</div><!-- comments-->
				</section>
			<?php } ?>