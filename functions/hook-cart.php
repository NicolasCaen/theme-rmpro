<?php

add_filter('woocommerce_cart_item_name', 'custom_woocommerce_cart_item_name', 10, 3);
function custom_woocommerce_cart_item_name($product_name, $cart_item, $cart_item_key) {
    $product = $cart_item['data'];
    $description = $product->get_short_description(); // Récupérer la description courte
    $price = wc_price($product->get_price()); // Prix du produit
    $quantity = $cart_item['quantity'];
    $remove_url = wc_get_cart_remove_url($cart_item_key);

    // Champ de mise à jour de la quantité
    $input_qty = woocommerce_quantity_input(array(
        'input_name'  => "cart[{$cart_item_key}][qty]",
        'input_value' => $quantity,
        'min_value'   => 0,
        'max_value'   => $product->get_max_purchase_quantity(),
        'classes'     => array('cart-quantity-input')
    ), $product, false);

    $output = '<div class="custom-cart-item">';
    $output .= '<strong>' . $product_name . '</strong><br>';
    $output .= '<span class="cart-price">' . $price . '</span><br>';
    $output .= '<span class="cart-desc">' . $description . '</span><br>';
    $output .= $input_qty . '<br>'; // Ajout de l'input pour modifier la quantité
    $output .= '<a href="' . esc_url($remove_url) . '" class="remove">Retirer</a>';
    $output .= '</div>';

    return $output;
}

add_filter('woocommerce_cart_item_subtotal', 'custom_woocommerce_cart_total', 10, 3);
function custom_woocommerce_cart_total($subtotal, $cart_item, $cart_item_key) {
    return '<strong>' . $subtotal . '</strong>';
}

// Supprimer les colonnes Prix et Quantité
add_filter('woocommerce_cart_columns', 'custom_remove_cart_columns');
function custom_remove_cart_columns($columns) {
    unset($columns['price']);
    unset($columns['quantity']);
    return $columns;
}
