<?php
/**
 * neder Theme
 *
 * Theme by: AD-Theme
 * Our portfolio: http://themeforest.net/user/ad-theme/portfolio
 *
 */
 
 global $neder_theme;

 
 ?>
 
 <!-- start:wp_footer -->
 <footer class="neder-footer-wrap">
 
	<div class="neder-header-wrap-container">
	

		
		<?php if(esc_html($neder_theme['footer-top-active']) == true) : ?>
	
			<div class="neder-footer-top">
			
				<?php if(esc_html($neder_theme['advertisement-footer']) == true) : ?>							
					<div class="neder-banner-footer">
						<div class="neder-wrap-container">
							<?php echo neder_banner_footer(); ?>
						</div>
					</div>								
				<?php endif; ?>			
			
				<div class="neder-wrap-container element-no-padding">
				
					<?php if(esc_html($neder_theme['footer-top-widget']) == 'footer-top-widget-3') : ?>

						<div class="footer-widget col-xs-4">
							<?php 
								if ( is_active_sidebar( 'neder-footer-1' ) ) :
									dynamic_sidebar('neder-footer-1'); 
								endif;
							?>
						</div>
						<div class="footer-widget col-xs-4">
							<?php 
								if ( is_active_sidebar( 'neder-footer-2' ) ) :
									dynamic_sidebar('neder-footer-2'); 
								endif;
							?>
						</div>
						<div class="footer-widget col-xs-4">
							<?php 
								if ( is_active_sidebar( 'neder-footer-3' ) ) :
									dynamic_sidebar('neder-footer-3'); 
								endif;
							?>
						</div>
					
					<?php elseif(esc_html($neder_theme['footer-top-widget']) == 'footer-top-widget-2') : ?>
					
						<div class="footer-widget col-xs-6">
							<?php 
								if ( is_active_sidebar( 'neder-footer-1' ) ) :
									dynamic_sidebar('neder-footer-1'); 
								endif;
							?>
						</div>
						<div class="footer-widget col-xs-6">
							<?php 
								if ( is_active_sidebar( 'neder-footer-2' ) ) :
									dynamic_sidebar('neder-footer-2'); 
								endif;
							?>
						</div>					
					
					<?php else : ?>
					
						<div class="footer-widget col-xs-12">
							<?php 
								if ( is_active_sidebar( 'neder-footer-1' ) ) :
									dynamic_sidebar('neder-footer-1'); 
								endif;
							?>
						</div>				
					
					<?php endif; ?>
						
						<div class="neder-clear"></div>
				</div>
				<?php if(esc_html($neder_theme['footer-image-background-active']) == true) : ?>		
					<div class="footer-top-pattern"></div>
				<?php endif; ?>
			</div>
	
		<?php endif; ?>
	
		<?php if(esc_html($neder_theme['footer-bottom-active']) == true) : ?>
		
			<div class="neder-footer-bottom">
				<div class="neder-wrap-container">		
		
					<?php
						$footer_bottom_elements = $neder_theme['footer-bottom-type']['enabled'];					
						$count_elements = count($footer_bottom_elements);
						if($count_elements == 4) : $footer_class_span = '4'; endif;
						if($count_elements == 3) : $footer_class_span = '6'; endif;
						if($count_elements == 2) : $footer_class_span = '12'; endif;
						
						if ($footer_bottom_elements): foreach ($footer_bottom_elements as $key=>$value) {
						 
							switch($key) {

								case 'text':
									if ( ! defined( 'POLYLANG_VERSION' ) ) :

										echo '<div class="col-xs-'.esc_html($footer_class_span).'">
												<span class="copyright">'.esc_attr($neder_theme['footer-text']).'</span>
											  </div>';
									else :

										echo '<div class="col-xs-'.esc_html($footer_class_span).'">
												<span class="copyright">'.pll__('footer text','neder').'</span>
											  </div>';
									
									endif; 
								break;
						 
								case 'social':
								echo '<div class="col-xs-'.esc_html($footer_class_span).'">'.neder_footer_social().'</div>';
								break;
						 
								case 'menu':
								echo '<div class="col-xs-'.esc_html($footer_class_span).'">';
									if(esc_html($neder_theme['footer-top-menu']) != '') :
										echo neder_get_menu_array(esc_html($neder_theme['footer-top-menu']));
									endif;
								echo '</div>';
								break;

							}
						 
						}
						 
						endif;
					
					?>							 
					<div class="neder-clear"></div>
				</div>	
			</div>
	
		<?php endif; ?>
	
	</div>
	
 </footer>	
 <!-- end:wp_footer -->

 <?php
	neder_helper_imported();
 ?> 
 
 
 </div>
 <!-- end:outer wrap -->

 <?php if(esc_html($neder_theme['slide_panel_position']) != 'none') : ?>
		<?php get_template_part('elements/slidepanel'); ?>
 <?php endif; ?>	
 
 <?php if(esc_html($neder_theme['back-to-top']) == true) : ?>
		<span class="backtotop"><i class="nedericon fa-angle-up"></i></span>
 <?php endif; ?>	
 
 <?php wp_footer(); ?> 
 </body>
 </html>