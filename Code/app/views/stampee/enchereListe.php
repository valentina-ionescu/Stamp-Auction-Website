<?php RequirePage::getView('stampee/headerAdmin', $data);

//  var_dump($data['enchere']);
?>

<div class="main_container">

    <div class="content read">

        <a class="btn" href="../admin">Retournez au tableau administration</a>
        <h2>Liste des Encheres</h2>


        <a href="../Timbre/timbreListe" class="btn"><i class="fas fa-list"> </i> Créez une Enchere</a>
        
    

            <h4 style=" text-align: center;"><?= $data['msg'] ?></h4>
       

        <table>

            <tr>
                <th>EnchereID</th>
                <th>Timbre </th>
                <th>Nom du Timbre</th>
                <th>Début</th>
                <th>Fin</th> 
                <th>Offre Actuelle</th>
                <th>Quantité mises</th>
                <th>Delete/Update</th>

            </tr>

            <tbody>
                <?php foreach ($data['enchere'] as $row) :
                ?>
                    <tr>
                        <td><?= $row['idEnchere'] ?></td>
                        <td><img src="<?= ROOT ?>assets/images/stamps/<?= $row['nom_image'] ?>" alt=""> </td>
                        <td><?= $row['nom'] ?></td>
                        <td><?= $row['date_debut'] ?></td>
                        <td><?= $row['date_fin'] ?></td>
                        <td>$<?= $row['offre_actuelle'] ?> CAD</td>
                        <td><?= $row['qty_mises'] ?></td>

                        <td class="actions">

                            <form action="../Enchere/updateForm" method="post" class="nostyle">

                                <input type="hidden" name="idEnchere" value="<?= $row['idEnchere'] ?>">

                                <button  class="edit  small" name="Update" type="submit" ><i class="fas fa-pen fa-xs"></i></button>

                            </form>

                            <form action="../Enchere/deleteEnchere" method="post" class="nostyle">
                                <input type="hidden" name="idEnchere" value="<?= $row['idEnchere'] ?>">
                               

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