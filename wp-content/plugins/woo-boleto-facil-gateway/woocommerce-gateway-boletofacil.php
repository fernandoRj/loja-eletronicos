<?php
/**
 * Plugin Name: WooCommerce Boleto Facil Gateway
 * Description: Extende WooCommerce com o gateway de pagamento do Boleto Facil.
 * Version: 1.0
 * Author: BoletoBancario.com
 * Author URI: https://boletobancario.com/
 *	Copyright: © 2000-2017 BoletoBancario.com.
 *	License: GNU General Public License v3.0
 *	License URI: http://www.gnu.org/licenses/gpl-3.0.html
 */
function wc_boletofacil_woocommerce_is_missing() {
	echo '<div class="error"><p>Boleto Facil para WooCommerce depende da última versão do boletofacil-woocommerce para funcionar! <a href="http://wordpress.org/extend/plugins/woocommerce/">boletofacil-woocommerce</a></p></div>';
}
function wc_boletofacil_gateway_init() {
	if ( ! class_exists( 'WC_Payment_Gateway' ) ) {
		add_action( 'admin_notices', 'wc_boletofacil_woocommerce_is_missing' );
		return;
	}
    
	function wc_boletofacil_add_gateway( $methods ) {
		$methods[] = 'WC_BoletoFacil_Gateway';
		return $methods;
	}
	add_filter( 'woocommerce_payment_gateways', 'wc_boletofacil_add_gateway' );
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wc-boletofacil-gateway.php';

}

add_action( 'plugins_loaded', 'wc_boletofacil_gateway_init', 0 );

function wc_boletofacil_hides_when_is_outside_brazil( $available_gateways ) {
	// Remove standard shipping option.
	if ( isset( $_REQUEST['country'] ) && 'BR' != $_REQUEST['country'] ) {
		unset( $available_gateways['boletofacil'] );
	}
	return $available_gateways;
}
add_filter( 'woocommerce_available_payment_gateways', 'wc_boletofacil_hides_when_is_outside_brazil' );

function wc_boletofacil_pending_payment_instructions( $order_id ) {
	$order = new WC_Order( $order_id );
	if ( 'on-hold' == $order->get_status() && 'boletofacil' == $order->get_payment_method() ) {
		$html = '<div class="woocommerce-info">';
		$html .= sprintf( '<a class="button" href="%s" target="_blank">%s</a>', get_post_meta( $order->get_id(), 'boletofacil_url', true ), 'Imprimir boleto' );
        $message = '<strong> Atenção! </strong> Você não receberá o boleto pelos Correios. <br />';
		$message .= 'Por favor clique no link "Imprimir boleto" a seguir e pague o boleto em seu Internet Banking. <br />';
		$message .= 'Se preferir, imprima e pague em uma agência bancária ou casa lotérica. <br />';
		$message .= 'Ignore esta mensagem se o pagamento já foi realizado.<br />';
		$html .= apply_filters( 'woocommerce_boletofacil_pending_payment_instructions', $message, $order );
		$html .= '</div>';
		echo $html;
	}
}
add_action( 'woocommerce_view_order', 'wc_boletofacil_pending_payment_instructions' );