<?php


class Enchere extends Crud
{
    public $table = 'enchere';
    public $primaryKey = 'idEnchere';

    public  function selectAll()
    {
        $stmt = $this->query('SELECT * FROM enchere');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    //====================================
    //====================================

    public  function selectJoin()
    {

        $stmt = $this->query('SELECT * FROM enchere 
        join timbre on Timbre_idTimbre = idTimbre
        LEFT OUTER JOIN categorie ON timbre.Categorie_idCategorie = categorie.idCategorie
          LEFT OUTER JOIN image ON image.Timbre_idTimbre = timbre.idTimbre WHERE image.image_principale = 1
       ORDER BY date_fin desc  
        ');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    //====================================
    //====================================

    public  function selectArchives()
    {

        $stmt = $this->query('SELECT * FROM enchere 
        join timbre on Timbre_idTimbre = idTimbre
        LEFT OUTER JOIN categorie ON timbre.Categorie_idCategorie = categorie.idCategorie
          LEFT OUTER JOIN image ON image.Timbre_idTimbre = timbre.idTimbre WHERE image.image_principale = 1 AND `date_fin`> NOW()
       ORDER BY date_fin asc  
        ');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    //====================================
    //====================================

    public  function selectJoinId($id)
    {

        $stmt = $this->query("SELECT * FROM enchere 
        JOIN timbre ON Timbre_idTimbre = idTimbre
        LEFT OUTER JOIN image ON image.Timbre_idTimbre = timbre.idTimbre WHERE idEnchere = {$id}");

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    //====================================
    //====================================
    public  function search($searchPost)
    {
        $searchTerms = $searchPost['search'];
        $sql = ("SELECT * FROM enchere 
          JOIN timbre ON Timbre_idTimbre = idTimbre
          LEFT OUTER JOIN categorie ON timbre.Categorie_idCategorie = categorie.idCategorie
          LEFT OUTER JOIN pays ON timbre.Pays_idPays = pays.idPays
          LEFT OUTER JOIN image ON image.Timbre_idTimbre = timbre.idTimbre
         Where  timbre.nom LIKE '%$searchTerms%' OR timbre.details LIKE '%$searchTerms%' OR categorie.nom_categorie LIKE '%$searchTerms%' OR pays.nom_pays LIKE '%$searchTerms%' 
         HAVING image.image_principale = 1
         ORDER BY idEnchere ASC");
        $stmt = $this->prepare($sql);
        $result  = $stmt->execute();
        //   var_dump($result);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
//====================================
//====================================

    public  function updateCurrentOffer($price, $id)
    {
        //  var_dump($price);
       // var_dump($id);
         $stmt = $this->prepare("UPDATE `enchere` SET `offre_actuelle` = {$price} WHERE `enchere`.`idEnchere` = {$id} ");
         $stmt->bindValue(":offre_actuelle,", $price);
         $stmt->execute();
    //   $data['msg'] ="Mise a jour reussite!"; 
    }

}
