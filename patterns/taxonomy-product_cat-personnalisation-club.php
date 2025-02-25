<?php
/**
 * Title: taxonomy-product_cat-personnalisation-club
 * Slug: theme-rmpro/taxonomy-product_cat-personnalisation-club
 * Inserter: no
 */
?>
<!-- wp:cover {"url":"https://vetements-cyclisme.local/wp-content/themes/theme-rmpro/assets/images/image-medium-2webp-scaled.webp","dimRatio":60,"overlayColor":"contrast-2","isUserOverlayColor":true,"className":"is-style-ng1-banner-bw","style":{"spacing":{"margin":{"bottom":"1rem"}}},"fontSize":"small","layout":{"type":"constrained"}} -->
<div class="wp-block-cover is-style-ng1-banner-bw has-small-font-size" style="margin-bottom:1rem"><span aria-hidden="true" class="wp-block-cover__background has-contrast-2-background-color has-background-dim-60 has-background-dim"></span><img class="wp-block-cover__image-background" alt="" src="https://vetements-cyclisme.local/wp-content/themes/theme-rmpro/assets/images/image-medium-2webp-scaled.webp" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:group {"align":"wide","style":{"dimensions":{"minHeight":"318px"},"spacing":{"padding":{"right":"var:preset|spacing|2","left":"var:preset|spacing|2"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"left"}} -->
<div class="wp-block-group alignwide" style="min-height:318px;padding-right:var(--wp--preset--spacing--2);padding-left:var(--wp--preset--spacing--2)"><!-- wp:woocommerce/breadcrumbs /-->

<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between","verticalAlignment":"bottom"}} -->
<div class="wp-block-group"><!-- wp:query-title {"type":"archive","showPrefix":false,"style":{"spacing":{"padding":{"top":"var:preset|spacing|7"}}}} /--></div>
<!-- /wp:group -->

<!-- wp:term-description {"align":"wide","style":{"spacing":{"padding":{"bottom":"var:preset|spacing|7","top":"var:preset|spacing|5"}}}} /--></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover -->

<!-- wp:group {"layout":{"type":"constrained","contentSize":"1240px"}} -->
<div class="wp-block-group"><!-- wp:group {"style":{"spacing":{"margin":{"bottom":"1rem"},"padding":{"right":"var:preset|spacing|2","left":"var:preset|spacing|2"}}},"fontSize":"small","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center","verticalAlignment":"top"}} -->
<div class="wp-block-group has-small-font-size" style="margin-bottom:1rem;padding-right:var(--wp--preset--spacing--2);padding-left:var(--wp--preset--spacing--2)"><!-- wp:group {"className":"show-only-on-desktop","layout":{"type":"constrained"}} -->
<div id="cat-menu" class="wp-block-group show-only-on-desktop"><!-- wp:group {"className":"hide-on-tablet-desktop","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"right"}} -->
<div class="wp-block-group hide-on-tablet-desktop"><!-- wp:image {"width":"28px","height":"auto","sizeSlug":"large","linkDestination":"none","className":"toggle-cat-menu"} -->
<figure class="wp-block-image size-large is-resized toggle-cat-menu"><img src="https://vetements-cyclisme.local/wp-content/themes/theme-rmpro/assets/images/close.svg" alt="" style="width:28px;height:auto"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group -->

<!-- wp:search {"label":"Recherche","placeholder":"Recherche de produits…","buttonText":"Recherche","query":{"post_type":"product"},"className":"rmpro-search","namespace":"woocommerce/product-search"} /-->
<?php 
ng1_do_pattern_shortcode('[ng1_product_categories parent="137"
show_count="false" show_parent="false" depth="3" class="ng1-product-categories--one-level"]');
?>
</div>
<!-- /wp:group -->
<!-- wp:group {"tagName":"main","layout":{"inherit":true,"type":"constrained"}} -->
<main class="wp-block-group"><!-- wp:woocommerce/store-notices /-->
        <!-- wp:heading -->
<h2 class="wp-block-heading">Types de produits</h2>
<!-- /wp:heading -->
<?php 
ng1_do_pattern_shortcode('[category_cards parent_id="129" columns="4"]');
?>
</main>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->