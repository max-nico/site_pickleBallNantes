<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see     http://docs.woothemes.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version      100.0
 * @orig_version 2.6.1
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product, $woocommerce_loop;

// Store loop count we're currently on
if ( empty( $woocommerce_loop['loop'] ) ) {
	$woocommerce_loop['loop'] = 0;
}

// Store column count for displaying the grid
if ( empty( $woocommerce_loop['columns'] ) ) {
	$woocommerce_loop['columns'] = apply_filters( 'loop_shop_columns', 4 );
}

// Ensure visibility
if ( ! $product || ! $product->is_visible() ) {
	return;
}

// Increase loop count
$woocommerce_loop['loop']++;

// Extra post classes
$classes = array();
if ( 0 === ( $woocommerce_loop['loop'] - 1 ) % $woocommerce_loop['columns'] || 1 === $woocommerce_loop['columns'] ) {
	$classes[] = 'first';
}
if ( 0 === $woocommerce_loop['loop'] % $woocommerce_loop['columns'] ) {
	$classes[] = 'last';
}


    $insomnia_per_row_var = get_theme_mod( 'insomnia_per_row', 'three' ); 

    if ($insomnia_per_row_var == 'two'): 
        $col_class = 'col-md-6 col-sm-6';

    elseif ($insomnia_per_row_var == 'three'):
        $col_class = 'col-md-4 col-sm-4';

    elseif ($insomnia_per_row_var == 'four'):
        $col_class = 'col-md-3 col-sm-3';

    endif;


?>
<div <?php post_class(  $col_class ); ?>>
    <div class="insomnia_product-wrap">
    <div class="insomnia_product-image">
	<?php do_action( 'woocommerce_before_shop_loop_item' ); ?>

	<a href="<?php the_permalink(); ?>" class="product-images">
		<?php $attachment_ids = $product->get_gallery_attachment_ids(); ?>
        <?php if ($attachment_ids[0] !=''){?>
        <div class="insomnia_first_image">
			<?php do_action( 'woocommerce_before_shop_loop_item_title' ); ?>
        </div>
        <div class="insomnia_second_image">
			<?php echo wp_get_attachment_image($attachment_ids[0], 'shop_catalog');?>
        </div>
        <?php }else{?>
        <div class="insomnia_first_image insomnia_single_image">
			<?php do_action( 'woocommerce_before_shop_loop_item_title' ); ?>
        </div>
        <?php };?>
     </a>
       </div>
    <div class="insomnia_product-details">
        <div class="insomnia_product-details-container">
            <h4 class="insomnia_product-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
            <div class="insomnia_price-block">
            	<?php do_action( 'woocommerce_after_shop_loop_item_title' );?>
             </div>

            <div class="insomnia_rating-block">
                <?php do_action( 'woocommerce_after_shop_loop_item' );?>
             </div>







             <div class="clearfix"></div>
        </div>
    </div>
       </div>
</div>