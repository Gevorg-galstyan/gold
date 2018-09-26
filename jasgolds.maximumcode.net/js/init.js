$(function () {
    $('#da-slider').cslider({
        autoplay: true,
        bgincrement: 1000
    });

});
$(window).scroll(function () {
   winScrollTop = $(window).scrollTop();
   if(winScrollTop >= $('#section-slider').offset().top + $("#section-slider").height()){
       $('.animate-line').eq(0).addClass('on-animate');
       $('.cd-item-wrapper .selected').eq(0).addClass('spin')
   }
   if(winScrollTop >= $('.cd-gallery').eq(0).offset().top + $(".cd-gallery").eq(0).height()/1.3){
       $('.animate-line').eq(1).addClass('on-animate');
       $('.cd-item-wrapper .selected').eq(1).addClass('spin');
   }
   if(winScrollTop >= $('.cd-gallery').eq(1).offset().top + $(".cd-gallery").eq(1).height()/1.3){
       $('.animate-line').eq(2).addClass('on-animate');
       $('.cd-item-wrapper .selected').eq(2).addClass('spin');
   }
   if(winScrollTop >= $('.cd-gallery').eq(2).offset().top + $(".cd-gallery").eq(2).height()/1.3){
       $('.animate-line').eq(3).addClass('on-animate');
       $('.cd-item-wrapper .selected').eq(3).addClass('spin');
   }

});
(function() {
    var $grid = $('.grid').imagesLoaded(function() {
        $('.site__wrapper').masonry({
            itemSelector: '.grid'
        });
    });
})();