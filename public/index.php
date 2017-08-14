<?php
/**
 * Created by: Yuriy Chabaniuk
 */

require_once 'vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\HttpKernel;

define('ROOT_FOLDER', __DIR__ . '/../');
define('PUBLIC_FOLDER', __DIR__);

$request = Request::createFromGlobals();
$response = new Response();

$routes = require_once __DIR__ . '/../routes/web.php';

$context = new RequestContext();
$context->fromRequest($request);
$matcher = new UrlMatcher($routes, $context);

$controllerResolver = new HttpKernel\Controller\ControllerResolver();
$argumentResolver = new HttpKernel\Controller\ArgumentResolver();

try {
    // work around for assets.
    $pathInfo = $_SERVER['REQUEST_URI'];
    if (strpos($pathInfo, '/assets/') === 0) {
        $file = PUBLIC_FOLDER . "{$pathInfo}";

        if (is_readable($file)) {
            echo file_get_contents($file);

            return;
        }

        return new Response('No file.');
    }

    $request->attributes->add($matcher->match($request->getPathInfo()));

    $controller = $controllerResolver->getController($request);
    if (is_object($controller[0])) {
        $controller[0]->setRequest($request)
            ->setRequestContext($context);
    }
    $arguments = $argumentResolver->getArguments($request, $controller);

    $response = call_user_func_array($controller, $arguments);
} catch (Routing\Exception\ResourceNotFoundException $e) {
    $response = new Response('Not Found', 404);
} catch (Exception $e) {
    $response = new Response($e->getMessage(), 500);
}

$response->send();