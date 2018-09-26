$(document).ready(function () {
    $('.border-line').css('width', '100%');
    $('.preloader').fadeOut();
    $('.search-btn').click(function () {
        $('.search-form').addClass('open');
        $('.search-form input').attr('autofocus','');
        setTimeout(function(){
            if($('.search-form input').val() == ''){
                $('.search-form').removeClass('open');
            }
        },4000)
    });
    $('.search-form input').change(function () {
        setTimeout(function(){
            if($('.search-form input').val() == ''){
                $('.search-form').removeClass('open');
            }
        },4000)
    });
    $('.search-form input').blur(function () {
        setTimeout(function(){
            if($('.search-form input').val() == ''){
                $('.search-form').removeClass('open');
            }
        },4000)

    });
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
});