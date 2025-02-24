<?php
/**
 * Vérifie si une catégorie est une sous-catégorie d'une catégorie parente.
 *
 * @param int    $child_category_id  ID de la catégorie enfant.
 * @param int    $parent_category_id ID de la catégorie parente.
 * @param string $taxonomy           Taxonomie de la catégorie (par défaut : product_cat).
 *
 * @return bool True si la catégorie enfant est une sous-catégorie de la catégorie parente, false sinon.
 */
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

/**
 * Vérifie si le contenu courant appartient à la hiérarchie d'une catégorie parente.
 *
 * @param int    $parent_category_id ID de la catégorie parente.
 * @param string $taxonomy           Taxonomie de la catégorie (par défaut : product_cat).
 *
 * @return bool True si le contenu appartient à la hiérarchie de la catégorie parente, false sinon.
 */
function is_content_child_of_category($parent_category_id, $taxonomy = 'product_cat') {

    // Récupérer l'ID de la catégorie actuelle du contenu
    $current_term_ids = wp_get_post_terms(get_the_ID(), $taxonomy, array('fields' => 'ids'));

    // Si aucune catégorie n'est associée au contenu, retourner false
    if (is_wp_error($current_term_ids) || empty($current_term_ids)) {
        return false;
    }

    // Parcourir chaque catégorie associée au contenu
    foreach ($current_term_ids as $child_category_id) {
        // Récupérer l'objet de la catégorie enfant
        $child_term = get_term($child_category_id, $taxonomy);

        // Si l'objet de la catégorie enfant n'existe pas, passer à la suivante
        if (is_wp_error($child_term) || !$child_term) {
            continue;
        }

        // Initialiser la variable pour stocker la catégorie actuelle
        $current_term = $child_term;

        // Parcourir la hiérarchie jusqu'à atteindre la racine
        while ($current_term->parent !== 0) {
            // Vérifier si la catégorie actuelle est la catégorie parente recherchée
            if ((int) $current_term->parent === (int) $parent_category_id) {
                return true; // Le contenu appartient à la hiérarchie de la catégorie parente
            }

            // Récupérer la catégorie parente suivante
            $current_term = get_term($current_term->parent, $taxonomy);

            // Si une erreur se produit ou si nous atteignons la racine sans trouver la correspondance
            if (is_wp_error($current_term) || !$current_term) {
                break;
            }
        }
    }

    // Si aucune correspondance n'a été trouvée, retourner false
    return false;
}