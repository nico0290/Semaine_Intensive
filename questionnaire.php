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
<div class="icons">
	<div class="icons_container">
	<span class="close"></span>
		<div class="icons_line_1">
			<div class="icons_col icons_col_1 food_icon_1">
			<span class="icons_col_check unchecked"></span>
			</div>
			<div class="icons_col icons_col_2 food_icon_2">
			<span class="icons_col_check unchecked"></span>
			</div>
			<div class="icons_col icons_col_3 food_icon_3">
			<span class="icons_col_check unchecked"></span>
			</div>
			<div class="icons_col icons_col_4 food_icon_4">
			<span class="icons_col_check unchecked"></span>
			</div>
			<div class="icons_col icons_col_5 food_icon_5">
			<span class="icons_col_check unchecked"></span>
			</div>
			<div class="icons_col icons_col_6 food_icon_6">
			<span class="icons_col_check unchecked"></span>
			</div>
		</div>
		<div class="icons_line_2">
			<div class="icons_col icons_col_1 food_icon_7">
			<span class="icons_col_check unchecked"></span>
			</div>
			<div class="icons_col icons_col_2 food_icon_8">
			<span class="icons_col_check unchecked"></span>
			</div>
			<div class="icons_col icons_col_3 food_icon_9">
			<span class="icons_col_check unchecked"></span>
			</div>
			<div class="icons_col icons_col_4 food_icon_10">
			<span class="icons_col_check unchecked"></span>
			</div>
			<div class="icons_col icons_col_5 food_icon_11">
			<span class="icons_col_check unchecked"></span>
			</div>
			<div class="icons_col icons_col_6 food_icon_12">
			<span class="icons_col_check unchecked"></span>
			</div>
		</div>
		<div class="icons_line_3">
			<div class="icons_col icons_col_1 food_icon_13">
			<span class="icons_col_check unchecked"></span>
			</div>
			<div class="icons_col icons_col_2 food_icon_14">
			<span class="icons_col_check unchecked"></span>
			</div>
			<div class="icons_col icons_col_3 food_icon_15">
			<span class="icons_col_check unchecked"></span>
			</div>
			<div class="icons_col icons_col_4 food_icon_16">
			<span class="icons_col_check unchecked"></span>
			</div>
			<div class="icons_col icons_col_5 food_icon_17">
			<span class="icons_col_check unchecked"></span>
			</div>
			<div class="icons_col icons_col_6 food_icon_18">
			<span class="icons_col_check unchecked"></span>
			</div>
		</div>
	</div>
</div>
<section class="container">
	<h1 class="create_your_film">Create your film session</h1>
	<!-- COLONNE 1 ON 3-->
	<div class="col col_1">
		<div class="col_header">
			<h2>step 1</h2>
			<h3>Where and when</h3>
		</div>
		<div class="col_container">
			<div>Where ?</div>
			<form action="#" method="POST">
				<div class="first_part">
					<div class="label">
						<label for="adress">Adress</label>
						<input class="input" type="text" id="adress" name="adress">
					</div>
					<div class="label">
						<label for="adress_2">Adress 2</label>
						<input class="input" type="text" id="adress_2" name="adress_2">
					</div>
				</div>
				<div class="second_part">
					
					<div class="line line_1">
						<div class="form_col_1">
							<div class="label">
								<label for="zip_code">Zip code</label>
								<input class="input" type="number" id="zip_code">
							</div>
						</div>
						<div class="form_col_2">
							<div class="label">
								<label for="city">City</label>
								<input class="input" type="text" id="city" name="city">
							</div>
						</div>
					</div>

					<div class="line line_2">
						<div class="form_col_1">
							<div class="label">
								<label for="when">When ?</label>
								<input class="input" type="date" id="when" name="date" placeholder="dd/mm/yyyy">
							</div>
						</div>
						<div class="form_col_2">
							<div class="label">
								<input class="input" type="time" id="hour" name="hour">
							</div>
						</div>
					</div>
					<div class="line line_3">
						<div class="label">
							<label for="phone">Phone</label>
							<input class="input" type="tel" id="phone" name="phone">
						</div>
					</div>

					<div class="line line_4">
						<div class="label">
							<label for="comments">Comments</label>
							<textarea name="comments" id="comments"></textarea>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
	<!-- COLONNE 2 ON 3-->
	<div class="col col_2">
		<div class="col_header">
			<h2>step 2</h2>
			<h3>Extras ?</h3>
		</div>

		<div class="brings">
			<div class="hover brings_hover">
				<span>Brings</span>
			</div>
			<h2>Everyone brings</h2>
			<div class="food_grid">
				<div class="food_line food_line_1">
					<div class="food_icon food_icon_1"></div>
					<div class="food_icon food_icon_2"></div>
					<div class="food_icon food_icon_3"></div>
				</div>
				<div class="food_line food_line_2">
					<div class="food_icon food_icon_4"></div>
					<div class="food_icon food_icon_5"></div>
					<div class="food_icon food_icon_6"></div>
				</div>
			</div>
		</div>
		<div class="or"> 
			<span>OR</span> 
		</div>
		<div class="pays">
			<div class="hover pays_hover">
				<span>Pays</span>
			</div>
			<h2>Everyone pays</h2>
			<div class="need">
				<a href="#" class="how_many">
					How much do I need ?
				</a>
			</div>

		</div>
	</div>
	<!-- COLONNE 3 ON 3-->
	<div class="col col_3">
		<div class="col_header">
			<h2>step 3</h2>
			<h3>Invite your friends</h3>
		</div>
		<div class="col_container">
			<input type="text" name="friend" placeholder="search a friend" id="friend_search">
			<div class="fb_friend_container">
				<div class="fb_user_pict"></div>
				<div class="fb_user_name">Someone</div>
			</div>
			<div class="fb_friend_container">
				<div class="fb_user_pict"></div>
				<div class="fb_user_name">else</div>
			</div>
		</div>
	</div>
	<a href="#" class="confirm">Create</a>
</section>
<?php require_once __DIR__ ."/src/views/template/footer.php"; ?>
