<?php

class MiseController extends Controller{

      public function index(){
          $data['page_title'] = 'Enchere';
          RequirePage::redirect('./stampee/Fiche', $data);
    $mise = new Mise();

      }
    
}