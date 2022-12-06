<?php

use App\Helper\HTTP;

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
                        <?php if (empty($_POST['products'])) { ?>
                            <p class="text-muted">Le panier est vide.</p>
                            <?php } else {
                            foreach ($_POST['products'] as $i => $product) { ?>
                                <li class="cart-item">
                                    <div class="product-line-grid">
                                        <!-- quantity -->
                                        <div class="product-line-grid-left col-md-2 col-xs-2 qty">
                                            <div>
                                                <?php echo "1" ?>
                                            </div>
                                        </div>
                                        <!-- img -->
                                        <div class="product-line-grid-left col-md-2 col-xs-3">
                                            <span class="product-image media-middle">
                                                <i class="fa-solid fa-image"></i>
                                            </span>
                                        </div>
                                        <!-- product info -->
                                        <div class="product-line-grid-body col-md-8 col-xs-7">
                                            <div class="row">
                                                <span class="col-md-5 col-xs-12">
                                                    <?php echo $product['libelle'] ?>
                                                </span>
                                                <div class="product-line-grid-body col-md-8 col-xs-8 price">
                                                    <strong>
                                                        <?php echo $product['prix'] ?>
                                                    </strong>
                                                </div>
                                                <div class="product-line-grid-right product-line-actions col-md-4 col-xs-4">
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
                                <span class="value">prix</span>
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