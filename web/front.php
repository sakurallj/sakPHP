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

$request = Request::createFromGlobals();
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