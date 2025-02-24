<?php
// Ajoutez le filtre pour appliquer la transformation au contenu des produits
// add_filter('the_content', 'transform_headings_to_paragraphs_in_products');


// function customize_product_button_text( $translated_text, $text, $domain ) {
//     switch ( $translated_text ) {
//         case 'Product':
//             $translated_text = __( 'Nouveau Texte', 'woocommerce' );
//             break;
//     }
//     return $translated_text;
// }
// add_filter( 'gettext', 'customize_product_button_text', 20, 3 );

function customize_woocommerce_read_more_button() {
    return 'Votre Nouveau Texte';
}
//add_filter( 'woocommerce_product_add_to_cart_text', 'customize_woocommerce_read_more_button' );
//add_filter( 'woocommerce_product_single_add_to_cart_text', 'customize_woocommerce_read_more_button' );