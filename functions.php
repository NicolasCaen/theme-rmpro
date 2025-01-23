<?php
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
