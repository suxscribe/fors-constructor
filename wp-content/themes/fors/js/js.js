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

	jQuery('.single-product .wccpf_value .theurl').val(theurl1+theurl2);
	history.pushState('', document.title, theurl2);

}

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

				}

				jQuery('.product-images-wrapper').before('<sign class="pos0"><p></p><p></p></sign>'); //TODO

				function colorSwitch(index) {
					jQuery('section[ccolor] label').removeClass('active');
					jQuery('section[ccolor] label:nth-child('+ (index + 1) + ')').addClass('active');

					ucolor = (index).toString();
					calc();
				}

				jQuery('section[ccolor] label').click(function(){
					var index = jQuery(this).index();

					jQuery('.woocommerce-product-gallery__image').removeClass('woocommerce-product-gallery__image--active');
					jQuery('.woocommerce-product-gallery__image:nth-child('+(index+1)+')').addClass('woocommerce-product-gallery__image--active');

					UIkit.slideshow('.uk-slideshow').show(index);

					colorSwitch(index);
				});

				UIkit.util.on('.uk-slideshow', 'itemshown', function () {
					console.log(jQuery(this));
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

					textkuval.length>=15 ? textkuel
						.removeClass()
						.addClass('size30'):

					textkuval.length>=11 ? textkuel
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

				jQuery('section[text] input').on('input',function(){

					updateText(this);

					calc();

				});

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

				jQuery('section[pos] label').click(function(){
					jQuery('.single-product sign').removeAttr('class')
						.addClass('pos'+jQuery(this).index());

					upos = jQuery(this).index().toString();
					calc();

				});

				jQuery('section[size] label').click(function(){

					usize = jQuery(this).index().toString();
					calc();

				});

		jQuery('section[font] label:has(:checked)').click();

		ucolor == null ? ucolor = "0" : null;
		console.log(`ucolor ${ucolor}`);;

		ucolor?jQuery('section[ccolor] label:eq('+ucolor+')').click():null;
		utext0?jQuery('section[text] label:eq(0) input, .single-product sign p:eq(0)').val(utext0).html(utext0).keyup():null;
		utext1?jQuery('section[text] label:eq(1) input, .single-product sign p:eq(1)').val(utext1).html(utext1).keyup():null;
		ufcolor?jQuery('section[fcolor] label:eq('+ufcolor+')').click():null;
		ufont?jQuery('section[font] label:eq('+ufont+')').click():null;
		upos?jQuery('section[pos] label:eq('+upos+')').click():null;
		usize?jQuery('section[size] label:eq('+usize+')').click():null;

	  });



	/*
	jQuery('.home .woocommerce-loop-product__link, .home h2').click(function(){
		jQuery('iframe').each(function(){
			jQuery(this).fadeOut(200);
		});
		jQuery(this)
			.closest('a')
			.children('iframe')
			.fadeIn(200);

		return false;
	});
	*/

	/*
	if (jQuery('body').hasClass('home')){
		var dispblock;
		jQuery('.woocommerce-loop-product__title').each(function(i,el){

			i==0?dispblock='block':dispblock='none';
			jQuery(el).after(

				'<iframe frameborder="0" style="display: '+dispblock+';" class="woocommerce-loop-product__frame" src="'+jQuery(el).closest('a').attr('href')+'"></iframe>'

			).closest('a')
				.attr('href','#tab');

		});
	}
	*/

	// jQuery('.product_title.entry-title').after(jQuery('.woocommerce-product-details__short-description').html())
	// jQuery('.woocommerce-product-details__short-description').detach();
	//jQuery(jQuery('.woocommerce-product-details__short-description').detach()).insertAfter('.product_title.entry-title');

	MicroModal.init({
	  onShow: modal => console.info(`${modal.id} is shown`), // [1]
	  onClose: modal => console.info(`${modal.id} is hidden`), // [2]
	  // disableScroll: false, // [5]
	  // disableFocus: false, // [6]
	  awaitCloseAnimation: true, // [7]
	  // debugMode: true // [8]
	});


	jQuery(document).on('click', '.link_modal' , (e) => {
		e.preventDefault();
		// console.log('click');
	});
	jQuery(document).on('click', '#link_size-chart', (e) => {
		e.preventDefault();
		MicroModal.show('modal-size-chart'); // [1]
	});


/*	var hssSlider = new Swiper('.badlon-swiper', {
	    // speed: 1000,
	    spaceBetween: 0,
	    slidesPerView: 3.2,
	    initialSlide: 0,
	    navigation: {
	            nextEl: '.swiper-button-next',
	            prevEl: '.swiper-button-prev',
	          },
	          observer: true,
	          observeParents: true,
	    // loop: true,
	    // loopedSlides: 6,
	    // slidesOffsetBefore: 114,
	    breakpoints: {
	    		1219: {
	    			slidesPerView: 2.2
	    		},
	        639: {
	        	slidesPerView: 1.2
	            // autoplay: false
	        },
	    },
	});*/


	jQuery('#main .product-summary').on("DOMNodeInserted", function (event) {
		if ((jQuery('#calc-section-image').length > 0) && (jQuery('#calc-section-image .product-images-wrapper').length < 1)) {
			jQuery('.product-images-wrapper').appendTo('#calc-section-image');
		}
		//console.log(jQuery(event.target).find('#calc-section-image').length);
	});

	$('.z-navbar-toggle').click(function(e){
	  var modal = UIkit.modal("#menu");

	  // if ( modal.isActive() ) {
	    // modal.hide();
	    // $(this).removeClass('active');
	  // } else {
	    modal.toggle();
	    // $(this).addClass('active');
	  // }
	  //e.preventDefault();
	  return false;
	});

});


document.addEventListener('aos:in', ({ detail }) => {
  console.log('animated in', detail);
});

document.addEventListener('aos:out', ({ detail }) => {
  console.log('animated out', detail);
});

ScrollOut({
  onShown: function(el, ctx) {
     /* Triggered when an element is shown */
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
});


// $( document ).ready(function() {
	//jQuery('.product-images-wrapper').appendTo('#calc-section-image');
	// console.log($('#calc-section-image').length);
// });



$( document ).ready(function() {
	// This prevents the elements with VH-based height to shrink on Android when keyboard opens. !!
	setTimeout(function () {
	    let viewheight = $(window).height();
	    let viewwidth = $(window).width();
	    let viewport = document.querySelector("meta[name=viewport]");
	    viewport.setAttribute("content", "height=" + viewheight + "px, width=" + viewwidth + "px, initial-scale=1.0");
	}, 300);
});