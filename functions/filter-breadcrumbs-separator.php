<?php

// Changer le séparateur du fil d'Ariane WooCommerce
add_filter( 'woocommerce_breadcrumb_defaults', 'custom_woocommerce_breadcrumbs' );
function custom_woocommerce_breadcrumbs( $defaults ) {
    // Définir les nouveaux paramètres par défaut
    $defaults['delimiter'] = ' > '; // Remplacez " > " par votre séparateur souhaité
    return $defaults;
}

// Changer le séparateur du fil d'Ariane Yoast SEO
add_filter( 'wpseo_breadcrumb_separator', 'custom_yoast_breadcrumb_separator' );
function custom_yoast_breadcrumb_separator( $separator ) {
    return ' > '; // Remplacez " > " par votre séparateur souhaité
}