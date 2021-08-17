<?php

RequirePage::getController('PasswordController');
class UserController extends Controller
{

  public function index()
  {

    $data['page_title'] = 'Update';


    $user = new User();
    $showUser =  $user->select();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
      // var_dump($_POST); 
      $this->showUser();
      RequirePage::getView('./stampee/updateUser', $data);
    }

    $data['usager'] = $showUser;

   
     
    RequirePage::getView('./stampee/profile', $data);
    
  }


  //====================================
  //====================================

  public function showUser()
  {
    $id = $_POST['idUsager'];
    $user = new User();
    $showUser =  $user->selectId($id);
    $data['page_title'] = 'User || Update';

    $data['usager'] = $showUser;

    RequirePage::getView('./stampee/updateUser', $data);
  }

  //====================================
  //====================================

  public function updateUser()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        // var_dump($_POST);
         //var_dump($_SESSION['role']);

      $user = new User();

      if (isset($_POST['membre']) && strtolower($_POST['membre']) == 'yes') {

        $_POST['membre']  = 1;
    } else {
        $_POST['membre']  = 0;
    }
   
      $user->update($_POST);
      $data['msg'] = "Mise a jour reussite!";
      // RequirePage::redirect("profile"); 
      if($_SESSION['role'] == 1 ) { 
        RequirePage::redirect('../User/userList', $data);
      }else{
       RequirePage::redirect('../User', $data);
        }

    }
  }

  //====================================
  //====================================
  public function login()
  {
    $data['page_title'] = 'Login';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
      //  var_dump($_POST);
      $user = new User();
      $user->login($_POST);
    }
    RequirePage::getView('stampee/login', $data);
  }

  //====================================
  //====================================
  public function logout()
  {
    session_destroy();
    RequirePage::redirect('../accueil');
  }

  //====================================
  //====================================
  public function profile()
  {
    $data['page_title'] = 'Profile-Usager';

    $user = new User();

    //  var_dump($_SESSION['userData']['nom']);
    // //  var_dump($_POST);


    RequirePage::getView('stampee/profile', $data);
  }

  //====================================
  //====================================
  public function register()
  {

    $data['page_title'] = 'Inscription';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

      // var_dump($_POST);
      $user = new User();

      if ($user->insertUser($_POST)) {
        $data['msg'] = 'Felicitations! vous pouvez acceder a votre profil!';
        RequirePage::redirect('login', $data);
      }
    }


    RequirePage::getView('stampee/register', $data);
  }
//====================================
  //====================================
  public function userList()
  {
    $user = new User();

  $usersInfos = $user->selectAll();
  $data['page_title'] = 'Usagers - Liste';
  $data['msg'] = '';

  $data['users'] = $usersInfos;

  RequirePage::getView('stampee/userListe', $data);
  }



}