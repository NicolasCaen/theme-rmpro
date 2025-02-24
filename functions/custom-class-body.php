<?php 
function woocommerce_custom_body_classes($classes) {
    // Vérifie si nous sommes sur une page de produit unique (single-product)
    if (is_product()) {
        global $product;

        // Récupère l'ID du produit
        $product_id = $product->get_id();

        // Vérifie si le produit a une taxonomie ou une taxparent égale à 137
        $terms = wp_get_post_terms($product_id, 'product_cat', array('fields' => 'ids'));
        if (!empty($terms) && in_array(137, $terms)) {
            $classes[] = 'produit-personnalisable';
        } else {
            $classes[] = 'produit-a-la-vente';
        }
    }

    // Vérifie si nous sommes sur une page de catégorie de produits
    if (is_product_category()) {
        // Récupère l'ID de la catégorie actuelle
        $current_term = get_queried_object();
        $category_id = $current_term->term_id;

        // Vérifie si la catégorie actuelle ou l'une de ses ancêtres est égale à 137
        $ancestors = get_ancestors($category_id, 'product_cat');
        if ($category_id == 137 || in_array(137, $ancestors)) {
            $classes[] = 'category-personnalisable';
        } else {
            $classes[] = 'category-a-la-vente';
        }
    }

    return $classes;
}

add_filter('body_class', 'woocommerce_custom_body_classes');
