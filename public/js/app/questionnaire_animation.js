var plus = $('.food_icon_6');
var confirm = $('.confirm');
var form = $('form');
var checked_items = [];
var icons_food = $('.icons_col_check');
var adress = form.find('#adress');
var adress2 = form.find('#adress_2');
var zip = form.find('#zip_code');
var city = form.find('#city');
var date = form.find('#date');
var hour = form.find('#hour');
var phone = form.find('#phone');
var comment = form.find('#comments');
// var icons = $('.');
// var pays = $('.pays');
// var brings = $('.brings');
// var hovers = $('.hover');

// brings.on('mouseover', function() {$(this).find('.hover').hide(300);});

// brings.on('mouseout', function() {$(this).find('.hover').show(300);});

// pays.on('mouseover', function() {$(this).find('.hover').hide(300);});

// pays.on('mouseout', function() {$(this).find('.hover').show(300);});

$('.icons_col').on('click', function() {
	var marker = $(this).find('.icons_col_check');
	// console.log(marker);
	$(this).find('.icons_col_check').toggleClass('checked');
	$(this).find('.icons_col_check').toggleClass('unchecked');
});

$('.food_icon.food_icon_6').on('click', function() {
	$('.icons').css('display', 'block');
});

$('.close').on('click', function() {
	$('.icons').css('display', 'none');

});

$('.confirm').on('click', function() {
	for(var i = 0; i < icons_food.length; i++) {

		if(icons_food[i].classList.contains("checked")) {
			checked_items.push(icons_food[i]);
		}

	}
});

confirm.on('click', function() {
	form.submit();
});

form.on('submit', function() {
	var adress_value= adress.val();
	var zip_value= zip.val();
	var city_value= city.val();
	var date_value= $('#date').val();
	var hour_value= hour.val();
	var comment_value= comment.val();
	
	$.post('questionnaire.php', {
		address: adress_value, 
		zip: zip_value, 
		city: city_value, 
		day: date_value, 
		hour: hour_value, 
		comment: comment_value,
	}, function(data) {
		if (data.error) return alert(data.message);
		console.log('ok');
	});

	return false;
});








