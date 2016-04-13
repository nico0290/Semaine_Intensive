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

<section>
	
<header>
	<div class="left">
		<div class="logo"></div>
		<div class="title">MovieFriends</div>
	</div>
	<div class="right">
		<div class="user_pict"></div>
		<div class="user_name"></div>
	</div>
</header>

<div class="movie_infos">
	<div class="poster"></div>
	<div class="infos_block">
		<div class="movie_title">Lorem Ipsum</div>
		<div class="infos">
			<div class="director"></div>
			<div class="kind"></div>
			<div class="duration"></div>
			<div class="release_date"></div>
		</div>
		<div class="cast"></div>
		<div class="rating"></div>
		<div class="summary"></div>
	</div>
</div>
<div class="other_movies"></div>

</section>
<?php require_once __DIR__ ."/src/views/template/footer.php"; ?>