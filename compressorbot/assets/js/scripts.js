/**
* Header Loader Animation
*/
function headerLoaderAnimation() {
	var headerLoader = $('.header-loader-animation');
	if ( headerLoader.outerWidth() > 0 ) {
		headerLoader.animate({'width': '0%'}, 5000);
	} else {
		headerLoader.animate({'width': '100%'}, 5000);
	}
}
headerLoaderAnimation();


/**
* Sticky Sidebar
*/
if (!!$('.sticky').offset()) { // make sure ".sticky" element exists

	var	stickyElem = $('.sticky'),
		stickyTop = stickyElem.offset().top;

	$(window).scroll(function(){
		// Make sure window is big enough
		if ( $(this).outerHeight() > (stickyElem.outerHeight() + 10) ) {
			var windowTop = $(window).scrollTop();
			if (stickyTop < windowTop){
				stickyElem.css({ position: 'fixed', top: -55 }).removeClass('offset1').addClass('offset9');
			}
			else {
				stickyElem.css('position','static').removeClass('offset9').addClass('offset1');
			}
		} else {
			stickyElem.css('position','static').removeClass('offset9').addClass('offset1');
		}
	});
}


/**
* Create Download File
*/
$('.download-btn').on('click', function(e){
	var that = $(this),
			textarea = that.parent().siblings('textarea')
	;
	console.log(textarea.val());
	e.preventDefault();
	return false;
});