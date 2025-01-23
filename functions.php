<?php
// Définir la fonction pour enqueue les styles
function enqueue_theme_styles() {
    wp_enqueue_style('main-style', get_stylesheet_uri());
    // Ajoutez d'autres styles ici si nécessaire
}

// Appeler la fonction pour enqueue les styles
add_action('wp_enqueue_scripts', 'enqueue_theme_styles');
