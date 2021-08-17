<?php RequirePage::getView('stampee/header', $data); 
?>



<div class="main_container">
	<section id="form" class="main_section ">
		<!--form-->
		<h2 class="section__title red_txt"> Modififier </h2>

		<div class="container">

			<div class="row">	

				<div class="col_form">
					<div class="signup-form">

						<!--sign up form-->
						<h2>Modifier le compte</h2>

						<form action="User/updateUser" method="post">

						<input type="hidden" name="idUsager" value="<?= $data['usager']['idUsager'] ?>">
                            <br> 
							<label for="prenom">Prenom</label>
							<input name="prenom" type="text" id="prenom" placeholder="Prenom"  value="<?= $data['usager']['prenom'] ?>"/>

							<label for="nom">Nom</label>
							<input name="nom" type="text" id="nom" placeholder="Nom" value="<?= $data['usager']['nom']?>"/>

							<!-- <label for="username">username</label>
							<input name="user_name" type="text" id="username" placeholder="Nom Utilisateur" value="<?= $data['usager']['username']?>"/> -->

							<label for="adresse">Adresse</label>
							<input name="adresse" type="text" id="adresse" placeholder="Adresse" value="<?= $data['usager']['adresse']?>"/>

							<label for="courriel">Courriel</label>
							<input name="courriel" type="email" id="courriel" placeholder="Courriel" value="<?= $data['usager']['courriel']?>"/>
							
							<label for="role">Role</label>
							<input class="hidden" style="display:none;" name="Role_idRole" type="TEXT" id="role" placeholder="RoleId" value="<?= $data['usager']['Role_idRole']?>"/>
							

							<label for="password">Mot de passe</label>
							<input name="password" type="password" id="password" placeholder="Mot de passe"  value="<?= $data['usager']['password']?>"/>
                       


							<span>
								<label for="checkbox">Rester connecté</label>
								<input name="membre" type="checkbox" id="checkbox" class="checkbox" value="yes" <?php if($data['usager']['membre'] == 1){echo'checked';} ?>>
								Vous voulez devenir membre pour seulement $99 CAD/année? 
							</span>

							<button type="submit" class="btn">Enregistrer</button>
							

						



						</form>
					</div>
					<!--/sign up form-->
				</div>
			</div>
		</div>
	</section>
	<!--/form-->
</div>

<?php RequirePage::getView('stampee/footer'); ?>