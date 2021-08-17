<?php


class ErrorController extends Controller{

    public function index(){
    
    $data['page_title'] = 'Error';
    RequirePage::getView('./stampee/error', $data);
}

}
