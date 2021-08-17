<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Valentina Ionescu">
    <meta name="description" content="Site d'enchères le plus merveilleux au monde selon la Reine des timbrés">
    <link rel="shortcut icon" type="image/png" href="<?= ROOT ?>assets/images/logos/StampeeS.JPG">
    <title><?= $data['page_title'] ?> | Stampee-Enchères</title>

    <!-- CSS -->

    <link rel="stylesheet" href="<?= ROOT ?>assets/css/navigation.css">
 
    <link rel="stylesheet" href="<?= ROOT ?>assets/css/product_details.css">    
    <link rel="stylesheet" href="<?= ROOT ?>assets/css/list_styles.css">
     <link rel="stylesheet" href="<?= ROOT ?>assets/css/main.css">
    <link rel="stylesheet" href="<?= ROOT ?>assets/css/footer.css">
  
    <link rel="stylesheet" href="<?= ROOT ?>assets/css/sidebar_filter.css">
    <link rel="stylesheet" href="<?= ROOT ?>assets/css/profile.css">
    <link rel="stylesheet" href="<?= ROOT ?>assets/css/media_queries.css">
    <link rel="stylesheet" href="<?= ROOT ?>assets/css/tableStyle.css">
    <link rel="stylesheet" href="<?= ROOT ?>assets/css/modals.css">


    <!-- Java script -->
    <script src="<?= ROOT ?>assets/JS/scripts.js"></script>
    <!-- <script src="<?= ROOT ?>assets/JS/modalClass.js"></script> -->

    <!-- Iconnes importees  -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

    <!-- Fonts Google -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,700;1,500&family=Oswald:wght@200;300;400;500;600;700&family=PT+Serif:ital,wght@0,400;1,700&family=Roboto&family=Spectral+SC&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=PT+Serif&display=swap" rel="stylesheet">

</head>

<body>

    <main>

        <header>
            <div class="nav__top-header">
                <div class="nav__logo ">
                    <a href="<?= ROOT ?>accueil"><img class="img__logo " src="<?= ROOT ?>assets/images/logos/LOGO_STAMPEE.png" alt="LOGO_STAMPEE logo"></a>
                </div>

                <div class="nav__moto">
                    <h1>Enchères Au Superlatif</h1>
                </div>
                <div class="nav__buttons">

                    <div class='button__profile'>

                        <?php if (isset($_SESSION['Usager']) && $_SESSION['role'] == 2) { ?>

                            <a style="font-size: 16px;" href="<?= ROOT ?>User/profile">Bonjour <?= $_SESSION['Usager']; ?> !</a>
                            <a href="<?= ROOT ?>User/logout"><i class="fas fa-user-lock"></i>Déconnexion</a>


                        <?php }elseif(isset($_SESSION['Usager']) && $_SESSION['role'] == 1 ) { ?>

                            <a style="font-size: 16px;" href="<?= ROOT ?>User/profile">Bonjour <?= $_SESSION['Usager']; ?> !</a>
                            <a href="<?= ROOT ?>admin"><i class="fas fa-user-cog"></i>Panneau Admin</a>
                            <a href="<?= ROOT ?>User/logout"><i class="fas fa-user-lock"></i>Déconnexion</a>

                            <?php  ?>

                    <?php } else { ?>

                            <a href="<?= ROOT ?>User/login"><i class="fas fa-lock"></i>Se Connecter</a>
                        <?php  } ?>

                        <!-- <a href="#"><i class="fas fa-user-plus"></i>Créer un compte</a> -->
                    </div>

                    <form class="search_box">
                        <label for="search" class="hidden">Search</label>
                        <input type="text" class="main_search" id="search" placeholder="Ex: Timbres Canada..." title="Rehercher la plateforme" />
                        <a href="#"><i class="fa fa-search"></i> &nbsp;</a>
                    </form>

                </div>
            </div>

            <!-- ===========   Navigation  ============ -->

            <div class="menu ">

                <nav class="navigation">
                    <label class="label-toggle" for="toggle">&#9776;</label>
                    <input type="checkbox" id="toggle" />
                    <div class="nav__main-menu menu-burger">
                        <ul>
                            <li><a href="<?= ROOT ?>accueil">Accueil</a></li>
                            <li class="nav_submenu"><a href="<?= ROOT ?>Enchere/encherePortail">Portail des Enchères<i class="fas fa-angle-down"></i></a>
                                <ul>
                                    <li><a href="#">Enchères en cours </a> </li>
                                    <li><a href="#">Enchères passées</a></li>
                                    <li><a href="#">Procédures et politiques </a></li>
                                    <li><a href="#">Comment placer une offre </a></li>
                                </ul>
                            </li>
                            <li><a href="#">À Propos Lord Stampee</a></li>
                            <li><a href="#">Vendeurs</a></li>

                            <li class="nav_submenu"><a href="#">Contactez-Nous <i class="fas fa-angle-down"></i></a>
                                <ul>
                                    <li><a href="#">Angleterre</a></li>
                                    <li><a href="#">Canada</a></li>
                                    <li><a href="#">USA </a></li>
                                    <li><a href="#">Australie</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </header>