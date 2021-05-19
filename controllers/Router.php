<?php
require_once ("views/View.php");

class Router {

    private $_controller;
    private $_view;

    public function routeReq(){

        try {

            // CHARGEMENT AUTOMATIQUE DES CLASSES
            spl_autoload_register(function($class){
                require_once ('models/'.$class.'.php');
            });
            $url = '';

            //LE CONTROLLEUR EST INCLU SELON L'ACTION DE L'UTILISATEUR
            if(isset($_GET['url'])){
                $url = explode('/', filter_var($_GET['url'], FILTER_SANITIZE_URL));
                //echo print_r($url);
                $controller = ucfirst(strtolower($url[0]));
                $controllerClass = "Controller".$controller;
                $controllerFile = "controllers/".$controllerClass.".php";

                if(file_exists($controllerFile)){
                    require_once ($controllerFile);
                    $this->_controller = new $controllerClass($url);
                }else{
                    throw new Exception("La page demandée n'a pas pu être trouvée.");
                }
            }else{
                require_once ('controllers/ControllerPokemons.php');
                $this->_controller = new ControllerPokemons($url);
            }
        }catch (Exception $e){
            $errorMsg = $e->getMessage();
            $this->_view = new View('Error');
            $this->_view->generate(array('errorMsg' => $errorMsg));
        }

    }

}