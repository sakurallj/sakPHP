<?php
/**
 * Created by PhpStorm.
 * User: sakura
 * Date: 15-7-21
 * Time: 下午11:05
 */
require_once __DIR__ . '/vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$request = Request::createFromGlobals();
$response = new Response();
