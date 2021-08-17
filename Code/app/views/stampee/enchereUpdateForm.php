<?php RequirePage::getView('stampee/headerAdmin', $data);

?>

<div class="main_container">

    <div class="container">

        <div class="row large">

            <div class="col_form">
                <div class="signup-form ">
                    <h2>Mise à jour de l'Enchere</h2>
                    <form action="../Enchere/updateEnchere" method="post" enctype="multipart/form-data">
 
                        <input class="hidden" type="hidden" name="idEnchere" value="<?= $data['enchere']['idEnchere'] ?>">
                            <br>
                            <input class="hidden" type="hidden" name="Timbre_idTimbre" value="<?= $data['enchere']['Timbre_idTimbre'] ?>">
                            <br>


                        Timbre: <strong><?=  $data['timbre']['nom']  ?></strong>

                        <br>

                        <div style="    display: flex; flex-direction: row; align-items: flex-end; gap: 20px; justify-content: space-evenly; margin: 20px auto;">





                            <?php foreach ($data['imagesTimbre'] as $row) : ?>

                                <picture style="  object-fit: cover; background-size: cover">
                                    <img style="    width: auto; height: 10ch; " src="<?= ROOT ?>assets/images/stamps/<?= $row['nom_image'] ?>" alt="<?= $row['nom_image'] ?>">
                                </picture>
                                <!-- <span>
                                            <label for="radioImg">Choisissez l'image Principale </label>
                                            <input name="image_principale" type="radio" id="radioImg" class="radio" value="yes" <?php if ($row['image_principale'] == 1) {
                                                                                                                                    echo 'checked';
                                                                                                                                } ?>>
                                           
                                       </span> -->


                            <?php

                            endforeach;
                            ?>
                        </div>

                        <br>
                       
                        Date de debut: <input type="text" name="date_debut" value="<?= $data['enchere']['date_debut']?>">
                        <br>

                        Date de fin: <input type="text" name="date_fin" value="<?= $data['enchere']['date_fin']?>">
                        <br>

                        Prix plancher: <input type="text" name="offre_actuelle" value=" <?= $data['enchere']['offre_actuelle']?>">
                        <br>


                        <button type="submit" class="btn btn-default">Enregistrer</button>


                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php RequirePage::getView('stampee/footerAdmin', $data); ?>