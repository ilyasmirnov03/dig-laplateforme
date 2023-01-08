<?php

use App\Helper\HTTP;
use App\Model\Products;

$products = Products::getInstance()->findAll();

echo HTTP::head('Shop');
echo HTTP::headerHTML();

?>

<div class="container">
    <div class="row">
        <?php foreach ($products as $i => $product) { ?>
            <div class="col-md-1 col-sm-12 text-center">
                <div class="text-center">
                    <i class="fa-solid fa-image fs-1"></i>
                </div>
                <p class="fs-5"><?php echo $product['libelle'] ?></p>
                <p class="fw-bold fs-2"><?php echo $product['prix'] ?>€</p>
                <a class="btn btn-primary fs-3 w-100" href="<?php echo HTTP::url('/save_product?id=' . $product['id']) ?>">+</a>
            </div>
        <?php } ?>
    </div>
</div>