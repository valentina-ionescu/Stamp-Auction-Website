<?php RequirePage::getView('stampee/headerAdmin', $data);
// print_r($data['pays'][0]);
// var_dump($data['images']);
?>

<div class="main_container">

    <div class="container">

        <div class="row large">

            <div class="col_form">
                <div class="signup-form ">
                    <h2>Mise à jour du timbre</h2>
                    <form action="../Timbre/updateTimbre" method="post" enctype="multipart/form-data">

                        <input type="hidden" name="idTimbre" value="<?= $data['timbres']['idTimbre'] ?>">
                        <br>

                        
                        <!-- Choisissez l'image P   rincipale: -->
                        <div style="    display: flex; flex-direction: row; align-items: flex-end; gap: 20px; justify-content: space-evenly; margin: 20px auto;">
                            <?php foreach ($data['images'] as $row) : ?>
                                
                            
                            <?php 
                            if ($row['Timbre_idTimbre'] == $data['timbres']['idTimbre']) { ?>
                                <!-- <input type="hidden" name="idImage" value="<?= $row['idImage'] ?>"> -->
                                    <div style="display: flex; flex-direction:column; align-items: center; margin: 10px;">
                                   
                                        <picture style="  object-fit: cover; background-size: cover">
                                            <img style="    width: auto; height: 10ch; " src="<?= ROOT ?>assets/images/stamps/<?= $row['nom_image'] ?>" alt="<?= $row['nom_image'] ?>" >
                                    </picture>
                                        <!-- <span>
                                            <label for="radioImg">Choisissez l'image Principale </label>
                                            <input name="image_principale" type="radio" id="radioImg" class="radio" value="yes" <?php if ($row['image_principale'] == 1) { echo 'checked';  } ?>>
                                           
                                        </span> -->
                                        </div>
                            <?php
                                }
                            endforeach;
                            ?>
                        </div>

                        Nom du timbre: <input type="text" name="nom" maxlength="100" value="<?= $data['timbres']['nom'] ?>"><br>

                        <div style="display: flex;flex-direction: row; gap: 20px;  justify-content: space-evenly; align-items: stretch;">
                            <span>
                                <label for="checkboxCert">Certification</label>
                                <input name="certifie" type="checkbox" id="checkboxCert" class="checkbox" value="yes" <?php if ($data['timbres']['certifie'] == 1) { echo 'checked'; } ?>>
                                Certifié?
                            </span>
                            <span>
                                <label for="checkboxFav">Coup de Coeur du Lord</label>
                                <input name="favori_du_Lord" type="checkbox" id="checkboxFav" class="checkbox" value="yes" <?php if ($data['timbres']['favori_du_Lord'] == 1) {
                                                                                                                                echo 'checked';
                                                                                                                            } ?>>
                                Coup de Coeur du Lord?
                            </span>
                        </div>

                        <br>

                        Condition: <input type="text" name="condition" maxlength="200" value="<?= $data['timbres']['condition'] ?>"><br>

                        <br>
                        Date de creation: <input type="text" name="annee" value="<?= $data['timbres']['annee'] ?>">
                        <br>

                        Tirage: <input type="text" name="tirage" maxlength="45" value=" <?= $data['timbres']['tirage'] ?>">
                        <br>

                        Dimmensions: <input type="text" name="dimmensions" maxlength="45" value="<?= $data['timbres']['dimmensions'] ?> ">
                        <br>

                        Couleur: <input type="text" name="couleur" maxlength="45" value="<?= $data['timbres']['couleur'] ?> ">
                        <br>

                        Description: <textarea type="text" name="details" maxlength="300" value=" <?= $data['timbres']['details'] ?>" rows="7" cols="45"><?= $data['timbres']['details'] ?></textarea>
                        <br>





                        Pays:
                        <select name="Pays_idPays">
                            <option value="<?= $data['timbres']['Pays_idPays'] ?>" disabled selected>--Selectionez le pays du timbre--</option>

                            <?php

                            foreach ($data['pays'] as $pays) { ?>

                                <option value="<?= $pays['idPays'] ?>" <?php if ($pays['idPays'] == $data['timbres']['Pays_idPays']) { echo 'selected'; } ?>><?= $pays['nom_pays'] ?></option>

                            <?php
                            }
                            ?>
                        </select>
                        <br>


                        Categorie:
                        <select name="Categorie_idCategorie">
                            <option value="<?= $data['timbres']['Categorie_idCategorie'] ?>" disabled selected>--Selectionez la Categorie--</option>



                            <?php

                            foreach ($data['categorie'] as $categorie) { ?>

                                <option value="<?= $categorie['idCategorie'] ?>" <?php if ($categorie['idCategorie'] == $data['timbres']['Categorie_idCategorie']) {
                                                                                        echo 'selected';
                                                                                    } ?>><?= $categorie['nom_categorie'] ?></option>

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