var yes = $('.yes');
var no  = $('.no');

yes.on('click', function() {
	$(this).toggleClass('yes_positive');
	$(this).toggleClass('yes_negative');
	no.toggleClass('no_positive');
	no.toggleClass('no_negative');
});

no.on('click', function() {
	$(this).toggleClass('no_positive');
	$(this).toggleClass('no_negative');
	yes.toggleClass('yes_positive');
	yes.toggleClass('yes_negative');
});