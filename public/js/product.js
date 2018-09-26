$(document).ready(function () {
    $('.filter-open').click(function () {
        $('.mobile-filter').fadeIn().addClass('on')
    })
    $('.close-filters').click(function () {
        $('.mobile-filter').removeClass('on')
    })
    $('.mobile-filter').click(function (event) {
        if(event.target.classList.contains('mobile-filter')){
            $('.mobile-filter').removeClass('on')
        }
    })
});