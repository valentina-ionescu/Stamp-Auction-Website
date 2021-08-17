<?php


class Timbre extends Crud
{
    public $table = 'timbre';
    public $primaryKey = 'idTimbre';



    //========================================================================
    //========================================================================
    public  function selectAll()
    {

        $stmt = $this->query('SELECT * FROM timbre');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    //========================================================================
    //========================================================================
    public  function selectJoin()
    {

        $stmt = $this->query('SELECT * FROM timbre 
        join pays on Pays_idPays = idPays  
        LEFT OUTER JOIN categorie ON timbre.Categorie_idCategorie = categorie.idCategorie
          LEFT OUTER JOIN image ON image.Timbre_idTimbre = timbre.idTimbre WHERE image.image_principale = 1
       ORDER BY idTimbre asc  
        ');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    //========================================================================
    //========================================================================

    public  function insertTimbre()
    {


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

        // var_dump($_POST);
        $id =  $this->insert($_POST);

        //une deuxieme requette  pour insertion images  en utilisant le $id comme

        $image = new Image();
       
        $extension = ['jpeg', 'jpg', 'png'];
        // var_dump($_FILES);
        foreach ($_FILES['nom_image']['tmp_name'] as $key => $value) {
            $imgFileName = $_FILES['nom_image']['name'][$key];
            $imgFileName_tmp = $_FILES['nom_image']['tmp_name'][$key];
            $upload_dir = 'assets/images/stamps/';
             

            // var_dump($value);

            $ext = pathinfo($imgFileName, PATHINFO_EXTENSION);
            $finalImg = '';
            $idTimbre = 0;
            $taille = $_FILES['nom_image']['size'][$key];

           
            
           
            if (in_array($ext, $extension)) {
                if (!file_exists($upload_dir . $imgFileName)) {
                    move_uploaded_file($imgFileName_tmp, $upload_dir . $imgFileName);
                    $finalImg = $imgFileName;
                } else {
                    $imgFileName = str_replace('.', '-', basename($imgFileName, $ext));
                    $newFileName =  $imgFileName . time() . '.' . $ext;
                    move_uploaded_file($imgFileName_tmp, $upload_dir . $newFileName);
                    $finalImg = $newFileName;
                }

                //var_dump($_FILES['nom_image']['name'][0]);
                // var_dump($firstImg);
                // var_dump();
                $idTimbre = $id;
                $mainImg = "";
                // var_dump($_FILES['nom_image']['name'][0]);
                if($_FILES['nom_image']['name'][0] == $_FILES['nom_image']['name'][$key] ){
                    // var_dump($firstImg);
                   $mainImg = 1; 
                //    print_r($mainImg);
                
                }else{ 
                    // var_dump($_FILES['nom_image']['name'][1]);
                    $mainImg = 0;
    
                    }
                    // print_r($mainImg);
               

                $insertQuery = "INSERT INTO `image`( `nom_image`, `taille`, `image_principale`,  `Timbre_idTimbre`) VALUES ('$finalImg', $taille, $mainImg, '$idTimbre')";
                 
                $stmt = $image->prepare($insertQuery);
                
                $stmt->execute();
                   
              //  var_dump($insertQuery);

            }
          
        }




        if ($id) {

             RequirePage::redirect('Timbre/timbreListe');
        } else {

            $errorUpdate = "Insertion infructueuse!";
            $_SESSION['errorMsg'] = $errorUpdate;
            RequirePage::redirect('error');
        }
    }
}
