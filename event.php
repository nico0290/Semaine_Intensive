<?php 
header("Accept:application/json");
require_once __DIR__ ."/src/root.php";

if (!$userInfos) {
	header('Location: index.php');
	exit;
}

if (!isset($_GET['event'])) {
	header('Location: index.php');
	exit;
}

$eventID = $_GET['event'];

if (!belongsToEvent($eventID, $userInfos->getId())) {
	header('Location: index.php');
	exit;
}

if (isset($_GET['vote'])) {
	$movie = $_GET['vote'];

	if (!hasVoted($eventID, $userInfos->getId())) {
		addVote($eventID, $userInfos->getID(), $movie);
	}

	header('Location: event.php?event='. $eventID);
	exit;
}

$movies = getHighestMovies($eventID);

require_once __DIR__ ."/src/views/template/header.php";
require_once __DIR__ ."/src/views/template/section_header.php";
?>
<section class="container">
	<h1 class="submit_title">Submit your movie</h1>
	<div class="left_col">
		<input type="text" class="movie_search" name="movie">
		<div class="search_suggestion"></div>
		<div class="proposed_movies_container">
			<h2>Proposed movies</h2>
			<div class="proposed_movies">
				<?php foreach($movies as $movie): ?>
					<div class="movie_display">
						<img src="<?= $movie->cover; ?>" class="movie_jacket">
						<h1><?= $movie->id; ?></h1>
						<p>Nb of vote: <?= $movie->votes; ?></p>
						<div class="button_vote">
							<a href="?event=<?= $eventID ?>&vote=<?= $movie->id; ?>">VOTE</a>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
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
		<div class="people_coming">
			<h2>Link to share to your friends</h2>
			<input type="text" style="width: 300px; height: 30px" value="http://achappuy.com/si/?redirect=join.php?event=<?= $eventID ?>">
			<h1>Who is coming?</h1>

			<?php 
				$users = usersComingToEvent($eventID);
				foreach ($users as $user):
					$c = curl_init();
					curl_setopt($c, CURLOPT_URL, "https://graph.facebook.com/v2.6/{$user->fbid}?access_token={$_SESSION['fbtoken']}");
					curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
					$fbInfos = json_decode(curl_exec($c));
			?>
			<div class="people_infos">
				<div class="fb_pict"><img src="http://graph.facebook.com/v2.6/<?= $user->fbid ?>/picture?type=normal"></div>
				<div class="fb_infos">
					<span class="name"><?= $fbInfos->name ?></span>
				</div>

				<div class="items_brought"></div>
			</div>
			<?php endforeach; ?>
		</div>
		<div class="comment"></div>
		<div class="map"></div>
	</div>
	<input type="hidden" class= "eventID" value="<?php echo $eventID ?>">
	<input type="hidden" class= "fbID" value="<?php echo $user->fbid ?>">
</section>
<?php require_once __DIR__ ."/src/views/template/footer.php"; ?>
