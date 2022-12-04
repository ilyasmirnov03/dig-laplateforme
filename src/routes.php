<?php

use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

$routes = new RouteCollection();

$routes->add('eco_index/index', new Route('/eco'));
$routes->add('points/index', new Route('/points'));
$routes->add('member/add', new Route('/add'));

return $routes;
