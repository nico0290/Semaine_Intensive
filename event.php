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
<?php require_once __DIR__ ."/src/views/template/section_header.php"; ?>
<section class="container">
	<h1 class="submit_title">Submit your movie</h1>
	<div class="left_col">
		<input type="text" class="movie_search" name="movie">
		<div class="proposed_movies">
			
		</div>
		<div class="cream_of_the_crop">
			<div class="movie_display">
				<div class="movie_jacket"></div>
				<div class="movie_infos">
					<span class="movie_title"></span>
					<span class="more"></span>
				</div>
			</div>
			<div class="movie_display">
				<div class="movie_jacket"></div>
				<div class="movie_infos">
					<span class="movie_title"></span>
					<span class="more"></span>
				</div>
			</div>
			<div class="movie_display">
				<div class="movie_jacket"></div>
				<div class="movie_infos">
					<span class="movie_title"></span>
					<span class="more"></span>
				</div>
			</div>
			<div class="movie_display">
				<div class="movie_jacket"></div>
				<div class="movie_infos">
					<span class="movie_title"></span>
					<span class="more"></span>
				</div>
			</div>
		</div>
	</div>

	<div class="right_col">
		<div class="remaining_time">
			<span class="days"></span>
			<span class="hours"></span>
			<span class="minutes"></span>
		</div>
		<div class="coming">
			<h2>Will you come ?</h2>
			<div class="answers_container">
				<span class="yes yes_positive"></span>
				<span class="no no_negative"></span>
			</div>
		</div>
		<div class="people_coming">

			<div class="people_infos">
				<div class="fb_pict"></div>
				<div class="fb_infos">
					<span class="name">Someone</span>
					<div>comes</div>
				</div>

				<div class="items_brought"></div>
			</div>
			<div class="people_infos">
				<div class="fb_pict"></div>
				<div class="fb_infos">
					<span class="name">Someone</span>
					<div>comes</div>
				</div>

				<div class="items_brought"></div>
			</div>
			<div class="people_infos">
				<div class="fb_pict"></div>
				<div class="fb_infos">
					<span class="name">Someone</span>
					<div>comes</div>
				</div>

				<div class="items_brought"></div>
			</div>

		</div>
		<div class="comment"></div>
		<div class="map"></div>
	</div>

</section>
<?php require_once __DIR__ ."/src/views/template/footer.php"; ?>