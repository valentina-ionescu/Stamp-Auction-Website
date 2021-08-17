<?php


class Categorie extends Crud
{
    public $table = 'categorie';
    public $primaryKey = 'idCategorie';

    public  function selectAll()
    {
      
        $stmt = $this->query('SELECT * FROM categorie');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


}
