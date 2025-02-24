<?php

/**
 * Déplace les produits cross-sell sous le tableau du panier.
 */
function move_cross_sells_below_cart() {
    // Retirer les cross-sells de leur position par défaut
    remove_action('woocommerce_cart_collaterals', 'woocommerce_cross_sell_display');

    // Ajouter les cross-sells après le tableau du panier
    add_action('woocommerce_after_cart', 'woocommerce_cross_sell_display', 100);
}
add_action('wp', 'move_cross_sells_below_cart');


function custom_cross_sell_display() {
    if ( ! wc_cross_sells_enabled() ) {
        return;
    }

    $cross_sells = WC()->cart->get_cross_sells();
    $cross_sells = array_filter( array_map( 'wc_get_product', $cross_sells ), 'wc_products_array_filter_visible' );

    if ( empty( $cross_sells ) ) {
        return;
    }

    echo '<div class="cross-sells"><h2>' . esc_html__( 'Vous aimerez peut-être aussi...', 'woocommerce' ) . '</h2>';
    woocommerce_product_loop_start();
    foreach ( $cross_sells as $cross_sell ) {
        wc_get_template_part( 'content', 'product' );
    }
    woocommerce_product_loop_end();
    echo '</div>';
}


add_action( 'woocommerce_after_cart_table', 'custom_cross_sell_display', 10 );