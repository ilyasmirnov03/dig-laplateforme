<?php

session_start();

use App\Helper\HTTP;
use App\Model\Products;

$products = array();

$prixTotal = 0;
$leafScore = 0;
$productQuantity = 0;

$loyaltyPointsMultiplier = [
    1 => 1,
    2 => 1,
    3 => 1.05,
    4 => 1.1,
    5 => 1.15,
];

// products query in db
if (isset($_SESSION['products'])) {
    foreach ($_SESSION['products'] as $i => $product) {
        array_push($products, Products::getInstance()->find($product['id']));
        $products[$i]['quantity'] = $product['quantity'];
    }

    foreach ($products as $product) {
        $prixTotal += $product['prix'] * $product['quantity'];

        $leafScore += $product['leafScore'] * $product['quantity'];

        $productQuantity += $product['quantity'];
    }

    if (count($products) > 1) {
        $leafScore /= $productQuantity;
    }

    $leafScore = ceil($leafScore);

}

// marge
$prixTotal *= 1.05;

echo HTTP::head("Leaf Score");

?>

<main id="leaf-score">
    <section id="cart-wrapper">
        <div class="cart-grid row">
            <!-- left block -->
            <div id="left-block" class="cart-grid-body col-xs-12 col-lg-8">
                <div class="card card-block">
                    <h1 class="h1 text-center pt-1 pb-5">Panier</h1>
                    <hr class="separator">
                </div>
                <div class="cart-overview">
                    <ul class="cart-items">
                        <?php if (empty($products)) { ?>
                            <p class="text-muted">Le panier est vide.</p>
                            <?php } else {
                            foreach ($products as $i => $product) { ?>
                                <li class="cart-item">
                                    <div class="row">
                                        <!-- quantity -->
                                        <div class="col-md-2">
                                            <div>
                                                <?php echo $product['quantity'] ?>
                                            </div>
                                        </div>
                                        <!-- img -->
                                        <div class="col-md-2 col-xs-3">
                                            <span class="fs-2">
                                                <i class="fa-solid fa-image"></i>
                                            </span>
                                        </div>
                                        <!-- product info -->
                                        <div class="col-md-8 col-xs-7 fs-4">
                                            <div class="row">
                                                <span class="col-md-4">
                                                    <?php echo $product['libelle'] ?>
                                                    <img class="d-block pt-1 w-75" src="<?php echo HTTP::url("/assets/leafscore/feuilles" . ceil($product['leafScore']) . ".svg") ?>" alt="">
                                                </span>
                                                <div class="col-md-4">
                                                    <strong>
                                                        <?php echo number_format($product['prix'] * $product['quantity'], 2) ?>€
                                                    </strong>
                                                </div>
                                                <div class="col-md-4 col-xs-4">
                                                    <i class="fa-solid fa-trash"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                        <?php }
                        } ?>
                    </ul>
                </div>
            </div>

            <!-- right block -->
            <div class="cart-grid-right col-xs-12 col-lg-4">
                <div class="card cart-summary">
                    <div class="cart-detailed-totals">
                        <div class="block-promo">
                            <div class="cart-voucher">
                                <div id="promo-code" class="">
                                    <div class="promo-code">
                                        <form action="https://www.la-plate-forme.fr/panier" data-link-action="add-voucher" method="post">
                                            <input class="promo-input" type="text" name="discount_name" placeholder="Code promo">
                                            <button type="submit">
                                                <svg id="arrow-right" xmlns="http://www.w3.org/2000/svg" width="12.981" height="7.573" viewBox="0 0 12.981 7.573">
                                                    <path id="Tracé_338" data-name="Tracé 338" d="M22.657,10.282a.541.541,0,0,1,.766,0l3.245,3.245a.541.541,0,0,1,0,.766l-3.245,3.245a.542.542,0,0,1-.766-.766L25.52,13.91l-2.863-2.862a.541.541,0,0,1,0-.766Z" transform="translate(-13.845 -10.123)" fill="#898989" fill-rule="evenodd"></path>
                                                    <path id="Tracé_339" data-name="Tracé 339" d="M4.5,17.416a.541.541,0,0,1,.541-.541H16.4a.541.541,0,0,1,0,1.082H5.041A.541.541,0,0,1,4.5,17.416Z" transform="translate(-4.5 -13.629)" fill="#898989" fill-rule="evenodd"></path>
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-block cart-summary-totals">
                            <div class="cart-summary-line cart-total">
                                <span class="label">Total&nbsp;TTC</span>
                                <span class="value"><?php echo number_format($prixTotal, 2) ?>€</span>
                            </div>
                        </div>

                        <div class="card-block d-flex pt-0">
                            <div class="col-7 d-flex align-items-center">
                                <p class="fw-bold m-0">Leafscore du panier : </p>
                            </div>
                            <div class="col-5 text-end">
                                <img id="leafscore" class="w-75" src="<?php echo HTTP::url("/assets/leafscore/feuilles" . ceil($leafScore) . ".svg") ?>" alt="">
                            </div>
                        </div>
                        <div class="card-block d-flex">
                            <div class="col-8 d-flex align-items-center">
                                <p class="fw-bold m-0">Plateforme coins :</p>
                            </div>
                            <div class="col-4 d-flex align-items-center justify-content-end">
                                <p class="px-1 m-0"><?php echo ceil($prixTotal * $loyaltyPointsMultiplier[$leafScore]) ?></p><img id="coins" class="img-fluid" src="<?php echo HTTP::url('/assets/coins/pf-coins.svg') ?>" alt="plateforme coins">
                            </div>
                        </div>
                    </div>
                    <!-- round to superior number -->
                    <div class="card-block d-flex">
                        <div class="col-8">
                            <p>Voulez-vous arrondir votre panier votre panier à <?php echo ceil($prixTotal) ?>€ et reverser <?php echo number_format(ceil($prixTotal) - $prixTotal, 2) ?>€ à une association ?</p>
                        </div>
                        <div class="col-4">
                            <div class="radio text-end">
                                <input label="Oui" type="radio" name="donate" value="1">
                                <input label="Non" type="radio" name="donate" value="0" checked="true">
                            </div>
                        </div>
                    </div>
                    <div class="checkout cart-detailed-actions card-block">
                        <div class="text-sm-center text-xs-center">
                            <a href="https://www.la-plate-forme.fr/commande" class="btn btn-primary">Commander</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php

echo HTTP::footer();

?>