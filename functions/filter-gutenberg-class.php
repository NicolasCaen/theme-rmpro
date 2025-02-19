<?php

add_filter('up_gutenberg_class_manager_class_options', 'customiser_classes_gutenberg',10);

function customiser_classes_gutenberg($options) {
    // Ajouter une nouvelle classe
    $options[] = [
        'label' => __('admin-hidden', 'text-domain'),
        'value' => 'admin-hidden'
    ];

    // Ajouter une nouvelle classe  
   // Ajouter une nouvelle classe
    $options[] = [
        'label' => __('Grille de 4 -> 2 ->1', 'text-domain'),
        'value' => 'grid-4-2-1'
    ];
    $options[] = [
        'label' => __('Grille de 4 -> 2-2', 'text-domain'),
        'value' => 'grid-4-22'
    ];
    
    $options[] = [
        'label' => __('Grille de 3 -> 2-1', 'text-domain'),
        'value' => 'grid-3-21'
    ];

    return $options;
}