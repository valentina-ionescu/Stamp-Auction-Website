<?php RequirePage::getView('stampee/headerAdmin', $data);


?>

<div class="main_container">

    <div class="content read">

        <a class="btn" href="../admin">Retournez au tableau administration</a>

        <h2>Liste des Utilisateurs</h2>


        <h4 style=" text-align: center;"><?= $data['msg'] ?></h4>


        <table>

            <tr>
                <th>ID</th>
                <th> Prénom / Nom </th>
                <th>Courriel</th>
                <th>Adresse</th>
                <th>Membre depuis</th>
                
                <th>Statut</th>
                <th>Permission/Role</th>
                <th>Update</th>

            </tr>

            <tbody>
                <?php foreach ($data['users'] as $row) :
                ?>
                    <tr>
                       

                        <td><?= $row['idUsager'] ?></td>
                        <td><?= $row['prenom'] ?> / <?= $row['nom'] ?></td>
                        <td><?= $row['courriel'] ?></td>
                        <td><?= $row['adresse'] ?></td>
                        <td><?= $row['dateRegistration'] ?></td>
                        <td><?php if ($row['membre'] == 1) {?>
                                
                                <img style="width:4vh; height: auto;background-color: unset;" src="<?= ROOT ?>assets/images/other_images/crown.png" alt="">
                                <?php echo $row['membre'] = 'Membre'; } else {
                                echo $row['membre'] = 'Non-membre';
                            } ?>
                        </td>
                        <td><?php if ($row['Role_idRole'] == 1) {
                                echo $row['Role_idRole'] = 'Admin';
                            } else {
                                echo $row['Role_idRole'] = 'Non-admin';
                            } ?>
                        </td>

                        
                        <td class="actions">

                            <form action="<?= ROOT ?>User" method="post" class="nostyle">

                                <input type="hidden" name="idUsager" value="<?= $row['idUsager'] ?>">

                                <button class="edit  small" name="Update" type="submit"><i class="fas fa-pen fa-xs"></i></button>

                            </form>

                            <!-- <form action="../User/deleteUser" method="post" class="nostyle">
                                <input type="hidden" name="idUsager" value="<?= $row['idUsager'] ?>">


                                <button class="trash  small" name="Delete" type="submit"><i class="fas fa-trash fa-xs"></i></button>
                            </form> -->

                        </td>


                    </tr>
                <?php



                endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php RequirePage::getView('stampee/footerAdmin', $data); ?>