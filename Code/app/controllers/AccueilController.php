<?php
// include "../app/core/controller.php";

class AccueilController extends Controller{

    public function index(){
        $data['page_title'] = 'Accueil';
        RequirePage::getView('stampee/index', $data);
    }
    
}