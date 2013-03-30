/**
* Language Options
*/
var lbOptionsRadio = $('#lb_options input[type="radio"]');
lbOptionsRadio.on('change', function(){
	var showId = $(this).val();
	$('.cb-options-section, .jb-options-section').addClass('hide');
	$('.'+showId).removeClass('hide');
});