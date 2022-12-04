<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;

// request
$request = Request::createFromGlobals();
$pathInfo = $request->getPathInfo();

// routes in routes.php
$routes = require 'routes.php';

// context
$context = new RequestContext();
$context->fromRequest($request);

// url matching
$urlMatcher = new UrlMatcher($routes, $context);

try {
  extract($urlMatcher->match($pathInfo), EXTR_SKIP);
  ob_start();
  include sprintf(__DIR__ . '/pages/%s.php', $_route);

  $response = new Response(ob_get_clean());
} catch (ResourceNotFoundException $exception) {
  $response = new Response('Not Found', 404);
} catch (Exception $exception) {
  $response = new Response('An error occurred', 500);
}

// sending the header
$response->send();
