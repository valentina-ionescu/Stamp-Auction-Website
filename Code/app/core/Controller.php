<?php
//  include '../app/core/RequirePage.php';
// include '../app/core/Model.php';


class Controller{

    protected $view;
    //  protected $model;
    
    public function __construct(){
       $this->view = new RequirePage();
    }

}

?>