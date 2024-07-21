<?php

namespace Controllers;

use Classes\Email;
use Model\Evento;
use Model\EventosRegistros;
use Model\Registro;
use Model\Usuario;
use MVC\Router;


class DashboardController {

    public static function index(Router $router){
       
        //Obtener ultimos registros

        $registros = Registro::get(5);
        foreach($registros as $registro){
            $registro->usuario = Usuario::find($registro->usuario_id);
        }

        // Calcular  los ingresos

        $virtuales = Registro::total('paquete_id', 2);
        $presenciales = Registro::total('paquete_id', 1);

        $ingresos = ($virtuales * 46.41) + ($presenciales * 189.54);


        //Obtener eventos con mas y menos lugares disponibles

        $menos_disponibles = Evento::ordenarLimite('disponible', 'ASC', 5);
        $mas_disponibles = Evento::ordenarLimite('disponible', 'DESC', 5);


       
        $router->render( 'admin/dashboard/index' ,[
            'titulo' => "Panel de Administracion",
            'registros' => $registros,
            'ingresos' => $ingresos,
            'menos_disponibles' => $menos_disponibles,
            'mas_disponibles' => $mas_disponibles
        ]);
    }

}



?>