<?php

include "functions/filter-gutenberg-class.php";
include "functions/filter-breadcrumbs-separator.php";
//include "functions/hook-cart.php";
//include "functions/custom-template-manager.php";

// Définir la fonction pour enqueue les styles
function enqueue_theme_styles() {
    wp_enqueue_style('main-style', get_stylesheet_uri());
    // Ajoutez d'autres styles ici si nécessaire
}

// Appeler la fonction pour enqueue les styles
add_action('wp_enqueue_scripts', 'enqueue_theme_styles');

function ajouter_gsap_et_scrolltrigger() {
    // Charger GSAP depuis un CDN
    wp_enqueue_script('gsap', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js', array(), null, true);
    
    // Charger ScrollTrigger depuis un CDN
    wp_enqueue_script('scrolltrigger', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js', array('gsap'), null, true);
        // Charger votre script personnalisé
        wp_enqueue_script('gsap-menu', get_template_directory_uri() . '/assets/js/gsap/menu.js', array('gsap', 'scrolltrigger'), null, true);
}
add_action('wp_enqueue_scripts', 'ajouter_gsap_et_scrolltrigger');

function ajouter_faq_script() {

        // Charger votre script personnalisé
        wp_enqueue_script('faq-script', get_template_directory_uri() . '/assets/js/faq.js',"", null, true);
}
add_action('wp_enqueue_scripts', 'ajouter_faq_script');

function ajouter_menu_category_script() {

    // Charger votre script personnalisé
    wp_enqueue_script('cat-menu-script', get_template_directory_uri() . '/assets/js/menu-category.js',"", null, true);
}
add_action('wp_enqueue_scripts', 'ajouter_menu_category_script');
function ajouter_search_script() {

    // Charger votre script personnalisé
    wp_enqueue_script('search-script', get_template_directory_uri() . '/assets/js/search.js',"", null, true);
}
add_action('wp_enqueue_scripts', 'ajouter_search_script');
/**
 * Enqueue le fichier editor.css dans l'éditeur Gutenberg
 */
function enqueue_gutenberg_editor_styles() {
    if ( is_admin() ) {
        wp_enqueue_style( 'editor-style', get_stylesheet_directory_uri( ).'/editor.css');
    }
}
add_action( 'enqueue_block_assets', 'enqueue_gutenberg_editor_styles' );

function transform_headings_to_paragraphs_in_products($content) {
    // Vérifiez si le contenu appartient à un produit WooCommerce
    if (is_singular('product')) {
        // Utilisez des expressions régulières pour remplacer les balises H1, H2, H3 par des balises <p>
        $content = preg_replace('/<h1([^>]*)>(.*?)<\/h1>/i', '<p$1>$2</p>', $content);
        $content = preg_replace('/<h2([^>]*)>(.*?)<\/h2>/i', '<p$1>$2</p>', $content);
        $content = preg_replace('/<h3([^>]*)>(.*?)<\/h3>/i', '<p$1>$2</p>', $content);
        $content = preg_replace('/<h4([^>]*)>(.*?)<\/h4>/i', '<p$1>$2</p>', $content);
        $content = preg_replace('/<h4([^>]*)>(.*?)<\/h4>/i', '<p$1>$2</p>', $content);
       
    }
    return $content;
}

// Ajoutez le filtre pour appliquer la transformation au contenu des produits
add_filter('the_content', 'transform_headings_to_paragraphs_in_products');