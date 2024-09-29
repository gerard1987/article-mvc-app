<?php

// Laad de vereiste bestanden in
require_once 'models/Article.php';
require_once 'models/ViewData.php';
require_once 'controllers/Controller.php';
require_once 'controllers/HomeController.php';
require_once 'controllers/ArticleController.php';

// Ontvang de request en verwerk de route naar de juiste controller
$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$urlSegments = explode('/', trim($url, '/'));
$controllerSegment = !empty($urlSegments[0]) ? $urlSegments[0] : 'home';
$action = !empty($urlSegments[1]) ? $urlSegments[1] : 'index';
$param = !empty($urlSegments[2]) ? $urlSegments[2] : null;

// Controleer welke controller en methode moet worden uitgevoerd
switch ($controllerSegment) {
    case 'home':
        $controller = new HomeController();
        $controller->{$action}($param);
        break;
    case 'articles':
        $controller = new ArticleController();
        $controller->{$action}($param);
        break;
    case 'edit':
        $controller = new ArticleController();
        $controller->{$action}($param);
        break;
    case 'delete':
        $controller = new ArticleController();
        $controller->{$action}($param);
        break;
    default:
        header('HTTP/1.0 404 Not Found');
        echo 'Pagina niet gevonden';
        break;
}
?>