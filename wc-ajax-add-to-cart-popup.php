<?php
	/**
	 * Plugin Name: WooCommerce Ajax Add to Cart PopUp
	 * Plugin URI: https://wordpress.org/plugins/../
	 * Description: WooCommerce Ajax Add to Cart PopUp
	 * Author: Emran Ahmed
	 * Version: 1.0.0-beta.1
	 * Domain Path: /languages
	 * Text Domain: wc-ajax-add-to-cart-popup
	 * Author URI: https://themehippo.com/
	 */
	defined( 'ABSPATH' ) or die( 'Keep Silent' );
	
	if ( ! class_exists( 'WC_Ajax_Add_To_Cart_PopUp' ) ):
		class WC_Ajax_Add_To_Cart_PopUp {
			
			protected static $_instance = NULL;
			
			public static function init() {
				if ( is_null( self::$_instance ) ) {
					self::$_instance = new self();
				}
				
				return self::$_instance;
			}
			
			public function __construct() {
				$this->constants();
				$this->includes();
				$this->hooks();
				do_action( 'wc_ajax_add_to_cart_popup_loaded', $this );
			}
			
			public function constants() {
			
			}
			
			public function includes() {
			
			}
			
			public function hooks() {
				add_action( 'init', array( $this, 'language' ) );
			}
			
			public function language() {
				load_plugin_textdomain( 'wc-ajax-add-to-cart-popup', FALSE, trailingslashit( dirname( plugin_basename( __FILE__ ) ) ) . 'languages' );
			}
		}
		
		function WC_Ajax_Add_To_Cart_PopUp() {
			if ( ! is_admin() ) {
				return WC_Ajax_Add_To_Cart_PopUp::init();
			}
		}
		
		add_action( 'plugins_loaded', 'WC_Ajax_Add_To_Cart_PopUp' );
	
	endif;