<?php

use App\Helper\HTTP;

echo HTTP::head("ajout");

?>

<body>
    <div class="w-25 mx-auto">
        <h1 class="text-center">Ajout produit</h1>
        <form method="GET">
            <div class="mb-3">
                <label for="libelle" class="form-label">Libellé produit</label>
                <input name="libelle" type="text" class="form-control" required>
            </div>
            <div class="mb-3">
                <select name="categorie" class="form-select categorie-select" required>
                    <option selected disabled value="">--Choisissez votre catégorie--</option>
                    <option data-categorie-group="2" value="alimentation">Alimentation</option>
                    <option data-categorie-group="3" value="textile">Textile</option>
                    <option data-categorie-group="2" value="cosmetique">Cosmétique</option>
                    <option data-categorie-group="1" value="electromenager">Électroménager</option>
                    <option data-categorie-group="1" value="bricolage">Bricolage</option>
                    <option data-categorie-group="1" value="mobilier">Mobilier</option>
                    <option data-categorie-group="1" value="vehicule">Véhicule</option>
                    <option data-categorie-group="5" value="entretien">Produit d'entretien</option>
                    <option data-categorie-group="1" value="loisirs">Loisirs</option>
                    <option data-categorie-group="4" value="bagagerie">Bagagerie</option>
                </select>
            </div>
            <div class="mb-3">
                <select name="provenance" class="form-select" required>
                    <option selected disabled value="">--Choisissez la provenance du produit--</option>
                    <option value="charente">Charente</option>
                    <option value="nouvelle-aquitaine">Nouvelle-Aquitaine</option>
                    <option value="france">France</option>
                    <option value="europe">Europe</option>
                    <option value="autre">Autre</option>
                </select>
            </div>
            <div class="mb-3 changeable">
                <p>Produit bio :</p>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="bio">
                    <label class="form-check-label" for="bio1">
                        Oui
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="bio">
                    <label class="form-check-label" for="bio2">
                        Non
                    </label>
                </div>
            </div>
            <div class="mb-3 changeable">
                <select name="animal" class="form-select">
                    <option selected>--Choisissez l'impact animale--</option>
                    <option value="vegan">Vegan</option>
                    <option value="vegetarien">Vegetarien</option>
                    <option value="chair-animale">Chair animale</option>
                </select>
            </div>
            <div class="mb-3 changeable">
                <p>Recuperation :</p>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="recup">
                    <label class="form-check-label" for="recup1">
                        Oui
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="recup">
                    <label class="form-check-label" for="recup2">
                        Non
                    </label>
                </div>
            </div>
            <button type="submit" class="btn-primary btn">Ajouter le produit</button>
        </form>
    </div>
    <script src="<?php echo HTTP::url('assets/js/form.js') ?>"></script>
</body>

</html>