var $ = jQuery.noConflict();
$(document).foundation();
jQuery(document).ready(function ($) {
	$('.addon.row').slideUp();
	$('.product-addon').on('click', '.closed', function() {
		$('.addon-title').addClass('closed').removeClass('open');
		$(this).addClass('open').removeClass('closed');
		//$('.addon.row').slideUp();
		$(this).parent().parent().find('.addon.row').slideDown();
	});
	$('.product-addon').on('click', '.open', function() {
		$(this).addClass('closed').removeClass('open');
		$('.addon.row').slideUp();
		$('.addon-title').addClass('closed').removeClass('open');
	});
	$('.addon-checkbox').change(function () {
		var maxAllowed = 8;
		if ($('.addon-checkbox:checked').length > maxAllowed) {
			this.checked = false;
    	}
	});
    $('[data-quantity="plus"]').on('click', function(e){
        e.preventDefault();
        var val = parseInt($(this).prev('input').val());
        $(this).prev('input').val( val+1 );
        $( this ).trigger( 'woocommerce-product-addons-update' );
    });
    $('[data-quantity="minus"]').on('click', function(e) {
        e.preventDefault();
        var val = parseInt($(this).next('input').val());
        if(val !== 0){
			$(this).next('input').val( val-1 );
		}
		$( this ).trigger( 'woocommerce-product-addons-update' );
	});
	$('.woocommerce').on('click', '.payment-title', function() {
		$(this).children().attr('checked');
		if($(this).parent().hasClass('is-active')) {
			$(this).children().attr('checked');
		} else {
			$('.payment-title').parent().removeClass('is-active')
			$(this).parent().addClass('is-active');
		}
	});
	$('#pcChecker').html('<form><div class="row"><div class="small-12 medium-6 columns"><h3>Postcode Check</h3><p>Check if we deliver to your area. Enter the <strong>first part</strong> of your postcode below <strong>(Eg: SE18)</strong></p><div class="input-group"><input class="input-group-field" id="postcode" type="text" maxlength="4" aria-describedby="pcChecker"><div class="input-group-button"><button id="check" class="button">Find Out</button></div></div><h4 id="output">&nbsp;</h4></div></div></form>');

	var postcodes = ['SE2', 'SE3', 'SE7', 'SE8', 'SE9', 'SE10', 'SE12', 'SE13', 'SE14', 'SE18', 'SE28', 'DA16', 'DA8', 'DA5', 'DA6', 'DA7', 'DA15', 'DA14', 'BR7', 'DA2'],
		success = 'Yes! We deliver to your area!',
		failure = 'Sorry, we don\'t deliver to your area yet.',
		loader = '<img src="/wp-content/themes/the-verygreen-grocer/images/apple.gif">';
	$('#check').on('click', function(e){
		e.preventDefault();
		var pc = $('#postcode').val().toUpperCase();
		if(postcodes.indexOf(pc) > -1){
			$('#output').html(loader).delay(800).fadeOut(500).queue(function(n) {
				$(this).html(success);
				n();
			}).fadeIn(500);
		} else {
			$('#output').html(loader).delay(800).fadeOut(500).queue(function(n) {
				$(this).html(failure);
				n();
			}).fadeIn(500);
		}
	});
	$('body').on('DOMSubtreeModified', '#product-addons-total', function() {
		$('.mobileCheckout').fadeIn();
		var data = $(this).html();
		$('#footerTotal').html(data)
	});
});

