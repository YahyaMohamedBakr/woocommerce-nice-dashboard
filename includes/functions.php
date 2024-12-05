<?php

if ( ! function_exists( 'nice_dashboard' ) ) {

function nice_dashboard() {
    // Get settings.
    $icons = get_option( 'woo_nice_dashboard_icons', [] );
    $color = get_option( 'woo_nice_dashboard_colors', '#0073aa' );
    $color_hover = get_option( 'woo_nice_dashboard_colors_hover', '#0073aa' );

//var_dump($icons);
    ?>
    <style>
        .nice_dashboard div a i {
            color: <?php echo esc_attr( $color ); ?>;
        }
        .nice_dashboard div a:hover i {
	        color: <?php echo esc_attr( $color_hover ); ?>;


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

//change defulte icons
// function custom_woocommerce_account_menu_items( $items ) {

//      var_dump($items);
//     $new_icons= get_option( 'woo_nice_dashboard_icons', [] );
// //var_dump($new_icons);
//     //$new_items = [];
//     $icons = [
//         'dashboard'       => $new_icons['dashboard'],
//         'orders'          => '<i class="'.$new_icons['orders'].'"></i>',
//         'downloads'       => '<i class="'.$new_icons['downloads'].'"></i>',
//         'edit-address'    => '<i class="'.$new_icons['edit-address'].'"></i>',
//         'payment-methods' => '<i class="'.$new_icons['payment-methods'].'"></i>',
//         'edit-account'    => '<i class="'.$new_icons['edit-account'].'"></i>',
//         'customer-logout' => '<i class="'.$new_icons['customer-logout'].'"></i>',
//     ];

//     foreach ( $items as $endpoint => $label ) {
//         if ( isset( $icons[ $endpoint ] ) ) {
//             $items[ $endpoint ] = $icons[ $endpoint ] . ' ' . $label;
//         }
//     }

//     return $items;
// }
// add_filter( 'woocommerce_account_menu_items', 'custom_woocommerce_account_menu_items', 10, 1 );