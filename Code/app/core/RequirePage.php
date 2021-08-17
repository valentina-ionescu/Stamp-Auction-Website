<?php


class RequirePage
{

  public static function getView($path, $data = [])
  {
    extract($data, EXTR_SKIP);
    if (file_exists("../app/views/" . $path . '.php')) {
      include '../app/views/' . $path . '.php';
    }
  }

  static function getModel($page)
  {
    return require_once 'app/models/' . $page . '.php';
  }

  static function getController($page)
  {
    return require_once '../app/controllers/' . $page . '.php';
  }


  static public function redirect($url, $data = [])
  {
    extract($data, EXTR_SKIP);
    header("Location: $url");
    exit;
  }
  
}
