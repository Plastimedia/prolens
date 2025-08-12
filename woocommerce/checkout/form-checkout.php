<?php
/**
 * Checkout Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-checkout.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

do_action( 'woocommerce_before_checkout_form', $checkout );

// If checkout registration is disabled and not logged in, the user cannot checkout.
if ( ! $checkout->is_registration_enabled() && $checkout->is_registration_required() && ! is_user_logged_in() ) {
	echo esc_html( apply_filters( 'woocommerce_checkout_must_be_logged_in_message', __( 'You must be logged in to checkout.', 'woocommerce' ) ) );
	return;
}

?>

<form 
	name="checkout" 
	method="post" 
	class="checkout woocommerce-checkout" 
	action="<?php echo esc_url( wc_get_checkout_url() ); ?>" 
	enctype="multipart/form-data"
	
>
	<div class="col2-set" id="customer_details">
		<div class="col-1">
			<h1 style="text-align: left;"><?php the_title(); ?></h1>
		    <?php do_action( 'woocommerce_checkout_billing' ); ?>
		</div>
		<div class="col-2">
			<?php do_action( 'woocommerce_checkout_before_order_review_heading' ); ?>
			<div class="resumen-compra">
				<h3>Resumen de compra</h3>
				<?php do_action( 'woocommerce_checkout_before_order_review' ); ?>
				<div id="order_review" class="woocommerce-checkout-review-order">
					<?php do_action( 'woocommerce_checkout_order_review' ); ?>
				</div>
			</div>
			<?php do_action( 'woocommerce_checkout_after_order_review' ); ?>
		</div>
	</div>
</form>

<?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?>

<script>
	$(document).ready(function () {
		$("#billing_state").change()
		function navNext(current, next) {
			$('#step-'+current).fadeOut(250)
			setTimeout(() => {
				$('#step-'+next).fadeIn(450)
			}, 300)
		}

		function navPrev(current, prev) {
			$('#step-'+current).fadeOut(250)
			setTimeout(() => {
				$('#step-'+prev).fadeIn(450)
			}, 300)
		}


		// prev_step
		$('#next_step').click(function (e) {
			e.preventDefault();
			let step = $(this).attr('step')
			if(step == '1') {
				if($('input[name="billing_first_name"]').val() != '' && $('input[name="billing_last_name"]').val() != '' && $('input[name="cedula"]').val() != '') {
					$('.notices-erros').html('');
					$('#idicator-2').addClass('active')
					$('.steps-checkout').addClass('one')
					$('#prev_step').attr('step', step)
					$('#prev_step').attr('current', (Number(step)+1))
					$(this).attr('step', (Number(step)+1))
					navNext(step, (Number(step)+1));
				}else {
					$('.steps-checkout').removeClass('two')
					$('.notices-erros').html('<div class="woocommerce-error">Ingresa la información requerida (campos con *)</div>')
				}
			}
			if(step == '2') {
				if($('select[name="billing_country"]').val() != '' &&
				   $('input[name="billing_address_1"]').val() != '' &&
				   $('input[name="billing_city"]').val() != '' &&
				   $('select[name="billing_state"]').val() != ''
				) {
					$('.notices-erros').html('');
					$('#idicator-3').addClass('active')
					$('.steps-checkout').removeClass('one')
					$('.steps-checkout').addClass('two')
					$('#prev_step').attr('step', step)
					$('#prev_step').attr('current', (Number(step)+1))
					$(this).attr('step', (Number(step)+1))
					navNext(step, (Number(step)+1));
				}else {
					$('.steps-checkout').removeClass('three')
					$('.notices-erros').html('<div class="woocommerce-error">Ingresa la información requerida (campos con *)</div>')
				}
			}
			if(step == '3') {
				if($('input[name="billing_phone"]').val() != '' &&
				   $('input[name="billing_email"]').val() != ''
				) {
					$('.notices-erros').html('');
					$('#idicator-4').addClass('active')
					$('.steps-checkout').removeClass('two')
					$('.steps-checkout').addClass('three')
					$('#prev_step').attr('step', step)
					$('#prev_step').attr('current', (Number(step)+1))
					$(this).attr('step', (Number(step)+1))
					navNext(step, (Number(step)+1));
				}else {
					$('.notices-erros').html('<div class="woocommerce-error">Ingresa la información requerida (campos con *)</div>')
				}
			}
		})

		$('#prev_step').click(function (e) {
			e.preventDefault();
			console.log
			let step = $(this).attr('step')
			if(step != null && step != '' && step != undefined) {
				if(Number(step) > 0) {
					$('.notices-erros').html('');
					let current = $(this).attr('current')
					navPrev(current, step)
					$('#next_step').attr('step', step)
					$(this).attr('current', step)
					$(this).attr('step', (Number(step) - 1))
				}
			}
		})

		$('#pagar').click(function (e) {
			e.preventDefault();
			$('form.woocommerce-checkout').submit();
		})

		$("#los_datos_de_envio_diferente").on('toggle',function(){
			if ($(this).attr('open')) {
				$("#ship-to-different-address-checkbox").prop("checked",true)
			} else {
				$("#ship-to-different-address-checkbox").prop("checked",false)				
			}
		})
	})
</script>
