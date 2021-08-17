<?php


class Pays extends Crud
{
    public $table = 'pays';
    public $primaryKey = 'idPays';
    
    public  function selectAll()
    {
      
        $stmt = $this->query('SELECT * FROM pays');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


}
