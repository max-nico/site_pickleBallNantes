<footer>
	<div class="footer col-lg-12 col-md-12 col-xs-12">
				<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 footer1">
						<div class="footer-widget">
								<div class="footer-area1">
									<a href="<?php bloginfo('url'); ?>" class="logofooter">
										<img src="https://maximemartin.pro/wp-content/uploads/2019/05/Badge-éléphant-BLEU.png" alt="Logo Pickleball Nantes">
									</a>
								</div>                   
						</div>
				</div>
				<div class="col-lg-6 col-md-4 col-sm-6 col-xs-12 footer2">
						<div class="footer-widget">
								<div class="footer-area2 col-lg-12">
									<div class="title-footer2 col-lg-12">PICKLEBALL NANTES</div>
									<div class="links-footer col-lg-12">
										<a href="<?php echo get_permalink(3664); ?>"><div class="link-footer col-lg-3">Ou pratiquer ?
										</div></a>
										<a href="#"><div class="link-footer col-lg-3">Plan du site
										</div></a>
										<a href="https://maximemartin.pro/404"><div class="link-footer col-lg-3">PLAY
										</div></a>
										<a href="<?php echo get_permalink(3667); ?>"><div class="link-footer col-lg-3">Mentions légales
										</div></a>
									</div>
								</div>
						</div>
				</div>
				<div class="col-lg-3 col-md-4 col-sm-12 col-xs-12 footer3">
						<div class="footer-widget">
								<div class="footer-area3 col-lg-12">
									<div class="title-social-footer col-lg-12">
										Suivez nous sur les réseaux
									</div>
									<div class="sociallinks col-lg-3 col-md-3 col-sm-3 col-xs-3"><a href="https://www.facebook.com/pickleballnantes/"><img class="socialicons-footer" src="https://maximemartin.pro/wp-content/uploads/2019/05/Facebook.png" alt="icon facebook pickleball"></a>
									</div>
									<div class="sociallinks col-lg-3 col-md-3 col-sm-3 col-xs-3"><a href="https://www.instagram.com/pickleballnantes/"><img class="socialicons-footer" src="https://maximemartin.pro/wp-content/uploads/2019/05/Instagram.png" alt="icon instagram pickleball"></a>
									</div>
									<div class="sociallinks col-lg-3 col-md-3 col-sm-3 col-xs-3"><a href="https://twitter.com/AssociationPic2"><img class="socialicons-footer" src="https://maximemartin.pro/wp-content/uploads/2019/05/Twitter.png" alt="icon twitter pickleball"></a>
									</div>
									<div class="sociallinks col-lg-3 col-md-3 col-sm-3 col-xs-3"><a href="https://www.youtube.com/channel/UC5uU-sgwOU5cqxYi8o8_5WQ"><img class="socialicons-footer" src="https://maximemartin.pro/wp-content/uploads/2019/05/YouTube.png" alt="icon youtube pickleball"></a>
									</div>
								</div>
						</div>
				</div>
		<?php if(get_theme_mod('insomnia_author_footer', 'enable') == true)  { ?>
		<?php if(get_theme_mod('insomnia_footer_light','enable') == true)  { ?>
		<div class="footer-copyright col-lg-12 col-md-12 col-sm-6 col-xs-12">
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