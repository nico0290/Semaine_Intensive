var searchbar = $('#searchbar');
searchbar.on('keyup', function() {
if(searchbar.val().length >= 4) {
    window.setTimeout(dbSearch(searchbar.val()), 700);
}
});

searchbar.on('keydown', function(e) {
    if(e.keyCode == 13) {

        dbSearch(searchbar.val());

    }
});

function dbSearch(inputText) {
    console.log('cc');

        $.ajax({
            type: "POST",
            url: "src/lib/apicall.php",
            data: {
                functionname: 'searchMovies',
                arguments: [inputText]
            },
            success: function(data) {
                var movies = data.result.results;
                $("#test").empty();
                for(var i = 0, l = movies.length; i < l; i++)
                {
                    $("#test").append("<span>"+movies[i].title+"</span><br>");
                }
            },
            error: function(e){
        }
    });
}
