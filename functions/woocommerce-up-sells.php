<?php
function customize_upsells_title( $heading ) {
    global $product;

    // Vérifie que l'objet produit est disponible
    if ( $product ) {
        // Récupère les catégories du produit
        $product_categories = wp_get_post_terms( $product->get_id(), 'product_cat', array('fields' => 'ids') );

        // Vérifie si une des catégories du produit est une sous-catégorie de la catégorie 161
        foreach ( $product_categories as $category_id ) {
            if ( is_category_child_of( $category_id, 161 ) ) {
                return 'Composez votre tenu';
            }
        }
    }

    return 'Découvrez notre sélection personnalisable';
}
add_filter( 'woocommerce_product_upsells_products_heading', 'customize_upsells_title', 10, 1 );
