<?php

add_filter('up_gutenberg_class_manager_class_options', 'customiser_classes_gutenberg',10);

function customiser_classes_gutenberg($options) {
    // Ajouter une nouvelle classe
    $options[] = [
        'label' => __('admin-hidden', 'ng1'),
        'value' => 'admin-hidden'
    ];

    // Ajouter une nouvelle classe  
   // Ajouter une nouvelle classe
    $options[] = [
        'label' => __('Grille de 4 -> 2 ->1', 'ng1'),
        'value' => 'grid-4-2-1'
    ];
    $options[] = [
        'label' => __('Grille de 4 -> 2-2', 'ng1'),
        'value' => 'grid-4-22'
    ];
    
    $options[] = [
        'label' => __('Grille de 3 -> 2-1', 'ng1'),
        'value' => 'grid-3-21'
    ];
    $options[] = [
        'label' => __('Slider 5-3-1', 'ng1'),
        'value' => 'slider-5-3-1'
    ];
    

    return $options;
}