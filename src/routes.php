<?php

use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

$routes = new RouteCollection();

$routes->add('shop_mockup/cart', new Route('/cart'));
$routes->add('shop_mockup/products', new Route('/shop'));
$routes->add('shop_mockup/save_product', new Route('/save_product'));

$routes->add('member/add', new Route('/add'));
$routes->add('member/save', new Route('/save'));
$routes->add('member/all', new Route('/all'));

return $routes;