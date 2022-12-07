<?php

use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

$routes = new RouteCollection();

$routes->add('leaf_score/cart', new Route('/leaf'));
$routes->add('loyalty_points/index', new Route('/points'));
$routes->add('member/add', new Route('/add'));
$routes->add('member/save', new Route('/save'));
$routes->add('member/all', new Route('/all'));

return $routes;