
if ( typeof Object.create !== 'function' ) {
  Object.create = function(obj){
    function F(){}
    F.prototype = obj;
    return new F();
  };
}


;(function($, window, document, undefined){

  'use strict';

  window.requestAnimFrame = function(){
    return (
      window.requestAnimationFrame       ||
      window.webkitRequestAnimationFrame ||
      window.mozRequestAnimationFrame    ||
      window.oRequestAnimationFrame      ||
      window.msRequestAnimationFrame     ||
      function(/* function */ callback){
        window.setTimeout(callback, 1000 / 60);
      }
    );
  }();

  window.cancelAnimFrame = function(){
    return (
      window.cancelAnimationFrame       ||
      window.webkitCancelAnimationFrame ||
      window.mozCancelAnimationFrame    ||
      window.oCancelAnimationFrame      ||
      window.msCancelAnimationFrame     ||
      function(id){
        window.clearTimeout(id);
      }
    );
  }();


  var Luna = {
    init: function( settings, elem ) {
      var self      = this;
      self.elem     = elem;
      self.$elem    = $( elem );
      self.settings = $.extend({}, $.fn.Luna.settings, settings);

      self.menu();
      self.notification();
      self.scrollUp();

      self.scrollPosition();

    },

    menu: function( ) {
        var mm    = this.settings.nav.mobileMenu,
            speed = this.settings.nav.speed;

      $('.nav').on('click', '.nav__navicon', function() {
        var $self        = $(this),
            $nav         = $self.parents('.nav'),
            $wrapperLink = $nav.find('.nav__links__wrapper');

        $wrapperLink.slideToggle(speed, function(){
          $(this).toggleClass('nav__links__wrapper--open').css('display', '');
        });

      }); /// click to open menu



      var resizeFix = function( settings ){

        var mediasize  = mm,
            ww         = $(document).outerWidth(),
            navWrapper = $('.nav__links__wrapper');

        if( ww >= mediasize ) {
          navWrapper
          .removeClass('nav__links__wrapper--open')
          .css('display', '');
        }
      };

      resizeFix();
      return $(window).on('resize', resizeFix);
    },

    notification: function(){

      var notify = $('.notify'), closeButton, speed = this.settings.notify.speed;

      closeButton = $('<span/>', {
        class: "notify__close",
        html: "&times;"
      });

      if(notify.hasClass('notify__dismissable')){
        notify.prepend(closeButton);
      }

      notify.on('click', '.notify__close', function(){
        $(this).parent('.notify').addClass('notify__close__closed')
          .delay(200).slideUp(speed, function(){
            $(this).parent('.notify').remove();
          });
      });


    },

    scrollPosition: function(){

      var body     = this.$elem,
          show     = this.settings.scrolltop.showAt,
          scrollUp = $('.scrollup__button'),
          nav = $('.nav');

      body.on('scroll', function(){
        var scrollP = body.scrollTop();
        if ( scrollP < show ) {
          scrollUp.css({
            'transform': 'translateY(200px)'
          });
        }else{
          scrollUp.css({
            'transform': 'translateY(0px)'
          });
        }


      });
    },

    windowWidth: function(){
      var ww = $('body').width();
      return ww;
    },

    scrollUp: function(){

      var stop = this.settings.scrolltop.stopAt,
          speed = this.settings.scrolltop.speed;

      $('.scrollup__button').on('click', function(e){
        e.preventDefault();
        $('body, html').stop().animate({scrollTop: stop}, speed);
      });

    },

    keyframeLooper: function(){
      requestAnimFrame(this.keyframeLooper.bind(this));
    }

  };


  $.fn.Luna = function( settings ) {
    return this.each( function() {
      var luna = Object.create(Luna);
      luna.init(settings, this);
    });
  };

  $.fn.Luna.settings = {
    nav : {
      mobileMenu: 900,
      speed: 200
    },
    notify: {
      speed: 200
    },
    scrolltop: {
      speed: 1000,
      stopAt: 0,
      showAt: 500
    }
  };

})(jQuery, window, document);


jQuery(document).Luna();


