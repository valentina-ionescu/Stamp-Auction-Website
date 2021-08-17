<?php


class AdminController extends Controller{

    public function index(){
    
    $data['page_title'] = 'Admin';
    RequirePage::getView('./stampee/admin', $data);
}
}
