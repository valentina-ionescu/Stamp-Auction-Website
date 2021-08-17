<?php RequirePage::getView('stampee/header', $data);
//    var_dump($data['selectedEnchere'][0] );
//    var_dump($data['currentPrice']);
?>

<script src="<?= ROOT ?>assets/JS/modal.js"></script>

<div class="main_container">

    <div class="breadcrumb_wrapper">
        <ul class="breadcrumb">
            <li><a href="<?= ROOT ?>accueil">Accueil</a></li>
            <li><a href="<?= ROOT ?>Enchere/encherePortail">Portail</a></li>
            <li>Fiche</li>
        </ul>
    </div>



    <section class="main_section">
        <h2 class="section__title red_txt hidden"> Calendrier des Enchères </h2>

        <div class="product_details" data-js-fiche>
            <div class="product_details-img col50">

                <h2 class="countdown timer" data-js-fiche-countdown>...</h2>



                <div class="modal modal--close" data-js-modal>

                    <div class="modal__close--wrapper">
                        <button class="modal__close" data-js-close-modal>.</button>
                    </div>

                    <div class="modal__content ">
                        <picture>
                            <img src="<?= ROOT ?>assets/images/stamps/<?= $data['selectedEnchere'][0]['nom_image'] ?>" class="modal__content--image" data-js-modal-img alt="image timbre <?= $data['selectedEnchere'][0]['nom'] ?>">
                        </picture>

                    </div>
                </div>
                <div class="product_details-main-img">
                    <picture data-js-zoom>
                        <img class="zoom_image" id="img" src="<?= ROOT ?>assets/images/stamps/<?= $data['selectedEnchere'][0]['nom_image'] ?>" alt="<?= $data['selectedEnchere'][0]['nom'] ?>" data-js-img data-js-zoom-img>

                    </picture>
                    <a href="" class="expand_modal" data-js-modal-btn><i class="fas fa-arrows-alt-v"></i>‎</a>
                </div>

                <div class="product_thumb-img-grid" data-js-thumbs>
                    <?php foreach ($data['selectedEnchere'] as $row) :
                        //echo($row['nom_image']);
                    ?>
                        <picture class="thumb_img_wrap "> <img src="<?= ROOT ?>assets/images/stamps/<?= $row['nom_image'] ?>" alt="<?= $row['nom'] ?>">

                        </picture>

                    <?php endforeach; ?>

                </div>

            </div>

            <div class="product_details-content col50 details">
                <div class="product_details-top">
                    <h2 class="product_name"> <?= $data['selectedEnchere'][0]['nom'] ?></h2>
                    <p class="product_id_lot">Lot No.<span> <?= $data['selectedEnchere'][0]['idEnchere'] ?></span></p>
                    <div class="product_description">
                        <p> <?= $data['selectedEnchere'][0]['condition'] ?></p>
                        <p> <?= $data['selectedEnchere'][0]['details'] ?></p>
                        <p> <?php if ($data['selectedEnchere'][0]['certifie'] == 1) {
                                echo "Certifié ";
                            } else {
                                echo "Sans certificat";
                            } ?></p>


                    </div>
                </div>
                <div class="product_details-bottom">


                    <div class="product_details-dates">
                        <!-- <div class="start_date"><strong>Debut: </strong><span data-js-start-date ="<?= $row['date_debut'] ?>" style="text-align: right; font-weight: 500;"> <?= date("j M Y  H:m:i ", strtotime($row['date_debut'])) ?> <?= date("H:m:i", strtotime($row['date_debut'])) ?></span></div>

                    <div class="end_date hidden"><strong>Fin: </strong><span data-js-end-date="<?= $row['date_fin'] ?>" style="text-align: right; font-weight: 500;"> <?= date("j M Y  ", strtotime($row['date_fin'])) ?>  <?= date("H:m:i", strtotime($row['date_fin'])) ?></span></div> -->

                        <p class="date_start"> Debut: <span data-js-start-date><?= $data['selectedEnchere'][0]['date_debut'] ?></span></p>
                        <p class="date_end red_txt"> Fin: <span data-js-end-date><?= $data['selectedEnchere'][0]['date_fin'] ?></span></p>
                    </div>

                    <?php if ( $data['selectedEnchere'][0]['date_fin'] > date("Y-m-d") ){?>

                    <p class="product_details-price ">Offre actuelle: <span> CAD <?= $data['currentPrice'] ?>.00 </span></p>
                    <?php } else { ?>

                    <p class="product_details-price ">Prix de vente: <span> CAD <?= $data['currentPrice'] ?>.00 </span></p>
                        <?php    }?>


                    <div class="buttons_container">
                        <?php if (isset($_SESSION['Usager'])) {
                             if ($data['selectedEnchere'][0]['date_debut'] <= date("Y-m-d") && $data['selectedEnchere'][0]['date_fin'] > date("Y-m-d") ){ ?>

                                <button class="btn_large solid_bkg" data-js-offer-btn>Placer une offre</button>
                                <a class="btn_large">Suivre l'enchère</a>
                                <?php } elseif ($data['selectedEnchere'][0]['date_debut'] > date("Y-m-d") && $data['selectedEnchere'][0]['date_fin'] > date("Y-m-d") ){ ?>

                                <button class="btn_large solid_bkg hidden" data-js-offer-btn>Placer une offre</button>
                                <button class="  " style="border: 2px solid #5c0606; padding: 15px 25px 13px;text-transform: uppercase; color: #091530; border-radius: 3px; font-size: 12px; font-family: 'Roboto', sans-serif; min-width: 210px;">Enchère inactive !</button>
                                <a class="btn_large">Suivre l'enchère</a>

                            <?php } else { ?>
                                <button class="btn_large solid_bkg hidden" data-js-offer-btn>Placer une offre</button>
                                <button class=" red_bkg " style="border: 2px solid #5c0606; padding: 15px 25px 13px;text-transform: uppercase; color: #FFFFFF; border-radius: 3px; font-size: 12px; font-family: 'Roboto', sans-serif; min-width: 210px;">Enchère Expirée !</button>
                            <?php } ?>
                            <div class="modal modal--close " data-js-offer-modal>

                                

                                <div class="modal__content ">

                                    <!-- envoi vers la Enchere/enchereFiche -->



                                    <form action="" class="formOffer" method="POST">
                                        <div class="modal__close--wrapper small">
                                    <button class="modal__close" data-js-close-offer-modal>.</button>
                                </div>
                                        <input name="Enchere_idEnchere" type="hidden" value="<?= $data['selectedEnchere'][0]['idEnchere'] ?>">
                                        <input name="Usager_idUsager" type="hidden" value="<?= $_SESSION['userData']['idUsager'] ?>">


                                        <label for="mise">Entrez votre mise</label><br>
                                        <input name="prix_offert" type="number" id="mise">

                                        <button class="btn">Placer votre offre</button>

                                    </form>

                                </div>
                            </div>
                        <?php } else { ?>
                            <button class="btn_large solid_bkg hidden" data-js-offer-btn>Placer une offre</button>
                            <a class="btn_large solid_bkg" href="<?= ROOT ?>User/login">Connectez-vous pour faire un offre</a>
                            <a class="btn_large">Suivre l'enchère</a>
                        <?php  } ?>




                    </div>

                </div>


            </div>
        </div>








    </section>


    <section class="main_section" style="margin-top: 3em;">
        <h2 class="section__subtitle " style="text-align: left;"> Vous pourriez aussi aimer</h2>

        <div class="grid">

            <article class="card no_padding">

                <div class="card__tag-top  ">
                    <span class="hidden special">Nouvelle Addition</span>
                </div>

                <div class="card__top">
                    <a>
                        <picture class="card__picture">
                            <img src="<?= ROOT ?>assets/images/timbres/I-Moyenne-54698-n-2-3-timbre-france-poste-lvf.net.jpg" alt="image timbres francais" class="card__image">
                        </picture>

                    </a>
                </div>

                <div class="card__content">

                    <h4 class="card__title">Timbres Français "Avions". Poste-France </h4>
                    <div class="card__id_info">
                        <span>Lot no. 1039</span>
                    </div>

                    <div class="card__footer">
                        <p class="card__price">CAD 1,000.00 </p>
                        <a class="card__arrow" href="#"><i class="fas fa-long-arrow-alt-right"></i>‎</a>
                    </div>
                </div>

            </article>

            <article class="card no_padding">

                <div class="card__tag-top special">
                    <span>Nouvelle Addition</span>
                </div>

                <div class="card__top">
                    <a>
                        <picture class="card__picture">
                            <img class="card__image" src="<?= ROOT ?>assets/images/timbres/6629228073_23aba647dd_b.jpg" alt="Timbre Celimene dans le Misanthrope de Moliere">
                        </picture>

                    </a>
                </div>

                <div class="card__content">

                    <h4 class="card__title">Timbres Célimène dans le Misanthrope de
                        Molière </h4>

                    <div class="card__id_info">
                        <span>Lot no. 1054</span>
                    </div>

                    <div class="card__footer">
                        <p class="card__price">CAD 35.00 </p>
                        <a class="card__arrow" href="#"><i class="fas fa-long-arrow-alt-right"></i>‎</a>
                    </div>
                </div>

            </article>

            <article class="card no_padding">

                <div class="card__tag-top  ">
                    <span class="hidden special">Nouvelle Addition</span>
                </div>

                <div class="card__top">
                    <a>
                        <picture class="card__picture">
                            <img class="card__image" src="<?= ROOT ?>assets/images/timbres/1849-le-premiers-timbre-poste-francais.jpg" alt="le-premiers-timbre-poste-français">
                        </picture>

                    </a>
                </div>

                <div class="card__content">

                    <h4 class="card__title">Les premiers Timbre Poste-France 1849</h4>

                    <div class="card__id_info">
                        <span>Lot no. 1073</span>
                    </div>

                    <div class="card__footer">
                        <p class="card__price">CAD 200.00 </p>
                        <a class="card__arrow" href="#"><i class="fas fa-long-arrow-alt-right"></i>‎</a>
                    </div>
                </div>

            </article>

            <article class="card no_padding">

                <div class="card__tag-top  ">
                    <span class="hidden special">Nouvelle Addition</span>
                </div>

                <div class="card__top">
                    <a>
                        <picture class="card__picture">
                            <img class="card__image" src="<?= ROOT ?>assets/images/timbres/I-Moyenne-44408-n-6-10-timbre-france-lvf.net.jpg" alt="image lot de 66 timbres francaises">
                        </picture>

                    </a>
                </div>

                <div class="card__content">

                    <h4 class="card__title">Timbres de France-lvf, deuxième Guerre Mondiale</h4>

                    <div class="card__id_info">
                        <span>Lot no. 258</span>
                    </div>

                    <div class="card__footer">
                        <p class="card__price">CAD 1,240.00 </p>
                        <a class="card__arrow" href="#"><i class="fas fa-long-arrow-alt-right"></i>‎</a>
                    </div>
                </div>

            </article>


        </div>

    </section>


</div>

<?php RequirePage::getView('stampee/footer'); ?>