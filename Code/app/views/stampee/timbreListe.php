<?php RequirePage::getView('stampee/headerAdmin', $data);

?>

<div class="main_container">

    <div class="content read">

        <a class="btn" href="../admin">Retournez au tableau administration</a>
        <h2>Liste des Timbres</h2>


        <a href="../timbre" class="btn"><i class="fas fa-list"> </i> Ajouter un timbre</a>


        <h4 style=" text-align: center;"><?= $data['msg'] ?></h4>


        <table>

            <tr>
                <th>Créer Enchere </th>
                <th>Timbre </th>
                <th>ID</th>
                <th>Nom du Timbre</th>
                <th>Année</th>
                <th>Tirage</th>
                <th>Condition</th>
                <th>Categorie</th>
                <th>Dimmensions</th>
                <th>Description</th>
                <th>Couleur</th>
                <th>Pays</th>
                <th>Certifié ?</th>
                <th>Favori du Lord ?</th>
                <th>Delete/Update</th>

            </tr>

            <tbody>
                <?php foreach ($data['timbre'] as $row) :
                ?>
                    <tr>
                        <td class="actions">
                            <form action="../Enchere" method="post" class="nostyle">

                                <input type="hidden" name="idTimbre" value="<?= $row['idTimbre'] ?>">

                                <button class="edit small" type="submit" style="background-color: var(--medblue);"><i class="fas fa-plus-square"></i></button>

                            </form>
                        </td>

                        <td><?php if ($row['image_principale'] == 1) { ?><img src="<?= ROOT ?>assets/images/stamps/<?= $row['nom_image'] ?>" alt=""> <?php } ?></td>

                        <td><?= $row['idTimbre'] ?></td>
                        <td><?= $row['nom'] ?></td>
                        <td><?= $row['annee'] ?></td>
                        <td><?= $row['tirage'] ?></td>
                        <td><?= $row['condition'] ?></td>
                        <td><?= $row['nom_categorie'] ?></td>
                        <td><?= $row['dimmensions'] ?></td>
                        <td><?= $row['details'] ?></td>
                        <td><?= $row['couleur'] ?></td>
                        <td><?= $row['nom_pays'] ?></td>

                        <td><?php if ($row['certifie'] == 1) {
                                echo $row['certifie'] = 'Oui';
                            } else {
                                echo $row['certifie'] = 'Non';
                            } ?>
                        </td>

                        <td><?php if ($row['favori_du_Lord'] == 1) { ?>

                                <img style="width:3vh; height: auto;background-color: unset;" src="<?= ROOT ?>assets/images/other_images/coupDeCoeur.png" alt="">
                            <?php } ?>

                        </td>
                        <td class="actions">


                            <form action="../Timbre/updateForm" method="post" class="nostyle">

                                <input type="hidden" name="idTimbre" value="<?= $row['idTimbre'] ?>">

                                <button class="edit  small" name="Update" type="submit"><i class="fas fa-pen fa-xs"></i></button>

                            </form>

                            <form action="../Timbre/deleteTimbre" method="post" class="nostyle">
                                <input type="hidden" name="idTimbre" value="<?= $row['idTimbre'] ?>">


                                <button class="trash  small" name="Delete" type="submit"><i class="fas fa-trash fa-xs"></i></button>
                            </form>

                        </td>


                    </tr>
                <?php



                endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php RequirePage::getView('stampee/footerAdmin', $data); ?>