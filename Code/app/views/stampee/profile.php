<?php RequirePage::getView('stampee/header', $data);

?>

<div class="main_container" style="min-height: 200px;">
    <div class="fiche_profile">
        <!-- WHITE PANEL - TOP USER -->
        <div class="white-panel pn">
            <div class="white-header">
                <h4>STATUT-USAGER: <span style="font-size: 16px; color:darkred;"><?php if ($_SESSION['userData']['membre'] == 1) {
                                                                                        echo 'Membre';?>
                                                                                        <img style=" display: inline;
    margin-bottom: -10px; width:6vh; height: auto;background-color: unset;" src="<?= ROOT ?>assets/images/other_images/crown.png" alt="">
                                                                                   <?php } else {
                                                                                        echo 'Non-Membre';
                                                                                    }  ?></span></h4>



            </div>
            <picture><img src="<?= ROOT ?>assets/images/other_images/userImg.png" class="img-circle" width="80"></picture>
            <p><b><?= $_SESSION['userData']['prenom'] . " " . $_SESSION['userData']['nom'] ?></b></p>
            <div class="row left">
                <h5>INSCRIT DEPUIS: </h5>
                <p><?= date("jS M Y", strtotime($_SESSION['userData']['dateRegistration'])) ?></p>
            </div>
            <div class="row left">
                <h5 class="small mt">COURRIEL:</h5>
                <p><?= $_SESSION['userData']['courriel'] ?></p>
            </div>
            <div class="row left">
                <h5 class="small mt">ADRESSE:</h5>
                <p><?= $_SESSION['userData']['adresse'] ?></p>
            </div>

        </div>
        <form action="<?= ROOT ?>User" method="post" class="nostyle">
            <input type="hidden" name="idUsager" value="<?= $_SESSION['userData']['idUsager'] ?>">
            <button class="btn" name="Update" type="submit"><i class="fas fa-user"> </i> Mettre a jour votre profil</button>
       
        </form>

      
    </div>

</div>



<?php RequirePage::getView('stampee/footer', $data); ?>