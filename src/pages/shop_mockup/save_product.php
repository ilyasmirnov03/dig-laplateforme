<?php

use App\Helper\HTTP;

session_start();

if (!isset($_SESSION['products'])) {
    $_SESSION['products'] = array();
}

/**
 * Returns a boolean that means whether the
 * products array can be pushed into session
 * variable or not
 *
 * @return boolean
 */
function shouldArrayBePushed()
{
    $shouldArrayBePushed = true;
    foreach ($_SESSION['products'] as $i => $product) {
        if ((int)$_GET['id'] === (int)$product['id']) {
            $_SESSION['products'][$i]['quantity'] += 1;
            $shouldArrayBePushed = false;
            break 1;
        } else {
            $shouldArrayBePushed = true;
        }
    }
    return $shouldArrayBePushed;
}

if (shouldArrayBePushed()) {
    array_push($_SESSION['products'], ['id' => $_GET['id'], 'quantity' => 1]);
}

HTTP::redirect('/cart');
