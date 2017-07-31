
(function(){

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
  Waves.attach('a.btn, a.button, img');



  (function filterSideBar(){
    $('.filter__widget__trigger').on('click', function(){
      $(this).parent('.filter__widget').toggleClass('filter__widget-open');
    });
  })();

  $('.slimscroll').slimscroll({
    size: '5px',
    height: '100%',
    wheelStep: 20,
  });



  // slabTextHeadlines();


  $(".slab").slabText({
      // Don't slabtext the headers if the viewport is under 380px
      "viewportBreakpoint":380,

  });


})();
