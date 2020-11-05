$(document).ready(function(){
    setTimeout(function(){
      $('.loader_bg').fadeToggle();
    },1000);

    $('.ir-arriba').click(function(){
          $('body, html').animate({
              scrollTop: '0px'
          });
    });
});