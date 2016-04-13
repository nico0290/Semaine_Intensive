<?php 
	require_once __DIR__ ."/src/root.php";

	if ($userInfos) {
		require_once __DIR__ ."/src/lib/eventsDelete.php";
		require_once __DIR__ ."/src/lib/eventsAdd.php";
	} else {
		require_once __DIR__ ."/src/lib/facebookLogin.php";
	}

	require_once __DIR__ ."/src/views/template/header.php";
?>	
	<div class="black">
		<?php if ($userInfos): ?>
			<?php require_once __DIR__ ."/src/views/homelogged.php"; ?>
		<?php else: ?>
			<?php require_once __DIR__ ."/src/views/notlogged.php"; ?>
		<?php endif; ?>
	</div>
	<div id="cards"></div>
<?php require_once __DIR__ ."/src/views/template/footer.php"; ?>