<?php

class EnchereController extends Controller
{

    public function index()
    {
        $data['page_title'] = 'Portail || Encheres';

        $timbre = new Timbre();
        $timbres =  $timbre->selectId($_POST['idTimbre']);

        $pays = new Pays();
        $paysTimbre =  $pays->selectAll();

        $categories = new Categorie();
        $categorieTimbre =  $categories->selectAll();

        $images = new Image();
        $imageTimbre =  $images->selectAll();
        $imagesByTimbre = $images->selectBy('Timbre_idTimbre', $_POST['idTimbre']);
        $data['page_title'] = 'Enchere';
        $data['pays'] = $paysTimbre;
        $data['categorie'] = $categorieTimbre;
        $data['images'] = $imageTimbre;
        $data['imagesTimbre'] = $imagesByTimbre;
        $data['timbre'] = $timbres;
        $data['msg'] = '';

        RequirePage::getView('./stampee/enchereForm', $data);
    }

    //====================================
    //====================================
    public function enchereListe()
    {
        $enchere = new Enchere();
        $listeEnchere =  $enchere->selectJoin();
        $data['page_title'] = 'Liste - Encheres';
        $data['enchere'] = $listeEnchere;
        $data['msg'] = '';

        RequirePage::getView('./stampee/enchereListe', $data);
    }

    //====================================
    //====================================
    public function encherePortail()
    {    
        $enchere = new Enchere(); 
        $mise = new Mise();
        $listeEnchere =  $enchere->selectJoin();
        $data['page_title'] = 'Portail - Encheres';
        $data['enchere'] = $listeEnchere;
        $data['msg'] = '';
       
        RequirePage::getView('./stampee/Portail', $data);
    }
    //====================================
    //====================================
    public function insertEnchere()
    {
        $enchere = new Enchere();
        $mise = new Mise();
        $id =  $enchere->insert($_POST);
       
        $arrayMise = [
            'prix_offert' => $_POST['offre_actuelle'],
            'Usager_idUsager'=> $_SESSION['userData']['idUsager'],
            'Enchere_idEnchere'=> $id,
        ];

        $mise->insert($arrayMise);

        if ($id) {

            RequirePage::redirect('enchereListe');
        } else {

            $errorUpdate = "Insertion infructueuse!";
            $_SESSION['errorMsg'] = $errorUpdate;
            RequirePage::redirect('error');
        }
    }

    //====================================
    //====================================

    public function updateForm()
    {
        $id = $_POST['idEnchere'];

        $enchere = new Enchere();
        $showEnchere =  $enchere->selectId($id);


        $timbres = new Timbre();
        $showTimbre =  $timbres->selectAll();

     
        $timbre =  $timbres->selectId($showEnchere['Timbre_idTimbre']);
        

         $images = new Image();
          $imagesByTimbre = $images->selectBy('Timbre_idTimbre', $showEnchere['Timbre_idTimbre']);
          $data['imagesTimbre'] = $imagesByTimbre;

        $data['page_title'] = 'Timbre - Update';
       
        $data['timbres'] = $showTimbre;
        $data['timbre'] = $timbre;
        $data['enchere'] = $showEnchere;

        $data['msg'] = '';

        RequirePage::getView('stampee/enchereUpdateForm', $data);
    }

    //====================================
    //====================================

    public function updateEnchere()
    {
        $enchere = new Enchere();
        $result =  $enchere->update($_POST);
        if ($result) {
            $data['msg'] = "Mise a jour reussite!";
        }

        RequirePage::redirect("enchereListe", $data);
    }

    //====================================
    //====================================
    public function deleteEnchere()
    {
        $enchere = new Enchere();
        
        $mise = new Mise();
        $arrayMise = [
        'Usager_idUsager'=> $_SESSION['userData']['idUsager'],
        'Enchere_idEnchere'=> $_POST['idEnchere'],
        ];
        $mise -> deleteMise($arrayMise);

        $delete = $enchere->delete($_POST);

        RequirePage::redirect("enchereListe");
    }

    //====================================
    //====================================
    public function enchereFiche($id)
    {

        $enchere = new Enchere();
        $mise = new Mise();


        if (isset($_POST['idEnchere'])) {
            $id = $_POST['idEnchere'];
        } elseif (isset($_POST['Enchere_idEnchere'])) {
            $id = $_POST['Enchere_idEnchere'];
        } elseif (isset($_SESSION['idEnchere'])) {
            $id =  $_SESSION['idEnchere'];
        }

        $_SESSION['idEnchere'] = $id;

        $selectedEnchere =  $enchere->selectJoinId($id);
        $currentPrice = $mise->selectLastOffer($id);
       
     
        $data['page_title'] = 'Fiche - Encheres';
        $data['selectedEnchere'] = $selectedEnchere;

        if (!empty($currentPrice)) {

            $data['currentPrice'] =  $currentPrice[0]['prix_offert'];
        } else {

            $data['currentPrice'] = $selectedEnchere[0]['offre_actuelle'];
        }

        $data['msg'] = '';

        // ******* 
        //******* 
        $enchere-> updateCurrentOffer($data['currentPrice'], $id);

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            if (isset($_POST['Enchere_idEnchere']) && isset($_POST['Enchere_idEnchere'])) {

                $miseExists = $mise->encherePerUser($_POST['Usager_idUsager'], $_POST['Enchere_idEnchere']);
                

                if (!$miseExists) {
                    $mise->insert($_POST); // methode heritee de Crud
                } else {
                    $mise->updateMise($_POST);

                    RequirePage::redirect('../Enchere/enchereFiche', $data);
                }
            }

            $data['msg'] = "Mise a jour reussite!";
        }



        RequirePage::getView('./stampee/Fiche', $data);
    }

    //====================================
    //====================================

    public function searchEnchere()
    {
        $enchere = new Enchere();
        $searchResults =  $enchere->search($_POST);
        $data['page_title'] = 'Portail - Encheres';
        $data['enchere'] = $searchResults;
        $data['title section'] = '';
        $data['msg'] = '';
        
        if (count($searchResults) == 0) {
            $data['msg'] = 'Aucun résultat . Veuillez réessayer!';
        }

        RequirePage::getView('./stampee/Portail', $data);
    }
}
