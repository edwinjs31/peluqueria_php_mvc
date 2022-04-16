<?php 
namespace Controllers;

use Classes\Email;
use Model\Usuario;
use MVC\Router;
class HomeController {
    public static function contacto(Router $router) {
        $alertas = [];
        $router->render('templates/contacto', [
            'alertas' => $alertas
        ]);
    }

    public static function nosotros(Router $router) {
        $alertas = [];
        $router->render('templates/nosotros', [
            'alertas' => $alertas
        ]);
    }
}
?>