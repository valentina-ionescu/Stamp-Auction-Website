<?php RequirePage::getView('stampee/headerAdmin', $data);

?>

<div class="main_container">

    <div class="container">

        <div class="row large">

            <div class="col_form">
                <div class="signup-form ">
                    <h2>Creez une Enchere</h2>
                    <form action="Enchere/insertEnchere" method="post" enctype="multipart/form-data">

                        <input class="hidden" type="hidden" name="Timbre_idTimbre" value="<?= $data['timbre']['idTimbre']?>">
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


                        Date de debut: <input type="datetime-local" name="date_debut" value="<?= isset($_POST['date_debut']) ? $_POST['date_debut'] : ''; ?>">
                        <br>

                        Date de fin: <input type="datetime-local" name="date_fin" value="<?= isset($_POST['date_fin']) ? $_POST['date_fin'] : ''; ?>">
                        <br>

                        Prix Plancher: <input type="text" name="offre_actuelle" value=" <?= isset($_POST['offre_actuelle']) ? $_POST['offre_actuelle'] : ''; ?>">
                        <br>

                       

                        <button type="submit" class="btn btn-default">Enregistrer</button>


                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php RequirePage::getView('stampee/footerAdmin', $data); ?>