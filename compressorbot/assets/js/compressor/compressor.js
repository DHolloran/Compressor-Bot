/**
* Language Options
*/
var lcOptionsRadio = $('#lc_options input[type="radio"]');
lcOptionsRadio.on('change', function(){
	var showId = $(this).val();
	$('.cc-options-section, .jc-options-section, .hc-options-section').addClass('hide');
	$('.'+showId).removeClass('hide');
});
