<?php RequirePage::getView('stampee/header', $data); 

?>



<div class="main_container">
	<section id="form" class="main_section ">
		<!--form-->
		<h2 class="section__title red_txt"> S'enregistrer </h2>

		<div class="container">

			<div class="row">	

				<div class="col_form">
					<div class="signup-form">

						<!--sign up form-->
						<h2>Créer un Compte</h2>

						<form action="../User/register" method="post">
							<label for="prenom">Prenom</label>
							<input name="prenom" type="text" id="prenom" placeholder="Prenom"  value="<?= isset($_POST['prenom'])? $_POST['prenom']: '' ;?>"/>

							<label for="nom">Nom</label>
							<input name="nom" type="text" id="nom" placeholder="Nom" value="<?= isset($_POST['nom'])? $_POST['nom']: '' ;?>"/>

							<!-- <label for="username">username</label>
							<input name="user_name" type="text" id="username" placeholder="Nom Utilisateur" value="<?= isset($_POST['username'])? $_POST['username']: '' ;?>"/> -->

							<label for="adresse">Adresse</label>
							<input name="adresse" type="text" id="adresse" placeholder="Adresse" value="<?= isset($_POST['adresse'])? $_POST['adresse']: '' ;?>"/>

							<label for="courriel">Courriel</label>
							<input name="courriel" type="email" id="courriel" placeholder="Courriel" value="<?= isset($_POST['courriel'])? $_POST['courriel']: '' ;?>"/>
							
							<label for="role">Role</label>
							<input class="hidden" style="display:none;" name="Role_idRole" type="TEXT" id="role" placeholder="RoleId" value="2"/>
							

							<label for="password">Mot de passe</label>
							<input name="password" type="password" id="password" placeholder="Mot de passe" />
                            <label for="password">Mot de passe</label>
							<input name="password2" type="password" id="password2" placeholder="Confirmez le mot de passe" />


							<span>
								<label for="checkbox">Rester connecté</label>
								<input name="membre" type="checkbox" id="checkbox" class="checkbox" value="yes">
								Vous voulez devenir membre pour seulement $99 CAD/année? 
							</span>

							<button type="submit" class="btn">S'inscrire</button>
							

						



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