<?php

use App\Helper\HTTP;

echo HTTP::head("ajout");
echo HTTP::headerHTML();

?>

<body class="pt-5">
    <div class="w-25 mx-auto">
        <h1 class="text-center">Ajout produit</h1>
        <form action="<?php echo HTTP::url('/save') ?>" method="POST">
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
                    <option data-categorie-group="4" value="maroquinerie">Bagagerie</option>
                </select>
            </div>
            <div class="mb-3">
                <select name="entreprise" class="form-select categorie-select" required>
                    <option selected disabled value="">--Choisissez votre entreprise--</option>
                    <option value="1">foodCharente</option>
                    <option value="2">nourriture16</option>
                    <option value="3">vêtement16</option>
                    <option value="4">lesfringuesdu16</option>
                    <option value="5">cosmé16</option>
                    <option value="6">cosmetiqueCharente</option>
                    <option value="7">laboîteatrucs</option>
                    <option value="8">meubles16</option>
                    <option value="9">meublesCharente</option>
                    <option value="10">proprete16</option>
                    <option value="11">maroquinerie16</option>
                    <option value="12">maroCharente</option>
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
            <div class="mb-3">
                <label for="prix" class="form-label">Prix en €</label>
                <input name="prix" type="number" class="form-control" required>
            </div>
            <div class="mb-3 changeable">
                <p>Produit bio :</p>
                <div class="form-check">
                    <input class="form-check-input" value="1" type="radio" name="bio">
                    <label class="form-check-label" for="bio1">
                        Oui
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" value="0" type="radio" name="bio">
                    <label class="form-check-label" for="bio2">
                        Non
                    </label>
                </div>
            </div>
            <div class="mb-3 changeable">
                <select name="animal" class="form-select">
                    <option selected disabled value="">--Choisissez l'impact animale--</option>
                    <option value="vegan">Vegan</option>
                    <option value="vegetarien">Végetarien</option>
                    <option value="animale">Autre</option>
                </select>
            </div>
            <div class="mb-3 changeable">
                <p>Recuperation :</p>
                <div class="form-check">
                    <input class="form-check-input" value="1" type="radio" name="recup">
                    <label class="form-check-label" for="recup1">
                        Oui
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" value="0" type="radio" name="recup">
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