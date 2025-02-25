<?php
/**
 * Pattern: theme-rmpro/category-card
 * Titre: Carte de catégorie
 * Slug: theme-rmpro/category-card
 */

$category = $args['category']; // Données de la catégorie passées au pattern
$category_link = get_category_link($category->term_id);
$category_image = get_term_meta($category->term_id, 'category_image', true); // Optionnel : image de la catégorie
?>

<?php echo $category->name; ?>
        <?php echo $category->slug; ?>
        <?php echo get_term_link($category); ?>