//woocommerce
jQuery(document).on('click', '.blush-quantity .minus', function() {
    var qtyWrap = jQuery(this).parent('.quantity');
    var quantity = parseInt(qtyWrap.find('.qty').val(), 10);
    var min_num = parseInt(qtyWrap.find('.qty').attr('min'), 10);
    var max_num = parseInt(qtyWrap.find('.qty').attr('max'), 10);
    var step = parseInt(qtyWrap.find('.qty').attr('step'), 10);
    jQuery('input[name="update_cart"]').removeAttr("disabled");

    if (quantity > min_num) {
        quantity = quantity - step;
        if (quantity > 0)
            qtyWrap.find('.qty').val(quantity);
    }
    console.log('clicked');
});

jQuery(document).on('click', '.blush-quantity .plus', function() {
    var qtyWrap = jQuery(this).parent('.quantity');
    var quantity = parseInt(qtyWrap.find('.qty').val(), 10);
    var min_num = parseInt(qtyWrap.find('.qty').attr('min'), 10);
    var max_num = parseInt(qtyWrap.find('.qty').attr('max'), 10);
    var step = parseInt(qtyWrap.find('.qty').attr('step'), 10);

    jQuery('input[name="update_cart"]').removeAttr("disabled");

    if (max_num) {
        if (quantity < max_num) {
            quantity = quantity + step;
            qtyWrap.find('.qty').val(quantity);
        }
    } else {
        quantity = quantity + step;
        qtyWrap.find('.qty').val(quantity);
    }
});


FastClick.attach(document.body);

Waves.init();
Waves.attach('.btn, a.button, img');
// Waves.attach('.button');
// Waves.attach('a img');



// Function to slabtext the H1 headings
function slabTextHeadlines() {
    $(".slabtext").slabText({
        // Don't slabtext the headers if the viewport is under 380px
        "viewportBreakpoint": 350,
        "maxFontSize": "100px",
        // "minCharsPerLine" : 10
    });
}

(function filterSideBar(){
  $('.filter__widget__trigger').on('click', function(){
    $(this).parent('.filter__widget').toggleClass('filter__widget-open');
    // $(this).find('.lunacon').removeClass('lunacon-chevron-right').addClass('lunacon-chevron-left');
  });
})();

$('.slimscroll').slimscroll({
  size: '5px',
  height: '100%',
  wheelStep: 20,
  // alwaysVisible: true,
  // railVisible: true
});


// Parralax
$.fn.parallax = function(options){
  var opt,
      self = $(this),
      i,	par, top,	offset,	scroll,	hi,	dHeight, wWidth,
  transform, offsets,	render,	winSize, windowWidth,	fullScreen;
  opt = $.extend({
    'parallaxOuter':  '.parallax-outer',
    'parallaxInner': '.parallax-inner'
  }, options);


  var parallax = self,
  parallaxBg = parallax.find(opt.parallaxInner),
  win = $(window),
  FrameHeight = parallaxBg.eq(0).closest(opt.parallaxOuter).height(),
  DiffInHeight = parallaxBg.eq(0).height() - (FrameHeight + 20),
  FrameCount = parallaxBg.length;

  offsets = parallaxBg.get().map(function(div){
    return $(div).offset();
  });


  render = function(){
    top = win.scrollTop();
    wWidth = $(window).width();
    // Parralax effect
    for( i = 0; i < FrameCount; i++ ){
      par = parallaxBg[i];
      offset = top - offsets[i].top;
      if(wWidth > 600){
        scroll = ~~(offset / FrameHeight * DiffInHeight);
      }
      transform = 'translate3d(0px,'+ scroll  +'px, 0px)';
      par.style.webkitTransform = transform;
      par.style.MozTransform = transform;
      par.style.msTransform = transform;
      par.style.OTransform = transform;
      par.style.transform = transform;
    }// end for loop
  };

  $(window).on('scroll', function(){
    requestAnimFrame(render);
  });

  $(window).resize( function(){
    requestAnimFrame(render);
  });


  return self;
}; //end of plugin

// $(document).parallax();


// slabTextHeadlines();


$(".featured__banner__header").slabText({
    // Don't slabtext the headers if the viewport is under 380px
    "viewportBreakpoint":380
});
