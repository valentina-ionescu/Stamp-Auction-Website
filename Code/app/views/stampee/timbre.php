<?php RequirePage::getView('stampee/headerAdmin', $data);

?>

<div class="main_container">

    <div class="container">

        <div class="row large">

            <div class="col_form">
                <div class="signup-form ">
                    <h2>Ajoutez un Timbre</h2>
                    <form action="Timbre" method="post" enctype="multipart/form-data">
 

                        
                        Images: <input type="file" name="nom_image[]" value="" multiple>

                        Nom du timbre: <input type="text" name="nom" maxlength="100" value="<?= isset($_POST['nom'])? $_POST['nom']: '' ;?>"><br>

                        <div style="display: flex;flex-direction: row; gap: 20px;  justify-content: space-evenly; align-items: stretch;">
                            <span>
                                <label for="checkboxCert">Certification</label>
                                <input name="certifie" type="checkbox" id="checkboxCert" class="checkbox" value="yes">
                                Certifié?
                            </span>
                            <span>
                                <label for="checkboxFav">Coup de Coeur du Lord</label>
                                <input name="favori_du_Lord" type="checkbox" id="checkboxFav" class="checkbox" value="yes">
                                Coup de Coeur du Lord?
                            </span>
                        </div>

                        <br>

                        Condition: <input type="text" name="condition" maxlength="200" value="<?= isset($_POST['condition'])? $_POST['condition']: '' ;?>"><br>

                        <br>
                       Date de creation: <input type="text" name="annee" value="<?= isset($_POST['annee'])? $_POST['annee']: '' ;?>">
                        <br>

                        Tirage: <input type="text" name="tirage" maxlength="45" value=" <?= isset($_POST['tirage'])? $_POST['tirage']: '' ;?>">
                        <br>

                        Dimmensions: <input type="text" name="dimmensions" maxlength="45" value="<?= isset($_POST['dimmensions'])? $_POST['dimmensions']: '' ;?> ">
                        <br>

                        Couleur: <input type="text" name="couleur" maxlength="45" value="<?= isset($_POST['couleur'])? $_POST['couleur']: '' ;?> ">
                        <br>

                        Description: <textarea type="text" name="details" maxlength="300" value=" <?= isset($_POST['details'])? $_POST['details']: '' ;?>" rows="7" cols="45"></textarea>
                        <br>

                       

                        

                        Pays:
                        <select name="Pays_idPays">
                            <option value="" disabled selected>--Selectionez le pays du timbre--</option>

                            <?php

                            foreach ($data['pays'] as $pays) { ?>

                                <option value="<?= $pays['idPays'] ?>"><?= $pays['nom_pays'] ?></option>

                            <?php
                            }
                            ?>
                        </select>
                        <br>


                        Categorie:
                        <select name="Categorie_idCategorie">
                            <option value="" disabled selected>--Selectionez la Categorie--</option>



                            <?php

                            foreach ($data['categorie'] as $categorie) { ?>

                                <option value="<?= $categorie['idCategorie'] ?>"><?= $categorie['nom_categorie'] ?></option>

                            <?php
                            }
                            ?>
                        </select>
                        <br>



                        <button type="submit" class="btn btn-default">Enregistrer</button>


                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php RequirePage::getView('stampee/footerAdmin', $data); ?>