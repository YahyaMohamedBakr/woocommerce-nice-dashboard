<?php

if ( ! function_exists( 'nice_dashboard' ) ) {
	function nice_dashboard() {
		$icons = [
			'dashboard'       => 'fas fa-home',
			'orders'          => 'fas fa-shopping-bag',
			'downloads'       => 'fas fa-download',
			'edit-address'    => 'fas fa-map-marker-alt',
			'payment-methods' => 'fas fa-credit-card',
			'edit-account'    => 'fas fa-user-edit',
			'customer-logout' => 'fas fa-sign-out-alt',
		];
		?>
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
