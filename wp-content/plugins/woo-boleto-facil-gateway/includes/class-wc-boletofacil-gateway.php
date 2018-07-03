<?php
class WC_BoletoFacil_Gateway extends WC_Payment_Gateway {
	public function __construct() {
		$this->id                 = 'boletofacil';
		$this->plugin_slug        = 'boletofacil-woocommerce';
        $this->version            = '1.0.0';
		$this->icon               = apply_filters( 'woocommerce_boletofacil_icon', '' );
		$this->has_fields         = false;
		$this->method_title       = 'Boleto Facil';
		$this->method_description = 'Comece a receber dinheiro via boleto bancário usando Boleto Fácil.';
        // API.
        $this->api_url = 'https://www.boletobancario.com/boletofacil/integration/api/v1/';
        $this->sandbox_url = 'https://sandbox.boletobancario.com/boletofacil/integration/api/v1/';
		// Load the form fields.
		$this->init_form_fields();
		// Load the settings.
		$this->init_settings();
		// Define user set variables.
		$this->title              = $this->get_option( 'title' );
		$this->description        = $this->get_option( 'description' );
		$this->token              = $this->get_option( 'token' );
		$this->days_to_pay        = $this->get_option( 'due_days', 3 );
		$this->testmode           = $this->get_option( 'testmode' );
        if ( $this->get_option( 'charge_description' ) !== null && ! empty( $this->get_option( 'charge_description' ) ) ) {
            $this->charge_description = $this->get_option( 'charge_description' );
        } else {
            $this->charge_description = 'Produto de E-Commerce';
        }
        $this->max_overdue_days   = $this->get_option( 'max_overdue_days', 0 );
        $this->fine               = $this->get_option( 'fine', 0.0 );
        $this->interest           = $this->get_option( 'interest', 0.0 );
        $this->notifyPayer        = $this->get_option( 'notify_payer' ) == 'no' ? 'false' : 'true';
        $this->debug              = $this->get_option( 'debug' );
    
		// Actions.
		add_action( 'woocommerce_api_wc_boletofacil_gateway', array( $this, 'check_webhook_notification' ) );
		add_action( 'woocommerce_boletofacil_webhook_notification', array( $this, 'successful_webhook_notification' ) );
		add_action( 'woocommerce_update_options_payment_gateways_' . $this->id, array( $this, 'process_admin_options' ) );
		add_action( 'woocommerce_thankyou_' . $this->id, array( $this, 'thankyou_page' ) );
		add_action( 'woocommerce_email_after_order_table', array( $this, 'email_instructions' ), 10, 2 );
		// Active logs.
		if ( 'yes' == $this->debug ) {
			if ( class_exists( 'WC_Logger' ) ) {
				$this->log = new WC_Logger();
			} else {
				$this->log = $this->woocommerce_instance()->logger();
			}
		}
	}
	protected function woocommerce_instance() {
		if ( function_exists( 'WC' ) ) {
			return WC();
		} else {
			global $woocommerce;
			return $woocommerce;
		}
	}
	protected function using_supported_currency() {
		return ( get_woocommerce_currency() == 'BRL' );
	}
	/**
	 * Returns a value indicating the Gateway is available or not. It's called
	 * automatically by WooCommerce before allowing customers to use the gateway
	 * for payment.
	 */
	public function is_available() {
		// Test if is valid for use.
		$available = ( 'yes' == $this->get_option( 'enabled' ) ) &&
					! empty( $this->token ) &&
					$this->using_supported_currency();
		return $available;
	}
	public function add_error( $message ) {
		if ( version_compare( $this->woocommerce_instance()->version, '2.1', '>=' ) ) {
			wc_add_notice( $message, 'error' );
		} else {
			$this->woocommerce_instance()->add_error( $message );
		}
	}
	public function init_form_fields() {
		$this->form_fields = array(
			'enabled' => array(
				'title'   => 'Habilitar/Desabilitar',
				'type'    => 'checkbox',
				'label'   => 'Habilitar Boleto Facil',
				'default' => 'yes'
			),            
			'testmode' => array(
				'title'       => 'Ambiente de testes de Boleto Fácil',
				'type'        => 'checkbox',
				'label'       => 'Habilitar ambiente de testes de Boleto Fácil',
				'default'     => 'no',
                'description' => 'Ambiente de testes de Boleto Facil pode ser usado para testar pagamentos.<br /> Cadastre uma conta em nosso ambiente de testes pelo <a href="https://sandbox.boletobancario.com" target="_blank"> link </a> '
			),
			'title' => array(
				'title'       => 'Título',
				'type'        => 'text',
				'description' => 'Nome da forma de pagamento que aparecerá na tela de "Finalizar Compra".',
				'desc_tip'    => true,
				'default'     => 'Boleto Bancário'
			),
			'description' => array(
				'title'       => 'Descrição',
				'type'        => 'textarea',
				'description' => 'Descrição da forma de pagamento que aparecerá na tela de "Finalizar Compra".',
				'default'     => 'Pague usando boleto bancário.'
			),
			'token' => array(
				'title'       => 'Boleto Fácil Token',
				'type'        => 'text',
				'description' => 'Por favor insira seu Token da Boleto Fácil. Isto é necessário para processo de pagamento. <br /> Você pode gerar seu Token realizando login no Boleto Fácil e clicando <a href="https://www.boletobancario.com/boletofacil/integration/integration.html#token" target="_blank"> aqui</a>.',
				'default'     => ''
			),
			'due_days' => array(
				'title'       => 'Quantidade de dias para vencimiento.',
				'type'        => 'text',
				'description' => 'Informe o número de dias que o cliente terá para pagar o boleto.',
				'desc_tip'    => true,
				'default'     => '3'
			),
            'charge_description' => array(
                'title'       => 'Descrição das cobranças',
                'type'        => 'textarea',
                'description' => '*Este campo é obrigatório. Descrição que será envida para o Boleto Fácil. Caso esteja vazio, será enviada a descrição "Produto de E-Commerce"',
                'default'     => 'Produto de E-Commerce',
                'required'    => true
            ),
            'max_overdue_days' => array(
                'title'       => 'Quantidade de dias para pagamento após o vencimento',
                'type'        => 'text',
                'description' => 'Número máximo de dias que o boleto poderá ser pago após o vencimento. Zero significa que o boleto não poderá ser pago após o vencimento.',
                'desc_tip'    => true ,
				'default'     => '0'
            ),
            'fine' => array(
                'title'       => 'Multa',
                'type'        => 'text',
                'description' => 'Multa para pagamento após o vencimento. Maior ou igual a 0.00 e menor ou igual a 2.00 (máximo permitido por lei).',
                'desc_tip'    => true,
				'default'     => '0.0'
            ),
            'interest' => array(
                'title'       => 'Juros',
                'type'        => 'text',
                'description' => 'Juro para pagamento após o vencimento. Maior ou igual a 0.00 e menor ou igual a 1.00 (máximo permitido por lei).',
                'desc_tip'    => true,
				'default'     => '0.0'
            ),
            'notify_payer' => array(
                'title'       => 'Notificar comprador por email',
                'type'        => 'checkbox',
                'description' => 'Define se o Boleto Fácil enviará emails de notificação sobre a cobrança para o comprador. O email com o boleto ou carnet só será enviado ao comprador, se este parâmetro for verdadeiro e o endereço de email do comprador estiver presente. O lembrete de vencimento só será enviado se as condições acima forem verdadeiras e se na configuração do Favorecido os lembretes estiverem ativados',
                'desc_tip'    => true,
				'default'     => 'yes'
            ),
            'debug' => array(
				'title'       => 'Debug Log',
				'type'        => 'checkbox',
				'label'       => 'Habilitar log',
				'default'     => 'no',
				'description' => sprintf( 'Log eventos do Boleto Fácil, assim como requisições de API, neste endereço %s', '<code>wc-logs/' . $this->id . '-' . sanitize_file_name( wp_hash( $this->id ) ) . '.txt</code>' )
			)
		);
	}
	public function process_payment( $order_id ) {
		// Gets the order data.
		$order = new WC_Order( $order_id );
		// Generate the billet.
		$billet = $this->generate_billet( $order );
		if ( $billet ) {
			// Mark as on-hold (we're awaiting the payment).
			$order->update_status( 'on-hold', 'Aguardando pagamento do boleto.' );
			// Reduce stock levels.
			$order->reduce_order_stock();
			// Remove cart.
			$this->woocommerce_instance()->cart->empty_cart();
			// Sets the return url.
			if ( version_compare( $this->woocommerce_instance()->version, '2.1', '>=' ) ) {
				$url = $order->get_checkout_order_received_url();
			} else {
				$url = add_query_arg( 'key', $order->get_order_key(), add_query_arg( 'order', $order_id, get_permalink( woocommerce_get_page_id( 'thanks' ) ) ) );
			}
			// Return thankyou redirect.
			return array(
				'result'   => 'success',
				'redirect' => $url
			);
		} else {
			// Added error message.
			$this->add_error( '<strong>' . $this->title . '</strong>: ' . 'Um erro ocorreu enquanto procesamos seu pagamento, por favor tente novamente. Ou nos contacte para assistência.' );
			return array(
				'result' => 'fail'
			);
		}
	}
	protected function generate_billet( $order ) {
		if ( 'yes' == $this->testmode ) {
  		    $url  = $this->sandbox_url . 'issue-charge';
		} else {
  		    $url  = $this->api_url . 'issue-charge';
		}
    
		$body = $this-> payment_data( $order );
		if ( 'yes' == $this->debug ) {
			$this->log->add( $this->id, 'Creating billet for order ' . $order->get_order_number() . ' with the following data: ' . print_r( $body, true ) );
		}
		$params = array(
			'method'     => 'POST',
			'charset'    => 'UTF-8',
			'timeout'    => 60,
			'headers'    => array(
				'Content-Type' => 'application/x-www-form-urlencoded; charset=UTF-8',
                'User-Agent' => 'WooCommerce Boleto Fácil'
			)
		);
        
		$response = wp_remote_post( $url . '?' . http_build_query( $body ), $params );
        
		if ( is_wp_error( $response ) ) {
			if ( 'yes' == $this->debug ) {
				$this->log->add( $this->id, 'WP_Error in generate the billet: ' . $response->get_error_message() );
			}
		}
        
        $responseData = json_decode($response['body']);

        if ( 'true' == $responseData->{'success'} ) {
			try {
				$data = $responseData->{'data'}->{'charges'}[0]; 
			} catch ( Exception $e ) {
				$data = '';
				if ( 'yes' == $this->debug ) {
					$this->log->add( $this->id, 'Error while parsing the Boleto Fácil response: ' . print_r( $e->getMessage(), true ) );
				}
			}
			if ( isset( $data->{'code'} ) ) {
				if ( 'yes' == $this->debug ) {
					$this->log->add( $this->id, 'Billet created with success! The ID is: ' . $data->{'code'} . ' with the following data: ' . print_r( $data, true ) );
				}
				// Save billet data in order meta.
				add_post_meta( $order->get_id(), 'boletofacil_id', $data->{'code'} );
				add_post_meta( $order->get_id(), 'boletofacil_url', $data->{'link'} );
				return true;
			}
		}
		if ( 'yes' == $this->debug ) {
			$this->log->add( $this->id, 'Request error: ' . print_r( $response, true ) );
		}
		return false;
	}
	protected function payment_data( $order ) {

		$args = array(
			// Customer data.
			'payerName'      => $order->get_billing_first_name() . ' ' . $order->get_billing_last_name(),
			// Order data.
			'amount'         => number_format( $order->get_total(), 2, '.', '' ),
			// Document data.
			'description'    => $this->charge_description,
            'payerEmail'     => $order->get_billing_email(),
            'dueDate'        => date( 'd/m/Y', time() + ( $this->days_to_pay * 86400 ) ),
            'token'          => $this->token,
            'reference'      => 'order-' . $order->get_id(),
            'maxOverdueDays' => $this->max_overdue_days,
            'fine'           => number_format( $this->fine, 2, '.', '' ),
            'interest'       => number_format( $this->interest, 2, '.', '' ),
            'notifyPayer'    => $this->notifyPayer   
		);
    
		// WooCommerce Extra Checkout Fields for Brazil person type fields.
		if ( isset( $order->billing_persontype ) && ! empty( $order->billing_persontype ) ) {
			if ( 2 == $order->billing_persontype ) {
				$args['payerCpfCnpj'] = $order->billing_cnpj;
			} else {
				$args['payerCpfCnpj'] = $order->billing_cpf;
			}
		} else {
            $this->add_error( '<strong>' . $this->title . '</strong>: ' . 'CPF ou CNPJ deve ser informado.' );
        }
		// Address.
        $billing_postcode = '';
        if (method_exists($order, "get_billing_postcode")) {
            $billing_postcode = $order->get_billing_postcode();
        } else {
            $billing_postcode = $order->billing_postcode;
        }
		if ( $billing_postcode !== null && ! empty( $billing_postcode ) ) {
			$args['billingAddressStreet']   = $order->get_billing_address_1();
			$args['billingAddressCity']     = $order->get_billing_city();
			$args['billingAddressState']    = $order->get_billing_state();
			$args['billingAddressPostcode'] = $billing_postcode;
			// WooCommerce Extra Checkout Fields for Brazil number field.
			if ( isset( $order->billing_number ) && ! empty( $order->billing_number ) ) {
				$args['billingAddressNumber'] = $order->billing_number;
			}
			// Address complement.
			if ( ! empty( $order->get_billing_address_2() ) ) {
				$args['billingAddressComplement'] = $order->get_billing_address_2();
			}
		}
		// Phone
		if ( $order->get_billing_phone() !== null && ! empty( $order->get_billing_phone() ) ) {
			$args['payerPhone'] = preg_replace("/\D/", "", $order->get_billing_phone());
		}
		// Sets a filter for custom arguments.
		$args = apply_filters( 'woocommerce_boletofacil_billet_data', $args, $order );
		return $args;
	}
	public function thankyou_page( $order_id ) {
		$url = get_post_meta( $order_id, 'boletofacil_url', true );
		$html = '<div class="woocommerce-message">';
    
		if ( isset( $url ) && ! empty( $url ) ) {
            $html .= sprintf( '<a class="button" href="%s" target="_blank">%s</a>', $url, 'Imprimir boleto.' );
        }
  
		$message = '<strong> Atenção! </strong> Você não receberá o boleto pelos Correios. <br />';
		$message .= 'Por favor clique no link "Imprimir boleto" a seguir e pague o boleto em seu Internet Banking. <br />';
		$message .= 'Se preferir, imprima e pague em uma agência bancária ou casa lotérica. <br />';
		$html .= apply_filters( 'woocommerce_boletofacil_thankyou_page_instructions', $message, $order_id );
		$html .= '</div>';
		echo $html;
	}
	public function email_instructions( $order, $sent_to_admin ) {
		if ( $sent_to_admin || $order->get_status() !== 'on-hold' || $order->get_payment_method() !== $this->id ) {
			return;
		}
		$html = '<h2> Pagamento </h2>';
		$html .= '<p class="order_details">';
		$message = '<strong> Atenção! </strong> Você não receberá o boleto pelos Correios. <br />';
		$message .= 'Por favor clique no link "Imprimir boleto" a seguir e pague o boleto em seu Internet Banking. <br />';
		$message .= 'Se preferir, imprima e pague em uma agência bancária ou casa lotérica. <br />';
        $url = get_post_meta( $order->get_id(), 'boletofacil_url', true );
      
		$html .= apply_filters( 'woocommerce_boletofacil_email_instructions', $message, $order );
		if ( isset( $url ) && ! empty( $url ) ) {
            $html .= '<br />' . sprintf( '<a class="button" href="%s" target="_blank">%s</a>', $url, 'Imprimir boleto' ) . '<br />';
        }
		
        $html .= '</p>';
		echo $html;
	}
    public function check_webhook_notification() {
        @ob_clean();

        if ( 'yes' == $this->debug ) {
            $this->log->add( $this->id, 'Novo Webhook chamado: ' . print_r( $_POST['paymentToken'], true ) );
        }
        if( empty( $_POST['paymentToken'] ) && isset( $_POST['paymentToken'] ) ) {
            throw new Exception('Falha ao interpretar JSON do webhook: Payment Token não encontrado!');
        }
        header( 'HTTP/1.1 200 OK' );
                
        if ( 'yes' == $this->testmode ) {
  		    $url  = $this->sandbox_url . 'fetch-payment-details';
		} else {
  		    $url  = $this->api_url . 'fetch-payment-details';
		}
        $params = array(
			'method'     => 'POST',
			'charset'    => 'UTF-8',
			'sslverify'  => true,
			'timeout'    => 60,
			'headers'    => array(
				'Content-Type' => 'application/json',
                'User-Agent' => 'WooCommerce Boleto Fácil'
			)
		);

        $requestBody = array( 'paymentToken' => $_POST['paymentToken'] );
        $response = wp_remote_post( $url . '?' . http_build_query( $requestBody ), $params );
        $responseData = json_decode($response['body']);

        if ( is_wp_error( $response ) ) {
			if ( 'yes' == $this->debug ) {
				$this->log->add( $this->id, 'WP_Error in get payment datails: ' . $response->get_error_message() );
			}
		} elseif ( 'true' == $responseData->{'success'} ) {
            do_action( 'woocommerce_boletofacil_webhook_notification', $responseData->{'data'} );
        }
    }
	public function successful_webhook_notification( $data ) {
		if ( 'yes' == $this->debug ) {
			$this->log->add( $this->id, 'Received the notification with the following data: ' . print_r( $data, true ) );
		}
		$order_id = intval( str_replace( 'order-', '', $data->{'payment'}->{'charge'}->{'reference'} ) );
		$order = new WC_Order( $order_id );
		if ( 'yes' == $this->debug ) {
			$this->log->add( $this->id, 'Updating to processing the status of the order ' . $order->get_order_number() );
		}
		// Complete the order.
        update_post_meta( $order->get_id(), 'boletofacil_paid_amount', number_format(floatval($data->{'payment'}->{'amount'}), 2, ',', '.' ));
        update_post_meta( $order->get_id(), 'boletofacil_paid_at', $data->{'payment'}->{'date'});
        $order->add_order_note( 'Boleto Fácil: Pagamento aprovado.' );
        $order->payment_complete();
	}
}