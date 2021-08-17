<?php


class App{
    protected $controller = 'AccueilController';
    protected $method = 'index';
    protected $params;

    public function __construct(){

        $url = $this->parseURL();

        // print_r($url);
        $controllerPath = '../app/controllers/'.ucfirst($url[0]). 'Controller.php' ;
        if(file_exists( $controllerPath)){
            $this->controller = ucfirst($url[0]). 'Controller';
            unset($url[0]);
        }
        require $controllerPath;

        $this->controller = new $this->controller;

        if(isset($url[1])){
            $url[1] = strtolower($url[1]);
            if(method_exists($this->controller, $url[1])){
                $this->method = $url[1];
                unset($url[1]);
            }

        //     //method + get
        //  if(isset($url[2])){
        //     $url[2] = strtolower($url[2]);
        //     $this->params =  $url[2];
        //     unset($url[2]);
             
        //   }
        }
        $this->params = (count($url)>0)? $url : ['accueil'];

        call_user_func_array([$this->controller,$this->method], $this->params);
// var_dump($this->params);
    }
    
    private function parseURL(){

        if (isset($_GET['url'])){ // if there is anything after 
           $url = $_GET['url'];
        }else{
            $url= "accueil";
        }
       return explode('/', filter_var(trim($url,'/'), FILTER_SANITIZE_URL)); // clean the URL and remove any slashes "/" if added in the url by user, then filter_var will sanitise the data in the input url
       
        //return $url;
    }    
    

}