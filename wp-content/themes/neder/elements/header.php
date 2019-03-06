<?php
/**
 * Neder Theme
 *
 * Theme by: AD-Theme
 * Our portfolio: http://themeforest.net/user/ad-theme/portfolio
 *
 */
 global $neder_theme;
 global $current_user;
 if(!isset($neder_theme['logo']['url'])) : $neder_theme['logo']['url'] = ''; endif;
 
 ?>
  
     <header class="neder-header-wrap <?php echo esc_html($neder_theme['header-menu-align']); ?> <?php echo esc_html($neder_theme['header-menu-style']); ?>">
     
     	<div class="neder-header-wrap-container header-desktop">

		<?php $header_elements_order = $neder_theme['header-order']['enabled']; 
		
			if ($header_elements_order): 
			
				foreach ($header_elements_order as $key=>$value) {
				switch($key) {
				
				# CASE Header Top							
				case 'header-top': ?>
			
					<?php if(esc_html($neder_theme['header-top-active']) == true) : ?>
				
						<?php echo neder_header_top(); ?>
					
					<?php endif; ?> 
				
				<?php
				break;			
				# CASE Header Middle
				case 'header-middle':
				
				?>
				
					<div class="neder-header-middle element-no-padding"> 

						<?php if(esc_html($neder_theme['header-middle-logo-potision']) == 'left') : ?>
					
							<div class="neder-wrap-container">
							
								<div class="neder-logo neder-logo-left col-sm-3">
									<?php echo neder_logo(); ?>
								</div>
								
								<?php if(esc_html($neder_theme['advertisement-top']) == true) : ?>
									<div class="neder-banner-top neder-banner-top-right col-sm-9">
										<?php echo neder_banner_top(); ?>
									</div>
								<?php endif; ?>
								
								<div class="neder-clear"></div>
							</div>
							
						<?php elseif(esc_html($neder_theme['header-middle-logo-potision']) == 'right') :?>

							<div class="neder-wrap-container">

								<?php if(esc_html($neder_theme['advertisement-top']) == true) : ?>							
									<div class="neder-banner-top neder-banner-top-left col-sm-9">
										<?php echo neder_banner_top(); ?>
									</div>								
								<?php endif; ?>		
								
								<div class="neder-logo neder-logo-right col-sm-3">
										<?php echo neder_logo(); ?>
								</div>
								
								<div class="neder-clear"></div>							
							</div>

						<?php else : ?>
						
							<div class="neder-wrap-container">
								<div class="neder-logo neder-logo-center col-sm-12">
									<?php echo neder_logo(); ?>
								</div>						
								<div class="neder-clear"></div>						
							</div>
							
						<?php endif; ?>
							
					</div> 

				<?php
				
				break;
				
				# CASE Header Bottom
				case 'header-bottom':
				
				?>
				
					<div class="neder-header-bottom">   
						<div class="neder-header-bottom neder-wrap-container">
							
							<?php if(esc_html($neder_theme['search'] == true)) : ?>
								
								<?php if($neder_theme['rtl']) : 
									if ( class_exists( 'woocommerce' ) && $neder_theme['neder_woocommerce_add_to_cart'] == true) : ?>	
										<div class="neder-woocommerce-add-to-cart-container col-sm-1">						
											<?php echo neder_add_to_cart(); ?>						
										</div>										
									<?php else : ?>
										<div class="neder-search-container col-sm-1">						
											<?php echo neder_search(); ?>						
										</div>
									<?php endif; ?>
									<div class="neder-menu col-sm-11">
										<?php get_template_part('elements/menu'); ?>
									</div>								
								
								<?php else : ?>
								
									<div class="neder-menu col-sm-11">
										<?php get_template_part('elements/menu'); ?>
									</div>						
									<?php if ( class_exists( 'woocommerce' ) && $neder_theme['neder_woocommerce_add_to_cart'] == true) : ?>	
										<div class="neder-woocommerce-add-to-cart-container col-sm-1">						
											<?php echo neder_add_to_cart(); ?>						
										</div>										
									<?php else : ?>
										<div class="neder-search-container col-sm-1">						
											<?php echo neder_search(); ?>						
										</div>
									<?php endif; ?>								
																						
								<?php endif; ?>
								
							<?php else : ?> 
							
								<div class="neder-menu col-sm-12">
									<?php get_template_part('elements/menu'); ?>
								</div>						
							
							<?php endif; ?>

							<div class="neder-clear"></div>
						</div>
					 </div> 
				 
		<?php
				break;
				}
			}
						 
			endif; # End Foreach Header Order
					
		?>	
				 
		</div>
			
		<?php if(esc_html($neder_theme['header-sticky'])) : ?>
			
			<div class="neder-header-sticky">
				<div class="neder-header-bottom neder-wrap-container">
					<?php if(esc_html($neder_theme['header-sticky-logo-position'] == 'left')) : ?>
					
									<div class="neder-logo neder-logo-right col-sm-2">
											<?php echo neder_logo_sticky(); ?>
									</div>			
									<div class="neder-menu col-sm-10">
										<?php get_template_part('elements/menu-sticky'); ?>
									</div>						
		
					<?php else : ?>
					
									<div class="neder-menu col-sm-10">
										<?php get_template_part('elements/menu-sticky'); ?>
									</div>						
									<div class="neder-logo neder-logo-right col-sm-2">
											<?php echo neder_logo_sticky(); ?>
									</div>			
					
					<?php endif; ?>
					<div class="neder-clear"></div>
				</div>				
			</div>
		
		<?php endif; ?>
		
			<div class="neder-header-wrap-container header-mobile">
				<div class="neder-logo col-sm-12">
					<?php echo neder_logo_mobile(); ?>
				</div>			
				<div class="flonews-menu-mobile col-sm-2">
					<?php get_template_part('elements/menu-mobile'); ?>
				</div>
				<div class="neder-clear"></div>
				<div class="neder-ticker">
                    <?php echo neder_ticker(); ?>
                </div>				
			</div>
     </header>
	 
	 
	 <?php 
	 # Slider Content
	 if(esc_html($neder_theme['header-slider'])) : 
		# If Only Homepage
		if(esc_html($neder_theme['header-slider-position']) == 'homepage') :
			if(is_home() || is_front_page()) :
	 ?>
				<div class="neder-slider-container <?php echo esc_html($neder_theme['header-slider-container']); ?>">
					<?php echo do_shortcode(esc_html($neder_theme['header-slider-shortcode'])); ?>
				</div>
			<?php endif; ?>	
	 <?php 
		else : ?>	
			<div class="neder-slider-container <?php echo esc_html($neder_theme['header-slider-container']); ?>">
				<?php echo do_shortcode(esc_html($neder_theme['header-slider-shortcode'])); ?>
			</div>	 	
	 <?php 
	    endif;
	 endif; ?>