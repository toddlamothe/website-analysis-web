<?php
/**
 * Created by: Yuriy Chabaniuk
 */


namespace App\Core\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class Controller {

    const CONTROLLERS_NAMESPACE = 'App\\Controllers';

    /**
     * @var Request|null
     */
    protected $request = null;

    /**
     * @var null
     */
    protected $requestContext = null;

    public static function parseNamespace($controllerAction) {
        $controllerActionArray = explode('@', $controllerAction);

        $controller = $controllerActionArray[0];
        $action = $controllerActionArray[1];

        $class = $controller;
        if (strpos(self::CONTROLLERS_NAMESPACE, $controller) === false) {
            $class = self::CONTROLLERS_NAMESPACE . "\\$controller";
        }

        if (!class_exists($class)) {
            throw new \Exception("Controller class can't be found. Class [{$class}]");
        }

        if (!method_exists($class, $action)) {
            throw new \Exception("Controller [{$class}] doesn't contains action [{$action}]");
        }

        return [
            new $class(),
            $action
        ];
    }

    public function setRequest(Request $request) {
        $this->request = $request;

        return $this;
    }

    public function setRequestContext($context) {
        $this->requestContext = $context;

        return $this;
    }

    public function render($name, array $params = []) {
//        extract($this->request->attributes->all(), EXTR_SKIP);
        extract($params, EXTR_SKIP);
        ob_start();

        include sprintf(ROOT_FOLDER . '/resources/views/%s.php', $name);

        return new Response(ob_get_clean());
    }
}