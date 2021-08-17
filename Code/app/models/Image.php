<?php


class Image extends Crud

{
    public $table = 'image';
    public $primaryKey = 'idImage';
    public $imageName = 'nom_image';
    public $foreignKey = 'Timbre_idTimbre';
    public $image_principale = 'image_principale';


    public  function selectAll()
    {
        
        $stmt = $this->query('SELECT * FROM image');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


}
