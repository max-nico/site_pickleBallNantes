<?php ?>
	<div class="col-lg-3 col-md-3 col-sm-12">
	<?php if ( is_active_sidebar( 'woo-sidebar' ) ) : ?>
		<div class="sidebar">
			<?php dynamic_sidebar( 'woo-sidebar' ); ?>
		</div>
	<?php endif; ?>
</div>

</div><!-- #content -->