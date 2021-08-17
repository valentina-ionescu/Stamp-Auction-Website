<?php RequirePage::getView('stampee/header', $data);
//  var_dump($data['enchere']);
?>

<div class="main_container">
    <div class="breadcrumb_wrapper">
        <ul class="breadcrumb">
            <li><a href="<?= ROOT ?>accueil">Accueil</a></li>
            <li>Portail</li>

        </ul>
    </div>

    <section class="main_section">
        <h2 class="section__title red_txt"> Calendrier des Enchères </h2>

       
        

       
        <h3 style="text-align: center; color:darkred;"><?=$data['msg']?></h3>

        <form action="../Enchere/searchEnchere" method="POST" class="search_box" style="width: 50%; margin:0 auto; text-align: center;" >
            <input class="main_search" type="text" name="search" placeholder="Recherchez dans les Encheres" style="width: 70%; font-size:unset; ">
            <button type="submit" class="btn" style="padding: 12px 20px; " name="submit_search">Recherchez</button>
        </form>
        
        <div class="btn_container">
            <a class="btn_view active" style="margin: 0 50px; background-color: var(--xlblue);" href="<?= ROOT ?>Enchere/encherePortail">Afficher tout</a>
            <button class="btn_view" data-js-list-btn><i class="fas fa-bars"></i> Liste</button>
            <button class="btn_view active" data-js-grid-btn><i class="fas fa-th-large"></i> Grille</button>
        </div>





        <div class="grid_section_wrapper">
            <div>
                <div class="sticky flex_row">
                    <label class="label-toggle_filter" for="toggle_filter">Filtres <img class="label_img" src="<?= ROOT ?>assets/images/other_images/filtres.png" alt="filters imgs png"></label>
                    <input type="checkbox" id="toggle_filter" value=" " />

                    <div class="sidebar" data-js-list>

                        <div class="filter_wrapper ">
                            <h2>Recherche avancée</h2>
                            <form class="filter_form" method="GET">
                                <div class="form_group">
                                    <label for="country_name">Pays d'origine</label>
                                    <select class="form_select " id="country_name">
                                        <option selected="selected">Touts les pays</option>
                                        <option>Australie</option>
                                        <option>Belgique</option>
                                        <option>Canada</option>
                                        <option>Danemark</option>
                                        <option>Émirats arabes unis </option>
                                        <option>États-Unis</option>
                                        <option>France</option>
                                        <option>Irlande</option>
                                        <option>Italie</option>
                                        <option>Japon</option>
                                        <option>Royaume-Uni </option>
                                        <option>Vatican</option>
                                    </select>
                                </div>
                                <div class="form_group">
                                    <label for="stamp_category">Catégories</label>
                                    <select class="form_select" id="stamp_category">
                                        <option selected="selected">Toutes les Catégories</option>
                                        <option>Animaux</option>
                                        <option>Aviation</option>
                                        <option>Histoire</option>
                                        <option>Guerre</option>
                                        <option>Nature</option>
                                        <option>Royauté</option>
                                        <option>Symboles</option>
                                        <option>Vedettes</option>
                                    </select>
                                </div>
                                <div class="form_group prices">
                                    <label for="price-min">Prix-Min en $CA</label>
                                    <div class="range-slider" data-js-slider>
                                        <input id="price-min" class="range-slider__range" type="range" value="10" min="0" max="1000">
                                        <span class="range-slider__value">0 </span>
                                    </div>
                                    <label for="price-max">Prix-Max en $CA</label>
                                    <div class="range-slider">
                                        <input class="range-slider__range" type="range" value="200" min="0" max="5000" step="50" id="price-max">
                                        <span class="range-slider__value">0</span>
                                    </div>
                                </div>
                                <div class="form_group">
                                    <label for="stamp_sort">Triage</label>
                                    <select class="form_select custom-select" id="stamp_sort">
                                        <option selected disabled>Paramètres de triage</option>
                                        <option>De A-Z</option>
                                        <option>De Z-A</option>
                                        <option>Les plus récents</option>
                                        <option>Prix Haut - Bas</option>
                                        <option>Prix Bas - Haut</option>
                                    </select>
                                </div>
                                <div class="form_group">
                                    <label class="custom_control custom_checkbox">
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                        <span>Favoris du Lord Stampee</span>
                                    </label>
                                </div>
                                <div class="form_group">
                                    <label class="custom_control custom_checkbox">
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                        <span>Enchères en cours</span>
                                    </label>
                                </div>
                                <div class="form_group">
                                    <label class="custom_control custom_checkbox">
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                        <span>Enchères expirées</span>
                                    </label>
                                </div>
                                <div class="form_group">
                                    <button type="submit" class="btn btn_block ">Rechercher <i class="fas fa-search"></i></button>
                                </div>
                                <div class="form_group">
                                    <button type="reset" class="btn light_blue btn_block ">Annuler <i class="fas fa-redo-alt"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid portal no_padding">
                <!-- carte# 1 -->

                <?php foreach ($data['enchere'] as $row) :
                ?>
                    <article data-js-list class="card en_cours arts" data-category="Arts" data-js-card>

                        <div class="top50" data-js-list>
                            <picture class="card_image " data-js-list>

                                <img class="" src="<?= ROOT ?>assets/images/stamps/<?= $row['nom_image'] ?>" alt="image timbre <?= $row['nom_image'] ?>" data-js-img data-js-modal-btn>
                            </picture>
                            <div class="id_info" data-js-list>
                                <div class="card_product_id yellow_bkg">
                                    <span>Lot no. <?= $row['idEnchere'] ?></span>
                                </div> <?php if ($row['favori_du_Lord'] == 1) { ?>
                                    <picture data-js-list class="Lord_favourites">


                                        <img src="<?= ROOT ?>assets/images/other_images/Stamp1.png" alt="Stamp Lord Stampee">


                                    </picture> <?php } ?>
                            </div>
                        </div>

                        <div class="bottom50" data-js-list>
                            <div class="card_txt ">
                                <div class="product_specs">
                                    <h2 class="product_title"><a href="#"><?= $row['nom'] ?></a>
                                    </h2>
                                  
                                </div>

                                <div class="price_wrapper red_txt">
                                    <span><i class="fas fa-dollar-sign"></i>Offre actuelle: $ <?=$row['offre_actuelle'] ?> CAD &nbsp;</span>

                                </div>


                                <div class="date_wrapper" data-js-list>
                                    <div class="start_date"><strong>Debut: </strong><span data-js-start-date="<?= $row['date_debut'] ?>" style="text-align: right; font-weight: 500;"> <?= date("j M Y ", strtotime($row['date_debut'])) ?> <?= date("H:m:i", strtotime($row['date_debut'])) ?></span></div>


                                    <div class="end_date"><strong>Fin: </strong><span data-js-end-date="<?= $row['date_fin'] ?>" style="text-align: right; font-weight: 500;"> <?= date("j M Y  ", strtotime($row['date_fin'])) ?> <?= date("H:m:i", strtotime($row['date_fin'])) ?></span>
                                    </div>
                                </div>

                            </div>
                            <div class="card_footer" data-js-list>
                                <div class="countdown product_expired ">
                                    <span class="timer" data-js-countdown>Programmé</span>
                                </div>

                                <div class="" data-js-list>
                                    <form action="../Enchere/enchereFiche" method="post" class="nostyle">
                                        <input type="hidden" name="idEnchere" value="<?= $row['idEnchere'] ?>">

                                        <button class="card__button" style="border: none;" name="Delete" type="submit">Détails<i class="fas fa-chevron-circle-right "></i></button>
                                    </form>
                                    
                                </div>
                            </div>
                        </div>

                    </article>

                <?php endforeach; ?>










            </div>
        </div>


    </section>


</div>



<?php RequirePage::getView('stampee/footer'); ?>