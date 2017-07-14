<?php
/**
 * Created by: Yuriy Chabaniuk
 */


namespace App\Core\Router;

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;
use App\Core\Controller;

class Router {

    protected $route = null;

    public function __construct(RouteCollection $route) {
        $this->route = $route;
    }

    public function get($url, $controllerAction, $name = null) {
        $this->addRoute($url, $controllerAction, $name, ['GET']);

        return $this;
    }

    protected function addRoute($url, $controllerAction, $name, array $method) {
        $this->route->add($url, new Route($url, array(
            '_controller' => Controller\Controller::parseNamespace($controllerAction),
        ), array(), array(), '', array(), $method));
    }

    public function getRoute() {
        return $this->route;
    }
}