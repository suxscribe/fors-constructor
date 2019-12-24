var getParams = new URL(window.location.href);

//get params from url. set to 0 if not set
var ucolor	= getParams.searchParams.get('ucolor') ? getParams.searchParams.get('ucolor') : "0";
var utext0	= getParams.searchParams.get('utext0') ? getParams.searchParams.get('utext0') : ""; //TODO сделать надпись по умолчанию. но если юзер ее сотрет чтобы не появлялась снова при загрузке
var utext1	= getParams.searchParams.get('utext1') ? getParams.searchParams.get('utext1') : '';
var ufcolor	= getParams.searchParams.get('ufcolor') ? getParams.searchParams.get('ufcolor') : "0";
var ufont	= getParams.searchParams.get('ufont') ? getParams.searchParams.get('ufont') : "0";
var upos	= getParams.searchParams.get('upos') ? getParams.searchParams.get('upos') : "0";
var usize	= getParams.searchParams.get('usize') ? getParams.searchParams.get('usize') : "0";


function encoder(url) {
	return encodeURIComponent( url ).replace(/[!'()]/g, escape).replace(/\*/g, "%2A");
}

function calc(){

	var theurl1 ='';
	var theurl2 ='';

	var calculated = parseInt(cprices.cstart);
	jQuery('calc section label :checked').each(function(){
		calculated = calculated + parseInt(jQuery(this).attr('sendPrice'));
	});

	jQuery('section[text] [sendPrice]').each(function(){
		if (jQuery(this).val() !=''){
			calculated = calculated + parseInt(jQuery(this).attr('sendPrice'));
		}
	});

	jQuery('#ywcnp_suggest_price_single').val(calculated);
	jQuery('.product-detail_bottom .price').html(
		'<span class="woocommerce-Price-amount amount">'+calculated+'&nbsp;<span class="woocommerce-Price-currencySymbol">₽</span></span>'
		);






	theurl1 = location.hostname+location.pathname;
	theurl2='?'+

	(ucolor?	'ucolor='+		ucolor:'')+
	(utext0?	'&utext0='+		encoder(utext0):'')+
	(utext1?	'&utext1='+		encoder(utext1):'')+
	(ufcolor?	'&ufcolor='+	ufcolor:'')+
	(ufont?		'&ufont='+		ufont:'')+
	(upos?		'&upos='+		upos:'')+
	(usize?		'&usize='+		usize:'');

	// console.log(colors[ucolor]);

	jQuery('.single-product .wccpf_value .theurl').val(theurl1+theurl2);

	jQuery('.single-product input[name=theurl]').val(theurl1+theurl2);


	// get color and property names
	function getDataValue(property, value) {
		return jQuery('section['+property+'] label').eq(value).find('input').data('value');
	}

	// pass values to custom fields
	jQuery('.single-product input[name=ff_color]').val(getDataValue('ccolor',ucolor));
	// check if theres any type
	jQuery('.single-product input[name=thesize]').val(getDataValue('size',usize));
	if (utext0.length > 0 || utext1.length > 0) {

		jQuery('.single-product input[name=thetext1]').val(utext0);
		jQuery('.single-product input[name=thetext2]').val(utext1);
		jQuery('.single-product input[name=thetextcolor]').val(getDataValue('fcolor',ufcolor));
		jQuery('.single-product input[name=thefont]').val(getDataValue('font',ufont));
		jQuery('.single-product input[name=thepos]').val(getDataValue('pos',upos));
	} else {
		jQuery('.single-product input[name=thetext1]').val(utext0);
		jQuery('.single-product input[name=thetext2]').val(utext1);
		jQuery('.single-product input[name=thetextcolor]').val(null);
		jQuery('.single-product input[name=thefont]').val(null);
		jQuery('.single-product input[name=thepos]').val(null);

	}

	history.pushState('', document.title, theurl2);

}
// > CALC


jQuery(function(){

	// jQuery('.single-product .content-area .product-summary').append('<calc></calc>');
	// jQuery('.single-product .product-summary').append('<calc></calc>');
	jQuery('.single-product calc').load('/wp-content/themes/fors/calc.calc',

		function(){
			function grabcp(el1,el2,el3){
				jQuery.each(el2, function(i){
					jQuery(el1+':eq('+i+')')
					.addClass(el3[i]===0?'hidden':'')
					.find('input')
					.attr('sendPrice',el2[i]);
				});
			}
			if (jQuery('#ywcnp_suggest_price_single')){

				grabcp('section[ccolor] label',cprices.ccc,cprices.cccb);
				grabcp('section[text] label',cprices.ct,cprices.ctb);
				grabcp('section[fcolor] label',cprices.cfc,cprices.cfcb);
				grabcp('section[font] label',cprices.cf,cprices.cfb);
				grabcp('section[pos] label',cprices.cp,cprices.cpb);
				grabcp('section[size] label',cprices.cs,cprices.csb);

					calc(); //init
					// updateText('section[text] input[name=text0]');

				}

				jQuery('.product-images-wrapper').before('<sign class="pos0"><p></p><p></p></sign>'); //TODO


				// color switch
				function colorSwitch(index) {
					jQuery('section[ccolor] label').removeClass('active');
					jQuery('section[ccolor] label:nth-child('+ (index + 1) + ')').addClass('active');

					ucolor = (index).toString();
					calc();
				}

				// click on color label
				jQuery('section[ccolor] label').click(function(){
					var index = jQuery(this).index();

					jQuery('.woocommerce-product-gallery__image').removeClass('woocommerce-product-gallery__image--active');
					jQuery('.woocommerce-product-gallery__image:nth-child('+(index+1)+')').addClass('woocommerce-product-gallery__image--active');

					// update image
					UIkit.slideshow('.uk-slideshow').show(index);

					colorSwitch(index);
				});

				// change photo on photo swipe
				UIkit.util.on('.uk-slideshow', 'itemshown', function () {
					// console.log(jQuery(this));
					var index = jQuery(this).find('.uk-active').index() ;

					colorSwitch(index);
				});


				// Enter label text
				function updateText(el) {
					var textkuindex = jQuery(el)
					.closest('label')
					.index();

					var textkuval=jQuery(el).val();
					var textkuel=jQuery('.single-product sign p:eq('+textkuindex+')');

					textkuel.html(textkuval);

					textkuval.length>=12 ? textkuel
					.removeClass()
					.addClass('size30'):

					textkuval.length>=9 ? textkuel
					.removeClass()
					.addClass('size20'):

					textkuval.length>=6 ? textkuel
					.removeClass()
					.addClass('size10'):

					textkuval.length<6  ? textkuel
					.removeClass():

					null;

					textkuindex===0 ? utext0=textkuval : utext1=textkuval;
				}

				// show text on input
				jQuery('section[text] input').on('input',function(){
					updateText(this);
					calc();

				});

				// change text color
				jQuery('section[fcolor] label').click(function(){
					jQuery(this).parent().find('label').removeClass('active');
					jQuery(this).addClass('active');

					jQuery('.single-product sign')
					.css({'color':
						jQuery(this).children(':radio').attr('val')
					});

					ufcolor = jQuery(this).index().toString();
					calc();

				});

				// change font
				jQuery('section[font] label').click(function(){

					var fontname = jQuery(this).children(':radio').attr('val');
					jQuery('.single-product sign')
					.css({'font-family': fontname})
					.removeClass(function (index, css) {
						return (css.match(/(^|\s)font\S+/g) || []).join(' ');
						    }) // удаляем класс font-
						.addClass('font-'+fontname); // добавляем новый шрифт

						ufont = jQuery(this).index().toString();
						calc();

					});

				// change text position
				jQuery('section[pos] label').click(function(){
					jQuery('.single-product sign').removeAttr('class')
					.addClass('pos'+jQuery(this).index());

					upos = jQuery(this).index().toString();
					calc();

				});

				// change size
				jQuery('section[size] label').click(function(){

					usize = jQuery(this).index().toString();
					calc();

				});

				jQuery('section[font] label:has(:checked)').click();

				ucolor == null ? ucolor = "0" : null;
		// console.log(`ucolor ${ucolor}`);;

		ucolor?jQuery('section[ccolor] label:eq('+ucolor+')').click():null;
		utext0?jQuery('section[text] label:eq(0) input, .single-product sign p:eq(0)').val(utext0).html(utext0).keyup():null;
		utext1?jQuery('section[text] label:eq(1) input, .single-product sign p:eq(1)').val(utext1).html(utext1).keyup():null;
		ufcolor?jQuery('section[fcolor] label:eq('+ufcolor+')').click():null;
		ufont?jQuery('section[font] label:eq('+ufont+')').click():null;
		upos?jQuery('section[pos] label:eq('+upos+')').click():null;
		usize?jQuery('section[size] label:eq('+usize+')').click():null;



	});


	/*MicroModal.init({
	  onShow: modal => console.info(`${modal.id} is shown`), // [1]
	  onClose: modal => console.info(`${modal.id} is hidden`), // [2]
	  // disableScroll: false, // [5]
	  // disableFocus: false, // [6]
	  awaitCloseAnimation: true, // [7]
	  // debugMode: true // [8]
	});*/


	// jQuery(document).on('click', '.link_modal' , (e) => {
	// 	e.preventDefault();
	// 	// console.log('click');
	// });
	// jQuery(document).on('click', '#link_size-chart', (e) => {
	// 	e.preventDefault();
	// 	MicroModal.show('modal-size-chart'); // [1]
	// });


	// move product image block to calc
	jQuery('#main .product-summary').on("DOMNodeInserted", function (event) {
		if ((jQuery('#calc-section-image').length > 0) && (jQuery('#calc-section-image .product-images-wrapper').length < 1)) {
			jQuery('.product-images-wrapper').appendTo('#calc-section-image');
		}

	});



	// MOBILE MENU
	jQuery('.z-navbar-toggle').click(function(e){
		var modal = UIkit.modal("#menu");

		modal.toggle();
		return false;
	});


	// Style color labels with colors of correspondent input labels
	var colorLabels = document.querySelectorAll('.calc-colors span');

	console.log(colorLabels);

	colorLabels.forEach(e => {
		console.log(e.previousSibling.getAttribute('val'));
	});

	jQuery('.calc-colors span').each(function() {
		jQuery(this).css('background-color', jQuery(this).prev().val());
	});
}); // load end



// ANIMATIONS

// burger menu animation
var delay = 0.6;
jQuery('#menu .uk-nav li').each(function() {
	jQuery(this).css({
		'transition-delay': delay+'s'

	});
	delay = delay + 0.05;
});

delay = 0.3;
jQuery('.section .product_frontpage').each(function() {
	jQuery(this).css({
		'animation-delay': delay+'s'
	});
	delay = delay + 0.05;

});

//

document.addEventListener('aos:in', ({ detail }) => {
	console.log('animated in', detail);
});

document.addEventListener('aos:out', ({ detail }) => {
	console.log('animated out', detail);
});

/*ScrollOut({
  onShown: function(el, ctx) {
     // Triggered when an element is shown
     console.log('shown');
     el.classList.add("visible");
     // console.log(ctx);
     if (el.classList.contains('calc-section-wrap')) {
     	console.log('log');
     	document.querySelectorAll('.main-screen__columns').classList.add('uk-hidden');
     }
   },
   onHidden: function(el) {
   	console.log('hidden');
   	el.classList.remove("visible");

   },
   onChange: function(el) {
   	console.log('change');
   }
 });*/


// $( document ).ready(function() {
	//jQuery('.product-images-wrapper').appendTo('#calc-section-image');
	// console.log($('#calc-section-image').length);
// });



jQuery( document ).ready(function() {

	// This prevents the elements with VH-based height to shrink on Android when keyboard opens. !!
	setTimeout(function () {
		let viewheight = jQuery(window).height();
		let viewwidth = jQuery(window).width();
		let viewport = document.querySelector("meta[name=viewport]");
		viewport.setAttribute("content", "height=" + viewheight + "px, width=" + viewwidth + "px, initial-scale=1.0");
	}, 300);


	jQuery('#one-page-shopping-checkout').on('UIkit.scrollspy.inview', function() {
		console.log('inview');
		jQuery('.cart_fixed').addClass('uk-hidden');
	});
	jQuery('#place_order').on('UIkit.scrollspy.outview', function() {
		console.log('outview');
		jQuery('.cart_fixed').removeClass('uk-hidden');
	});

	$(document).on('UIkit.scrollspy.inview', '#place_order', function(){
		console.log('inview2');
	    // what you want to happen when mouseover and mouseout
	    // occurs on elements that match '.dosomething'
	});

	UIkit.util.on('#order_review', 'inview', function () {
	    // do something
	    console.log('inview 3');
	    document.querySelector('.cart_fixed').classList.add('uk-hidden');
	});
	UIkit.util.on('#order_review', 'outview', function () {
	    // do something
	    console.log('outview 3');
	    document.querySelector('.cart_fixed').classList.remove('uk-hidden');

	});

	document.addEventListener('inview', function(e) {
	  console.log(e.target);
	});

});


window.onresize = function() {
	const sourceLeft = document.querySelector(".calc-section-wrap_left");
	const sourceRight = document.querySelector(".calc-section-wrap_right");

	if (window.innerWidth >= 639) {
		if (document.querySelector('#constructor-bar-controls-right .calc-section-wrap_right')) {
			document.getElementById("calc-section-column-left").appendChild(sourceLeft);
			document.getElementById("calc-section-column-right").appendChild(sourceRight);
	    	//todo add close offcanvas
	  }
  } else {
  	// if no element in destination  - move it to offcanvas
  	if (!document.querySelector('#constructor-bar-controls-right .calc-section-wrap_right')) {
  		// console.log(sourceRight);
  		document.getElementById("constructor-bar-controls-left").appendChild(sourceLeft);
  		document.getElementById("constructor-bar-controls-right").appendChild(sourceRight);

  	}
  }
};



  /* PHONE */

 	var $input = jQuery('input.input-text'); //, input[name=form_text_39], input[name=form_text_6]

 	var $form = jQuery('form.checkout');
 	$input.each(function() {
 		jQuery(this)
 		.removeAttr('required')
 				//.wrap("<div class='form-phone_wrap'></div>")
 				.parent('.uk-form-controls').addClass('form-phone_wrap')
 				.append( "<p class='form-phone_error'></p>" );
 	}); //.inputmask("+7 (999) 999-99-99",{autoclear: false, showMaskOnHover: false})
 	var errorTextNoPhone = "Заполните поле",
 	errorText = "Заполните поле";
 	$input.on('input',function(){
 		var $this = jQuery(this);
 		if ( $this.val().substr($this.val().length - 1) !== "_" && $this.val().substr($this.val().length - 1) !== "" && $this.val().substr($this.val().length - 1) !== " ")
 			$this.addClass('succes');
 		else
 			$this.removeClass('succes');
 	});
 	$input.focusout(function() {
 		if(jQuery(this).val().length == 0) {
 			console.log('zero');
 			jQuery(this)	.addClass('input-text_error-border')
 			.siblings('.form-phone_error')
 			.text(errorText);
 			jQuery(this).parent().addClass('error');
 		}
 		if( jQuery(this).val().length > 0 && !jQuery(this).hasClass('succes') ){
 			jQuery(this)	.addClass('input-text_error-border')
 			.siblings('.form-phone_error')
 			.text(errorText);
 			jQuery(this).parent().addClass('error');
 		}
 	});
 	$input.keyup(function(e) {
 		jQuery(this).siblings('.form-phone_error').text(' ');
 		jQuery(this).removeClass('input-text_error-border')
 		.parent().removeClass('error');
 	});
 	$input.keyup(function(event){
 		if(event.keyCode == 13){
 			jQuery(this)	.addClass('input-text_error-border')
 			.siblings('.form-phone_error')
 			.text(errorText);

 		}
 	});
 	$form.submit(function(){
 		if( !jQuery(this).find($input).hasClass('succes')){
 			if( jQuery(this).find($input).val().length == 0 )
 				jQuery(this).find($input).addClass('input-text_error-border').siblings('.form-phone_error').text(errorTextNoPhone);
 			else
 				jQuery(this).find($input).addClass('input-text_error-border').siblings('.form-phone_error').text(errorText);
 			return false;
 		}
 	});





/*jQuery(document).ready(function ($) {

	$(document.body).on('updated_checkout updated_shipping_method', function (event, xhr, data) {
		$('input[name^="shipping_method"]').on('change', function () {
			// console.log(event);
			// console.log(xhr);
			// console.log(data);

			if ($('input[name="shipping_method[0]"]:checked').val() == 'local_pickup:2') {
				console.log('hide');
				$('#billing_city_field').addClass('uk-hidden');
				$('#billing_address_1_field').addClass('uk-hidden');
			} else {
				$('#billing_city_field').removeClass('uk-hidden');
				$('#billing_address_1_field').removeClass('uk-hidden');
				//todo uk-hidden class overwritten by something
			}


		});
	});

});*/ //zrx disabled