var plus = $('.food_icon_6');
var checked_items = [];
var icons_food = $('.icons_col_check');
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

	console.log(checked_items);
});








