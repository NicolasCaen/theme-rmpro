<?php
defined( 'ABSPATH' ) || exit;

do_action( 'woocommerce_before_cart' ); ?>
<div class="ng1-cart__cols">
    <div class="ng1-cart__col  ng1-cart__col--a">

        <form class="woocommerce-cart-form ng1-cart-form" action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">
            <table class="shop_table shop_table_responsive cart woocommerce-cart-form__contents" cellspacing="0">
                <thead>
                    <tr>
                        <th class="product-name">Produit</th>
                        <th class="product-total">Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php do_action( 'woocommerce_before_cart_contents' ); ?>

                    <?php foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) :
                        $_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
                        $product_permalink = $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '';
                        ?>
                        <tr class="woocommerce-cart-form__cart-item <?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">

                            <!-- ✅ Colonne Produit (Nom, Image, Prix, Description, Input Quantité, Bouton Retirer) -->
                            <td class="product-name ng1-cart__item" data-title="<?php esc_attr_e( 'Produit', 'woocommerce' ); ?>">
                                <div class="ng1-cart__img">
                                    <?php
                                    // Image du produit
                                    $thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image("thumbnail"), $cart_item, $cart_item_key );
                                    echo $thumbnail;
                                    ?>
                                </div>
                                <div class="ng1-cart__content">
                                <?php
                                // Nom du produit avec lien
                                if ( ! $product_permalink ) {
                                    echo wp_kses_post( $_product->get_name() . '&nbsp;' );
                                } else {
                                    echo wp_kses_post( sprintf( '<a class="ng1-cart__name" href="%s">%s</a>', esc_url( $product_permalink ), $_product->get_name() ) );
                                }

                                // Prix unitaire
                                echo '<div class="ng1-cart__price">' . wc_price( $_product->get_price() ) . '</div>';

                                // Description courte
                                echo '<div class="ng1-cart__desc">' . $_product->get_short_description() . '</div>';

                                // Input de quantité modifiable
                                echo '<div class="ng1-cart__qty">' . woocommerce_quantity_input( array(
                                    'input_name'  => "cart[{$cart_item_key}][qty]",
                                    'input_value' => $cart_item['quantity'],
                                    'min_value'   => 1,
                                    'max_value'   => $_product->get_max_purchase_quantity(),
                                ), $_product, false );
                                echo '</div>';
                                // Bouton supprimer
                                echo '<div class="ng1-cart__remove"><a href="' . esc_url( wc_get_cart_remove_url( $cart_item_key ) ) . '" class="ng1-cart__remove__link">Retirer le produit</a></div>';
                                ?>
                                </div>
                            </td>

                            <!-- ✅ Colonne Total -->
                            <td class="product-total" data-title="<?php esc_attr_e( 'Total', 'woocommerce' ); ?>">
                                <?php echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key ); ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>

                    <?php do_action( 'woocommerce_cart_contents' ); ?>

                    <tr>
                        <td colspan="2" class="actions">
                            <button type="submit" class="button wp-element-button" name="update_cart" value="<?php esc_attr_e( 'Mettre à jour le panier', 'woocommerce' ); ?>">
                                <?php esc_html_e( 'Mettre à jour le panier', 'woocommerce' ); ?>
                            </button>

                            <?php wp_nonce_field( 'woocommerce-cart', 'woocommerce-cart-nonce' ); ?>
                        </td>
                    </tr>

                    <?php do_action( 'woocommerce_after_cart_contents' ); ?>
                </tbody>
            </table>
        </form>
    </div>
    <div class="ng1-cart__col ng1-cart__col--b">
        <?php do_action('woocommerce_cart_collaterals'); ?>
    </div>
</div>


<?php do_action( 'woocommerce_after_cart' ); ?>
