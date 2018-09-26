$(document).ready(function() {
	var galleryItems = $('.cd-gallery').children('.single-category');
	galleryItems.each(function(){
		var container = $(this),
			// create slider dots
			sliderDots = createSliderDots(container);
		//check if item is on sale
		// update slider when user clicks one of the dots
		sliderDots.on('click', function(){

			dotIndex = $(this).index();
			dataXName = $(this).parents('.single-category').find('.cd-item-wrapper').children('li').eq(dotIndex).data('name');
			$(this).parents('.single-category').find('.company-name').fadeToggle(300).text(dataXName);

			var selectedDot = $(this);
			if(!selectedDot.hasClass('selected')) {
				var selectedPosition = selectedDot.index(),
					activePosition = container.find('.cd-item-wrapper .selected').index();
				if( activePosition < selectedPosition) {
					nextSlide(container, sliderDots, selectedPosition);
				} else {
					prevSlide(container, sliderDots, selectedPosition);
				}

			}
		});

		// update slider on swipeleft
		container.find('.cd-item-wrapper').on('swipeleft', function(){
			var wrapper = $(this);
			if( !wrapper.find('.selected').is(':last-child') ) {
				nextSlide(container, sliderDots);

			}
		});

		// update slider on swiperight
		container.find('.cd-item-wrapper').on('swiperight', function(){
			var wrapper = $(this);
			if( !wrapper.find('.selected').is(':first-child') ) {
				prevSlide(container, sliderDots);

			}
		});

		// preview image hover effect - desktop only
		container.on('mouseover', '.move-right, .move-left', function(){
			hoverItem($(this), true);
		});
		container.on('mouseleave', '.move-right, .move-left', function(){
			hoverItem($(this), false);
		});

		// update slider when user clicks on the preview images
		container.on('click', '.move-right, .move-left', function(event){

			event.preventDefault();
			if ( $(this).hasClass('move-right') ) {
				nextSlide(container, sliderDots);
			} else {
				prevSlide(container, sliderDots);
			}
			dataName = $(this).data('name');
			$(this).parents('.cd-gallery').find('.company-name').fadeToggle(300).text(dataName);
		});
	});

	function createSliderDots(container){
		var dotsWrapper = $('<ol class="cd-dots mt-1"></ol>').insertAfter(container.children('a'));
		container.find('.cd-item-wrapper li').each(function(index){
			var dotWrapper = (index == 0) ? $('<li class="selected"></li>') : $('<li></li>'),
				dot = $('<a href="#0"></a>').appendTo(dotWrapper);
			dotWrapper.appendTo(dotsWrapper);
			dot.text(index+1);
		});
		return dotsWrapper.children('li');
	}

	function hoverItem(item, bool) {
		( item.hasClass('move-right') )
			? item.toggleClass('hover', bool).siblings('.selected, .move-left')
			: item.toggleClass('hover', bool).siblings('.selected, .move-right');
	}

	function nextSlide(container, dots, n){
		var visibleSlide = container.find('.cd-item-wrapper .selected'),
			navigationDot = container.find('.cd-dots .selected');
		if(typeof n === 'undefined') n = visibleSlide.index() + 1;
		visibleSlide.removeClass('selected');
		container.find('.cd-item-wrapper li').eq(n).addClass('selected').removeClass('move-right hover').prevAll().removeClass('move-right move-left focus-on-right').addClass('hide-left').end().prev().removeClass('hide-left').addClass('move-left').end().next().addClass('move-right');
		navigationDot.removeClass('selected');
		dots.eq(n).addClass('selected');
	}

	function prevSlide(container, dots, n){
		var visibleSlide = container.find('.cd-item-wrapper .selected'),
			navigationDot = container.find('.cd-dots .selected');
		if(typeof n === 'undefined') n = visibleSlide.index() - 1;
		visibleSlide.removeClass('selected focus-on-left');
		container.find('.cd-item-wrapper li').eq(n).addClass('selected').removeClass('move-left hide-left hover').nextAll().removeClass('hide-left move-right move-left focus-on-left').end().next().addClass('move-right').end().prev().removeClass('hide-left').addClass('move-left');
		navigationDot.removeClass('selected');
		dots.eq(n).addClass('selected');
	}
});

