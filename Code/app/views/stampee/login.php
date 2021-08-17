<?php RequirePage::getView('stampee/header', $data); ?>



<div class="main_container">

<!-- <?=  $data['msg']?> -->

	<section id="form" class="main_section ">
		<!--form-->
		<h2 class="section__title red_txt"> Connexion </h2>

		<div class="container">

			<div class="row">

			

				<div class="col_form">
					<div class="login-form">
						<!--login form-->
						<h2>Accéder à Votre Compte</h2>
						<form method="post">
							<label for="courrielLogin">Courriel</label>
							<input name="courriel" type="email" id="courrielLogin" placeholder="Courriel" />

							<label for="passwordLogin">Mot de passe</label>
							<input name="password" type="password" id="passwordLogin" placeholder="Mot de passe" />


							<span class="hidden">
								<label for="checkbox">Rester connecté</label>
								<input type="checkbox" id="checkbox" class="checkbox" name="connectee" value="0">
								Rester connecté


							</span>

							<?php if (isset($_SESSION['errorMsg'])) { ?>

								<h4 style="color: red;"><?= $_SESSION['errorMsg'] ?></h4>

							<?php } ?>
							<br>
							<button type="submit" class="btn btn-default">Login</button>
						</form>
						<br>
						<a href="./register"> Vous n'avez pas un compte ? Inscrivez-vous ici</a>
					</div>

					<!--/login form-->
				</div>
			</div>
		</div>
	</section>
	<!--/form-->
</div>

<?php RequirePage::getView('stampee/footer'); ?>