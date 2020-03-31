var getParams = new URL(window.location.href);

//get params from url. set to 0 if not set
var ucolor	= getParams.searchParams.get('ucolor') ? getParams.searchParams.get('ucolor') : "1";
var utext0	= getParams.searchParams.get('utext0') ? getParams.searchParams.get('utext0') : "FORSELF"; //TODO сделать надпись по умолчанию. но если юзер ее сотрет чтобы не появлялась снова при загрузке
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

// scroll to top on page reload
window.onbeforeunload = function () {
  // window.scrollTo(0, 0);
};


jQuery(function(){

	// jQuery('.single-product .content-area .product-summary').append('<calc></calc>');
	// jQuery('.single-product .product-summary').append('<calc></calc>');


	//LOAD CALC FROM CALC.CALC
	//jQuery('.single-product calc').load('/wp-content/themes/fors/calc.calc',
	//	function(){


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

				console.log(el);

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
			jQuery('section[text] input').on('focusout',function(){
				if ($(this).val().length === 0) {
					$(this).val(' ');
					updateText(this);
					calc();
				}

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
				updateFont(fontname);

				ufont = jQuery(this).index().toString();

			});

			function updateFont(fontname) {
				//get selected font here
				// get input array. count selected posotion

				jQuery('.single-product sign')
				.css({'font-family': fontname})
				.removeClass(function (index, css) {
					return (css.match(/(^|\s)font\S+/g) || []).join(' ');
							}) // удаляем класс font-
					.addClass('font-'+fontname); // добавляем новый шрифт


					calc();
			}

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

				document.getElementById('calc-section-image').style.transform = 'scale(' + (1 - (0.05 * (3 - usize))) + ')';

				calc();

			});

			// call constructor controls update
			jQuery('section[font] label:has(:checked)').click();

			ucolor == null ? ucolor = "0" : null;
			// console.log(`ucolor ${ucolor}`);;

			ucolor?jQuery('section[ccolor] label:eq('+ucolor+')').click():null;
			utext0?jQuery('section[text] label:eq(0) input, .single-product sign p:eq(0)').val(utext0).html(utext0).keyup():null;
			utext1?jQuery('section[text] label:eq(1) input, .single-product sign p:eq(1)').val(utext1).html(utext1).keyup():null;

			// set text sizes on page load
			jQuery('section[text] label input').each(function(){
				updateText(this);
				updateFont()
				console.log('update');
			});

			// set badlon size on page load
			// document.getElementById('calc-section-image').style.transform = 'scale(' + (1 - (0.05 * (3 - usize))) + ')';

			ufcolor?jQuery('section[fcolor] label:eq('+ufcolor+')').click():null;
			ufont?jQuery('section[font] label:eq('+ufont+')').click():null;
			upos?jQuery('section[pos] label:eq('+upos+')').click():null;
			usize?jQuery('section[size] label:eq('+usize+')').click():null;



	//	}); //load end


	// move product image block to calc
	jQuery('#main .product-summary').on("DOMNodeInserted", function (event) {
		// if ((jQuery('#calc-section-image').length > 0) && (jQuery('#calc-section-image .product-images-wrapper').length < 1)) {
		// 	jQuery('.product-images-wrapper').appendTo('#calc-section-image');
		// 	jQuery('.preloader').removeClass('preloader--active');
		// 	jQuery('.product-images-wrapper').removeClass('product-images-wrapper--hidden');

		// }

	}); // jquery function


	// MOBILE MENU
	jQuery('.z-navbar-toggle').click(function(e){
		var modal = UIkit.modal("#menu");

		modal.toggle();
		return false;
	});
	jQuery('.menu-modal-menu').click(function() {
		UIkit.modal("#menu").hide();
	});

	// Style color labels with colors of correspondent input labels
	var colorLabels = document.querySelectorAll('.calc-colors span');

	// console.log(colorLabels);

	colorLabels.forEach(e => {
		// console.log(e.previousSibling.getAttribute('val'));
	});

	jQuery('.calc-colors span').each(function() {
		jQuery(this).css('background-color', jQuery(this).prev().val());
	});

	// MOVE CONSTRUCTOR CONTROLS TO OFFCANVAS PANELS
	const sourceLeft = document.querySelector(".calc-section-wrap_left");
	const sourceRight = document.querySelector(".calc-section-wrap_right");


	document.querySelector('.product-bar__link_right').addEventListener('click', function () {
		document.getElementById("constructor-bar-controls-right").appendChild(document.querySelector(".calc-section-wrap_right"));
	});
	document.querySelector('.product-bar__link_left').addEventListener('click', function () {
		document.getElementById("constructor-bar-controls-left").appendChild(document.querySelector(".calc-section-wrap_left"));
	});

	window.onresize = function() {


		if (window.innerWidth >= 639) {
			if (document.querySelector('#constructor-bar-controls-right .calc-section-wrap_right')) {
				document.getElementById("calc-section-column-right").appendChild(document.querySelector(".calc-section-wrap_right"));
					//todo add close offcanvas
			}
			if (document.querySelector('#constructor-bar-controls-left .calc-section-wrap_left')) {
				document.getElementById("calc-section-column-left").appendChild(document.querySelector(".calc-section-wrap_left"));
					//todo add close offcanvas
			}
		}
		// else {
		// 	// if no element in destination  - move it to offcanvas
		// 	if (!document.querySelector('#constructor-bar-controls-right .calc-section-wrap_right')) {
		// 		// console.log(sourceRight);
		// 		document.getElementById("constructor-bar-controls-left").appendChild(sourceLeft);
		// 		document.getElementById("constructor-bar-controls-right").appendChild(sourceRight);

		// 	}
		// }
	};

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



