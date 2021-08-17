<?php

class FicheController extends Controller{

    public function index(){
        $data['page_title'] = 'Fiche || Timbre';
        
        RequirePage::getView('./stampee/Fiche', $data);
    }
    
}