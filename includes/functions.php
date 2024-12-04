<?php

if ( ! function_exists( 'nice_dashboard' ) ) {

function nice_dashboard() {
    // Get settings.
    $icons = get_option( 'woo_nice_dashboard_icons', [] );
    $color = get_option( 'woo_nice_dashboard_colors', '#0073aa' );

    ?>
    <style>
        .nice_dashboard div a i {
            color: <?php echo esc_attr( $color ); ?>;
        }
    </style>
    <div class="nice_dashboard">
        <?php foreach ( wc_get_account_menu_items() as $endpoint => $label ) : ?>
            <div class="<?php echo esc_attr( $endpoint ); ?>-link">
                <a href="<?php echo esc_url( wc_get_account_endpoint_url( $endpoint ) ); ?>">
                    <i class="<?php echo esc_attr( $icons[ $endpoint ] ?? 'fas fa-link' ); ?>"></i>
                    <?php echo esc_html( $label ); ?>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
    <?php
}

	
	add_action( 'woocommerce_account_dashboard', 'nice_dashboard', 10 );
}

