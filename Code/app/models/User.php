<?php


class User extends Crud
{
    public $table = 'usager';
    public $primaryKey = 'idUsager';
    public $error = '';

    public  function selectAll()
    {
        $stmt = $this->query('SELECT * FROM usager');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

//========================================================================
//========================================================================


    public  function insertUser($PostArray)
    {
        // var_dump($PostArray);
        $arrayData = array();

        $arrayData['courriel']       = trim($PostArray['courriel']);
        $arrayData['password']   = trim($PostArray['password']);
        $password2              = trim($PostArray['password2']);

        $arrayData['prenom']         = trim($PostArray['prenom']);
        $arrayData['nom']            = trim($PostArray['nom']);
        $arrayData['adresse']        = trim($PostArray['adresse']);
        $arrayData['Role_idRole']    = trim($PostArray['Role_idRole']);
        $arrayData['dateRegistration']  = date("Y-m-d H:i:s");
        $arrayData['membre']         = 0;


        //  print_r($arrayData);

        if (empty($data['courriel']) || !preg_match("/^[a-zA-Z_-]=@[a-zA-Z]+.[a-zA-Z]+$/", $arrayData['courriel'])) {
            //  $emailError = "*Le courriel n'est pas valide!<br>";
            //  $_SESSION['errorEmail'] = $emailError;
        }

        // afficher erreur au cas ou les 2 mots de pass ne sont pas identiques
        if ($arrayData['password'] !== $password2) {
            // $passwordError= "*Les mots de passe ne sont pas identiques! <br>";
            // $_SESSION['errorPass'] = $passwordError;
        } else {
            $hashPassword = PasswordHash::hashPassword($arrayData['password']);
            $arrayData['password'] = $hashPassword;
        }



        // validation de la checkbox
        if (isset($_POST['membre']) && strtolower($_POST['membre']) == 'yes') {

            $arrayData['membre']  = 1;
        }

        if ($this->insert($arrayData)) {

            return true;
        } else {
            return false;
        }


        // var_dump($arrayData);
    }
    
//========================================================================
//========================================================================

    public function login()
    {

        if ($userResult = $this->checkUser($_POST['courriel'], $_POST['password'])) {
            echo "Felicitations! vous pouvez acceder a votre profil!";
            session_regenerate_id();
            // var_dump($userResult);
            $_SESSION['Usager'] = $userResult['prenom'];
            $_SESSION['userData'] = $userResult;

            $_SESSION['role'] = $userResult['Role_idRole'];

            $_SESSION['fingerprint'] = md5($_SERVER['HTTP_USER_AGENT'] . $_SERVER['REMOTE_ADDR']);
            
            $user = new User();
            $showUser =  $user->select();
            $data['usager'] = $showUser;

            // var_dump($_SESSION);
            if($_SESSION['role'] == 1 ) { 
      
            RequirePage::redirect('../admin', $data);
              }else{
            RequirePage::redirect("profile");

              }

        } else {
            $loginError = " *Mot de passe ou courriel pas valide!";
            $_SESSION['errorMsg'] = $loginError;
            RequirePage::redirect("login");
        }
    }

//========================================================================
//========================================================================

    public function checkUser($courriel, $password)
    {

        $sql = "SELECT * FROM $this->table WHERE courriel = ?";
        $stmt = $this->prepare($sql);
        $stmt->execute(array($courriel));
        $count = $stmt->rowCount();

        if ($count == 1) {
            //return true;
            $user = $stmt->fetch();
            $dbPassword = $user['password'];

            if (PasswordHash::checkPassword($password, $dbPassword)) {

                return $user;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}
