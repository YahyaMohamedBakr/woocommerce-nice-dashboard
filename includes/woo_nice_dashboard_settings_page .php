<?php 
function woo_nice_dashboard_settings_page() {
    // Get saved options.
    $icons = get_option( 'woo_nice_dashboard_icons', [
        'dashboard'       => 'fas fa-home',
        'orders'          => 'fas fa-shopping-bag',
        'downloads'       => 'fas fa-download',
        'edit-address'    => 'fas fa-map-marker-alt',
        'payment-methods' => 'fas fa-credit-card',
        'edit-account'    => 'fas fa-user-edit',
        'customer-logout' => 'fas fa-sign-out-alt',
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
                <?php foreach ( $icons as $key => $icon ) : ?>
                    <tr>
                        <th scope="row">
                            <label for="woo_nice_dashboard_icons[<?php echo esc_attr( $key ); ?>]">
                                <?php echo esc_html( ucfirst( str_replace( '-', ' ', $key ) ) ); ?>
                            </label>
                        </th>
                        <td>
                            <input type="text" id="woo_nice_dashboard_icons[<?php echo esc_attr( $key ); ?>]" 
                                name="woo_nice_dashboard_icons[<?php echo esc_attr( $key ); ?>]" 
                                value="<?php echo esc_attr( $icon ); ?>" 
                                class="regular-text" />
                            <p class="description"><?php esc_html_e( 'Enter FontAwesome class for the icon.', 'woocommerce-nice-dashboard' ); ?></p>
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
