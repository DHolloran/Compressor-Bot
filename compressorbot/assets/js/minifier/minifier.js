/**
* Language Options
*/
var lmOptionsRadio = $('#lm_options input[type="radio"]');
lmOptionsRadio.on('change', function(){
	var showId = $(this).val();
	$('.cm-options-section, .jm-options-section, .hm-options-section').addClass('hide');
	$('.'+showId).removeClass('hide');
});
