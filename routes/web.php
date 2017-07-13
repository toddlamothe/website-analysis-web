<?php
/**
 * Created by: Yuriy Chabaniuk
 */


use App\Core\Router\Router;
use Symfony\Component\Routing\RouteCollection;

$router = new Router(new RouteCollection());

$router->get('hello-mvc', 'ReportController@hello')
    ->get('report', 'ReportController@report');


return $router->getRoute();