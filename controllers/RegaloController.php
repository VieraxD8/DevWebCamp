<?php

namespace Controllers;

use Classes\Email;
use Model\Usuario;
use MVC\Router;


class RegaloController {

    public static function index(Router $router){
        $router->render( 'admin/regalos/index' ,[
            'titulo' => "Regalos"
        ]);
    }

}
