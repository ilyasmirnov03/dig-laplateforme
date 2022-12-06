<?php

use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

$routes = new RouteCollection();

$routes->add('leaf_score/index', new Route('/leaf'));
$routes->add('loyalty_points/index', new Route('/points'));
$routes->add('member/add', new Route('/add'));
$routes->add('member/save', new Route('/save'));

return $routes;