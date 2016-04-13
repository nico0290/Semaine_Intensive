<?php 
header("Accept:application/json");
require_once __DIR__ ."/src/root.php";

if ($userInfos) {
	require_once __DIR__ ."/src/lib/eventsDelete.php";
	require_once __DIR__ ."/src/lib/eventsAdd.php";
} else {
	require_once __DIR__ ."/src/lib/facebookLogin.php";
}

require_once __DIR__ ."/src/views/template/header.php";
?>

<section class="container">
	<div class="left_side">
		<div class="submit_movie">
			<h2>Submit your movie</h2>
			<form action="#" method="POST">
				<input type="text" name="search" id="searchbar" placeholder="Search your movie here">
				<div id="test"></div>
			</form>
		</div>
		<div class="proposed_movies_container">
			<h2>proposed movies</h2>
			<div class="proposed_movies">
				
			</div>
			<div class="random_movies">

			</div>
		</div>
	</div>

	<div class="right_side">
		<div class="people_coming">
			<h2>people_coming</h2>
		</div>
		<div class="who_brings_what">
			<h2>who_brings_what</h2>
		</div>
		<div class="rdv">
			<h2>Rendez-vous</h2>
		</div>
	</div>
</section>
<?php
$ID_Request = curl_init();
curl_setopt($ID_Request, CURLOPT_URL, "https://api.themoviedb.org/3/movie/latest?api_key=c195fd81f524b224aae5a9bc246e403f");
curl_setopt($ID_Request, CURLOPT_RETURNTRANSFER, true);
$object = json_decode(curl_exec($ID_Request));
$id = $object->id;
curl_close($ID_Request);
$random_ID = mt_rand(1, $id);

for($i = 0; $i < 5; $i++) {
	$random_ID = mt_rand(1, $id);
	$movie_request = curl_init();
	curl_setopt($movie_request, CURLOPT_URL, "https://api.themoviedb.org/3/movie/".$random_ID."?api_key=c195fd81f524b224aae5a9bc246e403f");
	curl_setopt($movie_request, CURLOPT_RETURNTRANSFER, true);
	$object = json_decode(curl_exec($movie_request));
	$movie_name = $object->title;
	curl_close($movie_request);
	writeMovieName($movie_name);
}

function writeMovieName($movie_name) {
	echo $movie_name."<br/>";
}

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://api.themoviedb.org/3/movie/550?api_key=c195fd81f524b224aae5a9bc246e403f");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result = json_decode(curl_exec($ch));
echo $result->backdrop_path;

curl_close($ch);
?>

<?php require_once __DIR__ ."/src/views/template/footer.php"; ?>