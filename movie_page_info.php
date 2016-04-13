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
	
<?php require_once __DIR__ ."/src/views/template/section_header.php"; ?>

	<div class="movie_infos">
		<div class="poster"></div>
		<div class="infos_block">
			<div class="movie_title">Lorem Ipsum</div>
			<div class="infos">
				<div class="director"> Movie by <a href="#" class="director_name artiste">Spike Jonze</a> </div>
				<div class="kind"> Drama, Romance, Sci-Fi </div>
				<div class="duration"> 2 h 05 </div>
				<div class="release_date"> 19 mars 2014 </div>
				<div class="rating"> 6.5 </div>
				<div class="cast">
					<span class="starring">With</span>
					<span class="actor"> <a href="#" class="artiste">Joaduin Phoenix</a> </span>
					<span class="actor"> <a href="#" class="artiste">Scarlett Johansson</a> </span>
					<span class="actor"> <a href="#" class="artiste">Amy Adams</a> </span>
				</div>
				<div class="summary">
					Los Angeles, dans un futur proche. Theodore Twombly, un homme sensible au caractère complexe,
					est inconsolable suite à une rupture difficile. Il fait alors l'acquisition d'un programme informatique ultramoderne,
					capable de s'adapter à la personnalité de chaque utilisateur. En lançant le système, il fait la connaissance de 'Samantha',
					une voix féminine intelligente, intuitive et étonnamment drôle. Les besoins et les désirs de Samantha grandissent et évoluent,
					tout comme ceux de Theodore, et peu à peu, ils tombent amoureux…
				</div>
			</div>
		</div>
	</div>
	<div class="other_movies"></div>

</section>
<?php require_once __DIR__ ."/src/views/template/footer.php"; ?>