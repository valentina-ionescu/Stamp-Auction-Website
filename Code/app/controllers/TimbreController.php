<?php


class TimbreController extends Controller
{

  public function index()
  {

    $timbre = new Timbre();

    $pays = new Pays();
    $paysTimbre =  $pays->selectAll();

    $categories = new Categorie();
    $categorieTimbre =  $categories->selectAll();

    $images = new Image();
    $imageTimbre =  $images->selectAll();

    $data['page_title'] = 'Timbre';
    $data['pays'] = $paysTimbre;
    $data['categorie'] = $categorieTimbre;
    $data['images'] = $imageTimbre;

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    

      $timbre->insertTimbre($_POST);
    }

    RequirePage::getView('./stampee/timbre', $data);
  }

  //====================================
  //====================================
  public function timbreListe()
  {

    $timbres = new Timbre();
    $listeTimbre =  $timbres->selectJoin();

    $pays = new Pays();
    $paysTimbre =  $pays->selectAll();


    $categories = new Categorie();
    $categorieTimbre =  $categories->selectAll();

    $images = new Image();
    $imageTimbre =  $images->selectAll();

    $data['page_title'] = 'Liste - Timbres';
    $data['pays'] = $paysTimbre;
    $data['categorie'] = $categorieTimbre;
    $data['images'] = $imageTimbre;
    $data['timbre'] = $listeTimbre;
    $data['msg'] = '';
    //  var_dump($listeTimbre);

    RequirePage::getView('./stampee/timbreListe', $data);
  }

  //====================================
  //====================================
  public function deleteTimbre()
  {
    $image = new Image();
    $idTimbre = $_POST['idTimbre'];
    $sql = "DELETE FROM `image` WHERE Timbre_idTimbre = $idTimbre";
    $stmt = $image->query($sql);
    $stmt->execute();

    $timbre = new Timbre();
    //var_dump($_POST);
    $delete = $timbre->delete($_POST);

    RequirePage::redirect("timbreListe");
  }

  //====================================
  //====================================

  public function updateForm()
  {
    $id = $_POST['idTimbre'];

    $timbres = new Timbre();
    $showTimbre =  $timbres->selectId($id);

    $pays = new Pays();
    $paysTimbre =  $pays->selectAll();


    $categories = new Categorie();
    $categorieTimbre =  $categories->selectAll();

    $images = new Image();
    $imageTimbre =  $images->selectAll();

    $data['page_title'] = 'Timbre';
    $data['pays'] = $paysTimbre;
    $data['categorie'] = $categorieTimbre;
    $data['images'] = $imageTimbre;
    $data['timbres'] = $showTimbre;
    $data['msg'] = '';

    RequirePage::getView('stampee/timbreUpdateForm', $data);
  }

  //====================================
  //====================================

  public function updateTimbre()

  {
    // var_dump( $_POST);
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
      //var_dump($_POST);

      $timbre = new Timbre();



      if (isset($_POST['certifie']) && strtolower($_POST['certifie']) == 'yes') {

        $_POST['certifie']  = 1;
      } else {
        $_POST['certifie']  = 0;
      }
      if (isset($_POST['favori_du_Lord']) && strtolower($_POST['favori_du_Lord']) == 'yes') {

        $_POST['favori_du_Lord']  = 1;
      } else {
        $_POST['favori_du_Lord']  = 0;
      }

      $images = new Image();
      $imageTimbre =  $images->selectBy('Timbre_idTimbre', $_POST['idTimbre']);


      $timbre->update($_POST);
      $data['msg'] = "Mise a jour reussite!";
      RequirePage::redirect('timbreListe', $data);
    }
  }
}
