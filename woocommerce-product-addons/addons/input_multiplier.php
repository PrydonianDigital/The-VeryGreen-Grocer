<div class="addon row">
	<?php foreach ( $addon['options'] as $key => $option ) :
		$addon_key     = 'addon-' . sanitize_title( $addon['field-name'] );
		$option_key    = empty( $option['label'] ) ? $key : sanitize_title( $option['label'] );
		$current_value = isset( $_POST[ $addon_key ] ) && isset( $_POST[ $addon_key ][ $option_key ] ) ? $_POST[ $addon_key ][ $option_key ] : '';
		$price         = $option['price'] > 0 ? '(' . wc_price( get_product_addon_price_for_display( $option['price'] ) ) . ')' : '';
		?>

		<div class="small-12 medium-4 large-2 columns">
			<div class="taptouch addon-wrap-<?php echo sanitize_title( $addon['field-name'] ); ?>">
				<div class="input-group plus-minus-input">
						<button type="button" class="button hollow circle" data-quantity="minus" data-field="<?php echo $addon_key ?>[<?php echo $option_key; ?>]">
							<i class="fa fa-minus" aria-hidden="true"></i>
						</button>
					<input type="number" step="" class="input-text addon addon-input_multiplier" data-raw-price="<?php echo esc_attr( $option['price'] ); ?>" data-price="<?php echo get_product_addon_price_for_display( $option['price'] ); ?>" id="<?php echo $addon_key ?>[<?php echo $option_key; ?>]" name="<?php echo $addon_key ?>[<?php echo $option_key; ?>]" value="<?php echo ( esc_attr( $current_value ) == '' ? $option['min'] : esc_attr( $current_value ) ); ?>" <?php if ( ! empty( $option['min'] ) || $option['min'] === '0' ) echo 'min="' . $option['min'] .'"'; ?> <?php if ( ! empty( $option['max'] ) ) echo 'max="' . $option['max'] .'"'; ?> />
						<button type="button" class="button hollow circle" data-quantity="plus" data-field="<?php echo $addon_key ?>[<?php echo $option_key; ?>]">
							<i class="fa fa-plus" aria-hidden="true"></i>
						</button>
				</div>
				<?php if ( ! empty( $option['label'] ) ) : ?>
					<label><?php echo wptexturize( $option['label'] ) . ' <br/>' . $price; ?></label>
				<?php endif; ?>

				<span class="addon-alert"><?php _e( 'This must be a number!', 'woocommerce-product-addons' ); ?></span>

			</div>
		</div>

	<?php endforeach; ?>
</div>
