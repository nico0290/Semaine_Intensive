var searchbar = $('.movie_search');
var proposed = $('.proposed_movies');
var eventID = $('.eventID').val();
var fbID = $('.fbID').val();
var search_suggestion = $('.search_suggestion');
var movies_list_infos = [];
var movies;
searchbar.on('keyup', function() {
    if(searchbar.val().length >= 4) {
        window.setTimeout(dbSearch(searchbar.val()), 700);
    }
});

searchbar.on('keydown', function(e) {
    if(e.keyCode == 13 || e.keyCode == 8) {

        dbSearch(searchbar.val());

    }

    if(searchbar.val() == '') {
        $('.search_suggestion').empty();
    }
});

function dbSearch(inputText) {

    $.ajax({
        type: "POST",
        url: "src/lib/apicall.php",
        data: {
            functionname: 'searchMovies',
            arguments: [inputText]
        },
        success: function(data) {
            movies = data.result.results;
            search_suggestion.empty();
            for(var i = 0, l = movies.length; i < l; i++)
            {
                var element = $('<div></div>');
                element.html(movies[i].title);
                search_suggestion.append(element);
                // search_suggestion.append("<span>"+movies[i].title+"</span><br>");
                console.log(data);
                movies_list_infos = search_suggestion.find('div');
            }

            addClick();
        },
        error: function(e){
        }
    });
}

function addClick() {
    movies_list_infos.each(function() {
        $(this).on('click', function() {
            var index = $('div').index($(this));
            // console.log(index);
            var movie_infos = {};
            movie_infos.title = movies[index].title;
            movie_infos.id = movies[index].id;
            movie_infos.cover = "http://image.tmdb.org/t/p/w500" + movies[index].backdrop_path;
            // console.log(movie_infos);
            movies_list_infos.push(movie_infos);
            // console.log(movies_list_infos);
            sendMovieInfos(movie_infos);
            sendEventInfos(movie_infos);
            sendVoteInfos(movie_infos);

        });
    });
}

function sendMovieInfos(infos) {
    var title = infos.title;
    var cover = infos.cover;
    $.post("sendMovieInfos.php", {title: title, id: infos.id, cover: cover}, function(data) {
        var new_movie = $('<div></div>');
        new_movie.addClass('movie_display');
        new_movie.html("<img src=" + cover +'"' + " class= movie_jacket>" + "<h1>" + title + "</h1>");
        proposed.append(new_movie);
    });

}

function sendEventInfos(infos) {
    var title = infos.title;
    $.post("sendEventMovie.php", {title: title, eventID: eventID}, function(data) {
    });
}
function sendVoteInfos(infos) {
    var title = infos.title;
    $.post("sendVoteInfos.php", {eventsID: eventID, movieID: title, fbID: fbID}, function(data) {
    console.log(data);
    });
}

/*

*/
