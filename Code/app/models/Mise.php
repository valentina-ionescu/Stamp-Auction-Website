<?php


class Mise extends Crud
{
    public $table = 'mise';
      
    public  function selectAll()
    {
        $stmt = $this->query('SELECT * FROM mise');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public  function selectLastOffer($id)
    {
        $stmt = $this->query("SELECT prix_offert FROM  mise  where mise.Enchere_idEnchere = $id ORDER BY mise.prix_offert DESC LIMIT 1" );
         return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }



//========================================================================
//========================================================================

    public  function encherePerUser($idUser, $idEnchere)
    {
        $stmt = $this->query("SELECT * FROM  mise  where mise.Enchere_idEnchere = $idEnchere AND mise.Usager_idUsager = $idUser" );
           $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        //    var_dump($result);

        if(!empty($result)){

            return true;

        }else{

         return false;

       }
         
    }

//========================================================================
//========================================================================


    public  function updateMise($postData)
    {
        // var_dump($postData);
        $offer = rtrim($postData['prix_offert']);
  
        
        $stmt = $this->prepare("UPDATE `mise` SET `prix_offert` = $offer WHERE `mise`.`Usager_idUsager` = {$postData['Usager_idUsager']}  AND `mise`.`Enchere_idEnchere` = {$postData['Enchere_idEnchere']}");

        $stmt->bindValue(":prix_offert", $offer);
        $stmt->execute();
       
     
    }
    
//========================================================================
//========================================================================

    public function deleteMise($postData){
        // var_dump($postData['Usager_idUsager']);
        // var_dump($postData['Enchere_idEnchere']);
        // var_dump($postData);


        $stmt = $this->query("DELETE FROM `mise` WHERE  `mise`.`Enchere_idEnchere` = {$postData['Enchere_idEnchere']}");
        // var_dump($stmt);
        $stmt->execute();

    }
}                                                                                                                                                                                            