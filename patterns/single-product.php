<?php
/**
 * Title: Single Product
 * Slug: theme-rmpro/single-product
 * Description: Page d'un produit
 * Inserter: no
 *
 */
?>

<!-- wp:group {"tagName":"main","style":{"spacing":{"padding":{"right":"var:preset|spacing|2","left":"var:preset|spacing|2","bottom":"var:preset|spacing|8"}}},"layout":{"inherit":true,"type":"constrained"}} -->
<main class="wp-block-group" style="padding-right:var(--wp--preset--spacing--2);padding-bottom:var(--wp--preset--spacing--8);padding-left:var(--wp--preset--spacing--2)"><!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"var:preset|spacing|3","bottom":"var:preset|spacing|3"}}},"layout":{"type":"constrained"}} -->
    <div class="wp-block-group alignwide" style="padding-top:var(--wp--preset--spacing--3);padding-bottom:var(--wp--preset--spacing--3)"><!-- wp:woocommerce/breadcrumbs {"style":{"elements":{"link":{"color":{"text":"var:preset|color|contrast-2"}}}}} /--></div>
    <!-- /wp:group -->
    
    <!-- wp:woocommerce/store-notices /-->
    
    <!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|8"}}}} -->
    <div class="wp-block-columns alignwide"><!-- wp:column {"width":"512px"} -->
    <div class="wp-block-column" style="flex-basis:512px"><!-- wp:woocommerce/product-image-gallery /--></div>
    <!-- /wp:column -->
    
    <!-- wp:column {"width":"600px"} -->
    <div class="wp-block-column" style="flex-basis:600px"><!-- wp:post-title {"level":1,"fontSize":"h-3","__woocommerceNamespace":"woocommerce/product-query/product-title"} /-->
    
    <!-- wp:woocommerce/product-price {"isDescendentOfSingleProductTemplate":true,"fontSize":"l"} /-->
    
    <!-- wp:post-excerpt {"excerptLength":100,"fontSize":"l","__woocommerceNamespace":"woocommerce/product-query/product-summary"} /-->
    
    <!-- wp:woocommerce/add-to-cart-form /-->
    <!-- wp:buttons -->
    <div class="wp-block-buttons"><!-- wp:button -->
    <div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="https://vetements-cyclisme.local/demande-de-devis/">Demande de devis</a></div>
    <!-- /wp:button --></div>
    <!-- /wp:buttons -->
    <!-- wp:woocommerce/product-meta -->
    <div class="wp-block-woocommerce-product-meta"><!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap"}} -->
    <div class="wp-block-group"><!-- wp:woocommerce/product-sku {"isDescendentOfSingleProductTemplate":true} /-->
    
    <!-- wp:post-terms {"term":"product_cat","prefix":"Category: "} /-->
    
    <!-- wp:post-terms {"term":"product_tag","prefix":"Tags: "} /--></div>
    <!-- /wp:group --></div>
    <!-- /wp:woocommerce/product-meta --></div>
    <!-- /wp:column --></div>
    <!-- /wp:columns -->
    
    <!-- wp:spacer {"height":"var:preset|spacing|7"} -->
    <div style="height:var(--wp--preset--spacing--7)" aria-hidden="true" class="wp-block-spacer"></div>
    <!-- /wp:spacer -->
    
    <!-- wp:woocommerce/product-details {"align":"wide","className":"is-style-minimal"} /-->
    
    <!-- wp:woocommerce/product-collection {"queryId":4,"query":{"perPage":5,"pages":1,"offset":0,"postType":"product","order":"asc","orderBy":"title","search":"","exclude":[],"inherit":false,"taxQuery":[],"isProductCollectionBlock":true,"featured":false,"woocommerceOnSale":false,"woocommerceStockStatus":["instock","onbackorder"],"woocommerceAttributes":[],"woocommerceHandPickedProducts":[],"filterable":false},"tagName":"div","displayLayout":{"type":"flex","columns":5,"shrinkColumns":false},"dimensions":{"widthType":"fill"},"collection":"woocommerce/product-collection/related","hideControls":["inherit"],"queryContextIncludes":["collection"],"__privatePreviewState":{"isPreview":true,"previewMessage":"Actual products will vary depending on the product being viewed."},"align":"wide"} -->
    <div class="wp-block-woocommerce-product-collection alignwide"><!-- wp:heading {"style":{"spacing":{"margin":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}}}} -->
    <h2 class="wp-block-heading" style="margin-top:var(--wp--preset--spacing--30);margin-bottom:var(--wp--preset--spacing--30)">
                    Produits similaires			</h2>
    <!-- /wp:heading -->
    
    <!-- wp:woocommerce/product-template -->
    <!-- wp:woocommerce/product-image {"imageSizing":"thumbnail","isDescendentOfQueryLoop":true} /-->
    
    <!-- wp:post-title {"textAlign":"center","level":3,"isLink":true,"style":{"spacing":{"margin":{"bottom":"0.75rem","top":"0"}}},"fontSize":"medium","__woocommerceNamespace":"woocommerce/product-collection/product-title"} /-->
    
    <!-- wp:woocommerce/product-price {"isDescendentOfQueryLoop":true,"textAlign":"center","fontSize":"small"} /-->
    
    <!-- wp:woocommerce/product-button {"textAlign":"center","isDescendentOfQueryLoop":true,"fontSize":"small"} /-->
    <!-- /wp:woocommerce/product-template --></div>
    <!-- /wp:woocommerce/product-collection --></main>
    <!-- /wp:group -->
    