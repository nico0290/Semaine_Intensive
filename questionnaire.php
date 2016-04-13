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
	<h1>Create your film session</h1>
	<div class="col col_1">
		<h2>step 1</h2>
		<h3>Where and when</h3>
		<div class="col_container"></div>
	</div>
	<div class="col col_2">
		<h2>step 2</h2>
		<h3>Extras ?</h3>
	</div>
	<div class="col col_3">
		<h2>step 3</h2>
		<h3>Invite your friends</h3>
		<div class="col_container"></div>
	</div>
</section>
<?php require_once __DIR__ ."/src/views/template/footer.php"; ?>
