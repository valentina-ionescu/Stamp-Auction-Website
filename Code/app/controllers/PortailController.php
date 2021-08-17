<?php


class PortailController extends Controller{

    public function index(){
        $data['page_title'] = 'Portail';
        RequirePage::getView('./stampee/Portail', $data);
    }
    
}