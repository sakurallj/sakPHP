<?php
/**
 * Created by PhpStorm.
 * User: sakura
 * Date: 15-7-22
 * Time: 下午10:54
 */
require_once __DIR__.'/../vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Matcher\UrlMatcher;

$request = Request::createFromGlobals();
$routes = new RouteCollection();
$routes->add('hello',new Route('/hello/{name}',array('name','world')));
$routes->add('bye',new Route('/bye'));
$context = new RequestContext();
$context->fromRequest($request);
$matcher = new UrlMatcher($routes,$context);
$attributes = $matcher->match($request->getPathInfo());

$response = new Response();

$map = array(
    '/hello'=> __DIR__.'/../src/hello.php',
    '/bye'=> __DIR__.'/../src/bye.php'
);
var_dump($map);
$path = $request->getPathInfo();
if(isset($map[$path])){
    ob_start();
    include $map[$path];
    $response->setContent(ob_get_clean());
}
else{
    $response->setStatusCode(404);
    $response->setContent('page not fund');
}

$response->send('www');