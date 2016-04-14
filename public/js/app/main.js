// $(function () {
//     var imagesI = 0;

//     $.get('api.php', function (result) {
//         var images = [];
//         var result = JSON.parse(result);

//         for (var film in result.data.movies) {
//             images[images.length] = result.data.movies[film].urlPoster;
//         }

//         init(images);
//     });

//     function init (images) {
//         var count = 1;

//         // Create cards on the background (to use all the space available)
//         var cardHeight = 268;
//         var cardWidth = 182;
//         var nbreCardWidth = Math.ceil($(window).width() / cardWidth);
//         var nbreCardHeight = Math.ceil($(window).height() / cardHeight);

//         for (var line = 0; line < nbreCardHeight; line++) {
//             for (var row = 0; row < nbreCardWidth; row++) {
//                 var top = line * cardHeight;
//                 var left = row * cardWidth;

//                 var $element = $('<div />');
//                 $element.addClass('background');
//                 $element.attr('data-flip', 'true');
//                 $element.css('background', 'url('+ images[imagesI] +')');
//                 $element.css('top', top +'px');
//                 $element.css('left', left +'px');

//                 $('#cards').append($element);

//                 imagesI++;
//             }
//         }


//         // Flip cards
//         $elements = $('[data-flip="true"]');
//         //setInterval(function () { flip($elements); }, 5000);

//         function flip($elements) {
//             $elements.each(function (i) {
//                 var $current = $(this);
//                 var random = Math.floor(Math.random() * images.length);
                
//                 setTimeout(function () {
//                     $current.css({
//                         transform: "rotateY("+ 180 * count +"deg)"
//                     });

//                     $current.css('background', 'url('+ images[random] +')');
//                 }, (i * 50));
//             });

//             count++;
//         }
//     }
// });