jQuery( document ).ready(function() {

	// This prevents the elements with VH-based height to shrink on Android when keyboard opens. !!
	setTimeout(function () {
		let viewheight = jQuery(window).height();
		let viewwidth = jQuery(window).width();
		let viewport = document.querySelector("meta[name=viewport]");
		viewport.setAttribute("content", "height=" + viewheight + "px, width=" + viewwidth + "px, initial-scale=1.0");
	}, 300);



	// CART ANIMATION
	var cartFixed = document.querySelector('.cart_fixed');
	if (document.getElementById('one-page-shopping-cart').style.display === 'block') {
		cartFixed.classList.remove('cart_fixed_hidden');
	}


	UIkit.util.on('#customer_details', 'inview', function () {
			// do something
			// console.log('inview 3');
			document.querySelector('.cart_fixed').classList.add('cart_fixed_hidden');
		});
	UIkit.util.on('#customer_details', 'outview', function () {
			// do something
			// console.log('outview 3');
			document.querySelector('.cart_fixed').classList.remove('cart_fixed_hidden');

		});




	// MAin screen animation

/*	UIkit.util.on('.main-screen__trigger', 'outview', function () {
		// hide main screen blocks
		document.querySelector('.main-screen__title').classList.add('view_hidden');
		setTimeout(function() {
			document.querySelector('.main-screen__left').classList.add('view_hidden');
		}, 200);
		setTimeout(function() {
			document.querySelector('.main-screen__right').classList.add('view_hidden');
		}, 400);

		// show customizer
		setTimeout(function() {
			document.getElementById('calc-section-column-left').classList.remove('view_hidden-bottom');
		}, 600);
		setTimeout(function() {
			document.getElementById('calc-section-column-right').classList.remove('view_hidden-bottom');
		}, 800);

	});

	UIkit.util.on('.main-screen__trigger', 'inview', function () {
		// show blocks on main screen
		document.querySelector('.main-screen__title').classList.remove('view_hidden');
		document.querySelector('.main-screen__left').classList.remove('view_hidden');
		document.querySelector('.main-screen__right').classList.remove('view_hidden');

		// hide customizer blocks
		document.getElementById('calc-section-column-left').classList.add('view_hidden-bottom');
		document.getElementById('calc-section-column-right').classList.add('view_hidden-bottom');
	});*/


	// var isInViewport = function (elem) {
	// 		var bounding = elem.getBoundingClientRect();
	// 		return (
	// 				bounding.top >= 0 &&
	// 				bounding.left >= 0 &&
	// 				bounding.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
	// 				bounding.right <= (window.innerWidth || document.documentElement.clientWidth)
	// 		);
	// };

	// check if main screen is in view on page load. if so - hide constructors
	// constructor blocks not in DOM on page load (
	// var h1 = document.querySelector('.main-screen__trigger');
	// if (isInViewport(h1)) {
	// 		// document.getElementById('calc-section-column-left').classList.add('view_hidden-bottom');
	// 		// document.getElementById('calc-section-column-right').classList.add('view_hidden-bottom');
	// }


	// GSAP ANIMATIONS MAINSCREEN




	const  tweenload = new TimelineMax();
	tweenload.to('.main-screen__title', 1, {transform: 'translateX(0)', opacity: 1}, '0');
	tweenload.to('.main-screen__subtitle', 1, {transform: 'translateX(0)', opacity: 1}, '0');
	tweenload.to('.main-screen__right', 1, {transform: 'translateX(0)', opacity: 1}, '0');
	tweenload.to('.main-screen__left', 1, {transform: 'translateX(0)', opacity: 1}, '0');
	tweenload.to('.main-screen__scroller', 1, {transform: 'translateX(0)', opacity: 1}, '0');
	tweenload.set('.main-bg__lines',{className: '+=main-bg__lines--expand'});
	

	// CIRCLE ANIMATION
	CustomEase.create("circleEase", ".19,.01,.2,1");

	var badlonImage = document.querySelector('.woocommerce-product-gallery__image--active img');

	var mainCircle = document.querySelector('.main__circle--2');
	var tweenCircle = new TimelineMax()
	  .set(mainCircle, { transform: 'scale(0.7)',  delay: 0.75 }, '0') // Will play in every loop
	  .call(badlonLoaded) // End loop after X times
	  .set(mainCircle, {  transform: 'scale(0.3)',  delay: 0.75 }) // Will not play on the last loop
	  .repeat(-1);

	var tweenCircle2 = new TimelineMax()
		.set(mainCircle, {transform: 'scale(1.1)',  delay: 0.75})
		.pause();

	// start.eventCallback("onComplete", function() {
	//   tweenCircle2.play(0);
	// });


	//text
	var loop = 0;
	var loopMax = 3;

	function loopCheck() {
	  loop++;
	  if (loop === loopMax) {
	    tweenCircle.pause();
	  	tweenCircle2.play();

	  }
	}


	function startAnimation() {
			console.log('image loaded');
			console.log('lets rock');
			if (document.querySelector('.main--init')) {
					document.querySelector('.main--init').classList.remove('main--init');
				  tweenCircle.pause();
					tweenCircle2.play();
			}

			badlonImage.removeEventListener( 'load', startAnimation, false );
	}

	function badlonLoaded() {

		if (badlonImage.complete) {
				startAnimation();


			}
		else badlonImage.addEventListener( 'load', startAnimation, false );
	}


	// GSAP ANIMATIONS

	const tween = new TimelineMax();
	const tween2 = new TimelineMax();

	    // tween.add(
	    //     TweenLite.to('.main-screen__title', 1, {transform: 'translateX(-5vw)'})
	    // ); //TODO how to animate 2 blocks simultaineously

			// tween.add(
	    //     TweenLite.to('.main__circle--2', 1, {transform: 'scale(400%)'})
	    // );
	    var sceneDuration = 500;

	    if (window.innerWidth >= 640) { // tween on tablet \ desktop
	    	tween.to('.main-screen__title', 1, {transform: 'translateX(-5vw)', opacity: 0});
	    	tween.to('.main-screen__subtitle', 1, {transform: 'translateX(5vw)', opacity: 0}, '0');
	    	tween.to('.main-bg__lines', .5, {transform: 'translateY(-20vw)', opacity: 0}, '0.2');

	    	tween.to('.main-screen__right', .7, {transform: 'translateX(2vw)', opacity: 0}, 0.3);
	    	tween.to('.main-screen__left', .7, {transform: 'translateX(-2vw)', opacity: 0}, 0.3);

	    	tween.set('.main__circle--2', {zIndex: '2'}, 0.5);
	    	tween.to('.main__circle--2', .3, {transform: 'scale(5)'}, 0.7);


	    } else { // tween on mobile
	    	tween.to('.main-screen__title', 1, {transform: 'translateY(-25vh)', opacity: 0});
	    	tween.to('.main-screen__subtitle', 1, {transform: 'translateY(20vh)', opacity: 0}, '0');
	    	tween.to('.main-screen__right', 1, {transform: 'translateY(25vh)', opacity: 0}, '0');
	    	tween.to('.main-screen__bottom', 1, {transform: 'translateY(30vh)', opacity: 0}, '0');

	    	tween.to('.main-bg__lines', .3, { opacity: 0 }, '0.3');

	    	tween.to('.main__circle--2', .1, {transform: 'scale(0.8)'}, '0.3');

	    	tween.set('.main__circle--2', {zIndex: '2'},'0.5');

	    	tween.to('.main__circle--2', 0.1, {transform: 'scale(6)'}, '0.7');

	    	// tween.from('.product-bar__inner', 0.1, {delay: 0.5, opacity: '0', transform: 'translateY(5vh)', zIndex: '1'}, '1');

	    	// tween.to('.product-detail_top', 0, {margin: '-100vh'}, '1');

	    	// tween.to(window, 2, {scrollTo: {y: 1500}});

	    	sceneDuration = 600;
	    }

	    const controller = new ScrollMagic.Controller();

	    const scene = new ScrollMagic.Scene({
			// triggerElement: '.main-bg',
			duration: sceneDuration,
			triggerHook: 0.0 // trigger position 0- for top. 0.5 - center 1 - bottom
		})
	    .setTween(tween)
	    // .addIndicators()
	    .setPin('.product-detail')
	    .addTo(controller);

    if (window.innerWidth >= 640) {
    		// tween2.delay(1000);
        tween2.from('#calc-section-column-left', 0.2, {opacity: '0', transform: 'translateX(5vw'});
       	tween2.from('#calc-section-column-right', 0.2, {opacity: '0', transform: 'translateX(-5vw'});
        const scene2 = new ScrollMagic.Scene({
            triggerElement: 'calc', //something to trigger constructors
						duration: 0,
            triggerHook: 0.7 
        })
        .setTween(tween2)
        // .addIndicators()
        .addTo(controller);

        // controller.scrollTo("#product-anchor");
        // controller.scrollTo(scene.scrollOffset() + scene.duration() + scene2.scrollOffset() + scene2.duration() + 100);
    } else {
    	// tween2.from('.product-detail_middle',0, {opacity: '0', transform: 'translateY(5vh)'})
    	tween2.from('.product-bar__inner', 0.1, {opacity: '0', transform: 'translateY(5vh)', zIndex: '1'});

      const scene2 = new ScrollMagic.Scene({
          triggerElement: 'calc', //something to trigger constructors
					duration: 0.1,
          triggerHook: 0.7 
      })
      .setTween(tween2)
      // .addIndicators()
      .addTo(controller);
    }

    // Smooth scroll anchor links
    controller.scrollTo(function (newpos, element) {

    	console.log('newpos ' + newpos);


    	// if (state === 'AFTER') duration *= -1;
    	// console.log(newpos.offsetTop);

    	console.log('element ' +element);

    	offset = document.getElementById(element).offsetTop; // get target offsetTop by JS, because jquery returns modified values.

    	var offsetResponsive = (window.innerWidth >= 640) ? 200 : 100;

			TweenLite.to(window, 1, {scrollTo: {y: offset + scene.scrollOffset() + scene.duration() - offsetResponsive }});
			// window.scrollTo(0, newpos + duration - window.pageYOffset);

		});

		//  bind scroll to anchor links
		jQuery(document).on("click", "a[href='#product-anchor']", function (e) {
			var id = jQuery(this).attr("href");
			console.log('scroll to ' + id);
			if (jQuery(id).length > 0) {
				e.preventDefault();

				// trigger scroll

				controller.scrollTo(id, id.replace('#','')); //pass id as additional parameter. Strange, but it scrollTo works this way

					// if supported by the browser we can even update the URL.
					if (window.history && window.history.pushState) {
						history.pushState("", document.title, id);
					}
				}
			});




}); // document.ready







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
			// console.log('zero');
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