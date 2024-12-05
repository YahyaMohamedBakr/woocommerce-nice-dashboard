<?php

if ( ! function_exists( 'nice_dashboard' ) ) {

    function nice_dashboard() {
        // Get settings.
        $icons = get_option( 'woo_nice_dashboard_icons', [] );
        $color = get_option( 'woo_nice_dashboard_colors', '#0073aa' );
        $color_hover = get_option( 'woo_nice_dashboard_colors_hover', '#0073aa' );

        ?>
        <style>
            .nice_dashboard div a i {
                color: <?php echo esc_attr( $color ); ?>;
            }
            .nice_dashboard div a:hover i {
                color: <?php echo esc_attr( $color_hover ); ?>;
            }

            <?php foreach ( $icons as $endpoint => $icon_data ) : ?>
                .woocommerce-MyAccount-navigation ul li.woocommerce-MyAccount-navigation-link--<?php echo esc_attr( $endpoint ); ?> a:before {
                    content: "<?php echo esc_attr( $icon_data['unicode'] ? '\\'.$icon_data['unicode'] :'' ); ?>";
                    /* font-family: "Font Awesome 5 Free";  */
                    /* font-weight: 900; 
                    margin-right: 10px;  */
                }
            <?php endforeach; ?>
        </style>
        <div class="nice_dashboard">
            <?php foreach ( wc_get_account_menu_items() as $endpoint => $label ) : ?>
                <div class="<?php echo esc_attr( $endpoint ); ?>-link">
                    <a href="<?php echo esc_url( wc_get_account_endpoint_url( $endpoint ) ); ?>">
                        <i class="<?php echo esc_attr( $icons[ $endpoint ]['class'] ?? 'fas fa-link' ); ?>"></i>
                        <?php  echo esc_html( $label ); ?>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
        <?php
    }

    add_action( 'woocommerce_account_dashboard', 'nice_dashboard', 10 );
}