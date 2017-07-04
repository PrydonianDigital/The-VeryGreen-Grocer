<?php

add_filter('woocommerce_free_price_html', 'changeFreePriceNotice', 10, 2);

function changeFreePriceNotice($price, $product) {
	return 'FREE';
}

function woo_custom_taxonomy_in_body_class( $classes ){
  if( is_singular( 'product' ) ) {
    $custom_terms = get_the_terms(0, 'product_cat');
    if ($custom_terms) {
      foreach ($custom_terms as $custom_term) {
        $classes[] = 'product_cat_' . $custom_term->slug;
      }
    }
  }
  return $classes;
}
add_filter( 'body_class', 'woo_custom_taxonomy_in_body_class' );

	function basket_widget( $translated_text, $text, $domain ) {
		switch ( $translated_text ) {
			case 'Products' :
				$translated_text = __( 'The VeryGreen Shop', 'woocommerce' );
			break;
			case ' Archive' :
				$translated_text = __( '', 'woocommerce' );
			break;
			case 'Add to cart' :
				$translated_text = __( 'Add To Basket', 'woocommerce' );
			break;
			case 'There are no shipping methods available. Please check your address or contact us if you need any help.' :
				$translated_text = __( '<div class="shippingError">Your order value doesn\'t meet the minimum required for delivery</div>' );
			break;
			case 'No shipping method has been selected. Please double check your address, or contact us if you need any help.' :
				$translated_text = __( 'Your order value doesn\'t meet the minimum required for delivery' );
			break;
			case '£0.00' :
				$translated_text = __( 'Minimum £8', 'woocommerce' );
			break;
			case 'Shipping' :
				$translated_text = __( 'Delivery', 'woocommerce' );
			break;
			case 'Buy now' :
				$translated_text = __( 'Add to basket', 'woocommerce' );
			break;
			case 'Read more' :
				$translated_text = __( 'Select options', 'woocommerce' );
			break;
			case 'Booking cost:' :
				$translated_text = __( 'Delivery cost:', 'woocommerce' );
			break;
			case 'Delivery Date' :
				$translated_text = __( 'Delivery/Collection Date', 'woocommerce-order-delivery' );
			break;
			case 'No products in the basket.' :
				$translated_text = __( 'Your basket is currently empty', 'woocommerce' );
			break;
			case 'Billing Zip' :
				$translated_text = __( 'Billing Post Code', 'woocommerce' );
			break;
			case 'Card Code' :
				$translated_text = __( 'Card CVC Code', 'woocommerce' );
			break;
			case 'Booking cost' :
				$translated_text = __( 'Order total', 'woocommerce-order-delivery' );
			break;
			case 'Book now' :
				$translated_text = __( 'Order', 'woocommerce-order-delivery' );
			break;
			case 'Booking Date' :
				$translated_text = __( 'Delivery Date', 'woocommerce-order-delivery' );
			break;
			case 'My bookings' :
				$translated_text = __( 'My Orders', 'woocommerce-order-delivery' );
			break;
		}
		return $translated_text;
	}
	add_filter( 'gettext', 'basket_widget', 20, 3 );

	add_filter('add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment');
	function woocommerce_header_add_to_cart_fragment( $fragments ) {
		global $woocommerce;
		ob_start();
		?>
			<a class="cart-customlocation" href="<?php echo $woocommerce->cart->get_cart_url(); ?>" title="<?php _e('View your basket', 'woothemes'); ?>"><?php echo sprintf(_n('%d <i class="fa fa-shopping-cart" aria-hidden="true"></i>', '%d <i class="fa fa-shopping-cart" aria-hidden="true"></i>', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count);?></a>
		<?php
		$fragments['a.cart-customlocation'] = ob_get_clean();
		return $fragments;

	}

	add_filter( 'woocommerce_product_tabs', 'woo_remove_product_tabs', 98 );

	function woo_remove_product_tabs( $tabs ) {

	    unset( $tabs['description'] );      	// Remove the description tab
	    unset( $tabs['reviews'] ); 			// Remove the reviews tab
	    unset( $tabs['additional_information'] );  	// Remove the additional information tab

	    return $tabs;

	}

	// Display Fields
	add_action( 'woocommerce_product_options_general_product_data', 'woo_add_custom_general_fields' );

	// Save Fields
	add_action( 'woocommerce_process_product_meta', 'woo_add_custom_general_fields_save' );

	function woo_add_custom_general_fields() {

		global $woocommerce, $post;

		echo '<div class="options_group">';

		woocommerce_wp_text_input(
			array(
				'id'		  => '_text_field',
				'label'	   => __( 'Button text', 'ayguw' ),
				'placeholder' => 'Button text',
				'desc_tip'	=> 'true',
				'description' => __( 'Enter the button text for the shop/home page here.', 'ayguw' )
			)
		);

		echo '</div>';

		echo '<div class="options_group">';

		woocommerce_wp_text_input(
			array(
				'id'		  => '_text_field2',
				'label'	   => __( 'Available Extras text', 'ayguw' ),
				'placeholder' => 'Available Extras',
				'desc_tip'	=> 'true',
				'description' => __( 'Enter the button text for the available blurb here.', 'ayguw' )
			)
		);

		echo '</div>';

		echo '<div class="options_group">';

		woocommerce_wp_text_input(
			array(
				'id'		  => '_text_field3',
				'label'	   => __( 'Shop on Wheels text', 'ayguw' ),
				'placeholder' => 'Shop on Wheels',
				'desc_tip'	=> 'true',
				'description' => __( 'Enter the shop page intro for Shop on Wheels.', 'ayguw' )
			)
		);

		echo '</div>';

	}

	function woo_add_custom_general_fields_save( $post_id ){

		// Text Field
		$woocommerce_text_field = $_POST['_text_field'];
		if( !empty( $woocommerce_text_field ) )
			update_post_meta( $post_id, '_text_field', esc_attr( $woocommerce_text_field ) );

		$woocommerce_text_field = $_POST['_text_field2'];
		if( !empty( $woocommerce_text_field ) )
			update_post_meta( $post_id, '_text_field2', esc_attr( $woocommerce_text_field ) );

		$woocommerce_text_field = $_POST['_text_field3'];
		if( !empty( $woocommerce_text_field ) )
			update_post_meta( $post_id, '_text_field3', esc_attr( $woocommerce_text_field ) );

	}

	// Payment Methods
	if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
		if ( ! class_exists( 'WC_apm' ) ) {
			class WC_apm {
				public function __construct() {
					$this->settings = array(
						array(
							'name' => __( 'Accepted Payment Methods', 'woocommerce-accepted-payment-methods' ),
							'type' => 'title',
							'desc' => sprintf( __( 'To display the selected payment methods you can use the built in widget, the %s shortcode or the %s template tag.', 'woocommerce-accepted-payment-methods' ), '<code>[woocommerce_accepted_payment_methods]</code>', '<code>&lt;?php wc_accepted_payment_methods(); ?&gt;</code>' ),
							'id' => 'wc_apm_options'
						),
						array(
							'name' 		=> __( 'BACS', 'woocommerce-accepted-payment-methods' ),
							'desc' 		=> __( 'Display the BACS logo', 'woocommerce-accepted-payment-methods' ),
							'id' 		=> 'wc_apm_bacs',
							'type' 		=> 'checkbox'
						),
						array(
							'name' 		=> __( 'American Express', 'woocommerce-accepted-payment-methods' ),
							'desc' 		=> __( 'Display the American Express logo', 'woocommerce-accepted-payment-methods' ),
							'id' 		=> 'wc_apm_american_express',
							'type' 		=> 'checkbox'
						),
						array(
							'name' 		=> __( 'Bitcoin', 'woocommerce-accepted-payment-methods' ),
							'desc' 		=> __( 'Display the Bitcoin logo', 'woocommerce-accepted-payment-methods' ),
							'id' 		=> 'wc_apm_bitcoin',
							'type' 		=> 'checkbox'
						),
						array(
							'name' 		=> __( 'Cash on Delivery', 'woocommerce-accepted-payment-methods' ),
							'desc' 		=> __( 'Display Cash on Delivery symbol', 'woocommerce-accepted-payment-methods' ),
							'id' 		=> 'wc_apm_cash_on_delivery',
							'type' 		=> 'checkbox'
						),
						array(
							'name' 		=> __( 'Stripe', 'woocommerce-accepted-payment-methods' ),
							'desc' 		=> __( 'Display the Stripe logo', 'woocommerce-accepted-payment-methods' ),
							'id' 		=> 'wc_apm_stripe',
							'type' 		=> 'checkbox'
						),
						array(
							'name' 		=> __( 'Discover', 'woocommerce-accepted-payment-methods' ),
							'desc' 		=> __( 'Display the Discover logo', 'woocommerce-accepted-payment-methods' ),
							'id' 		=> 'wc_apm_discover',
							'type' 		=> 'checkbox'
						),
						array(
							'name' 		=> __( 'Google', 'woocommerce-accepted-payment-methods' ),
							'desc' 		=> __( 'Display the Google logo', 'woocommerce-accepted-payment-methods' ),
							'id' 		=> 'wc_apm_google',
							'type' 		=> 'checkbox'
						),
						array(
							'name' 		=> __( 'JCB', 'woocommerce-accepted-payment-methods' ),
							'desc' 		=> __( 'Display the JCB logo', 'woocommerce-accepted-payment-methods' ),
							'id' 		=> 'wc_apm_jcb',
							'type' 		=> 'checkbox'
						),
						array(
							'name' 		=> __( 'Maestro', 'woocommerce-accepted-payment-methods' ),
							'desc' 		=> __( 'Display the Maestro logo', 'woocommerce-accepted-payment-methods' ),
							'id' 		=> 'wc_apm_maestro',
							'type' 		=> 'checkbox'
						),
						array(
							'name' 		=> __( 'MasterCard', 'woocommerce-accepted-payment-methods' ),
							'desc' 		=> __( 'Display the MasterCard logo', 'woocommerce-accepted-payment-methods' ),
							'id' 		=> 'wc_apm_mastercard',
							'type' 		=> 'checkbox'
						),
						array(
							'name' 		=> __( 'PayPal', 'woocommerce-accepted-payment-methods' ),
							'desc' 		=> __( 'Display the PayPal logo', 'woocommerce-accepted-payment-methods' ),
							'id' 		=> 'wc_apm_paypal',
							'type' 		=> 'checkbox'
						),
						array(
							'name' 		=> __( 'Visa', 'woocommerce-accepted-payment-methods' ),
							'desc' 		=> __( 'Display the Visa logo', 'woocommerce-accepted-payment-methods' ),
							'id' 		=> 'wc_apm_visa',
							'type' 		=> 'checkbox'
						),
						array(
							'name' 		=> __( 'Visa Delta', 'woocommerce-accepted-payment-methods' ),
							'desc' 		=> __( 'Display the Visa Delta logo', 'woocommerce-accepted-payment-methods' ),
							'id' 		=> 'wc_apm_visadelta',
							'type' 		=> 'checkbox'
						),
						array(
							'name' 		=> __( 'Visa Electron', 'woocommerce-accepted-payment-methods' ),
							'desc' 		=> __( 'Display the Visa Electron logo', 'woocommerce-accepted-payment-methods' ),
							'id' 		=> 'wc_apm_visaelectron',
							'type' 		=> 'checkbox'
						),
						array( 'type' => 'sectionend', 'id' => 'wc_apm_options' ),
					);
					add_option( 'wc_apm_label', 			'' );
					add_option( 'wc_apm_american_express', 	'no' );
					add_option( 'wc_apm_google', 			'no' );
					add_option( 'wc_apm_mastercard', 		'no' );
					add_option( 'wc_apm_paypal', 			'no' );
					add_option( 'wc_apm_visa', 				'no' );
					add_option( 'wc_apm_visadelta', 		'no' );
					add_option( 'wc_apm_visaelectron', 		'no' );
					add_option( 'wc_apm_discover', 			'no' );
					add_option( 'wc_apm_bitcoin', 			'no' );
					add_option( 'wc_apm_maestro', 			'no' );
					add_option( 'wc_apm_cash_on_delivery', 	'no' );
					add_option( 'wc_apm_stripe',			'no' );
					add_option( 'wc_apm_jcb',				'no' );
					add_option( 'wc_apm_bacs',				'no' );
					add_action( 'woocommerce_settings_checkout', array( $this, 'admin_settings' ), 20 );
					add_action( 'woocommerce_update_options_checkout', array( $this, 'save_admin_settings' ) );
				}
				function admin_settings() {
					woocommerce_admin_fields( $this->settings );
				}
				function save_admin_settings() {
					woocommerce_update_options( $this->settings );
				}
			}
			$WC_apm = new WC_apm();
		}
		if ( ! function_exists( 'wc_accepted_payment_methods' ) ) {
			function wc_accepted_payment_methods() {
				$amex 			= get_option( 'wc_apm_american_express' );
				$google 		= get_option( 'wc_apm_google' );
				$mastercard 	= get_option( 'wc_apm_mastercard' );
				$paypal 		= get_option( 'wc_apm_paypal' );
				$visa 			= get_option( 'wc_apm_visa' );
				$visadelta		= get_option( 'wc_apm_visadelta' );
				$visaelectron	= get_option( 'wc_apm_visaelectron' );
				$discover 		= get_option( 'wc_apm_discover' );
				$maestro 		= get_option( 'wc_apm_maestro' );
				$cod			= get_option( 'wc_apm_cash_on_delivery');
				$stripe			= get_option( 'wc_apm_stripe');
				$jcb			= get_option( 'wc_apm_jcb');
				$bitcoin		= get_option( 'wc_apm_bitcoin');
				$bacs		= get_option( 'wc_apm_bacs');
				echo '<ul class="accepted-payment-methods">';
					if ( $bacs== "yes" ) { echo '<li class="bacs" title="BACS"><span>BACS</span></li>'; }
					if ( $jcb== "yes" ) { echo '<li class="jcb" title="JCB"><span>JCB</span></li>'; }
					if ( $stripe== "yes" ) { echo '<li class="stripe" title="Stripe"><span>Stripe</span></li>'; }
					if ( $amex == "yes" ) { echo '<li class="american-express" title="American Express"><span>American Express</span></li>'; }
					if ( $bitcoin == "yes" ) { echo '<li class="bitcoin" title="Bitcoin"><span>Bitcoin</span></li>'; }
					if ( $cod == "yes" ) { echo '<li class="cash-on-delivery" title="Cash on Delivery"><span>Cash on Delivery</span></li>'; }
					if ( $discover == "yes" ) { echo '<li class="discover" title="Discover"><span>Discover</span></li>'; }
					if ( $google == "yes" ) { echo '<li class="google" title="Google"><span>Google</span></li>'; }
					if ( $maestro == "yes" ) { echo '<li class="maestro" title="Maestro"><span>Maestro</span></li>'; }
					if ( $mastercard == "yes" ) { echo '<li class="mastercard" title="MasterCard"><span>MasterCard</span></li>'; }
					if ( $paypal == "yes" ) { echo '<li class="paypal" title="PayPal"><span>PayPal</span></li>'; }
					if ( $visa == "yes" ) { echo '<li class="visa" title="Visa"><span>Visa</span></li>'; }
					if ( $visadelta == "yes" ) { echo '<li class="visadelta" title="Visa Delta"><span>Visa Delta</span></li>'; }
					if ( $visaelectron == "yes" ) { echo '<li class="visaelectron" title="Visa Electron"><span>Visa Electron</span></li>'; }
				echo '</ul>';
			}
		}
		add_shortcode( 'woocommerce_accepted_payment_methods', 'wc_accepted_payment_methods' );
		class Accepted_Payment_Methods extends WP_Widget {
			function Accepted_Payment_Methods() {
				parent::__construct( false, 'WooCommerce Accepted Payment Methods' );
			}
			function widget( $args, $instance ) {
				extract( $args );
				$title = apply_filters( 'widget_title', $instance['title'] );
				echo $before_widget;
				if ( ! empty( $title ) )
					echo $before_title . $title . $after_title;
					wc_accepted_payment_methods();
				echo $after_widget;
			}
			public function update( $new_instance, $old_instance ) {
				$instance = array();
				$instance['title'] = strip_tags( $new_instance['title'] );

				return $instance;
			}
			public function form( $instance ) {
				if ( isset( $instance[ 'title' ] ) ) {
					$title = $instance[ 'title' ];
				}
				else {
					$title = __( 'Accepted Payment Methods', 'woocommerce-accepted-payment-methods' );
				}
				?>
				<p>
				<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'woocommerce-accepted-payment-methods' ); ?></label>
				<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
				</p>
				<p>
				<?php _e( 'Configure which payment methods your store accepts in the', 'woocommerce-accepted-payment-methods' ); ?> <a href="<?php echo admin_url( 'admin.php?page=wc-settings&tab=checkout' ); ?>"><?php _e( 'WooCommerce settings', 'woocommerce-accepted-payment-methods' ); ?></a>.
				</p>
				<?php
			}
		}
		function apm_register_widgets() {
			register_widget( 'Accepted_Payment_Methods' );
		}
		add_action( 'widgets_init', 'apm_register_widgets' );
	}