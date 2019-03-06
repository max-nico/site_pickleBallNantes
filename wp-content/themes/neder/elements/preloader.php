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
 
 
 <?php if($neder_theme['preloader'] == '1') : ?>
 
	<?php if($neder_theme['preloader-type'] == 'image') : ?>
	
		<div id="preloader-container" class="preloader-image <?php echo esc_html($neder_theme['preloader-image-effect']); ?>">
			<div id="preloader-wrap">
				<img src="<?php echo esc_url($neder_theme['preloader-image']['url']); ?>" alt="">
			</div>
		</div>

	<?php else : ?>
	
        <div id="preloader-container" class="preloader-css">
                <div id="preloader-wrap">
					<div class="cssload-thecube">
						<div class="cssload-cube cssload-c1"></div>
						<div class="cssload-cube cssload-c2"></div>
						<div class="cssload-cube cssload-c4"></div>
						<div class="cssload-cube cssload-c3"></div>
					</div>
                </div>
        </div>   	
	
	<?php endif; ?>
		 
 <?php endif; ?>
                            
                            
                            