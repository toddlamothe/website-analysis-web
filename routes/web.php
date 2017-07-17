<?php
/**
 * Created by: Yuriy Chabaniuk
 */


use App\Core\Router\Router;
use Symfony\Component\Routing\RouteCollection;

$router = new Router(new RouteCollection());

$router->get('/report/', 'ReportController@report')
    ->get('/competitor-report/', 'ReportController@competitorReport')
    ->post('/get-competitor-report/', 'ReportController@getCompetitorReport')
    ->post('/get-individual-report/', 'ReportController@getIndividualReport');

return $router->getRoute();