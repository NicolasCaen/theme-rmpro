<?php

function custom_fse_product_category_template($template) {
    // Vérifier si nous sommes sur une archive de catégorie de produit WooCommerce
    if (is_tax('product_cat')) {
            $queried_object = get_queried_object(); // Obtenir l'objet de la catégorie actuelle
            $current_category_id = $queried_object->term_id;

            // ID de la sous-catégorie spécifique que vous recherchez
            $specific_child_category_id = 161; // Remplacez 42 par l'ID de votre sous-catégorie

        if (is_category_child_of($current_category_id, $specific_child_category_id, $taxonomy = 'product_cat')) {
        
                $new_template = locate_template(array('templates/index.html'));
                if (!empty($new_template)) {
                    return $new_template;
                }

        }

   
    }
    return $template;
}
add_filter('template_include', 'custom_fse_product_category_template',99);

function is_category_child_of($child_category_id, $parent_category_id, $taxonomy = 'product_cat') {
    // Récupérer l'objet de la catégorie enfant
    $child_term = get_term($child_category_id, $taxonomy);

    // Si l'objet de la catégorie enfant n'existe pas, retourner false
    if (is_wp_error($child_term) || !$child_term) {
        return false;
    }

    // Initialiser la variable pour stocker la catégorie actuelle
    $current_term = $child_term;

    // Parcourir la hiérarchie jusqu'à atteindre la racine
    while ($current_term->parent !== 0) {
        // Vérifier si la catégorie actuelle est la catégorie parente recherchée
        if ((int) $current_term->parent === (int) $parent_category_id) {
            return true; // La catégorie enfant appartient à la hiérarchie de la catégorie parente
        }

        // Récupérer la catégorie parente suivante
        $current_term = get_term($current_term->parent, $taxonomy);

        // Si une erreur se produit ou si nous atteignons la racine sans trouver la correspondance
        if (is_wp_error($current_term) || !$current_term) {
            break;
        }
    }

    // Si aucune correspondance n'a été trouvée, retourner false
    return false;
}