<footer>
	<div class="footer">
		<?php if(get_theme_mod('insomnia_widget_footer', 'enable') == true)  { ?>
		<div class="footer-area-cont">
			<div class="container">
				<div class="row">
				  <?php $insomnia_widget_footer_count = get_theme_mod( 'insomnia_widget_footer_count', 'four'); ?>
				    <?php if ($insomnia_widget_footer_count == 'three'): ?>
					<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
						<div class="footer-widget">
							<?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
								<div class="footer-area">
									<?php dynamic_sidebar( 'footer-1' ); ?>
								</div>
							<?php else: ?>	
							<div class="footer-area">
								<h3 class="widget-title"><?php esc_html_e( 'Footer Sidebar 1', 'insomnia' ) ?></h3>
									<div class="textwidget"><?php esc_html_e( 'Insert your widget on "Footer widget 1" sidebar in Apperrance > Widgets', 'insomnia' ) ?></div>
								</div>
							<?php endif; ?>
						</div>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
						<div class="footer-widget">
							<?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
								<div class="footer-area">
									<?php dynamic_sidebar( 'footer-2' ); ?>
								</div>
							<?php else: ?>	
							<div class="footer-area">
								<h3 class="widget-title"><?php esc_html_e( 'Footer Sidebar 2', 'insomnia' ) ?></h3>
									<div class="textwidget"><?php esc_html_e( 'Insert your widget on "Footer widget 2" sidebar in Apperrance > Widgets', 'insomnia' ) ?></div>
								</div>
							<?php endif; ?>
						</div>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
						<div class="footer-widget">
							<?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
								<div class="footer-area">
									<?php dynamic_sidebar( 'footer-3' ); ?>
								</div>
							<?php else: ?>	
							<div class="footer-area">
								<h3 class="widget-title"><?php esc_html_e( 'Footer Sidebar 3', 'insomnia' ) ?></h3>
									<div class="textwidget"><?php esc_html_e( 'Insert your widget on "Footer widget 3" sidebar in Apperrance > Widgets', 'insomnia' ) ?></div>
								</div>
							<?php endif; ?>
						</div>
					</div>
     				<?php elseif ($insomnia_widget_footer_count == 'four'): ?>
					<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<div class="footer-widget">
							<?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
								<div class="footer-area">
									<?php dynamic_sidebar( 'footer-1' ); ?>
								</div>
							<?php else: ?>	
							<div class="footer-area">
								<h3 class="widget-title"><?php esc_html_e( 'Footer Sidebar 1', 'insomnia' ) ?></h3>
									<div class="textwidget"><?php esc_html_e( 'Insert your widget on "Footer widget 1" sidebar in Apperrance > Widgets', 'insomnia' ) ?></div>
								</div>
							<?php endif; ?>
						</div>
					</div>
					<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<div class="footer-widget">
							<?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
								<div class="footer-area">
									<?php dynamic_sidebar( 'footer-2' ); ?>
								</div>
							<?php else: ?>	
							<div class="footer-area">
								<h3 class="widget-title"><?php esc_html_e( 'Footer Sidebar 2', 'insomnia' ) ?></h3>
									<div class="textwidget"><?php esc_html_e( 'Insert your widget on "Footer widget 2" sidebar in Apperrance > Widgets', 'insomnia' ) ?></div>
								</div>
							<?php endif; ?>
						</div>
					</div>
					<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<div class="footer-widget">
							<?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
								<div class="footer-area">
									<?php dynamic_sidebar( 'footer-3' ); ?>
								</div>
							<?php else: ?>	
							<div class="footer-area">
								<h3 class="widget-title"><?php esc_html_e( 'Footer Sidebar 3', 'insomnia' ) ?></h3>
									<div class="textwidget"><?php esc_html_e( 'Insert your widget on "Footer widget 3" sidebar in Apperrance > Widgets', 'insomnia' ) ?></div>
								</div>
							<?php endif; ?>
						</div>
					</div>
					<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<div class="footer-widget">
							<?php if ( is_active_sidebar( 'footer-4' ) ) : ?>
								<div class="footer-area">
									<?php dynamic_sidebar( 'footer-4' ); ?>
								</div>
							<?php else: ?>	
							<div class="footer-area">
								<h3 class="widget-title"><?php esc_html_e( 'Footer Sidebar 4', 'insomnia' ) ?></h3>
									<div class="textwidget"><?php esc_html_e( 'Insert your widget on "Footer widget 4" sidebar in Apperrance > Widgets', 'insomnia' ) ?></div>
								</div>
							<?php endif; ?>
						</div>
					</div>
     				<?php elseif ($insomnia_widget_footer_count == 'five'): ?>
					<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
						<div class="footer-widget">
							<?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
								<div class="footer-area">
									<?php dynamic_sidebar( 'footer-1' ); ?>
								</div>
							<?php else: ?>	
							<div class="footer-area">
								<h3 class="widget-title"><?php esc_html_e( 'Footer Sidebar 1', 'insomnia' ) ?></h3>
									<div class="textwidget"><?php esc_html_e( 'Insert your widget on "Footer widget 1" sidebar in Apperrance > Widgets', 'insomnia' ) ?></div>
								</div>
							<?php endif; ?>
						</div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="footer-widget">
							<?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
								<div class="footer-area">
									<?php dynamic_sidebar( 'footer-2' ); ?>
								</div>
							<?php else: ?>	
							<div class="footer-area">
								<h3 class="widget-title"><?php esc_html_e( 'Footer Sidebar 2', 'insomnia' ) ?></h3>
									<div class="textwidget"><?php esc_html_e( 'Insert your widget on "Footer widget 2" sidebar in Apperrance > Widgets', 'insomnia' ) ?></div>
								</div>
							<?php endif; ?>
						</div>
					</div>
					<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<div class="footer-widget">
							<?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
								<div class="footer-area">
									<?php dynamic_sidebar( 'footer-3' ); ?>
								</div>
							<?php else: ?>	
							<div class="footer-area">
								<h3 class="widget-title"><?php esc_html_e( 'Footer Sidebar 3', 'insomnia' ) ?></h3>
									<div class="textwidget"><?php esc_html_e( 'Insert your widget on "Footer widget 3" sidebar in Apperrance > Widgets', 'insomnia' ) ?></div>
								</div>
							<?php endif; ?>
						</div>
					</div>
     				<?php endif; ?> 
				</div>
			</div>
		</div>
		<?php }; ?> 
		<?php if(get_theme_mod('insomnia_author_footer', 'enable') == true)  { ?>
		<?php if(get_theme_mod('insomnia_footer_light','enable') == true)  { ?>
		<div class="footer-copyright">
		<?php }else{ ?>
		<div class="footer-copyright light">
		<?php }; ?>	
			<div class="container">
				<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 not-single">
						<div class="copyright-info">
							<?php echo get_theme_mod( 'insomnia_footer_copy', esc_html__( 'Copyright 2019. All Rights Reserved.', 'insomnia' ) ); ?>
						</div>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 pull-right">
						<div class="author-info">
							<?php echo get_theme_mod( 'insomnia_footer_author', __( 'Powered by <a href="https://themeforest.net/user/DankovThemes" target="_blank">DankovThemes</a>', 'insomnia' ) ); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php }else{ ?>
		<?php if(get_theme_mod('insomnia_footer_light','enable') == true)  { ?>
		<div class="footer-copyright">
		<?php }else{ ?>
		<div class="footer-copyright light">
		<?php }; ?>	
			<div class="container">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="copyright-info">
							<?php echo get_theme_mod( 'insomnia_footer_copy', esc_html__( 'Copyright 2019. All Rights Reserved.', 'insomnia' ) ); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php }; ?>		
	</div>
</footer>