<div class="addon row align-middle">
	<?php foreach ( $addon['options'] as $i => $option ) :

		$price = apply_filters( 'woocommerce_product_addons_option_price',
			$option['price'] > 0 ? '(' . wc_price( get_product_addon_price_for_display( $option['price'] ) ) . ')' : '',
			$option,
			$i,
			'checkbox'
		);

		$selected = isset( $_POST[ 'addon-' . sanitize_title( $addon['field-name'] ) ] ) ? $_POST[ 'addon-' . sanitize_title( $addon['field-name'] ) ] : array();
		if ( ! is_array( $selected ) ) {
			$selected = array( $selected );
		}

		$current_value = ( in_array( sanitize_title( $option['label'] ), $selected ) ) ? 1 : 0;
		?>

		<div class="small-12 medium-3 large-2 columns check">
			<input type="checkbox" id="addon-wrap-<?php echo sanitize_title( $addon['field-name'] ) . '-' . $i; ?>" class="addon addon-checkbox" name="addon-<?php echo sanitize_title( $addon['field-name'] ); ?>[]" data-raw-price="<?php echo esc_attr( $option['price'] ); ?>" data-price="<?php echo get_product_addon_price_for_display( $option['price'] ); ?>" value="<?php echo sanitize_title( $option['label'] ); ?>" <?php checked( $current_value, 1 ); ?> />
			<label for="addon-wrap-<?php echo sanitize_title( $addon['field-name'] ) . '-' . $i; ?>" class="taptouch addon-wrap-<?php echo sanitize_title( $addon['field-name'] ) . '-' . $i; ?>">
				<?php echo nl2br( $option['label'] . ' ' . $price ); ?>
			</label>
		</div>

	<?php endforeach; ?>
</div>