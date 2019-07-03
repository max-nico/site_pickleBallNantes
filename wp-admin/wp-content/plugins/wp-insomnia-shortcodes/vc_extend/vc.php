<?php
/*VISUAL COMPOSER EXTEND*/
$attributes = array(
    'type' => 'dropdown',
    'heading' => "Inner Ellements Style",
    'param_name' => 'insomnia_ellements_style',
    'value' => array( "With Paddings", "Without Paddings","Stick Together" ),
    'description' => __( "Choose inner ellements style", 'insomnia' )
);
vc_add_param( 'vc_row', $attributes );

$equalizeHeights = array(
    'type' => 'dropdown',
    'heading' => "Inner Ellements Heights",
    'param_name' => 'insomnia_ellements_height',
    'value' => array( "Normal Heights", "Equalize Heights", ),
    'description' => __( "Choose inner ellements Heights", 'insomnia' )
);
vc_add_param( 'vc_row', $equalizeHeights ); 




/* ------------------------------------------------------------------------ */
/* SHORTCODES */
/* ------------------------------------------------------------------------ */

$uri = plugin_dir_path( __FILE__ );
include($uri.'shortcodes/circle.php');
include($uri.'shortcodes/services_one.php');
include($uri.'shortcodes/services_two.php');
include($uri.'shortcodes/services_three.php');
include($uri.'shortcodes/services_four.php');
include($uri.'shortcodes/promo_title.php');
include($uri.'shortcodes/promo_title_small.php');
include($uri.'shortcodes/console_text.php');
include($uri.'shortcodes/fun_fact.php');
include($uri.'shortcodes/purpose-block.php');
include($uri.'shortcodes/pricing_tables.php');
include($uri.'shortcodes/contacts_us.php');
include($uri.'shortcodes/buttons.php');
include($uri.'shortcodes/progress_bar.php');
include($uri.'shortcodes/custom_slider.php');
include($uri.'shortcodes/testimonial.php');
include($uri.'shortcodes/team_memder.php');
include($uri.'shortcodes/portfolio_item.php');
include($uri.'shortcodes/portfolio_item_2.php');
include($uri.'shortcodes/photo_portfolio.php');
include($uri.'shortcodes/g_map.php');
include($uri.'shortcodes/travel_deals.php');
include($uri.'shortcodes/latest_news.php');
include($uri.'shortcodes/latest_news_two.php');
include($uri.'shortcodes/latest_news_three.php');
include($uri.'shortcodes/clients.php');
include($uri.'shortcodes/posts_slider.php');
include($uri.'shortcodes/typed-text.php');
include($uri.'shortcodes/work-process.php');
include($uri.'shortcodes/food_deals.php');
include($uri.'shortcodes/video-button.php');


//Your "container" content element should extend WPBakeryShortCodesContainer class to inherit all required functionality
if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
    class WPBakeryShortCode_insomnia_Icons_List extends WPBakeryShortCodesContainer {
    };
	class WPBakeryShortCode_insomnia_Price_Table extends WPBakeryShortCodesContainer {
    };
	
	class WPBakeryShortCode_insomnia_Custom_Slider extends WPBakeryShortCodesContainer {
    }
};
if ( class_exists( 'WPBakeryShortCode' ) ) {
    class WPBakeryShortCode_insomnia_List_Item extends WPBakeryShortCode {
    };
	 class WPBakeryShortCode_Vc_Testimonial_Item extends WPBakeryShortCode {
    }
};

?>