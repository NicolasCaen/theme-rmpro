<?php
/**
 * Title: taxonomy-product_cat
 * Slug: theme-rmpro/taxonomy-product_cat
 * Inserter: no
 */
?>
<!-- wp:template-part {"slug":"header"} /-->

<!-- wp:cover {"url":"<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/image-medium-2webp-scaled.webp","dimRatio":60,"overlayColor":"contrast-2","isUserOverlayColor":true,"className":"is-style-ng1-banner-bw","style":{"spacing":{"margin":{"bottom":"1rem"}}},"fontSize":"small","layout":{"type":"constrained"}} -->
<div class="wp-block-cover is-style-ng1-banner-bw has-small-font-size" style="margin-bottom:1rem"><span aria-hidden="true" class="wp-block-cover__background has-contrast-2-background-color has-background-dim-60 has-background-dim"></span><img class="wp-block-cover__image-background " alt="" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/image-medium-2webp-scaled.webp" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:group {"align":"wide","style":{"dimensions":{"minHeight":"318px"},"spacing":{"padding":{"right":"var:preset|spacing|2","left":"var:preset|spacing|2"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"left"}} -->
<div class="wp-block-group alignwide" style="min-height:318px;padding-right:var(--wp--preset--spacing--2);padding-left:var(--wp--preset--spacing--2)"><!-- wp:woocommerce/breadcrumbs /-->

<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between","verticalAlignment":"bottom"}} -->
<div class="wp-block-group"><!-- wp:query-title {"type":"archive","showPrefix":false,"style":{"spacing":{"padding":{"top":"var:preset|spacing|7"}}}} /-->

<!-- wp:buttons {"layout":{"type":"flex","verticalAlignment":"bottom"}} -->
<div class="wp-block-buttons"><!-- wp:button {"className":"toggle-cat-menu"} -->
<div class="wp-block-button toggle-cat-menu"><a class="wp-block-button__link wp-element-button" href="#open-cat-menu">filtrer</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->

<!-- wp:term-description {"align":"wide","style":{"spacing":{"padding":{"bottom":"var:preset|spacing|7","top":"var:preset|spacing|5"}}}} /--></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover -->

<!-- wp:group {"layout":{"type":"constrained","contentSize":"1240px"}} -->
<div class="wp-block-group"><!-- wp:group {"style":{"spacing":{"margin":{"bottom":"1rem"},"padding":{"right":"var:preset|spacing|2","left":"var:preset|spacing|2"}}},"fontSize":"small","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center","verticalAlignment":"top"}} -->
<div class="wp-block-group has-small-font-size" style="margin-bottom:1rem;padding-right:var(--wp--preset--spacing--2);padding-left:var(--wp--preset--spacing--2)"><!-- wp:group {"className":"show-only-on-desktop","layout":{"type":"constrained"}} -->
<div id="cat-menu" class="wp-block-group show-only-on-desktop"><!-- wp:group {"className":"hide-on-tablet-desktop","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"right"}} -->
<div class="wp-block-group hide-on-tablet-desktop"><!-- wp:image {"width":"28px","height":"auto","sizeSlug":"large","linkDestination":"none","className":"toggle-cat-menu"} -->
<figure class="wp-block-image size-large is-resized toggle-cat-menu"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/close.svg" alt="" class="" style="width:28px;height:auto"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group -->

<!-- wp:pattern {"slug":"theme-rmpro/product-search-form"} /--> 
 
<!-- wp:shortcode -->
<?php 
if (!is_admin()) {
echo do_shortcode('[ng1_product_categories parent="137"
show_count="false" show_parent="false" depth="3" ]');}else{?>
    [ng1_product_categories parent="137"
show_count="false" show_parent="false" depth="3" ]
<?php
}
?>

<!-- /wp:shortcode --></div>
<!-- /wp:group -->

<!-- wp:group {"tagName":"main","layout":{"inherit":true,"type":"constrained"}} -->
<main class="wp-block-group"><!-- wp:woocommerce/store-notices /-->

<!-- wp:group {"align":"wide","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
<div class="wp-block-group alignwide"><!-- wp:woocommerce/product-results-count /-->

<!-- wp:woocommerce/catalog-sorting /--></div>
<!-- /wp:group -->

<!-- wp:woocommerce/product-collection {"queryId":16,"query":{"woocommerceAttributes":[],"woocommerceStockStatus":["instock","outofstock","onbackorder"],"taxQuery":[],"isProductCollectionBlock":true,"perPage":10,"pages":0,"offset":0,"postType":"product","order":"asc","orderBy":"title","author":"","search":"","exclude":[],"sticky":"","inherit":true},"tagName":"div","displayLayout":{"type":"flex","columns":3,"shrinkColumns":true},"dimensions":{"widthType":"fill","fixedWidth":""},"queryContextIncludes":["collection"],"__privatePreviewState":{"isPreview":false,"previewMessage":"Les produits dépendront de la page consultée."},"align":"wide"} -->
<div class="wp-block-woocommerce-product-collection alignwide"><!-- wp:woocommerce/product-template {"style":{"elements":{"link":{"color":{"text":"var:preset|color|contrast-2"}}}},"fontSize":"xs"} -->
<!-- wp:woocommerce/product-image {"imageSizing":"thumbnail","isDescendentOfQueryLoop":true} /-->

<!-- wp:post-title {"textAlign":"center","level":3,"isLink":true,"fontSize":"medium","__woocommerceNamespace":"woocommerce/product-collection/product-title"} /-->

<!-- wp:woocommerce/product-price {"isDescendentOfQueryLoop":true,"textAlign":"center","fontSize":"small","style":{"spacing":{"margin":{"bottom":"1rem"}}}} /-->

<!-- wp:woocommerce/product-button {"textAlign":"center","isDescendentOfQueryLoop":true,"fontSize":"small","style":{"spacing":{"margin":{"bottom":"1rem"}}}} /-->
<!-- /wp:woocommerce/product-template -->

<!-- wp:query-pagination {"layout":{"type":"flex","justifyContent":"center"}} -->
<!-- wp:query-pagination-previous /-->

<!-- wp:query-pagination-numbers /-->

<!-- wp:query-pagination-next /-->
<!-- /wp:query-pagination -->

<!-- wp:woocommerce/product-collection-no-results -->
<!-- wp:group {"layout":{"type":"flex","orientation":"vertical","justifyContent":"center","flexWrap":"wrap"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"fontSize":"medium"} -->
<p class="has-medium-font-size"><strong>Aucun résultat</strong></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p class="">Vous pouvez essayer <a class="wc-link-clear-any-filters" href="#">d’effacer les filtres</a> ou consulter <a class="wc-link-stores-home" href="#">l’accueil de notre boutique</a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->
<!-- /wp:woocommerce/product-collection-no-results -->

<!-- wp:spacer {"height":"var:preset|spacing|8"} -->
<div style="height:var(--wp--preset--spacing--8)" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer --></div>
<!-- /wp:woocommerce/product-collection --></main>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:template-part {"slug":"footer"} /-->