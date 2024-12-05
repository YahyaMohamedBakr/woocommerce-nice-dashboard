<?php 
function woo_nice_dashboard_settings_page() {
    // Get saved options.
    $icons = get_option( 'woo_nice_dashboard_icons', [
        'dashboard'       => ['class' => 'fas fa-home', 'unicode' => '\\f015'],
        'orders'          => ['class' => 'fas fa-shopping-bag', 'unicode' => '\\f290'],
        'downloads'       => ['class' => 'fas fa-download', 'unicode' => '\\f019'],
        'edit-address'    => ['class' => 'fas fa-map-marker-alt', 'unicode' => '\\f3c5'],
        'payment-methods' => ['class' => 'fas fa-credit-card', 'unicode' => '\\f09d'],
        'edit-account'    => ['class' => 'fas fa-user-edit', 'unicode' => '\\f4ff'],
        'customer-logout' => ['class' => 'fas fa-sign-out-alt', 'unicode' => '\\f2f5'],
    ] );

    $colors = get_option( 'woo_nice_dashboard_colors', '#0073aa' );
    $colors_hover = get_option( 'woo_nice_dashboard_colors_hover', '#0073aa' );

    ?>
    <div class="wrap">
        <h1><?php esc_html_e( 'WooCommerce Nice Dashboard Settings', 'woocommerce-nice-dashboard' ); ?></h1>
        <form method="post" action="options.php">
            <?php settings_fields( 'woo_nice_dashboard_settings' ); ?>
            <?php do_settings_sections( 'woo_nice_dashboard_settings' ); ?>

            <h2><?php esc_html_e( 'Dashboard Icons', 'woocommerce-nice-dashboard' ); ?></h2>
            <table class="form-table">
                <?php foreach ( $icons as $key => $icon_data ) : ?>
                    <tr>
                        <th scope="row">
                            <label for="woo_nice_dashboard_icons[<?php echo esc_attr( $key ); ?>][class]">
                                <?php echo esc_html( ucfirst( str_replace( '-', ' ', $key ) ) ); ?>
                            </label>
                        </th>
                        <td>
                            <input type="text" 
                                   id="woo_nice_dashboard_icons[<?php echo esc_attr( $key ); ?>][class]" 
                                   name="woo_nice_dashboard_icons[<?php echo esc_attr( $key ); ?>][class]" 
                                   value="<?php echo esc_attr( $icon_data['class'] ?? '' ); ?>" 
                                   class="regular-text" />
                            <p class="description"><?php esc_html_e( 'Enter FontAwesome class for the icon.', 'woocommerce-nice-dashboard' ); ?></p>
                        </td>
                        <td>
                            <input type="text" 
                                   id="woo_nice_dashboard_icons[<?php echo esc_attr( $key ); ?>][unicode]" 
                                   name="woo_nice_dashboard_icons[<?php echo esc_attr( $key ); ?>][unicode]" 
                                   value="<?php echo esc_attr( $icon_data['unicode'] ?? '' ); ?>" 
                                   class="regular-text" />
                            <p class="description"><?php esc_html_e( 'Enter Unicode for the icon.', 'woocommerce-nice-dashboard' ); ?></p>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>

            <h2><?php esc_html_e( 'Icon Colors', 'woocommerce-nice-dashboard' ); ?></h2>
            <table class="form-table">
                <tr>
                    <th scope="row">
                        <label for="woo_nice_dashboard_colors"><?php esc_html_e( 'Icon Color', 'woocommerce-nice-dashboard' ); ?></label>
                    </th>
                    <td>
                        <input type="color" id="woo_nice_dashboard_colors" name="woo_nice_dashboard_colors" value="<?php echo esc_attr( $colors ); ?>">
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="woo_nice_dashboard_colors_hover"><?php esc_html_e( 'Icon Hover Color ', 'woocommerce-nice-dashboard' ); ?></label>
                    </th>
                    <td>
                        <input type="color" id="woo_nice_dashboard_colors_hover" name="woo_nice_dashboard_colors_hover" value="<?php echo esc_attr( $colors_hover ); ?>">
                    </td>
                </tr>
            </table>

            <?php submit_button(); ?>
        </form>
    </div>
    <?php
}

